<?php

include("../autoloader.php");

if (isset($_POST['registerBtn'])) {

    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $db = new Database();
    $conn = $db->connect();

    $user = new User($email, $fname, $lname, $password, $cpassword, $conn);
    $user->register();



} else {
    echo "Hmmm. ";
}


?>