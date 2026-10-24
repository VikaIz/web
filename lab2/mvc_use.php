<?php
spl_autoload_register();

use MVC\Controllers\Controller;

$obj = new Controller('users.markdown');

echo "<h3>Результат в формате Markdown:</h3>";
echo "<pre>" . htmlspecialchars($obj->render()) . "</pre>";
