<?php
session_start();

if (!isset($_SESSION['username']) || !isset($_SESSION['theme'])) {
    header('Location: preferences.php');
    exit();
}

$bgcolor = $_COOKIE['bgcolor'] ?? '#ffffff'; // дефолтний колір
$theme = $_SESSION['theme'];
$username = $_SESSION['username'];

$themeStyles = [
    'light' => ['background' => $bgcolor, 'color' => '#000000'],
    'dark' => ['background' => $bgcolor, 'color' => '#ffffff']
];
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Особистий кабінет</title>
    <style>
        body {
            background-color: <?= htmlspecialchars($themeStyles[$theme]['background']) ?>;
            color: <?= htmlspecialchars($themeStyles[$theme]['color']) ?>;
            font-family: Arial, sans-serif;
        }
        .buttons {
            margin-top: 20px;
        }
        .buttons a {
            margin-right: 10px;
            text-decoration: none;
            color: inherit;
            padding: 8px 16px;
            background: #ccc;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <h1>Вітаю, <?= htmlspecialchars($username) ?>!</h1>

    <div class="buttons">
        <a href="preferences.php">Змінити налаштування</a>
        <a href="logout.php">Вийти</a>
    </div>
</body>
</html>
