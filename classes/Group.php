<?php
// Include the class that Groups extends.
include_once "Db.php";
// The class Group is a model according to the database table groups.
class Group extends Db{
    // Variables in correspondence to columns in the database table.
    private $groupId,$groupName,$groupPower,$groupColor,$groupInherits;
    /* The constructor takes a parameter that will only be accepter as a groups name
     * or a groups id. With this data, it will fill up the data for the rest of the
     * instance variables from the database.*/
    function __construct($parameter){
	$this->connect();
	$row;
	// If the parameter is an integer (groups id).
	if(is_int($parameter)){
	    $columnName='id';
	}
	// If the parameter is a string (groups name)
	elseif(is_string($parameter)){
	    $parameter=$this->escape($parameter);
	    $columnName='name';
	}else{
	    return false;
	}
	$row=$this->query("SELECT id       AS groupId,
				  name     AS groupName,
				  color    AS groupColor,
				  power    AS groupPower,
				  inherits AS groupInherits
			   FROM groups
			   WHERE $columnName=$parameter LIMIT 1")->fetch_assoc();
	$this->groupId=$row['groupId'];
	$this->groupName=$row['groupName'];
	$this->groupColor=$row['groupColor'];
	$this->groupPower=$row['groupPower'];
	$this->groupInherits=$row['groupInherits'];
    }
    function getId(){
	return $this->groupId;
    }
    function getName(){
	return $this->groupName;
    }
    function getPower(){
	return $this->groupPower;
    }
    function getColor(){
	return $this->groupColor;
    }
    function getInherits(){
	return $this->groupInherits;
    }
}
?>
