<?php
// Проверяем, что форма отправлена и поля заполнены
if (!isset($_POST['title'], $_POST['category'], $_POST['description'], $_POST['source'])
    || trim($_POST['title']) === ''
    || trim($_POST['description']) === ''
    || trim($_POST['source']) === ''
    || trim($_POST['category']) === '') {
    $errMsg = "Заполните все поля формы!";
} else {
    // Фильтрация данных
    $title       = trim(strip_tags($_POST['title']));
    $category    = (int)$_POST['category'];
    $description = trim(strip_tags($_POST['description']));
    $source      = trim(strip_tags($_POST['source']));

    $result = $news->saveNews($title, $category, $description, $source);

    if ($result) {
        // Перезапрос страницы
        header("Location: {$_SERVER['PHP_SELF']}");
        exit;
    } else {
        $errMsg = "Произошла ошибка при добавлении новости";
    }
}