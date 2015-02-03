<?php Helper::LoadPartial("header"); ?>

    <div class="wrap">

    <header>
        <h1><?= $product_name ?></h1>
    </header>

        <div class="container">
            <section>
                <p>

                    This is the default view for <b>HelgeMVC</b>.<br/>You can find this file in the directory:
                    <span class="highlight">
                    <b><?php echo VIEWS_PATH . "home/" ?></b> and the file is called <b>index.php</b>.</span>

                    The controller in which the view is loaded from is located in
                    <span class="highlight"><b><?php echo CONTROLLERS_PATH ?></b> and is called <b>Home.php</b>.</span>
                </p>

                <h4>What is HelgeMVC?</h4>

                <p>
                    HelgeMVC is an MVC Framework created for my own personal use and education, over time I hope I will
                    father this framework into something reasonably stable and usable.
                </p>

                <p>
                    You are free to use, modify and contribute to HelgeMVC, you can find the source
                    code on <a href="https://github.com/HelgeSverre/HelgeMVC">GitHub</a> or
                    on <a href="https://helgesverre.com/mvcframework">HelgeSverre.com</a
                </p>
            </section>

<?php Helper::LoadPartial("footer"); ?>