<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $_SESSION['username'] = $_POST['username'] ?? 'Гість';
    $_SESSION['theme'] = $_POST['theme'] ?? 'light';

    if (isset($_POST['bgcolor'])) {
        setcookie('bgcolor', $_POST['bgcolor'], time() + (30 * 24 * 60 * 60)); // 30 днів
    }

    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Налаштування</title>
</head>
<body>
    <h1>Налаштування користувача</h1>
    <form method="post" action="">
        <label>Ім’я користувача:
            <input type="text" name="username" required>
        </label><br><br>
        <label>Улюблений колір фону:
            <input type="color" name="bgcolor" required>
        </label><br><br>
        <label>Тема оформлення:
            <select name="theme" required>
                <option value="light">Світла</option>
                <option value="dark">Темна</option>
            </select>
        </label><br><br>
        <button type="submit">Зберегти</button>
    </form>
</body>
</html>
