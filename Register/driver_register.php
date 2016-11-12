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

$x=1; //flag
$debug = "I AM HERE<br>";
//checking if the username exists already in the db

//======================add user to db
while ($x<6){
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];

 $sqlinsert =<<<EOF
      INSERT INTO drivers (USERNAME,PASSWORD,CURRENTLIST)
      VALUES ("$uname", "$pass", -1);
EOF;

 // $ret = $db->exec($sql); //we will search here to see if username exists
  $ret = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$uname';");
 
  //$ret has number of occurrences in database, either 0 or 1
 if ($ret > 0){ //found it in the db 
    echo "Username: $uname already exists, retry with new username<br>";
    $x++; //increment counter to give user another try --> ASK HTML STUFF FOR THIS 
   }	
 else{ //can insert into the db
   $db->exec($sqlinsert);
   echo "User added successfully\n";
   break;
 }
} //end of while(1)

   $db->close();

?>



</body>
</html>
