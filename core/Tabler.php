<?php
require_once("config.php");
class Tabler{
	private $db;
	public function __construct()
	{
		$hostname = $GLOBALS["hostname"];
		$user = $GLOBALS["username"];
		$pass = $GLOBALS["password"];
		$db = $GLOBALS["db_name"];
		$this->db = new mysqli($hostname,$user,$pass,$db);
		if($this->db->connect_error)
		{
			die("Error Connecting to the db");
		}
	}
	
	public function GetData()
	{
		$sql = "select * from data";
		$result = $this->db->query($sql);
		
		while($row = $result->fetch_object())
		{
			echo $row->name."<br />";
		}
	}

}