<html><body>
<?php
//initialize session
session_start();

//CHANGE STATUS OF list TO BE  confirmed

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

//$uname=$_GET["name_ID"];
$uname=$_SESSION['name_ID'];

//echo "$uname thank you for your service! You are done!<br>";

//need to get CURRENTLIST from table clients which is the list ID
$entry = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
$entry = $entry->fetcharray();
$data = $entry['CURRENTLIST'];
$list_ID = (int)$data; //list id
$listnum=$list_ID; //parse into int
//echo "$list_ID was the number ID of your list!!!<br>";

//update database
$returned_set = $db->querySingle("SELECT COUNT(*) FROM list WHERE ID=$listnum;");//( AND status='incomplete')should we specify only list that are incomplete?

if($returned_set==0){//checking if we did not found ID in list
		$db->close();
		echo "returned_set=0 <br>";
		#header ("Location: Driver_main.php?flag=1&name_ID=$uname"); //if wrong ID then go back to main
}
else{//The client has confirmed that hte groceries have arrived and then the status of the list changes to "confirmed" and the CURRENTLIST needs to be updated to the default value (-1)for the client
   $sql =<<<EOF
      UPDATE list SET status = "confirmed" WHERE ID = $listnum;
EOF;

   $ret = $db->exec($sql);
   
   $sql2 =<<<EOF
      UPDATE clients SET CURRENTLIST = -1 WHERE CURRENTLIST = $listnum;
EOF;

    $ret2 = $db->exec($sql2);
         
   if(!$ret or !$ret2){
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
	   $_SESSION["listItem"]="";
	   header("Location: Client_main.php?flag=8");
    }
}

?>
</body>
</html>
