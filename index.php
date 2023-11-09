<?php

// loads config
if (file_exists("./config.json")) {
    $routes = json_decode(file_get_contents("./config.json"), true);
    $configResult = array();
    foreach ($routes as $key => $value) {
        $configResult[$key] = $value;
    }
    define("CONFIG", $configResult);
} else {
    throw new Exception("You must have a config");
}

//autoload
spl_autoload_register(function ($class) {
    foreach (CONFIG["autoload"] as $key => $value) {
        echo $value;
        if (file_exists($value . "/" . $class . ".php")) {
            include_once($value . "/" . $class . ".php");
        }
    }
});

// load router
include("./router.php");
?>