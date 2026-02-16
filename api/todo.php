<?php

declare(strict_types=1);
require __DIR__ . '/helpers.php';

$file = __DIR__ . '/../data/todos.json';
$todos = readJsonFile($file);
$method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if ($method === 'GET') {
    jsonResponse(['todos' => array_values($todos)]);
}

if ($method === 'POST') {
    $text = trim($_POST['text'] ?? '');
    if ($text === '') {
        jsonResponse(['message' => 'Task cannot be empty'], 422);
    }

    $todos[] = ['id' => uniqid('todo_', true), 'text' => htmlspecialchars($text, ENT_QUOTES, 'UTF-8')];
    writeJsonFile($file, $todos);
    jsonResponse(['message' => 'Task added', 'todos' => $todos]);
}

if ($method === 'DELETE') {
    parse_str(file_get_contents('php://input') ?: '', $input);
    $id = $input['id'] ?? '';
    $filtered = array_values(array_filter($todos, static fn(array $todo): bool => ($todo['id'] ?? '') !== $id));
    writeJsonFile($file, $filtered);
    jsonResponse(['message' => 'Task deleted', 'todos' => $filtered]);
}

jsonResponse(['message' => 'Method not allowed'], 405);
