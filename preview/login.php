<?php
nur("Why log in when you're already logged in?");

if(isset($post['userName']) && isset($post['userPassword']) && isset($post['sessionLength']) && $post['sessionLength'] < 31){
    $con = new Database();
    $expiry = intval($post['sessionLength']);
    $user = null;

    try{ $user = new User($con->escape($post['userName'])); }
    catch(NotFoundException $e){ $mess['message'] = 'There is no user with that name.'; header("location:/login"); exit(); }

    $userPassword = $con->query("SELECT password FROM user WHERE id=".$user->getId())->fetch_array()[0];
    if(password_verify($post['userPassword'], $userPassword)){
	if($user->getTribeId() < 2){ $mess['message'] = 'You need to click the activation link sent to your email before you log in.'; header("location:/login"); exit(); }

	if($expiry>0){
	    $session = sha1(uniqid(rand(), true));
	    $token = md5(uniqid());
	    setcookie('token', "$session|$token", time() + $expiry*24*60*60, '/', 'pest.plus', TRUE);
	    $user->createToken($session, $token, $expiry);
	    $_SESSION['token']=$session;
	}
	$_SESSION['userId'] = $user->getId();
	header("location:/home");
    }
}
