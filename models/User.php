<?php

class User
{
    use Validator;
    use ErrorMessage;

    protected $email, $fname, $lname, $password, $cpassword, $conn;
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
        $emptyInput = $this->check_input_empty();

        if ($emptyInput) {
            return $this->empty_input();
        }

        $passwordMatch = $this->check_password_match();
        if (!$passwordMatch) {
            return $this->password_not_match();
        }
        $email_exist = $this->check_email_exist();
        if ($email_exist) {
            return $this->email_exist();
        }

        $this->password = md5($this->password);
        $query = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES('$this->fname', '$this->lname' , '$this->email', '$this->password')";
        mysqli_query($this->conn, $query);

        return true;
    }

    public function login()
    {

        $email_exist = $this->check_email_exist();
        if (!$email_exist) {
            return $this->email_not_exist();
        }

        $credential_match = $this->check_credentials();
        if (!$credential_match) {
            return $this->unmatch_credential();
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