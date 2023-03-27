<?php

require_once("new_config.php");

class Database {
		
	public $connection;
	
	
	function __construct(){
	
		$this->open_db_connection();
	}
	
	
	public function open_db_connection(){
		
		$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
		
		if($this->connection->connect_error) {

			die("Connection Failed: " . $this->connection->connect_error);

		}
	}
	
	
	public function query($sql){
		
		$result = $this->connection->query($sql);
		$this->confirm_query($result);
		return $result;
	}
	
	
	public function fetch_records($result){
		
		$records = $result->fetch_array();
		return $records;
	}
	
	
	public function row_count($result) {
		$num_row = $result->row_count();
		return $num_row;
	}
	
	
	private function confirm_query($result){
		
		if(!$result){
			die("Query Failed" . $this->connection->errno);
		}
	}
	
	
	public function escape_string($string) {
		
		$escaped_string = $this->connection->real_escape_string($string);
		return $escaped_string;
	}
	
	
	public function the_last_inserted_id() {
		
		return $this->connection->insert_id;
	}
}



$database = new Database;

//if($database->connection->connect_error) {
//
//die("Connection Failed: " . $database->connection->connect_error);
//	
//}


?>