<?php
class Database
{
    /**
     * Connected database instance
     */
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

    /**
     * Get connected database instance
     * Note: it will the same connected database instance across model
     */
    function db()
    {
        return $this->instance;
    }
}
?>