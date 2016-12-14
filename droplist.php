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
   
$list=$db->query("SELECT CURRENTLIST from drivers where USERNAME='$uname';");
$entry=$list->fetcharray();
$listnum=$entry["CURRENTLIST"];
$listnum=(int)$listnum;

  $changestatus<<<EOF
	UPDATE list SET status="incomplete" WHERE ID=$listnum	
EOF;

$ret = $db->exec($changestatus);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

   $changedrivernumlist<<<EOF
	UPDATE drivers SET CURRENTLIST=-1 WHERE USERNAME=$uname
EOF;

$ret = $db->exec($changedrivernumlist);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

  $db->close();
  header("Location: Driver_main_new.php?flag=4");

?>
