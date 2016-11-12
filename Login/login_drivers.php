<?php
   class MyDB extends SQLite3
   {
	function __construct()
	{
	  $this->open('lettucebuy.db');//opened my database
	}
   }
   $db = new MyDB();
   if(!$db){ //checking if doesn't exist
	echo $db->lastErrorMsg();
   } else {
	echo "Opened database for login check for drivers\n";
   }

int x=1;
//taking credentials from the driver until user gets it right
while(x==1){ 
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];
 
//Now will compare with database if match --EXPECTING ONLY 1
//can also do SELECT PASSWORD from clients WHERE USERNAME=$uname
   $sql =<<<EOF
	SELECT * from drivers;
EOF;
   $ret = $db->query($sq1);
  $row = $ret->fetchArray(SQLITE3_ASSOC);
     if(($row['USERNAME'] == $uname) && ($row['PASSWORD'] == $pass)){
	echo "Matching credentials, Welcome!";
	x = -1; //changing x so can exit out of loop
    } 
      else { //Entered info was wrong
	echo "Wrong Username/Password";
      }
    
 } 

?>








