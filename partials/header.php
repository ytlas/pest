<center><a href="/home"><h1 id="title">PEST<span id="plus">+</span></h1></a></center>
<div id="userDisplay">
    <div style="position: relative; left: -50%;">
        <?php
        if (Site::$u):
            $userName = Site::$u->getName();
            $userGroup = Site::$u->getGroupName();
            $userColor = Site::$u->getColor();
            ?>
            <span>{<span style="color:<?= $userColor ?>"><?= $userGroup ?></span>} <?= $userName ?></span>
        <?php else: ?>
            <span>Not logged in</span>
<?php endif; ?>
    </div>
</div>
