<?php
$id = isset($_GET['delete']) ? $_GET['delete'] : null;

// Проверка корректности (должно быть положительное целое число)
if ($id === null || !ctype_digit((string)$id) || (int)$id <= 0) {
    // Некорректные данные — просто перезапрос
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}

$result = $news->deleteNews((int)$id);

if (!$result) {
    $errMsg = "Произошла ошибка при удалении новости";
} else {
    header("Location: {$_SERVER['PHP_SELF']}");
    exit;
}