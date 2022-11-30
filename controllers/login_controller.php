<?php

include('../autoloader.php');

if (isset($_POST)) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $db = new Database();
    $conn = $db->connect();

    $loginUser = new User($email, $password, $conn);
    $loginStatus = $loginUser->login();

    if ($loginStatus !== true) {
        header('Location: ../index.php?status=failed&message=' . $loginStatus . '&email=' . $email);
        exit;
    }
    header('Location: ../views/home.php');
}