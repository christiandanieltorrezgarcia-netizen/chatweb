<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class OpenRouterService
{
    public function chat(string $userMessage): string
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('OPENAI_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.openai.com/v1/responses', [
            'model' => 'gpt-4.1-mini',
            'input' => [
                [
                    'role' => 'system',
                    'content' => 'Eres un asistente amigable dentro de una app de chat llamada Chuchogram. Responde siempre en español y de forma breve.'
                ],
                [
                    'role' => 'user',
                    'content' => $userMessage
                ]
            ]
        ]);

        if ($response->failed()) {
            return 'Estoy ocupado en este momento intenta más tarde.';
        }

        return $response->json('output_text') ?? 'Sin respuesta.';
    }
}