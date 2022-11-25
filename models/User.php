<?php

class User
{

    protected $email, $fname, $lname, $password, $cpassword, $conn;

    public function __construct($email, $fname, $lname, $password, $cpassword, $conn)
    {

        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->conn = $conn;

    }

    public function register()
    {
        echo $this->email;
        $validator = new Validator($this->email, $this->fname, $this->lname, $this->password, $this->cpassword, $this->conn);
        $is_input_empty = $validator->check_input_empty();

        if ($is_input_empty) {

        }

    }

}



?>