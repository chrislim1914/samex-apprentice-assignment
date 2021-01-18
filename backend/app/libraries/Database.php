<?php
	
class Database {
	private $host = DB_HOST;
	private $username = DB_USER;
	private $password = DB_PASS;
	private $dbname = DB_NAME;
	
	private $dbh;
	private $error;
	private $stmt;
    
    /**
     * initiatize connection to mysql using PDO
     */
	public function __construct() {
		// Set DSN
		$dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
		$options = array (
			PDO::ATTR_PERSISTENT => true,
			PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		);

		// Create a new PDO instanace
		try {
			$this->dbh = new PDO ($dsn, $this->username, $this->password, $options);
		}		// Catch any errors
		catch ( PDOException $e ) {
			$this->error = $e->getMessage();
		}
	}
	
	/**
     * method to prepare our statement with query
     * 
     * @param $query
     */
	public function query($query) {
		$this->stmt = $this->dbh->prepare($query);
	}
	
	/**
     * method to bind using bingValue() of PDO
     * but first lets check data type of the $value
     * if $type is not specify or null
     * 
     * @param $param, $value, $type = null
     */
	public function bind($param, $value, $type = null) {
		if (is_null ($type)) {
			switch (true) {
				case is_int ($value) :
					$type = PDO::PARAM_INT;
					break;
				case is_bool ($value) :
					$type = PDO::PARAM_BOOL;
					break;
				case is_null ($value) :
					$type = PDO::PARAM_NULL;
					break;
				default :
					$type = PDO::PARAM_STR;
			}
		}
		$this->stmt->bindValue($param, $value, $type);
	}
	
	/**
     * method to Execute the prepared statement
     */
	public function execute(){
		return $this->stmt->execute();
	}
	
	/**
     *  Get result set as array of objects
     * 
     * @return PDO::FETCH_OBJ
     */
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_OBJ);
	}
	
	/**
     *  Get single result
     * 
     * @return PDO::FETCH_OBJ
     */
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_OBJ);
	}
	
	/**
     * rowCount() to make our life easy
     * 
     * @return rowCount()
     */
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	/**
     * lastInsertId() to make our life easy again
     * 
     * @return lastInsertedId()
     */
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
}