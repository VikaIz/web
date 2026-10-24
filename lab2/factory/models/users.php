<?php
namespace Factory\Models;

class Users extends Collection
{
    public function __construct(public ?array $users = null)
    {
        // Если массив не передан, создаем 5 пользователей по умолчанию
        $users ??= [
            new User('Иван Иванов', 'ivan@example.com', 'admin'),
            new User('Мария Петрова', 'maria@example.com', 'user'),
            new User('Пётр Сидоров', 'petr@example.com', 'user'),
            new User('Анна Смирнова', 'anna@example.com', 'guest'),
            new User('Алексей Орлов', 'alex@example.com', 'admin'),
        ];
        
        parent::__construct($users);
    }

    public function render(): string
    {
        // Оборачиваем каждый элемент в <li> и собираем в <ul>
        $items = array_map(fn($user) => '<li>' . $user->render() . '</li>', $this->collection);
        return '<ul>' . implode('', $items) . '</ul>';
    }
}