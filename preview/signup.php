<?php
nur("But why?");

if(isset($post['userName'])):
$mess['userName'] = $post['userName'];
if(isset($post['userEmail'])):
$mess['userEmail'] = $post['userEmail'];
if(isset($post['userPassword']) && isset($post['userPassword']) && isset($post['signupCaptcha']) && isset($post['cookieConsent'])):
$case = User::add($post['userName'], $post['userPassword'], $post['userEmail']);
switch($case){
    case USER_EXISTS:
	$mess['message'] = 'A user with that name already exists.';
	break;
    case USER_INVALID_NAME:
	$mess['message'] = 'Something was wrong with that name.';
	break;
    case USER_INVALID_PASSWORD:
	$mess['message'] = 'Something was wrong with that password.';
	break;
    case USER_INVALID_EMAIL:
	$mess['message'] = 'Something was wrong with that email.';
	break;
    case USER_NEXIST:
	$con = new Database();
	$activationCode = sha1(uniqid(rand()));
	$user = new User($post['userName']);
	$con->query("INSERT INTO userActivation (userId, code, expiryDate) VALUES (".$user->getId().", '$activationCode', DATE_ADD(NOW(), INTERVAL 24 HOUR))");
	mail($user->getEmail(), "pest.plus: Your activation code", "Thank you for signing up! This activation code is valid for approximately 24 hours. Click this link to activate it now: https://pest.plus/activation.php?code=$activationCode");
	$mess['message'] = "You successfully registered! An email message has been sent to ".$user->getEmail().". Click the link there to activate your account withing 24 hours, or you'll have to sign up again.";
	header("location:/");
	exit();
	break;
    default:
	$mess['message'] = 'Something went wrong.';
	break;
}
endif;
endif;
endif;
