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

$flag=$_GET["flag"];
$uname=$_GET["name_ID"];
$flag=(int)$flag;

//find which list the user had, in order to update it or delete
	 $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
	 $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
	 $check = $listnum['CURRENTLIST'];
	 $check = (int)$check; //have int form of current list 


if($flag==0){ //update list
 	$items=$_GET["items"];
 	$address=$_GET["address"];

	 $stat = $db->query("SELECT status FROM list WHERE ID=$check;");
	 $stat = $stat->fetcharray(); //getting the number of currentlist to be compared
	 $test = $stat['status'];
	 
	 $numcheck=strcmp($test,'incomplete'); 
        	
	if($numcheck!=0){ //if the list has been fetched then we return
	   $db->close();
	   header("Location: Client_main_submitted.php?update=2&name_ID=$uname");
	}


	if((strcmp($address,""))==0){ //only want to change items

	  $changeitems =<<<EOF
	      UPDATE list SET items='$items' WHERE ID=$check 
EOF;
	   $ret = $db->exec($changeitems);
	   if(!$ret){
	      echo $db->lastErrorMsg();
	   } 
		$db->close();
		header("Location: Client_main_submitted.php?update=1&name_ID=$uname");
	}


	if((strcmp($items,""))==0){ //only want to change address

	  $changeaddress =<<<EOF
	      UPDATE list SET address='$address' WHERE ID=$check 
EOF;
	   $ret = $db->exec($changeaddress);
	   if(!$ret){
	      echo $db->lastErrorMsg();
	   } 
	   $db->close();
	   header("Location: Client_main_submitted.php?update=1&name_ID=$uname");
	}

	//update both fields
	 $sql =<<<EOF
	      UPDATE list SET items='$items',address='$address' WHERE ID=$check 
EOF;
	
	   $ret = $db->exec($sql);
	   if(!$ret){
	      echo $db->lastErrorMsg();
	   } 
}

elseif($flag==1){ //user wants to delete list
   $reset=-1; //temp for holding -1

   $sqldel =<<<EOF
	DELETE from list WHERE ID=$check 
	UPDATE clients SET CURRENTLIST=$reset
EOF;
  
   $ret = $db->exec($sqldel);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

   $listreset =<<<EOF
	UPDATE clients SET CURRENTLIST=$reset
EOF;
   $ret = $db->exec($listreset);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

   header("Location: Client_main.php?flag=3&name_ID=$uname");
}

?>
</body>
</html>
