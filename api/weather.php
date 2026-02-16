<?php

declare(strict_types=1);
require __DIR__ . '/helpers.php';

$city = trim($_GET['city'] ?? '');
if ($city === '') {
    jsonResponse(['message' => 'City is required'], 422);
}

$conditions = ['Sunny', 'Cloudy', 'Rainy', 'Windy', 'Partly Cloudy', 'Clear'];
$seed = abs(crc32(strtolower($city)));
$temperature = (int) (($seed % 30) + 5);
$humidity = (int) (($seed % 60) + 30);
$condition = $conditions[$seed % count($conditions)];

jsonResponse([
    'city' => htmlspecialchars(ucwords($city), ENT_QUOTES, 'UTF-8'),
    'temperature' => $temperature,
    'humidity' => $humidity,
    'condition' => $condition,
]);
