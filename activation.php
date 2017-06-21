<?php
include 'classes/Database.php';
include 'classes/Tribe.php';
include 'classes/UserUtils.php';
include 'classes/User.php';

if(isset($_GET['code'])){
    $con = new Database();
    $code = $con->quote($_GET['code']);
    $userId = intval($con->query("SELECT userId FROM userActivation WHERE code=$code")->fetch_array()[0]);
    $con->query("DELETE FROM userActivation WHERE userId=$userId");
    if($con->affected_rows() > 0){
	session_start();
	$user = new User($userId);
	$user->setTribe(2);
	$_SESSION['flashMessages']['message'] = "Successfully activated your account! You can now log in.";
	header("location:/login");
    }
} else echo "What?";
