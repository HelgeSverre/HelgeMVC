<!DOCTYPE html>
<html>
<head>
    <?php Helper::Title('HelgeMVC - A Simple MVC Framework'); ?>

    <?php Helper::LoadStylesheet('style.css'); ?>

</head>
<body>

<div class="wrap">
    <header>
        <h1>HelgeMVC</h1>
        <h2>A Simple MVC Framework written in PHP.</h2>
    </header>

    <div class="container">
        <section>
            <h3>Hooray, It works!</h3>

            <p>
                This is the default view for <b>HelgeMVC</b>.<br/>You can find this file in the directory:
                <span class="highlight">
                <b><?php echo VIEWS_PATH . "home/" ?></b> and the file is called <b>index.php</b>.</span>

                The controller in which the view is loaded from is located in
                <span class="highlight"><b><?php echo CONTROLLERS_PATH ?></b> and is called <b>Home.php</b>.</span>
            </p>

            <h4>What is HelgeMVC?</h4>

            <p>
                HelgeMVC is a Simple and Minimal MVC Framework created primarily for my own
                personal use and education, it takes inspiration from CodeIgniter, but tries to do things it's own way.
            </p>

            <p>
                One of my goals is to allow for a certain level of database abstraction so that one does not have
                to fiddle so much with SQL Queries and prepared statements to get something simple up and running
                quickly.
            </p>

            <p>
                You are free to use, modify and contribute to HelgeMVC, you can find the source
                code on <a href="https://github.com/helgesverre/helgemvc">GitHub</a> or
                on <a href="https://helgesverre.com/mvcframework">HelgeSverre.com</a
            </p>
        </section>

<?php Helper::LoadPartial("footer"); ?>