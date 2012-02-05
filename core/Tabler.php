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
		$header = $this->BuildHeader();
		$data = $this->BuildDataRows();
		$footer = $this->BuildFooter();
		$this->tableData = $header.$data.$footer;
		return $this->tableData;
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
		$header = "<table class=\"tabler\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$header .= "\t<thead>\n";
		$header .= "\t\t<tr>\n";
		foreach($this->columnData as $column)
		{
			$header .= "\t\t\t<th>$column</th>\n";
		}
		$header .= "\t\t</tr>\n";
		$header .= "\t</thead>\n";
		return $header;
	}
	
	private function BuildDataRows()
	{
		$result = $this->db->query($this->sql);
		$data = "\t<tbody>\n";
		$columnCount = count($this->columnData);
		while($row = $result->fetch_row())
		{
			$data .= "\t\t<tr>\n";
			for ($i = 0; $i <= $columnCount -1; $i++)
			{
    			$data .= "\t\t\t<td>".$row[$i]."</td>\n";
			}
			$data .= "\t\t</tr>\n";
		}
		$data .= "\t</tbody>\n";
		return $data;
	}
	
	private function BuildFooter()
	{
		$footer = "</table>";
		return $footer;
	}
	
	public function __toString()
	{
		return $this->GetTable;
	}
	
	

}