<?php
require_once("config.php");
class Tabler
{
	public $sorting;
	public $theme;
	private $db;
	private $sql;
	private $tableName;
	private $tableData;
	private $columnData; //for holding the columns in the query (array)
	
	public function __construct($sql = NULL)
	{
		$this->db = new mysqli($GLOBALS["hostname"],$GLOBALS["username"],$GLOBALS["password"],$GLOBALS["db_name"]);
		if($this->db->connect_error)
		{
			die("Error Connecting to the db");
		}
		
		if($sql != NULL)
		{
			$this->sql = $sql;
			$this->GetColumns();
		}
	}
	
	public function GetTable()
	{
		
	}
	
	private function GetColumns()
	{
		//Returns array of the columns from the query.
		$result = $this->db->query("Explain ".$this->sql);
		$row = $result->fetch_object();
		$this->tableName = $row->table;
	    $columnQuery = "Describe $this->tableName";
		$columnResult = $this->db->query($columnQuery);
		while($columnRow = $columnResult->fetch_object())
		{
			$this->columnData[] = $columnRow->Field;
		}
	}
	
	private function BuildHeader()
	{
	
	}
	
	private function BuildDataRows()
	{
		
	}
	
	public function __toString()
	{
		return $this->tableData;
	}
	
	

}