<?php include "../views/header.php";

session_start();

if (isset($_GET['login_result'])) {
    $firstName = $_SESSION['fname'];
    $lastName = $_SESSION['lname'];

    echo "welcome " . $firstName . " " . $lastName;
}


?>

<?php include "../views/footer.php" ?>