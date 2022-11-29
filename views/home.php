<?php include "header.php";

session_start();

if (!isset($_SESSION['id'])) {
    header("Location: index.php");
}
$firstName = $_SESSION['fname'];
$lastName = $_SESSION['lname'];

?>

<div class="p-5 bg-gray-300">
    <div class="bg-yellow-300">
        <?php echo "Welcome " . $firstName . " " . $lastName; ?>
    </div>
</div>
<form action="../controllers/logout_controller.php" method="post">
    <button class="p-4 outline-1" name="logout" type="submit">Log out</button>
</form>

<?php include "footer.php" ?>