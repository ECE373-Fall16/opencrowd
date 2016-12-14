<?php
session_start();
class MyDB extends SQLite3
   {
	function __construct()
	{
	 $this->open('./databases/lettucebuy.db');//opened my database
	}
   }

$db = new MyDB();
   if(!$db){ //checking if doesn't exist
	echo $db->lastErrorMsg();
   }


$uname=$_SESSION["name_ID"];
$status=$_POST["button"];

$list=$db->query("SELECT CURRENTLIST from drivers where USERNAME='$uname';");
$entry=$list->fetcharray();
$listnum=$entry["CURRENTLIST"];
$listnum=(int)$listnum;

    $updatestat=<<<EOF
	UPDATE list SET status="$status" WHERE ID=$listnum	

EOF;

$ret = $db->exec($updatestat);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

$db->close();
header("Location: Driver_main_fetched_new.php");
?>

