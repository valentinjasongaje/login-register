<?php
class Session
{
    protected $conn;
    protected $email;
    public function __construct($email, $conn)
    {
        $this->conn = $conn;
        $this->email = $email;
    }
    public function set_session()
    {
        $query = "SELECT * FROM users WHERE Email='$this->email'";
        $fetch = mysqli_query($this->conn, $query);
        $row = mysqli_fetch_assoc($fetch);
        
        session_start();
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['fname'] = $row['FirstName'];
        $_SESSION['lname'] = $row['LastName'];

    }
}

?>