<?php
declare(strict_types=1);

// Включаем отображение ошибок
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

// Импорт классов из пространства имён
use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

// Автозагрузка классов
spl_autoload_register(function (string $className): void {
    $prefix = 'MyProject\\Classes\\';
    $baseDir = __DIR__ . '/MyProject/Classes/';

    $len = strlen($prefix);
    if (strncmp($prefix, $className, $len) !== 0) {
        return;
    }

    $relativeClass = substr($className, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// === Тестирование обычных пользователей ===
echo "<h3>Тестирование обычных пользователей:</h3>";

$user1 = new User("Иван", "ivan_99", "pass123");
$user2 = new User("Мария", "masha_01", "qwerty");
$user3 = new User("Петр", "peter_p", "123456");

$user1->showInfo();
$user2->showInfo();
$user3->showInfo();

// === Тестирование супер-пользователя ===
echo "<hr><h3>Тестирование супер-пользователя:</h3>";

$superUser = new SuperUser("Алексей", "admin_alex", "superpass", "Administrator");
$superUser->showInfo();

// === Тестирование метода getInfo() ===
echo "<hr><h3>Тестирование метода getInfo():</h3>";

$infoArray = $superUser->getInfo();
echo "<pre>";
print_r($infoArray);
echo "</pre>";

// === Статистика созданных объектов ===
echo "<hr><h3>Статистика созданных объектов:</h3>";
echo "Всего обычных пользователей: " . User::$userCount . "<br>";
echo "Всего супер-пользователей: " . SuperUser::$superUserCount . "<br>";

echo "<hr><em>(Деструкторы сработают в конце скрипта)</em><br>";