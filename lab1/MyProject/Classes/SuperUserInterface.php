<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Интерфейс супер-пользователя.
 * Определяет контракт для получения данных в виде массива.
 */
interface SuperUserInterface
{
    /**
     * Возвращает ассоциативный массив со свойствами объекта.
     * Ключи массива — имена свойств, значения — значения свойств.
     *
     * @return array<string, mixed>
     */
    public function getInfo(): array;
}