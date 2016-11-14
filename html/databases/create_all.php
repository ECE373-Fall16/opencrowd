<html><body>
    
<?php
//===================================================open/create db

   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('lettucebuy.db');
      }
   }
   //===============open db
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      echo "Opened database successfully\n";
   }
//========================================================table for drivers

    $sql =<<<EOF
      CREATE TABLE drivers
      (ID  INTEGER PRIMARY KEY        AUTOINCREMENT,
      USERNAME            TEXT     NOT NULL,
      PASSWORD            TEXT     NOT NULL,
      CURRENTLIST  INTEGER 
      );
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table for drivers created successfully\n";
   }
//===================================================table for clients db

    $sql =<<<EOF
      CREATE TABLE clients
      (ID  INTEGER PRIMARY KEY        AUTOINCREMENT,
      USERNAME            TEXT     NOT NULL,
      PASSWORD            TEXT     NOT NULL,
      ADDRESS		  TEXT     NOT NULL,
      CURRENTLIST  INTEGER
      );
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table for clients created successfully\n";
   }
//===================================================table for lists db
    $sql =<<<EOF
      CREATE TABLE list
      (ID  INTEGER PRIMARY KEY        AUTOINCREMENT,
      items TEXT NOT NULL,
      address TEXT NOT NULL,
      status TEXT NOT NULL);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table for lists created successfully\n";
   }
   $db->close();
   //==================end create table
?>

</body>
</html>
