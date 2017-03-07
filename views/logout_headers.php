<?php
if(!Site::$u){
    header('location:/home');
    exit();
}
if(isset($_SESSION['userId'])&&
   isset($_SESSION['tokenSession'])){
    $db=new Db();
    setcookie('token','',time()-3600,'/','pest.plus',TRUE);
    $tokenSession=$_SESSION['tokenSession'];
    $db->query("DELETE FROM tokens
		WHERE session='$tokenSession'");
}
if(isset($_SESSION['userId']))
    session_destroy();
header('location:/home');
?>
