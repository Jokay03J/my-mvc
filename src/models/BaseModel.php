<?php
namespace Core\Models;

use Core\Database\Database;


class BaseModel
{
    protected $table = "unknow";
    public $db;

    public function __construct()
    {
        $db = new Database();
        $this->db = $db->db();
    }
}
?>