<?php
trait UserUtils{
    public static function validateUserName($userName){
	return preg_match('/^\w+$/', $userName) && strlen($userName) >= 3 || strlen($userName) <= 18;
    }

    public static function validateUserPassword($userPassword){
	return strlen($userPassword) >= 8 && strlen($userPassword) <= 255;
    }

    public static function validateUserEmail($userEmail){
	return filter_var($userEmail,FILTER_VALIDATE_EMAIL);
    }

    public static function add($userName, $userPassword, $userEmail){
	try{
	    $user = new User($userName);
	}
	catch(NotFoundException $e){
	    if(!self::validateUserName($userName))         return USER_INVALID_NAME;
	    if(!self::validateUserPassword($userPassword)) return USER_INVALID_PASSWORD;
	    if(!self::validateUserEmail($userEmail))       return USER_INVALID_EMAIL;

	    $con = new Database();
	    $userName = $con->quote($userName);
	    $userEmail = $con->quote($userEmail);
	    $userPassword = $con->quote(password_hash($userPassword, PASSWORD_BCRYPT));
	    $sql = "INSERT INTO user (name, password, email) VALUES ($userName, $userPassword, $userEmail)";
	    $con->query($sql);
	    $sql = "INSERT INTO tribeUser (userId, tribeId) VALUES (".$con->insert_id().", 1)";
	    $con->query($sql);

	    return USER_NEXIST;
	}

	return USER_EXISTS;
    }
}
