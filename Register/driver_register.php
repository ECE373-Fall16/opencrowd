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

$question=(int)$question;
//if("$firstname"=="" || "$lastname"=="" || "$uname"=="" || "$pass"=="" || "$confirm"=="" || "$phone"=="" || "$street"=="" || "$city"=="" || "$state"=="" || $question==0 || "$answer"=="" )header("Location: register-Client.php?flag=3");

 $sqlinsert =<<<EOF
      INSERT INTO drivers (FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE,CURRENTLIST)
      VALUES ("$firstname","$lastname","$uname","$pass","$street","$city","$state","$phone",$question,"$answer", -1);
EOF;

 // $ret = $db->exec($sql); //we will search here to see if username exists
  $cret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname';");
  $dret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname';");
 if ($cret > 0 || $dret > 0){ //found it in the db therefore username taken 
    header ("Location: register-Driver.php?flag=2&name_ID=$uname");
   }	
 else{ //can insert into the db
    $ret = $db->exec($sqlinsert);
       if(!$ret){
          echo $db->lastErrorMsg();
       } else { //added successfully
          $db->close();
	  header("Location: ../Login-page.php?flag=3");
       }
 }
   $db->close();

?>


</body>
</html>

