<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\GeminiAIService;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')
            ->orderBy('created_at', 'asc')
            ->get();

        foreach ($messages as $msg) {
            if ($msg->mensaje) {
                $msg->mensaje = Crypt::decryptString($msg->mensaje);
            }
        }

        return view('chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => ['nullable', 'string', 'max:2000'],
            'file'    => ['nullable', 'file', 'max:51200', 'mimes:jpg,jpeg,png,gif,webp,mp3,ogg,wav,mp4,webm'],
        ]);

        $texto    = $request->mensaje ?? '';
        $user     = auth()->user();
        $filePath = null;
        $fileType = null;
        $fileName = null;

        // Procesar archivo si viene
        if ($request->hasFile('file')) {
            $file     = $request->file('file');
            $mime     = $file->getMimeType();
            $fileName = $file->getClientOriginalName();

            if (str_starts_with($mime, 'image/')) {
                $fileType = 'image';
                $filePath = $file->store('chat/images', 'public');
            } elseif (str_starts_with($mime, 'audio/')) {
                $fileType = 'audio';
                $filePath = $file->store('chat/audios', 'public');
            } elseif (str_starts_with($mime, 'video/')) {
                $fileType = 'video';
                $filePath = $file->store('chat/videos', 'public');
            }
        }

        // Debe tener al menos texto o archivo
        if (!$texto && !$filePath) {
            return response()->json(['error' => 'Mensaje vacío'], 422);
        }

        $msg = Message::create([
            'user_id'   => $user->id,
            'mensaje'   => $texto ? Crypt::encryptString($texto) : null,
            'file_path' => $filePath,
            'file_type' => $fileType,
            'file_name' => $fileName,
        ]);

        // Detectar @chuchogram
        if ($texto && str_contains(strtolower($texto), '@chuchogram')) {
            $pregunta = trim(preg_replace('/@chuchogram/i', '', $texto));

            if ($pregunta) {
                $ai        = new GeminiAIService();
                $respuesta = $ai->chat($pregunta);
                $aiUserId  = (int) config('services.ai_user_id');

                Message::create([
                    'user_id' => $aiUserId,
                    'mensaje' => Crypt::encryptString('🤖 ' . $respuesta),
                ]);
            }
        }

        return response()->json(['ok' => true]);
    }

    public function poll(Request $request)
    {
        $lastId = $request->integer('last_id', 0);

        $messages = Message::with('user')
            ->where('id', '>', $lastId)
            ->orderBy('created_at', 'asc')
            ->get()
            ->map(function ($msg) {
                return [
                    'id'        => $msg->id,
                    'user_id'   => $msg->user_id,
                    'sender'    => $msg->user->name ?? 'Usuario',
                    'mensaje'   => $msg->mensaje ? Crypt::decryptString($msg->mensaje) : null,
                    'file_path' => $msg->file_path ? asset('storage/' . $msg->file_path) : null,
                    'file_type' => $msg->file_type,
                    'file_name' => $msg->file_name,
                ];
            });

        return response()->json($messages);
    }
}