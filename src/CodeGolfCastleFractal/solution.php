<?php

$iterations = isset($_GET['i']) ? $_GET['i'] : 1; // number of iterations

$i = 0;
for ($r = ($n = --$iterations) ? ["* *", "***"] : ["*"]; ++$i < $n; $r[] = $a . $b . $a) {
    $a = strtr($b = end($r), "**", "**");
    foreach ($r as &$s) $s .= str_pad("", pow(3, $i)) . $s;
}
echo join("\n", $r);
