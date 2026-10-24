<?php
spl_autoload_register();

use MVC\Controllers\Controller;

// Меняем .html на .markdown, чтобы ViewFactory создал UsersMarkdownView
// (Если не сработает, попробуй 'users.md')
$obj = new Controller('users.markdown');

// Выводим результат в теге <pre>, чтобы сохранить форматирование Markdown
echo "<h3>Результат в формате Markdown:</h3>";
echo "<pre>" . htmlspecialchars($obj->render()) . "</pre>";
