<?php include "header.php"; ?>

<form action="../controllers/login_controller.php" method="post">
    <div class="bg-gray-300 p-5 max-w-sm mx-auto my-16">
        <div class="header-form">
            <h1 class="text-2xl text-gray-700 text-center my-2">Get into the application</h1>
        </div>
        <?php if (isset($_GET['message_success'])) { ?>
        <div class="message">
            <p class="p-3 max-w-md mx-auto text-center bg-green-300 flex">
                <?php echo $_GET['message_success']; ?>
            </p>
        </div>
        <?php } ?>
        <?php if (isset($_GET['message'])) { ?>
        <div class="message">
            <p class="p-3 max-w-md mx-auto text-center bg-red-400 flex">
                <?php echo $_GET['message']; ?>
            </p>
        </div>
        <?php } ?>
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="email" name="email"
            id="" placeholder="Email" autocomplete="off" <?php if (isset($_GET['email'])) {
                echo "value='" .
                    trim($_GET['email']) . "'";
            } ?> >
        <input class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" type="password"
            name="password" id="" placeholder="Password" autocomplete="off">
        <button class="p-3 min-w-full mx-auto text-2xl font-bold text-center bg-amber-300 rounded-xl shadow-lg
            " type="submit">Login</button>
        <div class="create-account-link text-center p-5">
            <a href="register.php" class="hover:font-bold">Don't have yet an account? Create now</a>
        </div>
    </div>
</form>

<?php include "footer.php"; ?>