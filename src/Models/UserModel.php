<?php
class UserModel extends BaseModel
{
    public $table = "users";
    function create()
    {
        $this->db->query("Your query here");
    }
}
?>