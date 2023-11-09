<?php
namespace Core\Database;

use PDO;

class Database
{
    protected static $instance;

    private function getInstance()
    {
        if (!isset(self::$instance)) {
            $dbname = CONFIG["database"]["name"];
            $dbhost = CONFIG["database"]["host"];
            $dbport = CONFIG["database"]["port"];
            $dbuser = CONFIG["database"]["user"];
            $dbpass = CONFIG["database"]["password"];
            self::$instance = new PDO("mysql:dbname=$dbname;host=$dbhost;port=$dbport", $dbuser, $dbpass);
            return self::$instance;
        } else {
            return self::$instance;
        }
    }

    private function __construct()
    {
        $this->getInstance();
    }

    function db()
    {
        return $this->instance;
    }
}
?>