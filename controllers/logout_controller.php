<?php
include("../autoloader.php");

if (isset($_POST['logout'])) {
    User::logout();
    header("Location: ../index.php");
}

?>