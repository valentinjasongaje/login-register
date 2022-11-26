<?php include "../views/header.php";

session_start();

if (isset($_SESSION['id'])) {
    $firstName = $_SESSION['fname'];
    $lastName = $_SESSION['lname'];



?>
<div class="flex flex-row bg-gray-400 p-5">
    <div class="">
        <?php echo $firstName; ?>
    </div>
    <form action="../controllers/logout_controller.php" method="post">
        <button class="" name="logout" type="submit">Log out</button>
    </form>

</div>
<?php } else {
    header("Location: ../views/index.php");
} ?>
<?php include "../views/footer.php" ?>