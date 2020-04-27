<?php
require 'lib/config.php';
require 'subscribe.php';

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Under Construction | Bin Emmanuel</title>

    <meta name="description" content="Bin Emmanuel is a software developer who is specialized in Web, Desktop and Android Development. Builds Desktop, Mobile and Web Applications" />

    <meta name=”robots” content="index, follow" />

    <link rel="shortcut icon" type="image/png" href="assets\img\logo.PNG">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />


    <!-- Icons -->
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa&family=Lobster&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <!-- logo -->
        <div class="logo">
            <a href="">Bin Emmanuel</a>
        </div>
        <!-- logo /-->

        <!-- .mail -->
        <div class="mail">
            <a href="mailto:textme@binemmanuel.com"><i class="fa fa-envelope"></i></a>
        </div>
        <!-- .mail /-->
    </header>
    <main>
        <?php if (!empty($error)): ?>
            <!-- .error-alert -->
            <p class="alert error-alert width-7"><?= $error ?></p>
            <!-- .error-alert /-->

        <?php elseif (!empty($res)): ?>
            <!-- .success-alert -->
            <p class="alert success-alert width-7"><?= $res ?></p>
            <!-- .success-alert /-->

        <?php elseif(!empty($_SESSION['res_err'])): ?>
            <!-- .error-alert -->
            <p class="alert error-alert width-7"><?= clean_data($_SESSION['res_err']) ?></p>
            <!-- .error-alert /-->

            <?php session_destroy() ?>

        <?php elseif(!empty($_SESSION['res'])): ?>
            <!-- .success-alert -->
            <p class="alert success-alert width-7"><?= clean_data($_SESSION['res']) ?></p>
            <!-- .success-alert /-->

            <?php session_destroy() ?>

        <?php endif ?>

        <h1>Coming Soon</h1>
        <!-- .banner -->
        <div class="banner">
            <p>
                My website is under construction and would be down for a couple of days.
                I am preparing something amazing and exciting for you.
            </p>
            <p>Subscribe to the news letter to stay in touch</p>
        </div>
        <!-- .banner /-->

        <form action="<?= rm_ext($_SERVER['PHP_SELF']) ?>" method="POST" autocomplete="off">
            <!-- .subscription-form -->
            <div class="subscription-form">
                <input type="email" name="email" placeholder="Subscribe" required />

                <button type="submit">
                    <i class="fa fa-envelope"></i>
                </button>
            </div>
            <!-- .subscription-form /-->

            <div>
                <small>We'll never share your email with anyone else.</small>
            </div>
        </form>
    </main>
    <footer>
        <!-- .foot -->
        <div class="foot">
            <span>Reach me:&nbsp;</span>

            <!-- .social-menu -->
            <ul class="social-menu">
                <li class="nav-item facebook">
                    <a class="nav-link" target="_blank" href="https://facebook.com/bin.emmanuel"><i class="fa fa-facebook"></i></a>
                </li>
                <li class="nav-item github">
                    <a class="nav-link" target="_blank" href="https://github.com/binemmanuel"><i class="fa fa-github"></i></a>
                </li>
                <li class="nav-item instagram">
                    <a class="nav-link" target="_blank" href="https://www.instagram.com/7binemmanuel/"><i class="fa fa-instagram"></i></a>
                </li>
            </ul>
            <!-- .social-menu /-->
            </div>
        <!-- .foot /-->
        
        <script src="assets/js/main.js"></script>
    </footer>
</body>
</html>