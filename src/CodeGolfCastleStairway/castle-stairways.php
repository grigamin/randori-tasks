<?php

$str = isset($_GET['s']) ? $_GET['s'] : '';

// solution
$i = 0;

for ($e = strlen($s = $str); $i < $e; $s .= $s[$i], $s[$i++] = " ") {
    echo $t = str_pad($s, 2 * $e - 1), strrev($t), "
";
}
