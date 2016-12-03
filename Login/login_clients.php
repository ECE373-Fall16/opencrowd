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
	echo "Opened database for login check for clients<br>";
   }

//USERS LIST WILL NEVER BE DELETED. COULD BE A DEAD LIST. MAYBE CAN FIX IF WE HAVE TIME
//FOR NOW JUST CHECKING CLIENT HAS ACTIVE LIST OR NOT AND SAME FOR DRIVER

$debug="I AM HERE<br>";

//while(true){ 
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];

//Now will compare with database if match --EXPECTING ONLY 1
//can also do SELECT PASSWORD from clients WHERE USERNAME=$uname

   $ret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname' AND PASSWORD='$pass';");
   if ($ret>0){ //is a client 
      $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
      $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
      $check = $listnum['CURRENTLIST'];
      $check = (int)$check; //have int form of current list 

	if($check==-1)header("Location:../Client_main.php?update=0&name_ID=$uname"); //user does not have a list
	else{header("Location:../Client_main_submitted.php?update=0&name_ID=$uname");} //user has an active list
	
   }
   elseif($ret==0){ //if not a client
	//checking if its a driver if not a client
        $drivret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname' AND PASSWORD='$pass';");
	if($drivret==0){ //neither client nor driver
		header('Location: ../index.php?flag=1');//login_redirect.html
	}
        elseif ($drivret>0){ //driver
		  $listnum = $db->query("SELECT CURRENTLIST FROM drivers WHERE USERNAME='$uname';");
    		  $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
    		  $check = $listnum['CURRENTLIST'];
 		  $check = (int)$check; //have int form of current list 

	          if($check==-1)header("Location:../Driver_main.php?update=0&name_ID=$uname"); //user does not have a list
		  else{header("Location:../Driver_main_fetched.php?update=0&name_ID=$uname");} //user has an active list

	}
   }
?>








