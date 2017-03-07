<?php
include_once 'Group.php';
include_once 'UserUtils.php';
class User extends Group{
    use UserUtils;
    private $userId,$userName,$userDateRegistered,$userDateActive,$userEmail,$userTheme;
    /* The constructor takes a parameter that will only be accepter as a users name,
     * email or a id. With this data, it will fill up the data for the rest of the
     * instance variables from the database.*/
    function __construct($parameter){
	$this->connect();
	$row;
	$columnName;
	// If the parameter is an integer (users id).
	if(is_int($parameter)){
	    $columnName='id';
	}
	// If the parameter is a string and email (users email)
	elseif(is_string($parameter)&&filter_var($parameter,FILTER_VALIDATE_EMAIL)){
	    $columnName='email';
	    $parameter=$this->quote($parameter);
	}
	// If the parameter is a string (users name)
	elseif(is_string($parameter)){
	    $columnName='name';
	    $parameter=$this->quote($parameter);
	}else{
	    return false;
	}
	// Fetch information about the specified user.
	$row=$this->query("SELECT users.id             AS userId,
				  users.name           AS userName,
				  users.email          AS userEmail,
				  users.theme          AS userTheme,
				  users.dateActive     AS userDateActive,
				  users.dateRegistered AS userDateRegistered,
				  users.groupsId       AS groupId
			   FROM users
			   INNER JOIN groups ON users.groupsId=groups.id
			   WHERE users.$columnName=$parameter LIMIT 1")->fetch_assoc();
	// Assign the results from row to the corresponding instance variables
	$this->userId=            $row['userId'];
	$this->userName=          $row['userName'];
	$this->userEmail=         $row['userEmail'];
	$this->userTheme=         $row['userTheme'];
	$this->userDateActive=    $row['userDateActive'];
	$this->userDateRegistered=$row['userDateRegistered'];
	$this->groupId=    intval($row['groupId']);
	parent::__construct($this->groupId);
    }
    function getId(){
	return $this->userId;
    }
    function getName(){
	return $this->userName;
    }
    function getPassword(){
	return $this->query("SELECT password AS userPassword FROM users WHERE id=$this->userId")->fetch_assoc()['userPassword'];
    }
    function getEmail(){
	return $this->userEmail;
    }
    function getTheme(){
	return $this->userTheme;
    }
    function getDateActive(){
	return $this->dateActive;
    }
    function getDateRegistered(){
	return $this->dateRegistered;
    }
    function getGroupId(){
	return parent::getId();
    }
    function getGroupName(){
	return parent::getName();
    }
    function setId($userId){
	if($this->query("UPDATE users SET id=$userId WHERE id=$this->userId")){
	    $this->userId=$userId;
	    return true;
	}
	return false;
    }
    function setName($userName){
	$userName=$this->escape($userName);
	if(self::validateUserName($userName)&&
	   $this->query("UPDATE users SET name='$userName' WHERE id=$this->userId")){
	    $this->userName=$userName;
	    return true;
	}
	return false;
    }
    function setEmail($userEmail){
	$userEmail=$this->escape($userEmail);
	if(self::validateUserEmail($userEmail)&&
	   $this->query("UPDATE users SET email='$userEmail' WHERE id=$this->userId")){
	    $this->userEmail=$userEmail;
	    return true;
	}
	return false;
    }
    function setTheme($userTheme){
	$userTheme=$this->escape($userTheme);
	if($this->query("UPDATE users SET theme='$userTheme' WHERE id=$this->userId")){
	    $this->userTheme=$userTheme;
	    return true;
	}
	return false;
    }
    // Sets groupId of the user.
    function setGroupId($groupId){
	if(is_int($groupId)&&
	   $this->query("UPDATE users SET groupsId=$groupId WHERE id=$this->userId")){
	    // Updates all the group instance variables according to the new groupId.
	    parent::__construct($groupId);
	    return true;
	}
	return false;
    }
    function createToken($tokenSession,$tokenToken,$tokenExpires){
	return $this->query("INSERT INTO tokens
			     (usersId,session,token,expires)
			     VALUES
			     ($this->userId,'$tokenSession','$tokenToken',NOW() + INTERVAL $tokenExpires DAY)");
    }
}
?>
