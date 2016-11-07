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
$listID=$_GET["listID"];

  $sql =<<<EOF
      UPDATE drivers SET CURRENTLIST = $listID WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "list fetched updated\n";
   }
   $sql =<<<EOF
      UPDATE list SET status = 'fetched' WHERE ID = "$listID"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "list status updated\n";
   }
   
   
   
   
   
   $db->close();


?>


</body>
</html>