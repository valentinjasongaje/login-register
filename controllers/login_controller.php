<?php
include("../autoloader.php");
if (isset($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->connect();

    $loginUser = new User($email, $password , $conn);
    $loginSuccess = $loginUser->login();

    
}


?>