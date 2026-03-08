<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{
    public function index()
    {
        // Cargar mensajes con el usuario que los envió (eager loading)
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

        // Cifrar mensaje antes de guardar
        $mensajeCifrado = Crypt::encryptString($request->mensaje);

        Message::create([
            'user_id' => auth()->id(),
            'mensaje' => $mensajeCifrado,
        ]);

        return redirect()->back();
    }
}