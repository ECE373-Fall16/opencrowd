<html><body>
<?php
//initialize session
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

//echo "$uname thank you for your service! You are done!<br>";
$uname=$_SESSION['name_ID'];
$list_ID=$_POST["listID"];
$listnum=(int)$list_ID; //parse into int
//echo "$list_ID was the number ID of your list!!!<br>";

//update database
$returned_set = $db->querySingle("SELECT COUNT(*) FROM list WHERE ID=$listnum;");

if($returned_set==0){//checking if we did not found ID in list
		$db->close();
		//echo "returned_set=0 <br>";
		header ("Location: Driver_main_new.php?flag=1"); //if wrong ID then go back to main
}
else{

   $sql =<<<EOF
      UPDATE list SET status = "completed" WHERE ID = $listnum;
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
        //echo "there was an error";
        echo $db->lastErrorMsg();
   } else {
       //echo "Got into last else";
       //testing status
       $returned_set = $db->query("SELECT * FROM list WHERE ID=$listnum;");
       $entry = $returned_set->fetcharray();
	   $data = $entry['status'];
	   //echo "The status of list is: $data <br>";
	   
	   $db->close();
	   //echo "Status should be completed! Here we can link to other file";
	   header("Location: Driver_main_fetched_new.php");
    }
}

?>
</body>
</html>
