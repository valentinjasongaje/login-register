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
        $error = new ErrorMessage($this->email, $this->fname, $this->lname, $this->password, $this->cpassword);

        $emptyInput = $validator->check_input_empty();

        if ($emptyInput) {
            $error_message = $error->empty_input();
            header("Location: ../views/register.php?register_error= $error_message");
            exit();
        }
        $passwordMatch = $validator->check_password_match();
        if (!$passwordMatch) {
            $error_message = $error->passowrd_not_match();
            header("Location: ../views/register.php?register_error= $error_message");
            exit();
        }
        $email_exist = $validator->check_email_exist();
        if ($email_exist) {
            $error_message = $error->email_exist();
            header("Location: ../views/register.php?register_error= $error_message");
            exit();
        }

    }

}



?>