<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeminiAIService
{
    public function chat(string $userMessage): string
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('GROQ_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.groq.com/openai/v1/chat/completions', [
            'model'    => 'llama-3.3-70b-versatile',
            'messages' => [
                [
                    'role'    => 'system',
                    'content' => 'Eres un asistente amigable dentro de una app de chat llamada ChuchoGram. Responde siempre en español y de forma breve.',
                ],
                [
                    'role'    => 'user',
                    'content' => $userMessage,
                ],
            ],
        ]);

        if ($response->failed()) {
            return 'Error: ' . $response->status() . ' - ' . $response->body();
        }

        return $response->json('choices.0.message.content') ?? 'Sin respuesta.';
    }
}