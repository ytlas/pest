<?php
// Making things easier to type.
$sess = &$_SESSION;
$mess = &$_SESSION['flashMessages'];
$post = &$_POST;
$get  = &$_GET;


function flash(&$mes){
    if(isset($mes)){
	$temp = $mes;
	$mes = null;
	return $temp;
    }
} function aur($message = 'You need to be logged in here.'){
    if(!$GLOBALS['user']){ $_SESSION['flashMessages']['message'] = $message; header("location:/"); exit(); }
} function nur($message = 'You are logged in already.'){
    if($GLOBALS['user']){ $_SESSION['flashMessages']['message'] = $message; header("location:/"); exit(); }
}

if(file_exists($this->docroot.'/preview/'.$this->view.'.php'))
    include $this->docroot.'/preview/'.$this->view.'.php';
?>
<!DOCTYPE html>
<html>
    <head>
	<?php include $this->docroot.'/parts/head.php'; ?>
    </head>
    <body>
	<header>
	    <?php include $this->docroot.'/parts/header.php'; ?>
	</header><hr>
	<nav>
	    <?php include $this->docroot.'/parts/nav.php'; ?>
	</nav><hr>
	<section>

	    <?php if($mess['message']) echo '<span style="color:lightgreen;">'.flash($mess['message']).'</span>';
		  include $this->docroot.'/view/'.$this->view.'.php'; ?>
	</section><hr>
	<footer>
	    <?php include $this->docroot.'/parts/footer.php'; ?>
	</footer><hr>
    </body>
</html>
<script src="/js/main.js"></script>
<?php $mess = null; ?>
