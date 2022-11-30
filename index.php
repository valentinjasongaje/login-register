<?php include "./views/header.php"; ?>
<form action="./controllers/login_controller.php" method="post">

    <div class="bg-gray-300 p-5 max-w-sm mx-auto my-16">
        <div class="header-form">
            <h1 class="text-2xl text-gray-700 text-center my-2">Get into the application</h1>
        </div>

        <?php if (isset($_GET['status'])): ?>
        <div class="message">
            <p class="p-3 max-w-md mx-auto text-center flex <?php echo $_GET['status'] === "success" ? "bg-green-300 ":"bg-red-400 flex" ?>">
                <?php echo $_GET['message']; ?>
            </p>
        </div>
        <?php endif ?>
        <input type="email" id="email" name="email"
            class="my-1 p-5 min-w-full  mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Email"
            autocomplete="off" value="<?php echo isset($_GET['email']) ? trim($_GET['email']) : "" ?>">
        <input type="password" id="password" name="password"
            class=" my-1 p-5 min-w-full mx-0 bg-yellow-100 rounded-xl flex items-center" placeholder="Password"
            autocomplete="off" required>
        <button type="submit" id="submit"
            class="p-3 min-w-full mx-auto text-2xl font-bold text-center bg-amber-300 rounded-xl shadow-lg">
            Login
        </button>
        <div class="create-account-link text-center p-5">
            <a href="./views/register.php" class="hover:font-bold">
                Don't have yet an account? Create now
            </a>
        </div>
    </div>

</form>

<?php include "./views/footer.php"; ?>