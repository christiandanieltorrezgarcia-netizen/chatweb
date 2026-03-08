<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Services\OpenRouterService;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::with('user')->orderBy('created_at', 'asc')->get();

        foreach ($messages as $mensaje) {
            $mensaje->mensaje = Crypt::decryptString($mensaje->mensaje);
        }

        return view('chat', compact('messages'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mensaje' => ['required', 'string', 'max:2000'],
        ]);

        $aiUserId = (int) config('services.ai_user_id');
        $texto    = $request->mensaje;

        // Guardar mensaje del usuario
        Message::create([
            'user_id' => auth()->id(),
            'mensaje' => Crypt::encryptString($texto),
        ]);

        // Detectar si el mensaje empieza con @chuchogram
        if (str_starts_with(strtolower(trim($texto)), '@chuchogram')) {
            // Extraer solo la pregunta sin el @chuchogram
            $pregunta = trim(substr($texto, strlen('@chuchogram')));

            if ($pregunta) {
                $ai       = new OpenRouterService();
                $respuesta = $ai->chat($pregunta);

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
                    'id'      => $msg->id,
                    'user_id' => $msg->user_id,
                    'sender'  => $msg->user->name ?? 'Usuario',
                    'mensaje' => Crypt::decryptString($msg->mensaje),
                ];
            });

        return response()->json($messages);
    }
}