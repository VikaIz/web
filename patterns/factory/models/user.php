<?php
namespace Factory\Models;

class User extends \Factory\Router
{
    public function __construct(
        public string $name,
        public string $email,
        public string $role
    ) {}

    public function render(): string
    {
        return "Пользователь: <b>{$this->name}</b>, Email: {$this->email}, Роль: {$this->role}";
    }
}