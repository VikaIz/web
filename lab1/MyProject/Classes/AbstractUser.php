<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Абстрактный класс пользователя.
 * Определяет базовый контракт для всех типов пользователей.
 */
abstract class AbstractUser
{
    /**
     * Абстрактный метод для вывода информации о пользователе.
     * Должен быть реализован в каждом дочернем классе.
     *
     * @return void
     */
    abstract public function showInfo(): void;
}