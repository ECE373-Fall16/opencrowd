<html><body>
    
<?php
/*   class MyDB1 extends SQLite3
   {
      function __construct()
      {
         $this->open('lettucebuy.db');
      }
   }
   //===============open db
*/
   $db = new MyDB();

//======================add user to db
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $uname=$_POST["name_ID"];
  $pass=md5($_POST["password"]);
  $confirm=md5($_POST["confirm"]);
  $phone=$_POST["phone"];
  $street=$_POST["street"];
  $city=$_POST["city"];
  $state=$_POST["state"];
  $question=$_POST["question"];
  $answer=$_POST["answer"];

$question=(int)$question;

if(empty($firstname) || (empty($lastname)) || empty($uname) ||  empty($pass)  || empty($phone) || empty($street) || empty($city) || empty($state) || ($question==0) || empty($answer)){
	$db->close();
//	header("Location: register-Client.php?flag=3");
}

 $sqlinsert =<<<EOF
      INSERT INTO clients (FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE,CURRENTLIST)
      VALUES ("$firstname","$lastname","$uname","$pass","$street","$city","$state","$phone",$question,"$answer", -1);
EOF;

//first we check if both passwords were correct or not in the confirm field
if($pass!=$confirm){
	$db->close();
//	header ("Location: register-Client.php?flag=1");
} //if not the same then confirm is wrong, go back

// $ret = $db->exec($sql); //we will search here to see if username exists
  $cret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname';");
  $dret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname';");

 if ($cret > 0 || $dret > 0){ //found it in the db therefore username taken 
    $db->close();
//    header ("Location: register-Client.php?flag=4&name_ID=$uname");
   }	

 else{ //can insert into the db
    $ret = $db->exec($sqlinsert);
       if(!$ret){
          echo $db->lastErrorMsg();
       } else { //added successfully
          $db->close();
//	  header("Location: ../Login-page.php?flag=3");
       }
 }
   $db->close();

?>

</body>
</html>
