<?php
$autoloader = require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../lib/init.php';

$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader, array('strict_variables' => true));

$array_data = array(
);

echo $twig->render('demo_01.html.twig', $array_data); // 放在VIEW裡面的檔案
