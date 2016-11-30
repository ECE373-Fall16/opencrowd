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

$uname=$_GET["name_ID"];
$items=$_GET["items"];
$address=$_GET["address"];

 header("Location: Client_main.php?test=$uname&flag=1&name_ID=$uname");

 $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
 $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
 $check = $listnum['CURRENTLIST'];
 $check = (int)$check; //have int form of current list 

 header("Location: Client_main.php?test=$uname&flag=1&name_ID=$uname");

 if(is_string($check)){
	$db->close;
	header("Location: Client_main.php?flag=1&name_ID=$uname");
 }

 $temp = -1; 

 if($check != $temp){ //user already has a list online, no changes made to current list
	$db->close;
	header("Location: Client_main.php?flag=1&name_ID=$uname");
  }

 $sql =<<<EOF
      INSERT INTO list (items,address,status)
      VALUES ("$items","$address", "incomplete");
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 
  //taking ID of row where we inserted into database and giving it to parameter in CLIENTS table
  $rollid = $db->lastInsertRowID();

  $clientschange =<<<EOF
      UPDATE clients SET CURRENTLIST = $rollid WHERE USERNAME = "$uname"
EOF;

   $ret = $db->exec($clientschange);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
        $db->close();
	header("Location: Client_main.php?flag=1&name_ID=$uname");
	header("Location: Client_main.php?check=$check&name_ID=$uname");
   }
   
   $db->close();
?>
</body>
</html>
