<?php
require_once("config.php");
class Tabler
{
	public $sorting;
	public $theme;
	private $db;
	private $sql;
	private $queryResult;
	private $tableName;
	private $tableData;
	private $columnData; //for holding the columns in the query (array)
	private $cssClass;
	
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
			$this->queryResult = $this->db->query($this->sql);
			$this->columnData = $this->queryResult->fetch_fields();
		}
		
		//Set Default Setings
		$this->cssClass = "tabler";
	}
	
	public function SetCssClass($className)
	{
		$this->cssClass = $className;
	}
	
	public function GetTable()
	{
		$header = $this->BuildHeader();
		$data = $this->BuildDataRows();
		$footer = $this->BuildFooter();
		$this->tableData = $header.$data.$footer;
		return $this->tableData;
	}
		
	private function BuildHeader()
	{
		$header = "<table class=\"".$this->cssClass."\" cellpadding=\"0\" cellspacing=\"0\">\n";
		$header .= "\t<thead>\n";
		$header .= "\t\t<tr>\n";
	
		foreach($this->columnData as $column)
		{
			$header .= "\t\t\t<th>".$column->name."</th>\n";
		}
		
		$header .= "\t\t</tr>\n";
		$header .= "\t</thead>\n";
		return $header;
	}
	
	private function BuildDataRows()
	{
		$data = "\t<tbody>\n";
		while($row = $this->queryResult->fetch_row())
		{
			$data .= "\t\t<tr>\n";
			$columnCount = count($row);
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
		return $this->GetTable();
	}
	
	

}