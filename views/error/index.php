<!DOCTYPE html>
<html>
<head>
    <?php Helper::Title('HelgeMVC - Error!'); ?>

    <?php Helper::LoadStylesheet("style.css"); ?>

</head>
<body>
<div class="wrap">
    <header>
        <h1>HelgeMVC</h1>
        <h2>A Simple MVC Framework written in PHP.</h2>
    </header>

    <div class="container">
        <section>
            <h3 class="error">Oh no, an Error!</h3>
            <p>
                You seem to have an error in your application, please check that the controller or controller
                method you were trying to use actually exist and is spelled properly.
            </p>

            <h4>Error Message:</h4>
            <span class="highlight-error"> <?php echo $this->getData("error"); ?> </span>

        </section>

<?php Helper::LoadPartial("footer"); ?>