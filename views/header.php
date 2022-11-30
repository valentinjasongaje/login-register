<?php include __DIR__ . '/../autoloader.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="../dist/output.css" rel="stylesheet">
</head>

<body>
    <?php
    session_start();
    if (User::isLoginURL() && User::loggedIn()) {
        header('Location: views/home.php ');
        exit;
    }
    if (User::isRegistrationURL() && User::loggedIn()) {
        header('Location: home.php');
        exit;
    }
    if (User::isCreatePostURL() && !User::loggedIn()) {
        header('Location: ../index.php');
        exit;
    }
    ?>
    <?php if (User::loggedIn()): ?>
    <?php $firstName = $_SESSION['fname'] ?>
    <?php $lastName = $_SESSION['lname'] ?>

    <div class="max-w-full">
        <div class="bg-gray-300 flex flex-row">
            <div class="p-4">
                <?php
                    echo "Welcome " . $firstName . " " . $lastName;
                ?>
            </div>
            <form action="../controllers/logout_controller.php" method="post">
                <button class="p-4 bg-amber-300 rounded-xl" name="logout" type="submit">Log out</button>
            </form>
        </div>
    </div>
    <?php endif ?>