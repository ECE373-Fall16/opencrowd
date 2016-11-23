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
//================================check exist

 $check= $db->query("SELECT CURRENTLIST FROM CLIENTS WHERE USERNAME='$uname'");

 if($check != -1){ //user already has a list online
	$db->close;
	header("Location: Client_main.php?name_ID=$uname");
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
	header("Location: Client_main.php?name_ID=$uname");
      echo "clients updated\n";
   }
   
   $db->close();
?>
</body>
</html>
