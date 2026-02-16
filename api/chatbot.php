<?php

declare(strict_types=1);
require __DIR__ . '/helpers.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    jsonResponse(['reply' => 'Method not allowed'], 405);
}

$message = trim($_POST['message'] ?? '');
if ($message === '') {
    jsonResponse(['reply' => 'Please type a message.'], 422);
}

$apiKey = getenv('OPENAI_API_KEY') ?: '';

if ($apiKey !== '') {
    $reply = callOpenAI($message, $apiKey);
    if ($reply !== null) {
        jsonResponse(['reply' => $reply]);
    }
}

jsonResponse(['reply' => localFallbackReply($message)]);

function callOpenAI(string $message, string $apiKey): ?string
{
    $endpoint = 'https://api.openai.com/v1/responses';
    $payload = [
        'model' => 'gpt-4o-mini',
        'input' => [
            [
                'role' => 'system',
                'content' => 'You are a concise and helpful website assistant for a local PHP web app.',
            ],
            [
                'role' => 'user',
                'content' => $message,
            ],
        ],
        'max_output_tokens' => 180,
    ];

    $ch = curl_init($endpoint);
    if ($ch === false) {
        return null;
    }

    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => [
            'Authorization: Bearer ' . $apiKey,
            'Content-Type: application/json',
        ],
        CURLOPT_POSTFIELDS => json_encode($payload, JSON_UNESCAPED_UNICODE),
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 15,
    ]);

    $response = curl_exec($ch);
    $httpCode = (int) curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if (!is_string($response) || $httpCode < 200 || $httpCode >= 300) {
        return null;
    }

    $decoded = json_decode($response, true);
    if (!is_array($decoded)) {
        return null;
    }

    if (isset($decoded['output_text']) && is_string($decoded['output_text']) && trim($decoded['output_text']) !== '') {
        return trim($decoded['output_text']);
    }

    return null;
}

function localFallbackReply(string $message): string
{
    $normalized = strtolower($message);

    if (str_contains($normalized, 'hello') || str_contains($normalized, 'hi')) {
        return 'Hello! I can help with tasks, weather lookup, notes, and this website setup.';
    }

    if (str_contains($normalized, 'feature')) {
        return 'This app includes a live dashboard, todo manager, notes, contact form, weather lookup, and AI chatbot.';
    }

    if (str_contains($normalized, 'php')) {
        return 'PHP powers the backend API endpoints for todo, contact, weather, and chatbot responses.';
    }

    if (str_contains($normalized, 'jquery') || str_contains($normalized, 'ajax')) {
        return 'jQuery and AJAX handle smooth page interactions without full reloads.';
    }

    if (str_contains($normalized, 'help')) {
        return 'Try asking: “What are the features?”, “How does the chatbot work?”, or “Give productivity tips.”';
    }

    return 'I\'m running in local fallback mode. Set OPENAI_API_KEY to enable full AI responses.';
}
