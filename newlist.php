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
      INSERT INTO list (listID,items,status)
      VALUES (2, "$items", "incomplete");
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "items added\n";
   }
   $db->close();


?>


</body>
</html>