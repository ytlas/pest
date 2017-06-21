<?php
aur("You cannot log out if you're not logged in.");

if(isset($_COOKIE['token'])){
    $con = new Database();
    setcookie('token', '', time() - 3600, '/', 'pest.plus', TRUE);
    $session = $_SESSION['token'];
    $con->query("DELETE FROM userToken WHERE session='$session'");
}

session_destroy();
header('location:/');
?>
