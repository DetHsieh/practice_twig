<?php
$autoloader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../lib/init.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader, array('strict_variables' => true));

$array_data = array(
    'foo1' => 'bar',
    'foo2' => 'blahblahblah...',
);

echo $twig->render('demo_02.html.twig', $array_data); // 放在VIEW裡面的檔案
