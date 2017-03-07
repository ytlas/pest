<?php
if (file_exists('views/' . $view . '_headers.php'))
    include 'views/' . $view . '_headers.php';
?>
<html>
    <head>
        <?php include 'partials/head.php'; ?>
        <?php if (file_exists("css/$view.css")): ?>
            <link rel="stylesheet" type="text/css" href="/css/<?= $view ?>.css">
        <?php endif; ?>
    </head>
    <body>
        <header>
            <?php include 'partials/header.php'; ?>
        </header>
        <hr>
        <nav>
            <?php include 'partials/nav.php'; ?>
        </nav>
        <hr>
        <aside>
            <?php include 'partials/aside.php'; ?>
        </aside>
        <section>
            <?php include 'views/' . $view . '.php'; ?>
        </section>
        <hr>
        <footer>
            <?php include 'partials/footer.php'; ?>
        </footer>
        <hr>
    </body>
</html>
