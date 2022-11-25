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

    $user = new User($email, $password, $conn, $fname, $lname, $cpassword);
    $user->register();



} else {
    header("Location: ../views/register.php");
}


?>