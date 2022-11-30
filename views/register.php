<?php include "header.php"; ?>

<?php
session_start();
if (isset($_SESSION['id'])) {
    header("location: home.php");
}
?>
<form action="../controllers/register_controller.php" method="post">

    <div class="bg-gray-300 p-5 max-w-sm mx-auto my-16">
        <div class="header-form">
            <h1 class="text-2xl text-gray-700 text-center my-2">Fill up the form</h1>
        </div>

        <?php if (isset($_GET['status'])): ?>
             <div class="message">
                <p class="p-3 mx-auto text-center bg-red-300  flex">
                   <?php echo $_GET['message'] ?>
             </p>
             </div>
        <?php endif ?>

        <input type="text" name="fname" id="fname"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="First Name"
            autocomplete="off" value="<?php echo isset($_GET['fname']) ? $_GET['fname'] : "" ?>"
        >
        <input type="text" name="lname" id="lname"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Last Name"
            autocomplete="off" value="<?php echo isset($_GET['lname']) ? $_GET['lname'] : "" ?>"
        >
        <input type="email" name="email" id="email"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Email"
            autocomplete="off" value="<?php echo isset($_GET['email']) ? $_GET['email'] : "" ?>"
        >
        <input type="password" id="password" name="password"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Password"
            autocomplete="off"
        >
        <input type="password" id="cpassword" name="cpassword"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Confirm password"
            autocomplete="off"
        >
        <button type="submit" id="submit" name="registerBtn"
            class="p-3 min-w-full mx-auto text-2xl font-bold text-center bg-amber-300 rounded-xl shadow-lg">
            Create Account
        </button>
        <div class="create-account-link text-center p-5">
            <a href="../index.php" class="hover:font-bold">
                Registered already? Login Now
            </a>
        </div>
    </div>

</form>

<?php include "footer.php"; ?>