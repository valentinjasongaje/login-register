<?php

include('../autoloader.php');

if (isset($_POST['registerBtn'])) {

    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];


    $db = new Database();
    $conn = $db->connect();



    $user = new User($email, $password, $conn, $fname, $lname, $cpassword);
  
    $userStatus = $user->register();

    if ($userStatus !== true) {
        $userDetails = '&fname=' . $fname . '&lname=' . $lname . '&email=' . $email;
        header('Location: ../views/register.php?status=failed&message=' . $userStatus . $userDetails);
        exit();
    }

   
    header('Location: ../index.php?status=success&message=Successfully registered! Login now');

} else {
    header("Location: ../views/register.php");
}


?>