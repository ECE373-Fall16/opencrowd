<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('../databases/lettucebuy.db');
      }
   }
   //===============open db

   $db = new MyDB();


$debug = "I AM HERE<br>";
//checking if the username exists already in the db

//======================add user to db
  $uname=$_POST["name_ID"];
  $pass=$_POST["password"];
  $phonenum=$_POST["phone"];
  $address=$_POST["address"];

 $sqlinsert =<<<EOF
      INSERT INTO drivers (USERNAME,PASSWORD,PHONE,ADDRESS,CURRENTLIST)
      VALUES ("$uname", "$pass", "$phonenum","$address", -1);
EOF;

 // $ret = $db->exec($sql); //we will search here to see if username exists
  $cret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname';");
  $dret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname';");
 if ($cret > 0 || $dret > 0){ //found it in the db therefore username taken 
    header ("Location: pageDriver_register.php?flag=1&name_ID=$uname");
   }	
 else{ //can insert into the db
    $ret = $db->exec($sqlinsert);
       if(!$ret){
          echo $db->lastErrorMsg();
       } else { //added successfully
          $db->close();
	  header("Location: ../index.php");
       }
 }
   $db->close();

?>


</body>
</html>

