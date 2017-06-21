<?php
class Tribe extends Database{
    private $tribeId, $tribeName, $tribePower, $tribeInherits;

    function __construct($parameter){
	$this->connect();
	$row;

	if(is_int($parameter)) $columnName = 'id';
	elseif(is_string($parameter)){
	    $parameter = $this->escape($parameter);
	    $columnName = 'name';
	}
	else return false;

	$sql = "SELECT id AS tribeId, name AS tribeName, power AS tribePower, inherits AS tribeInherits FROM tribe WHERE $columnName=$parameter LIMIT 1";
	$result = $this->query($sql);
	if($result->num_rows == 0) throw new NotFoundException();
	$row = $result->fetch_array();

	$this->tribeId       = $row[0];
	$this->tribeName     = $row[1];
	$this->tribePower    = $row[2];
	$this->tribeInherits = $row[3];
    }

    function getId(){       return $this->tribeId; }
    function getName(){     return $this->tribeName; }
    function getPower(){    return $this->tribePower; }
    function getInherits(){ return $this->tribeInherits; }
}
