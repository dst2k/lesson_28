<?php
require_once "classes/StudentGroupInterface.php";
require_once "classes/StudentGroup.php";

try
{
	$studentgroup = new StudentGroup('data.txt');
	$data = $studentgroup->read();
	echo "<pre>";
	var_dump($studentgroup->read());
	echo "</pre>";
	
}

catch(Exception $e)
{
	$message = $e->getMessage();
	echo $message;

}
