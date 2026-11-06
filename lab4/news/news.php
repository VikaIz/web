<?php
require_once 'NewsDB.class.php';

$news   = new NewsDB();
$errMsg = "";

// Обработка удаления
if (isset($_GET['delete'])) {
    require_once 'delete_news.inc.php';
}

// Обработка добавления
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'save_news.inc.php';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Новостная лента</title>
    <meta charset="utf-8">
</head>
<body>
    <h1>Последние новости</h1>
    
    <?php if ($errMsg !== ""): ?>
        <p style="color:red;"><strong><?= $errMsg ?></strong></p>
    <?php endif; ?>

    <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
        Заголовок новости:<br>
        <input type="text" name="title"><br>
        
        Выберите категорию:<br>
        <select name="category">
            <?php foreach ($news as $id => $name): ?>
                <option value="<?= htmlspecialchars($id) ?>">
                    <?= htmlspecialchars($name) ?>
                </option>
            <?php endforeach; ?>
        </select>
        <br />
        
        Текст новости:<br>
        <textarea name="description" cols="50" rows="5"></textarea><br>
        
        Источник:<br>
        <input type="text" name="source"><br>
        <br>
        <input type="submit" value="Добавить!">
    </form>

    <?php require_once 'get_news.inc.php'; ?>
</body>
</html>