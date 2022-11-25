<?php

class User
{

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

        $validator = new Validator($this->email, $this->password, $this->conn, $this->fname, $this->lname, $this->cpassword);
        $error = new ErrorMessage($this->email, $this->password, $this->fname, $this->lname, $this->cpassword);
        $userDetails = "&fname=$this->fname &lname=$this->lname&email=$this->email";
        $emptyInput = $validator->check_input_empty();

        if ($emptyInput) {
            $error_message = $error->empty_input();
            header("Location: ../views/register.php?register_error= $error_message  $userDetails");
            exit();
        }
        $passwordMatch = $validator->check_password_match();
        if (!$passwordMatch) {
            $error_message = $error->passowrd_not_match();
            header("Location: ../views/register.php?register_error= $error_message $userDetails");
            exit();
        }
        $email_exist = $validator->check_email_exist();
        if ($email_exist) {
            $error_message = $error->email_exist();
            header("Location: ../views/register.php?register_error= $error_message  $userDetails");
            exit();
        }
        $this->password = md5($this->password);
        $query = "INSERT INTO users (FirstName, LastName, Email, Password) VALUES('$this->fname', '$this->lname' , '$this->email', '$this->password')";
        mysqli_query($this->conn, $query);
        $affected_rows = mysqli_affected_rows($this->conn);

        if ($affected_rows >= 1) {
            header("Location: ../views/index.php?message_success=Successfully registered! Login now");
            exit();
        } else {

            header("Location: ../views/register.php?register_error=Something Went Wrong ." . $userDetails);
        }
    }

    public function login()
    {
        $validator = new Validator($this->email, $this->password, $this->conn);
        $error = new ErrorMessage($this->email, $this->password);
        $email_exist = $validator->check_email_exist();

        if (!$email_exist) {
            $error_message = $error->email_not_exist();
            header("Location: ../views/index.php?message=$error_message &email=$this->email");
            exit();
        }

        $credential_match = $validator->check_credentials();
        if (!$credential_match) {
            $error_message = $error->unmatch_credential();
            header("Location: ../views/index.php?message=$error_message &email=$this->email");
            exit();
        }
        $session = new Session($this->email, $this->conn);
        $session->set_session();
        header("Location: ../views/home.php?login_result=1");
    }

}



?>