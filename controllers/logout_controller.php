<?php
include("../autoloader.php");

if (isset($_POST['logout'])) {
    User::logout();
    header("Location: ../views/index.php?logout=true");
}


?>