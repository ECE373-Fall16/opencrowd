<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/lettucebuy.db');
      }
   }
   //===============open db
   $db = new MyDB();

//======================add user to db
$uname=$_GET["name_ID"];
$pass=$_GET["password"];

 $sql =<<<EOF
      INSERT INTO drivers (USERNAME,PASSWORD,CURRENTLIST)
      VALUES ("$uname", "$pass", -1);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "user added successfully\n";
   }
   $db->close();


?>


</body>
</html>