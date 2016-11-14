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
  $Caddress=$_POST["address"];

 $sqlinsert =<<<EOF
      INSERT INTO clients (USERNAME,PASSWORD,ADDRESS,CURRENTLIST)
      VALUES ("$uname", "$pass","$Caddress", -1);
EOF;

 // $ret = $db->exec($sql); //we will search here to see if username exists
  $ret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname';");
 
 if ($ret > 0){ //found it in the db 
    echo "Username: $uname already exists, retry with new username<br>";
    header ('Location: client_register_redirect.html');
   }	
 else{ //can insert into the db
    $ret = $db->exec($sqlinsert);
       if(!$ret){
          echo $db->lastErrorMsg();
       } else {
	  header("Location: /index.html");
          echo "user added successfully\n";
       }
 }
   $db->close();

?>


</body>
</html>
