<html><body>
    
<?php
   session_start();
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
$uname=$_SESSION["name_ID"];
$listnum=$_POST["listID"];
$listnum=(int)$listnum; //parse into int
//echo "$listnum";
$returned_set = $db->querySingle("SELECT COUNT(*) FROM list WHERE ID=$listnum AND status='incomplete';");

	if($returned_set==0){//checking if we did not found ID in list
		$db->close();
		header ("Location: Driver_main.php?flag=1"); //if wrong ID then go back to main
	}

  else{
  $sql =<<<EOF
      UPDATE drivers SET CURRENTLIST = $listnum WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 

   $sqlstat =<<<EOF
      UPDATE list SET status = 'fetched' WHERE ID =$listnum
EOF;
   $ret = $db->exec($sqlstat);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
	//echo "got here";
	// $entry = $db->query("SELECT CURRENTLIST FROM drivers WHERE USERNAME='$uname';");
        //                                $entry = $entry->fetcharray();
        //                                $data = $entry['CURRENTLIST'];
        //                                $data = (int)$data;
	//				echo "$data";

  	$db->close();
	//echo "$listnum";//correct id
 	header("Location: Driver_main_fetched_new.php");
   }
}

?>

</body>
</html>
