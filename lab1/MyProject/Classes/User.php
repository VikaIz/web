<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Базовый класс пользователя.
 * Наследуется от абстрактного класса AbstractUser.
 */
class User extends AbstractUser
{
    /** @var string Имя пользователя */
    public string $name;

    /** @var string Логин пользователя */
    public string $login;

    /** @var string Пароль пользователя (приватное свойство) */
    private string $password;

    /** @var int Статический счётчик созданных экземпляров класса User */
    public static int $userCount = 0;

    /**
     * Конструктор класса User.
     * Инициализирует свойства и увеличивает счётчик объектов.
     * Счётчик увеличивается только при создании экземпляра именно класса User,
     * а не его наследников (например, SuperUser).
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
        
        // Инкрементируем счётчик только если создаётся именно User, а не наследник
        if (static::class === self::class) {
            self::$userCount++;
        }
    }

    /**
     * Деструктор класса.
     */
    public function __destruct()
    {
        echo "Пользователь {$this->login} удален.<br>";
    }

    /**
     * Выводит информацию о пользователе.
     */
    public function showInfo(): void
    {
        echo "Пользователь: {$this->name}, Логин: {$this->login}<br>";
    }

    /**
     * Геттер для приватного свойства password.
     */
    public function getPassword(): string
    {
        return $this->password;
    }
}
