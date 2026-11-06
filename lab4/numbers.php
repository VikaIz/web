<?php
require_once 'NumbersSquared.php';

$obj = new NumbersSquared(3, 7);

echo "<pre>";
foreach($obj as $num => $square){
    echo "Квадрат числа $num = $square\n";
}
echo "</pre>";