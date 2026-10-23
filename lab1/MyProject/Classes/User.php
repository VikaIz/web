<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Базовый класс пользователя.
 * Наследуется от абстрактного класса AbstractUser.
 */
class User extends AbstractUser
{
    /**
     * Имя пользователя.
     *
     * @var string
     */
    public string $name;

    /**
     * Логин пользователя.
     *
     * @var string
     */
    public string $login;

    /**
     * Пароль пользователя (приватное свойство).
     *
     * @var string
     */
    private string $password;

    /**
     * Статический счётчик созданных экземпляров класса User.
     *
     * @var int
     */
    public static int $userCount = 0;

    /**
     * Конструктор класса User.
     * Инициализирует свойства и увеличивает счётчик объектов.
     *
     * @param string $name     Имя пользователя
     * @param string $login    Логин пользователя
     * @param string $password Пароль пользователя
     */
    public function __construct(string $name, string $login, string $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
        self::$userCount++;
    }

    /**
     * Деструктор класса.
     * Выводит сообщение об удалении пользователя.
     */
    public function __destruct()
    {
        echo "Пользователь {$this->login} удален.<br>";
    }

    /**
     * Выводит информацию о пользователе.
     * Реализация абстрактного метода родительского класса.
     *
     * @return void
     */
    public function showInfo(): void
    {
        echo "Пользователь: {$this->name}, Логин: {$this->login}<br>";
    }

    /**
     * Геттер для приватного свойства password.
     * Необходим для доступа из дочернего класса SuperUser.
     *
     * @return string Пароль пользователя
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}