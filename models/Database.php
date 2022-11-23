<?php

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $db_name = "usersdb";

    public function connect()
    {
        $db_connect = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);
        return $db_connect;
    }
}

?>