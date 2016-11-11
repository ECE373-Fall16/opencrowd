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

$x=1; //flag
$debug="I AM HERE<br>";

while($x<6){ 
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];
//Now will compare with database if match --EXPECTING ONLY 1
//can also do SELECT PASSWORD from clients WHERE USERNAME=$uname
   $ret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname' AND PASSWORD='$pass';");
   if($ret<=0){
	//checking if its a driver if not a client
        $drivret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname' AND PASSWORD='$pass';");
	if($drivret<=0){ //neither client nor driver
		echo "Sorry wrong Username or Password<br>";
		echo "Please try again...<br>";
		$x++;
	}
       elseif ($drivret>0){
		echo "Welcome driver $uname!<br>";
		break; //logged in
		}
   }
   elseif ($ret>0){ //assuming only one username exists with that username
      echo "Welcome client $uname!<br>";
      break; //logged in
   }
	//!!!!!!SHOULD BE REDIRECTED TO AN AFTER LOGIN PAGE OF RESPECTIVE LOGIN?
} //end while 

?>








