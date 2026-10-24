<?php
spl_autoload_register();

use Factory\Models\Users;

// Создаем объект коллекции пользователей (фабрика сработает внутри конструктора)
$usersCollection = new Users();

// Выводим информацию о всех пользователях
echo "<h3>Список пользователей (Factory Method):</h3>";
echo $usersCollection->render();