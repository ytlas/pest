<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="/css/themeMain.php">
    <?php if(Site::$u&&
	     Site::$u->getTheme()):?>
	<link rel="stylesheet" type="text/css" href="/css/<?=Site::$u->getTheme()?>.php">
    <?php endif; ?>
    <link rel="icon" href="/favicon.png" type="image/png" sizes="16x16">
    <title>pest+</title>
</head>
