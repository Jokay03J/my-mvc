<?php
namespace Core\Router;

use Exception;

class Router
{
    function __construct()
    {
        if (file_exists("./routes.json")) {
            $routes = json_decode(file_get_contents("./routes.json"), true);
            foreach ($routes as $key => $value) {
                echo print_r($routes[$key]);
            }
        } else {
            throw new Exception("You must have a routes file !");
        }
    }
}
?>