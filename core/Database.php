<?php
include_once("config.php");

class Database {
	public $mysql;
	private $hostname;
	private $user;
	private $password;
	private $db;

	function __construct(){
		$this->hostname = $GLOBALS["hostname"];
		$this->user = $GLOBALS["username"];
		$this->password = $GLOBALS["password"];
		$this->db = $GLOBALS["db_name"];
		
		$this->mysql = new mysqli($this->hostname,$this->user,$this->password,$this->db);
		if($this->mysql->connect_error)
		{
			echo "Error connecting to the database, check your configuration.";
			exit();
		}

	}


	public function query($sql){
		//This is for multiple Result sets
		if(($result = $this->mysql->query($sql)) != NULL){
			if($result->num_rows <= 1){
				$row = $result->fetch_assoc();
				return $row;
			}else{
				while($row = $result->fetch_assoc()){
					$data[] = $row;
				}
				return $data;
			}

		}else{

			return false;
		}

	}


	public function insert($insertSql){
		if($result = $this->mysql->query($insertSql)){
			return true;
		}else{
			return false;
		}

	}

	public function update($updateSql){
		if($result = $this->mysql->query($updateSql)){
			return true;
		}else{
			return false;
		}

	}

	public function delete($deleteSql){
		if($result = $this->mysql->query($deleteSql)){
			return true;
		}else{
			return false;
		}

	}

	public function get_last_id(){
		return $this->mysql->insert_id;
	}

	function __destruct() {
		// close out the database connection;
		$this->mysql->close();
	}


}

?>