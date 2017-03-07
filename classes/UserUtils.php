<?php
trait UserUtils{
    public static function validateUserName($userName){
	return preg_match('/^\w+$/',$userName)&&strlen($userName)>2||strlen($userName)<17;
    }
    public static function validateUserPassword($userPassword){
	return strlen($userPassword)>7&&strlen($userPassword)<33;
    }
    public static function validateUserEmail($userEmail){
	return filter_var($userEmail,FILTER_VALIDATE_EMAIL);
    }
}
?>
