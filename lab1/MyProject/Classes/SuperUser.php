<?php
declare(strict_types=1);

namespace MyProject\Classes;

/**
 * Класс супер-пользователя.
 * Наследуется от User и реализует интерфейс SuperUserInterface.
 */
class SuperUser extends User implements SuperUserInterface
{
    /**
     * Роль супер-пользователя.
     *
     * @var string
     */
    public string $role;

    /**
     * Статический счётчик созданных экземпляров класса SuperUser.
     *
     * @var int
     */
    public static int $superUserCount = 0;

    /**
     * Конструктор класса SuperUser.
     * Вызывает родительский конструктор и инициализирует свойство role.
     *
     * @param string $name     Имя супер-пользователя
     * @param string $login    Логин супер-пользователя
     * @param string $password Пароль супер-пользователя
     * @param string $role     Роль супер-пользователя
     */
    public function __construct(string $name, string $login, string $password, string $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
        self::$superUserCount++;
    }

    /**
     * Перегруженный метод вывода информации.
     * Выводит имя, логин и роль супер-пользователя.
     *
     * @return void
     */
    public function showInfo(): void
    {
        echo "Супер-пользователь: {$this->name}, Логин: {$this->login}, Роль: {$this->role}<br>";
    }

    /**
     * Реализация метода интерфейса SuperUserInterface.
     * Возвращает ассоциативный массив со всеми свойствами объекта.
     *
     * @return array<string, string>
     */
    public function getInfo(): array
    {
        return [
            'name'     => $this->name,
            'login'    => $this->login,
            'password' => $this->getPassword(),
            'role'     => $this->role,
        ];
    }
}