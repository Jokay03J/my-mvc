<?php
class Router
{
    public $routes = array();
    function __construct()
    {
        // Check if route
        if (file_exists(ROOT . "/src/Config/routes.json")) {
            $routes = json_decode(file_get_contents(ROOT . "/src/Config/routes.json"), true);
            foreach ($routes["routes"] as $key => $value) {
                array_push($this->routes, $routes["routes"][$key]);
            }
        } else {
            throw new Exception("You must have a routes file !");
        }
    }

    public function findRoute(): bool
    {
        $hasFind = false;
        foreach ($this->routes as $key => $route) {
            // Check if path and method match a route
            if ($route["path"] === $_SERVER["REQUEST_URI"] && $route["method"] === $_SERVER["REQUEST_METHOD"]) {
                $controller = new $route["controller"];
                $action = $route["action"];
                if (method_exists($controller, $action)) {
                    $this->runController($controller, $action);
                    $hasFind = true;
                    break;
                } else {
                    throw new Exception("Method doesn't exist on controller");
                }
                // if route is not found but 404 page is configured load it
            }
        }
        if (isset(CONFIG["views"]["notfound"]) && !$hasFind) {
            $viewManager = new ViewManager();
            $viewManager->render(CONFIG["views"]["notfound"]);
        }

        return $hasFind;
    }

    public function runController(mixed $controller, string $action)
    {
        // Create base response and request
        $baseResponse = new Response();
        $baseRequest = new Request();
        // Run controller and pass request and response
        $controllerResult = call_user_func(array($controller, $action), $baseRequest, $baseResponse);
        // Check if response is type Response for create custom response
        // eg: if you want only return json for REST api
        if ($controllerResult instanceof Response) {
            // update response content type and get response data for send it
            $result = $controllerResult->sendResponse();
            echo $result;
        } else {
            // send raw data without able to change his content-type
            echo $controllerResult;
        }
    }
}
?>