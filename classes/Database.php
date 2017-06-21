<?php
class NotFoundException extends Exception {}

/* Class for creating and using database connections.*/
class Database {
    // The database connection;
    private $con;

    function __construct(){
	self::connect();
    }

    function connect(){
	$cred = parse_ini_file($_SERVER['DOCUMENT_ROOT'].'/config.ini');
	$hostname =       'localhost';
	$username = $cred['username'];
	$password = $cred['password'];
	$dbname   = $cred['dbname'];

	// Try and connect to the database
	if(!isset($this->con)){
	    $this->con = new mysqli($hostname, $username, $password, $dbname);
	}

	// If connection was not successful, handle the error
	if($this->con === false){
	    // Handle error - notify administrator, log to a file, show an error screen, etc.
	    return false;
	}
	return $this->con;
    }
    /**
     * Query the database
     *
     * @param $query The query string
     * @return mixed The result of the mysqli::query() function
     */
    function query($query) {
	// Query the database
	$result = $this->con->query($query);
	return $result;
    }
    /**
     * Fetch the last error from the database
     *
     * @return string Database error message
     */
    function error() {
	return $this->con->error;
    }
    /**
     * Quote and escape value for use in a database query
     *
     * @param string $value The value to be quoted and escaped
     * @return string The quoted and escaped string
     */
    function quote($value) {
	return "'".$this->con->real_escape_string($value)."'";
    }
    function escape($value) {
	return $this->con->real_escape_string($value);
    }

    function insert_id(){
	return $this->con->insert_id;
    }
    function affected_rows(){
	return $this->con->affected_rows;
    }
}
?>
