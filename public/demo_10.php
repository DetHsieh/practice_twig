<?php
$autoloader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../lib/init.php';
require __DIR__ . '/../lib/extension.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader, array('strict_variables' => true));
$twig->addExtension(new Demo_Twig_Extension());

$array_data = array(
    'rows' => $rows2,
    'num' => 10,
);

echo $twig->render('demo_10.html.twig', $array_data); // 放在VIEW裡面的檔案
