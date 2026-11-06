<?php
$db = new SQLite3('news.db');
$db->exec("INSERT INTO category (id, name) VALUES (4, 'Наука')");
echo "Категория 'Наука' добавлена!";