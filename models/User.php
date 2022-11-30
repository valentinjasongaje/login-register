<?php

class User
{

    protected $email, $fname, $lname, $password, $cpassword, $conn;
    protected $loginStatus = false;

    public function __construct($email = null, $password = null, $conn, $fname = null, $lname = null, $cpassword = null)
    {

        $this->email = $this->filter_data($email);
        $this->fname = $this->filter_data($fname);
        $this->lname = $this->filter_data($lname);
        $this->password = $this->filter_data($password);
        $this->cpassword = $this->filter_data($cpassword);
        $this->conn = $conn;
    }
    public function filter_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function register()
    {
        $validator = new Validator($this->email, $this->password, $this->conn, $this->fname, $this->lname, $this->cpassword);
        $error = new ErrorMessage($this->email, $this->password, $this->fname, $this->lname, $this->cpassword);

        $emptyInput = $validator->check_input_empty();

        if ($emptyInput) {
            return $error->empty_input();
        }

        $passwordMatch = $validator->check_password_match();
        if (!$passwordMatch) {
            return $error->passowrd_not_match();
        }
        $email_exist = $validator->check_email_exist();
        if ($email_exist) {
            return $error->email_exist();
        }

        $this->password = md5($this->password);
        $query = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES('$this->fname', '$this->lname' , '$this->email', '$this->password')";
        mysqli_query($this->conn, $query);

        return true;
    }

    public function login()
    {
        $validator = new Validator($this->email, $this->password, $this->conn);
        $error = new ErrorMessage($this->email, $this->password);

        $email_exist = $validator->check_email_exist();
        if (!$email_exist) {
            return $error->email_not_exist();
        }

        $credential_match = $validator->check_credentials();
        if (!$credential_match) {
            return $error->unmatch_credential();
        }

        $session = new Session($this->email, $this->conn);
        $session->set_session();
        return true;
    }
    public static function logout()
    {
        session_start();
        session_unset();
        session_destroy();
    }
}



?>