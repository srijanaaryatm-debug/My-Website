<?php

declare(strict_types=1);
require __DIR__ . '/helpers.php';

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') !== 'POST') {
    jsonResponse(['message' => 'Method not allowed'], 405);
}

$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$message = trim($_POST['message'] ?? '');

if ($name === '' || $email === '' || $message === '') {
    jsonResponse(['message' => 'All fields are required'], 422);
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    jsonResponse(['message' => 'Invalid email address'], 422);
}

$file = __DIR__ . '/../data/messages.json';
$messages = readJsonFile($file);
$messages[] = [
    'id' => uniqid('msg_', true),
    'name' => htmlspecialchars($name, ENT_QUOTES, 'UTF-8'),
    'email' => htmlspecialchars($email, ENT_QUOTES, 'UTF-8'),
    'message' => htmlspecialchars($message, ENT_QUOTES, 'UTF-8'),
    'created_at' => date(DATE_ATOM),
];

writeJsonFile($file, $messages);
jsonResponse(['message' => 'Thanks! Your message has been saved locally.']);
