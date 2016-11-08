<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/clacc.db');
      }
   }
   //===============open db
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
   //================end open db
   
   //===============create table
    $sql =<<<EOF
      CREATE TABLE COMPANY
      (ID TEXT PRIMARY KEY     NOT NULL,
      PASSWORD            TEXT     NOT NULL,
      CURRENTLIST  INT);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully\n";
   }
   $db->close();
   //==================end create table
?>


</body>
</html>