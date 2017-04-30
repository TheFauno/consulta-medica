<?php
//PDO
$container['db'] = function ($c) {
    $db = $c['settings']['db'];
    try{
        $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'],
            $db['user'], $db['pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }catch(PDOException $e){
        echo $e->print();
    }
};
//twig
$container['view'] = function ($c) {
    $view = new \Slim\Views\Twig('../app/templates', [
        //'cache' => 'path/to/cache'
    ]);

    $basePath = rtrim(str_ireplace('index.php', '', $c['request']->getUri()->getBasePath()), '/');
    $view->addExtension(new Slim\Views\TwigExtension($c['router'], $basePath));

    return $view;
};
//slim session
$container['session'] = function ($c) {
  return new \SlimSession\Helper;
};