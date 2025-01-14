<?php

$autoloadPath = "../vendor/autoload.php";

if (!file_exists($autoloadPath)) {
    die("Erreur : Le fichier d'autoload '$autoloadPath' est introuvable. Veuillez exécuter 'composer install' pour générer le fichier.");
}

// Charger l'autoloader
require_once $autoloadPath;

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {

    $r->get('/', function() {
        echo 'Bienvenue :)';
    });

    $r->addRoute('GET', '/Personne/list', ['Controllers\PersonneController', 'list']);
    $r->addRoute('GET', '/Personne/exportJSON', ['Controllers\PersonneController', 'exportJSON']);

    #$r->addRoute(['GET','POST'], '/Personne/list', 'list');

    $r->addRoute(['GET','POST'], '/web/users', 'getUsers');

    $r->addRoute('GET', '/web/hello', ['Hello','sayHello']);

    $r->get('/web/books/{id}', function ($args) {
        // Show book identified by $args['id']
        echo "Book #" . $args['id'];
    });

    // {id} must be a number (\d+)
    $r->addRoute('GET', '/web/user/{id:\d+}', function ($args) {
        echo "User #" . $args['id'];
    });
    // The /{title} suffix is optional2
    $r->addRoute('GET', '/web/articles/{id:\d+}[/{title}]', function ($args) {
        echo "User #" . $args['id'];
        echo "<br>Title: " . $args['title'];
    });
});

function getUsers()
{
    echo "getUsers function action goes here...";
}

class Hello{
    static function sayHello(){
        echo "Hello world";
    }
}

////--------------

// A NE PAS MODIFIER !!!

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);



$routeInfo = $dispatcher->dispatch($httpMethod, $uri);

switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        die('NOT_FOUND');
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        die('Not Allowed');
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        print $handler($vars);
        break;
}




#use Controllers\PersonneController;
#$pController = new PersonneController;
#$pController->list();