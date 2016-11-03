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

//======================add user to db
$uname=$_GET["name_ID"];
$pass=$_GET["password"];

 $sql =<<<EOF
      INSERT INTO COMPANY (ID,PASSWORD,CURRENTLIST)
      VALUES ($uname, $pass, NULL);
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Records created successfully\n";
   }
   $db->close();


?>


</body>
</html>