<?php
class Router
{
    public $routes = array();
    function __construct()
    {
        if (file_exists("./routes.json")) {
            $routes = json_decode(file_get_contents("./routes.json"), true);
            foreach ($routes["routes"] as $key => $value) {
                array_push($this->routes, $routes["routes"][$key]);
            }
        } else {
            throw new Exception("You must have a routes file !");
        }
    }

    public function findRoute()
    {
        foreach ($this->routes as $key => $route) {
            if ($route["path"] === $_SERVER["REQUEST_URI"]) {
                $controller = new $route["controller"];
                $action = $route["action"];
                if (method_exists($controller, $action)) {
                    $controllerResult = call_user_func(array($controller, $action));
                    if ($controllerResult instanceof Response) {
                        $result = $controllerResult->sendResponse();
                        echo $result;
                    } else {
                        echo $controllerResult;
                    }
                    break;
                } else {
                    throw new ErrorException("Method doesn't exist on controller");
                }
            }
        }
    }
}
?>