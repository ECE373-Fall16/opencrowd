
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

$uname=$_SESSION["name_ID"];
//$items=$_POST["items"];
//could get items from session:
$items=$_SESSION["listItem"];
$address=$_POST["address"];
$button=$_POST["button"];//Add to Order || Delete Order

//here we have items and number respectively
//$stuff=var_dump($item[0]);
//echo "stuff is $stuff";


 $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
 $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
 $check = $listnum['CURRENTLIST'];
 $check = (int)$check; //have int form of current list 

 $temp = -1; 

if($button=="Submit List"){
	if($items==""){
		$db->close();
		header("Location: Client_main.php?flag=5");
	}
	 $sql =<<<EOF
	      INSERT INTO list (items,address,status)
	      VALUES ("$items","$address", "incomplete");
EOF;
	if($address=="")$address="None";

	   $ret = $db->exec($sql);
	   if(!$ret){
	      echo $db->lastErrorMsg();
	   } 
	  //taking ID of row where we inserted into database and giving it to parameter in CLIENTS table
	  $rollid = $db->lastInsertRowID();

	  $clientschange =<<<EOF
	      UPDATE clients SET CURRENTLIST = $rollid WHERE USERNAME = "$uname";
EOF;

		 $ret = $db->exec($clientschange);
		 if(!$ret){
		 echo $db->lastErrorMsg();
			} 
	   $db->close();
	   header("Location: Client_main_update_order.php");
}


elseif($button=="Add to Order"){
	echo "$button";
	if($items==""){
		$db->close();
		header("Location: Client_main_update_order.php?flag=5");
	}

	echo "$button";
	$listnum= $db->query("SELECT CURRENTLIST FROM clients where USERNAME='$uname';");
 	$listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
	$num = $listnum["CURRENTLIST"];
	$num=(int)$num;
	echo "$button";
	
	$clientschange =<<<EOF
	      UPDATE list SET items="$items" WHERE ID=$num;
EOF;
	echo "$button";
		 $ret = $db->exec($clientschange);
		 if(!$ret){
		 echo $db->lastErrorMsg();
		}

	   $db->close();
	   header("Location: Client_main_update_order.php?flag=6");
	
}

elseif($button=="Delete Order"){

	//user wants to delete list
   $db->close();
   header("Location: delete.php");
}

?>
</body>
</html>
