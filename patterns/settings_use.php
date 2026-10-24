<?php
spl_autoload_register();

use Singleton\Settings;

// Получаем единственный экземпляр
$settings = Settings::get();

// 1. Сохраняем числовое значение
$settings->app_version = 2;

// 2. Сохраняем строковое значение
$settings->app_name = 'Мое Приложение';

// 3. Сохраняем логическое значение
$settings->is_debug = true;

// Выводим сохраненные значения на экран
echo "<h3>Настройки (Singleton):</h3>";
echo "Версия (число): " . $settings->app_version . "<br>";
echo "Название (строка): " . $settings->app_name . "<br>";
echo "Режим отладки (логическое): " . ($settings->is_debug ? 'Включен' : 'Выключен') . "<br>";