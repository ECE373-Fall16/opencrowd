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

$debug="I AM HERE<br>";

//while(true){ 
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];

//Now will compare with database if match --EXPECTING ONLY 1
//can also do SELECT PASSWORD from clients WHERE USERNAME=$uname

   $ret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname' AND PASSWORD='$pass';");
   if ($ret>0){ //is a client 
      header("Location:../Client_main.php?name_ID=$uname");
   }
   elseif($ret==0){ //if not a client
	//checking if its a driver if not a client
        $drivret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname' AND PASSWORD='$pass';");
	if($drivret==0){ //neither client nor driver
		header('Location: ../indexRedir.html');//login_redirect.html
	}
        elseif ($drivret>0){ //driver
                header("Location:../Driver_main.php?flag=0&name_ID=$uname");
	}
   }
?>








