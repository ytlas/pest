<!-- TO FUCKING DO, NOT DONE YET -->

<h1>Setup</h1>
<?php //if(!$sess['setup']){ ?>

    <p>You have to enter the privilege key to do the setup: <form method="post" action="/setup"><input type="text" name="key"><input type="submit" value="Authenticate"></form></p>

<?php //} else { ?>

    <p>The setup assumes you have already created a database + a user for it. These credentials should be stored in the config.ini file.</p>
    <form method="post" action="/setup">
	<p>Clicking this button will run this mysql query:</p>

    </form>

<?php //} ?>
