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
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $uname=$_POST["name_ID"];
  $pass=$_POST["password"];
  $confirm=$_POST["confirm"];
  $phone=$_POST["phone"];
  $street=$_POST["street"];
  $city=$_POST["city"];
  $state=$_POST["state"];
  $question=$_POST["question"];
  $answer=$_POST["answer"];

 $sqlinsert =<<<EOF
      INSERT INTO clients (FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE,CURRENTLIST)
      VALUES ("$firstname","$lastname","$uname","$pass","$street","$city","$state","$phone",$question,"$answer", -1);
EOF;

//first we check if both passwords were correct or not in the confirm field
$check=strcmp("$pass","$confirm");
$place=0;
if($check!=$place){header ("Location: register-Client.php?flag=1");} //if not the same then confirm is wrong, go back

// $ret = $db->exec($sql); //we will search here to see if username exists
  $cret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname';");
  $dret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname';");
 if ($cret > 0 || $dret > 0){ //found it in the db therefore username taken 
    header ("Location: register-Client.php?flag=2&name_ID=$uname");
   }	
 else{ //can insert into the db
    $ret = $db->exec($sqlinsert);
       if(!$ret){
          echo $db->lastErrorMsg();
       } else { //added successfully
          $db->close();
	  header("Location: ../index.html?check=$check");
       }
 }
   $db->close();

?>

</body>
</html>
