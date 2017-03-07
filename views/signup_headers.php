<?php
if(Site::$u){
    header('location:/home');
    exit();
}
$signupError="";
$signupSuccess="";
if(isset($_POST['userName'])&&
   isset($_POST['userEmail'])&&
   isset($_POST['userPassword'])&&
   isset($_POST['signupCaptcha'])&&
   isset($_POST['cookieConsent'])){
    $con=new Db();
    $userName=    $con->escape($_POST['userName']);
    $userEmail=   $con->escape($_POST['userEmail']);
    $userPassword=$con->escape($_POST['userPassword']);
    $signupCaptcha=            $_POST['signupCaptcha'];
    include_once $_SERVER['DOCUMENT_ROOT'].'/securimage/securimage.php';
    $securimage=new Securimage();
    if($securimage->check($signupCaptcha)==true){
	if(User::validateUserName($userName)&&
	   User::validateUserPassword($userPassword)&&
	   User::validateUserEmail($userEmail)){
	    $userPassword=password_hash($userPassword,PASSWORD_BCRYPT);
	    $activationCode=sha1(uniqid(rand()));
	    if($con->query("SELECT id FROM users
			    WHERE name= '$userName'
			    OR    email='$userEmail'
			    LIMIT 1")->num_rows==0&&
	       $con->query("INSERT INTO users
			    (name,password,email,dateRegistered,dateActive) VALUES
			    ('$userName','$userPassword','$userEmail',now(),now())")&&
	       $con->query("INSERT INTO activations
			    (usersEmail,code,expires) VALUES
			    ('$userEmail','$activationCode',NOW() + INTERVAL 1 DAY)")&&
	       mail($userEmail,"Your activation code for pest.plus","Welcome $userName to pest.plus! Activate your account by clicking this link: https://pest.plus/activation?code=$activationCode. Hope you enjoy your stay.")){
		$signupSuccess="Successfully registered as $userName! An activation code has been sent to the email you specified. If you don't use this code within the next 24 hours, the code will be rendered null.";
	    }
	    else
		$signupError="That username or email is taken.";
	}
    }
    else
	$signupError="Captcha is incorrect.";
}
?>
