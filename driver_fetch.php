<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/lettucebuy.db');
      }
   }
//=============================================================================================open db
   $db = new MyDB();

//====================================================================================add list to db
$uname=$_GET["name_ID"];
$listnum=$_GET["listID"];
$listnum=(int)$listnum; //parse into int

$returned_set = $db->querySingle("SELECT COUNT(*) FROM list WHERE ID=$listnum;");

	if($returned_set==0){//checking if we did not found ID in list
		$db->close();
		header ("Location: Driver_main.php?flag=1&name_ID=$uname"); //if wrong ID then go back to main
	}

  else{
  $sql =<<<EOF
      UPDATE drivers SET CURRENTLIST = $listnum WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 

   $sql =<<<EOF
      UPDATE list SET status = 'fetched' WHERE ID = "$listnum"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
  	$db->close();
 	 header("Location: Driver_main_fetched.php?name_ID=$uname");
   }
}

?>

</body>
</html>
