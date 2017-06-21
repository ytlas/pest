<?php
class Page{
    // Content to be in the <title> tag.
    private $title;

    // File to use as a page skeleton.
    // If empty, use default.skeleton.php
    private $skeleton;

    // What view to be used, depending on the URI.
    private $view;

    // The current user, primary use when not a guest.
    private $user = null;

    // Just aliases, making things easier to type.
    public $docroot;
    public $uri;
    public $ip;

    // Constructor, with some defaults.
    function __construct($title = 'Untitled',
			 $skeleton = 'default.skeleton.php'){
	$this->title    = $title;
	$this->skeleton = $skeleton;
    }

    // Render the page; this should be the last code to be executed.
    function render(){
	if(!file_exists(sprintf('%s/view/%s.php', $this->docroot, $this->view)))
	    $this->view = '404';
	$user = $this->user;
	$GLOBALS['user'] = $user;
	include sprintf('%s/skeleton/%s', $this->docroot, $this->skeleton);
    }

    // Functions to get and set private variables.
    function getTitle(){
	return $this->title;
    }
    function setTitle($title){
	$this->title = $title;
    }

    function getSkeleton(){
	return $this->skeleton;
    }
    function setSkeleton($skeleton){
	$this->skeleton = $skeleton;
    }

    function getView(){
	return $this->view;
    }
    function setView($view){
	$this->view = $view;
    }

    /* Attempt to authenticate the user with cookies or session.*/
    function authenticate(){
	/* If the session variable 'userId' is set, it means the user has
	   recently correctly authenticated, however if the user appears
	   to be banned, then destroy the session, destroy all cookies
	   and tokens to log the user out.*/
	if(isset($_SESSION['userId'])){
	    $this->user = new User((int)$_SESSION['userId']);
	}
	elseif(isset($_COOKIE['token']) && strlen($_COOKIE['token']) == 73){
	    $con = new Database();
	    $explode = explode('|', $_COOKIE['token']);
	    if(count($explode) == 2){
		$session = $con->escape($explode[0]);
		$token = $con->escape($explode[1]);
		$result = $con->query("SELECT userId, expiryDate FROM userToken WHERE session='$session' AND token='$token' LIMIT 1");
		if($result->num_rows == 1){
		    $row = $result->fetch_array();
		    $token = md5(uniqid());
		    $expiry = strtotime($row[1]);

		    setcookie('token', "$session|$token", time() + $expiry*24*60*60, '/', 'pest.plus', TRUE);
		    $con->query("UPDATE tokens SET token='$token' WHERE session='$session' LIMIT 1");
		    $_SESSION['token']=$session;
		    $_SESSION['userId'] = $row[0];
		    $this->user = new User(intval($row[0]));
		}
	    }
	}
    }
}
