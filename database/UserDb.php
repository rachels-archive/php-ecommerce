<?php

require_once 'CreateDb.php';

class UserDb extends CreateDb
{
    public $tablename;

    public function __construct($servername = "localhost", $username = "root", $password = "", $dbname = "ecotribe", $tablename = "user")
    {
        parent::__construct($servername, $username, $password);
        $this->selectDatabase($dbname);
        $this->tablename = $tablename;
    }

    public function updateUser($newName, $newEmail, $userid)
    {
        $sql = "UPDATE user SET username = '$newName', email = '$newEmail' WHERE user_id = $userid";
        mysqli_query($this->con, $sql);
    }

    public function removeUser($userid)
    {
        $sql = "DELETE FROM user WHERE user_id=$userid";
        mysqli_query($this->con, $sql);
    }
}
