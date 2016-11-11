<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('/databases/lettucebuy.db');
      }
   }
   //===============open db
   $db = new MyDB();

$x=1; //flag

//======================add user to db

while (x<6){
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];

//checking if the username exists already in the db
  $sql =<<<EOF
     SELECT * FROM drivers WHERE USERNAME=$uname;
EOF;

 if (@@ROWCOUNT > 0){ //found it in the db 
    echo "Username:" $uname "already exists, retry with new username";
    $x++; //increment counter 
   }	

 else{ //can insert into the db
 $sql =<<<EOF
      INSERT INTO drivers (USERNAME,PASSWORD,CURRENTLIST)
      VALUES ("$uname", "$pass", -1);
EOF;
    }
} //end of while

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
