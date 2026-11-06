<?php
$items = $news->getNews();

if ($items === false) {
    $errMsg = "Произошла ошибка при выводе новостной ленты";
} else {
    $count = count($items);
    echo "<p>Всего новостей: <strong>$count</strong></p>";

    if ($count === 0) {
        echo "<p>Новостей пока нет.</p>";
    } else {
        foreach ($items as $item) {
            $id       = (int)$item['id'];
            $title    = htmlspecialchars($item['title']);
            $category = htmlspecialchars($item['category']);
            $desc     = htmlspecialchars($item['description']);
            $source   = htmlspecialchars($item['source']);
            $date     = date('d.m.Y H:i', (int)$item['datetime']);

            echo "<article style='border-bottom:1px solid #ccc; padding:8px 0;'>";
            echo "<h3><a href='news.php?id=$id'>$title</a></h3>";
            echo "<p><em>Категория:</em> $category | <em>Дата:</em> $date</p>";
            echo "<p>$desc</p>";
            echo "<p><small>Источник: $source</small></p>";
            echo "<p><a href='news.php?delete=$id' "
               . "onclick=\"return confirm('Удалить новость?')\">Удалить</a></p>";
            echo "</article>";
        }
    }
}