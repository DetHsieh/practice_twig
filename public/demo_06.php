<?php
$autoloader = require __DIR__ . '/../vendor/autoload.php';
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

$filter = new Twig_SimpleFilter('toStr', function ($type) {
    switch ($type) {
    case 1:
        $str = 'type = 1的時候會被filter換成這串字';
        break;
    case 2:
        $str = 'type = 2...(下略)';
        break;
    case 3:
        $str = '他們可是有三個啊～～～～';
        break;
    default:
        $str = '預設的type';
    }

    return $str;
});

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader, array('strict_variables' => true));
$twig->addFunction($func);
$twig->addFilter($filter);

$array_data = array(
    'rows' => $rows,
    'num' => 6,
);

echo $twig->render('demo_06.html.twig', $array_data); // 放在VIEW裡面的檔案
