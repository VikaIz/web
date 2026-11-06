<?php
require_once 'INewsDB.class.php';

class NewsDB implements INewsDB
{
    const DB_NAME = 'news.db';

    private $_db;

    /**
     * Конструктор: подключается к БД, при необходимости создаёт её и заполняет.
     */
    public function __construct()
    {
        $isNew = !file_exists(self::DB_NAME);

        $this->_db = new SQLite3(self::DB_NAME);

        if ($isNew) {
            // Создаём таблицы и заполняем категории
            $this->_db->exec("CREATE TABLE msgs(
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                title TEXT,
                category INTEGER,
                description TEXT,
                source TEXT,
                datetime INTEGER
            )");

            $this->_db->exec("CREATE TABLE category(
                id INTEGER,
                name TEXT
            )");

            $this->_db->exec("INSERT INTO category(id, name)
                SELECT 1 as id, 'Политика' as name
                UNION SELECT 2 as id, 'Культура' as name
                UNION SELECT 3 as id, 'Спорт' as name");
        }
    }

    /**
     * Деструктор: закрывает соединение с БД.
     */
    public function __destruct()
    {
        unset($this->_db);
    }

    /**
     * Доступ на чтение к $_db для наследников.
     */
    public function __get($name)
    {
        if ($name === '_db') {
            return $this->_db;
        }
        return null;
    }

    /**
     * Добавление новости.
     */
    public function saveNews($title, $category, $description, $source)
    {
        $dt = time();

        $stmt = $this->_db->prepare(
            "INSERT INTO msgs(title, category, description, source, datetime)
             VALUES (:title, :category, :description, :source, :dt)"
        );
        $stmt->bindValue(':title',       $title,       SQLITE3_TEXT);
        $stmt->bindValue(':category',    (int)$category, SQLITE3_INTEGER);
        $stmt->bindValue(':description', $description, SQLITE3_TEXT);
        $stmt->bindValue(':source',      $source,      SQLITE3_TEXT);
        $stmt->bindValue(':dt',          $dt,          SQLITE3_INTEGER);

        return (bool)$stmt->execute();
    }

    /**
     * Выборка всех новостей.
     */
    public function getNews()
    {
        $sql = "SELECT msgs.id as id, title, category.name as category,
                       description, source, datetime
                FROM msgs, category
                WHERE category.id = msgs.category
                ORDER BY msgs.id DESC";

        $result = $this->_db->query($sql);
        if (!$result) {
            return false;
        }

        $news = [];
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            $news[] = $row;
        }
        return $news;
    }

    /**
     * Удаление новости по id.
     */
    public function deleteNews($id)
    {
        $id = (int)$id;
        if ($id <= 0) {
            return false;
        }

        $stmt = $this->_db->prepare("DELETE FROM msgs WHERE id = :id");
        $stmt->bindValue(':id', $id, SQLITE3_INTEGER);

        return (bool)$stmt->execute();
    }
}