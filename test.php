<?php
require_once("core/Tabler.php");
$tb = new Tabler("select * from data");

$table = $tb->GetTable();

echo $table;