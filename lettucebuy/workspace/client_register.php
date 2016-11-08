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
 $sql =<<<EOF
      INSERT INTO COMPANY (ID,PASSWORD,CURRENTLIST)
      VALUES ($_GET["name_ID"],$_GET["password"] );
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