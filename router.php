<?php
$router = new Router();

try {
    $router->findRoute();
} catch (Exception $e) {
    echo $e->getMessage() . "</br>";
    echo $e->getTraceAsString();
}
?>