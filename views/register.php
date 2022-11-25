<?php include "../views/header.php"; ?>

<form action="../controllers/register_controller.php" method="post">
    <div class="bg-gray-300 p-5 max-w-sm mx-auto my-16">
        <div class="header-form">
            <h1 class="text-2xl text-gray-700 text-center my-2">Fill up the form</h1>
        </div>
        <?php if (isset($_GET['register_error'])) { ?>
        <div class="error-message">
            <p class="p-3 max-w-md mx-auto text-center bg-red-300 rounded-xl flex">
                <?php echo $_GET['register_error'] ?>
            </p>
        </div>
        <?php } ?>
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="text" name="fname"
            id="" placeholder="First Name" autocomplete="off" <?php if (isset($_GET['fname'])) { echo "value='" .
            trim($_GET['fname']) . "'"; } ?> >
        <input class="p-5 min-w-full mx-0 bg-yellow-100 rounded-xl flex items-center text-md" type="text" name="lname"
            id="" placeholder="Last Name" autocomplete="off" <?php if (isset($_GET['lname'])) { echo "value='" .
            trim($_GET['lname']) . "'"; } ?>>
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="email" name="email"
            id="" placeholder="Email" autocomplete="off" <?php if (isset($_GET['email'])) { echo "value='" .
            trim($_GET['email']) . "'"; } ?>>
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="password"
            name="password" id="" placeholder="Password" autocomplete="off">
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="password"
            name="cpassword" id="" placeholder="Confirm password" autocomplete="off">
        <button class="p-3 min-w-full mx-auto text-2xl font-bold text-center bg-amber-300 rounded-xl shadow-lg"
            name="registerBtn" type="submit">Create Account</button>
        <div class="create-account-link text-center p-5">
            <a href="index.php" class="hover:font-bold">Registered already? Login Now</a>
        </div>
    </div>

</form>

<?php include "../views/footer.php"; ?>