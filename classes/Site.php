<?php
/* Basically a class for the basics of a website. Meaning
 * settings that affect the whole website in some way.
 * Initial stuff.*/

class Site{
    // The websites html <title>.
    private $title;
    public static $u;

    // Constructor with optional parameters that assign to the
    // instance variables above.
    function __construct($title='untitled'){
	$this->title=$title;
    }

    // Returns the value of the private variable title.
    function getTitle(){
	return $this->title;
    }

    /* Renders the skeleton with the body inside of the specified page,
       if the specified page exists as a file. */
    function render($view){
	// If the file does not exist, render the 404 instead.
	if(!file_exists('views/'.$view.'.php'))
	    $view='404';
	include 'skeleton.php';
    }

    /* Attempt to authenticate the user with cookies or session.*/
    function authenticate(){
	/* If the session variable 'userId' is set, it means the user has
	   recently correctly authenticated, however if the user appears
	   to be banned, then destroy the session, destroy all cookies
	   and tokens to log the user out.*/
	if(isset($_SESSION['userId'])){
	    self::$u=new User((int)$_SESSION['userId']);
	}
	elseif(isset($_COOKIE['token'])&&
	       strlen($_COOKIE['token'])==73){
	    $db=new Db();
	    $explode=explode('|',$_COOKIE['token']);
	    if(count($explode)===2){
		$tokenSession=$db->escape($explode[0]);
		$tokenToken=$db->escape($explode[1]);
		$result=$db->query("SELECT usersId AS userId,
					   expires AS tokenExpires
				    FROM tokens
				    WHERE session='$tokenSession'
				    AND token='$tokenToken' LIMIT 1");
		if($result->num_rows==1){
		    $row=$result->fetch_assoc();
		    $tokenToken=md5(uniqid());
		    $tokenExpires=strtotime($row['tokenExpires']);
		    $db->query("UPDATE tokens
				SET token='$tokenToken'
				WHERE session='$tokenSession'");
		    setcookie('token',
			      "$tokenSession|$tokenToken",
			      $tokenExpires,
			      '/','pest.plus',
			      TRUE);
		    $_SESSION['tokenSession']=$tokenSession;
		    $_SESSION['userId']=$row['userId'];
		    self::$u=new User((int)$row['userId']);
		}
	    }
	}
    }
}
?>
