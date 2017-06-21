<?php
class User extends Tribe{
    use UserUtils;

    private $userId, $userName, $userEmail;

    function __construct($parameter){
	$this->connect();
	$columnName;

	// If the parameter is an integer (users id).
	if(is_int($parameter)){
	    $columnName = 'user.id';
	}

	// If the parameter is a string and email (users email)
	elseif(is_string($parameter) && filter_var($parameter, FILTER_VALIDATE_EMAIL)){
	    $columnName = 'user.email';
	    $parameter = $this->quote($parameter);
	}

	// If the parameter is a string (users name)
	elseif(is_string($parameter)){
	    $columnName = 'user.name';
	    $parameter = $this->quote($parameter);
	} else return null;

	// Fetch information about the specified user.
	$sql = "SELECT user.id as userId, user.name as userName, user.email as userEmail, tribe.id as tribeId FROM tribeUser INNER JOIN user ON user.id = tribeUser.userId INNER JOIN tribe ON tribe.id = tribeUser.tribeId WHERE $columnName=$parameter";
	$result = $this->query($sql);

	if($result->num_rows == 0) throw new NotFoundException();
	$row = $result->fetch_array();

	// Assign the results from row to the corresponding instance variables
	$this->userId =    $row[0];
	$this->userName =  $row[1];
	$this->userEmail = $row[2];

	$this->tribeId = intval($row[3]);
	parent::__construct($this->tribeId);
    }

    function getId(){        return intval($this->userId); }
    function getName(){	     return $this->userName; }
    function getEmail(){     return $this->userEmail; }
    function getTribeId(){   return parent::getId(); }
    function getTribeName(){ return parent::getName(); }

    function setTribe($tribeId){
	$sql = 'UPDATE tribeUser SET tribeId='.intval($tribeId).' WHERE userId='.$this->userId;
	$this->query($sql);
    }

    function createToken($tokenSession,$tokenToken,$tokenExpires){
	return $this->query("INSERT INTO userToken (userId,session,token,expiryDate) VALUES ($this->userId, '$tokenSession', '$tokenToken', NOW() + INTERVAL $tokenExpires DAY)");
    }
}
