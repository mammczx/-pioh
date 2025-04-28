<?php
session_start();
session_unset();
session_destroy();

// Очищаємо кукі
setcookie('bgcolor', '', time() - 3600);

header('Location: index.php');
exit();
?>
