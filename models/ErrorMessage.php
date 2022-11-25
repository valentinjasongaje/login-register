<?php
class ErrorMessage extends User
{

    public function __construct($email, $fname, $lname, $password, $cpassword)
    {
        $this->email = $email;
        $this->fname = $fname;
        $this->lname = $lname;
        $this->password = $password;
        $this->cpassword = $cpassword;
    }

    public function empty_input()
    {
        if (empty($this->fname)) {
            return "First Name field cannot be empty";
        }
        if (empty($this->lname)) {
            return "Last Name field cannot be empty";
        }
        if (empty($this->email)) {
            return "Email field cannot be empty";
        }
        if (empty($this->password)) {
            return "Password field cannot be empty";
        }
        if (empty($this->cpassword)) {
            return "Confirm password field cannot be empty";
        }
    }

    public function passowrd_not_match()
    {
        return "Password did not match";
    }
    public function email_exist()
    {
        return "This email <strong> ". $this->email ." </strong> is not available";
    }
}


?>