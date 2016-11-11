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

//====================================================================================add list to db
$uname=$_GET["name_ID"];
$pass=$_GET["password"];
$items=$_GET["items"];
//================================check exist
/*  
    $sql =<<<EOF
        SELECT COLUMNS FROM clients WHERE password=$pass AND ID=$ID; 
EOF;
     $ret = $db->exec($sql);
     if(!$ret)
       {
         echo "false";
       } 
       else
       {
         echo "true";
       }

*/
//================================end check

 $sql =<<<EOF
      INSERT INTO list (items,status)
      VALUES ('$items', 'incomplete');
      
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "items added\n";
   }
  //$roll=$db->query('SELECT ID from list WHERE items="$items"');
  $rollid = $db->lastInsertRowID();
  echo $rollid;
  $sql =<<<EOF
      UPDATE clients SET CURRENTLIST = $rollid WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "clients updated\n";
   }
   
   $db->close();


?>


</body>
</html>