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

        $validator = new Validator($this->email, $this->fname, $this->lname, $this->password, $this->cpassword, $this->conn);
        $emptyInput = $validator->check_input_empty();

        if ($emptyInput) {
            echo "Empty Input";
        }
        $passwordMatch = $validator->check_password_match();
        if (!$passwordMatch) {
            echo "did not match";
        } else {
            echo "match";
        }


        $email_exist = $validator->check_email_exist();

    }

}



?>