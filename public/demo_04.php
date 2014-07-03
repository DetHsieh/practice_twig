<?php
$loader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../lib/init.php';

$func = new Twig_SimpleFunction('navBar', function ($num) {
    $i = (int)$num;
    $html = '';
    if (1 < $i) {
        $html .= '<a href="demo_' . sprintf('%02d', $i - 1) . '.php">Prev</a>';
    }
    $html .= '<b> ' . $i . ' </b>';
    $html .= '<a href="demo_' . sprintf('%02d', $i + 1) . '.php">Prev</a>';

    return $html;
});

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader, array('strict_variables' => true));
$twig->addFunction($func);

$array_data = array(
    'rows' => $rows,
    'num' => 4,
);

echo $twig->render('demo_04.html.twig', $array_data); // 放在VIEW裡面的檔案
