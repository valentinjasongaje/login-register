<?php

class Validator extends User
{

    public function check_input_empty()
    {
        $empty = false;
        if (empty($this->fname) || empty($this->lname) || empty($this->email) || empty($this->password) || empty($this->cpassword)) {
            $empty = true;
        }
        return $empty;
    }
    public function check_password_match()
    {
        $passwordMatch = false;
        if ($this->password === $this->cpassword) {
            $passwordMatch = true;
        }
        return $passwordMatch;
    }
    public function check_email_exist()
    {
        $exist = false;
        $query = "SELECT Email FROM users WHERE Email = '$this->email'";
        $result = mysqli_query($this->conn, $query)->num_rows;

        if ($result !== 0) {
            $exist = true;
        }
        return $exist;

    }
    public function check_credentials()
    {
        $credentialMatch = false;
        $query = "SELECT * FROM users WHERE Email='$this->email'";
        $user_count = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($user_count);

        if ($row['Password'] === md5($this->password)) {
            $credentialMatch = true;
        }
        return $credentialMatch;

    }
}


?>