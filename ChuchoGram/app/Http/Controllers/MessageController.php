<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Illuminate\Support\Facades\Crypt;

class MessageController extends Controller
{

    public function index()
    {
        $messages = Message::all();

        // DESCIFRAR MENSAJES
        foreach ($messages as $mensaje) {
            $mensaje->mensaje = Crypt::decryptString($mensaje->mensaje);
        }

        return view('chat', compact('messages'));
    }


    public function store(Request $request)
    {
        // CIFRAR MENSAJE
        $mensajeCifrado = Crypt::encryptString($request->mensaje);

        Message::create([
            'user_id' => auth()->id(),
            'mensaje' => $mensajeCifrado
        ]);

        return redirect()->back();
    }

}