<?php

class Validator extends User
{

    public function check_input_empty()
    {
        $empty = false;
        if (empty($this->email) || empty($this->fname || empty($this->lname) || empty($this->fname) || empty($this->password) || empty($this->cpassword))) {
            $empty = true;
        }

    }
    public function check_email_exist()
    {
        $exist = false;

        $sql = "SELECT Email FROM users WHERE Email = {$this->email}";
        $result = mysqli_query($this->conn, $sql)->num_rows;

        if ($result !== 0) {
            $exist = true;
        }
        return $exist;

    }
}


?>