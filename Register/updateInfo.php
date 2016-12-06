<?php
   class MyDB extends SQLite3
   {
	function __construct()
	{
	  $this->open('../databases/lettucebuy.db');//opened my database
	}
   }
	
   $db = new MyDB();
   if(!$db){ //checking if doesn't exist
	echo $db->lastErrorMsg();
   } else {
	#echo "Opened database for login check for clients!!!<br>";
   }
   
   $olduname=$_GET["oldName_ID"];
   $uname=$_GET["name_ID"];  
   $pass=$_GET["password"];
   $Caddress=$_GET["address"];
   $phone=$_GET["phone"]; 
   #echo "$olduname $uname  $pass $Caddress $phone ";
    //update database
#$returned_set = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$olduname';");
$returned_set = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$olduname';");

//need to check if it is a driver instead
$returned_set2 = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$olduname';");
echo "$returned_set2  $olduname <br>";
if($returned_set==0 && $returned_set2==0){//checking if we did not find ID in clients nor drivers
		$db->close();
		echo "There is not clients with the corresponging ID<br>";
		#header ("Location: Driver_main.php?flag=1&name_ID=$uname"); //if wrong ID then go back to main
}
else{ //we found an username

   //if it is a client
   if ($returned_set != 0){
       #echo "found a client <br>" ;
   $sql =<<<EOF
      UPDATE clients SET PASSWORD = "$pass", ADDRESS = "$Caddress",PHONE = "$phone", USERNAME = "$uname"  WHERE USERNAME = "$olduname"
EOF;
//, PASSWORD = $pass , ADDRESS = $Caddress ,PHONE = $phone WHERE USERNAME = "$uname";
   $ret = $db->exec($sql);
   
   if(!$ret){
        echo "there was an error";
        echo $db->lastErrorMsg();
   } else {
       #echo "Got updated! ?";
       //testing status (succeeded)
       $returned_set = $db->query("SELECT * FROM clients WHERE USERNAME='$uname';");
       $entry = $returned_set->fetcharray();
	   $username = $entry['USERNAME'];
	   $pass = $entry['PASSWORD'];
	   $addr = $entry['ADDRESS'];
	   $phone = $entry['PHONE'];
	   #echo "The old username is: $olduname <br>";
	   #echo "The username is: $username <br>";
	   #echo "The password is: $pass <br>";
	   #echo "The address is: $addr <br>";
	   #echo "The phone is: $phone <br>";
	   
	   //$db->close();
	   //echo "Status should be completed! Here we can link to other file";
	   header("Location: ../Client_main.php?flag=0&name_ID=$uname");
    }
       
   }else{//it is a driver then

       #echo "found a client <br>" ;
   $sql =<<<EOF
      UPDATE drivers SET PASSWORD = "$pass", ADDRESS = "$Caddress",PHONE = "$phone", USERNAME = "$uname"  WHERE USERNAME = "$olduname"
EOF;
//, PASSWORD = $pass , ADDRESS = $Caddress ,PHONE = $phone WHERE USERNAME = "$uname";
   $ret = $db->exec($sql);
   
   if(!$ret){
        echo "there was an error";
        echo $db->lastErrorMsg();
   } else {
       #echo "Got updated! ?";
       //testing status (succeeded)
       $returned_set = $db->query("SELECT * FROM clients WHERE USERNAME='$uname';");
       $entry = $returned_set->fetcharray();
	   $username = $entry['USERNAME'];
	   $pass = $entry['PASSWORD'];
	   $addr = $entry['ADDRESS'];
	   $phone = $entry['PHONE'];
	   #echo "The old username is: $olduname <br>";
	   #echo "The username is: $username <br>";
	   #echo "The password is: $pass <br>";
	   #echo "The address is: $addr <br>";
	   #echo "The phone is: $phone <br>";
	   
	   //$db->close();
	   //echo "Status should be completed! Here we can link to other file";
	   header("Location: ../Driver_main.php?flag=0&name_ID=$uname");
    
   }
   
}
}
?>