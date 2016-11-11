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
$count=0; //counting number of repeated usernames
$debug = "I AM HERE\n";
//checking if the username exists already in the db

//======================add user to db
while ($x<6){
  $uname=$_GET["name_ID"];
  $pass=$_GET["password"];

 $sqlinsert =<<<EOF
      INSERT INTO clients (USERNAME,PASSWORD,CURRENTLIST)
      VALUES ("$uname", "$pass", -1);
EOF;

 // $ret = $db->exec($sql); //we will search here to see if username exists
  echo $debug;
  $ret = $db->query("SELECT * FROM clients WHERE USERNAME=$uname;");
  echo $debug;
  while($repeat = $ret->fetchArray()){
        echo $debug;
	if($repeat != NULL){
	$count++;}
	else{break;}
  } 

  echo $debug;

 if ($count > 0){ //found it in the db 
    echo "Username: $uname already exists, retry with new username";
    $x++; //increment counter 
   }	
 else{ //can insert into the db
   $db->exec($sqlinsert);
   echo "User added successfully\n";
   break;
 }
} //end of while(1)

////checking status
//   if($x>=6){ //didnt insert
//      echo $db->lastErrorMsg();
//      echo "Something went wrong, whoops.";
//      exit(0); //terminate program
//   } 
//   else {
//      echo "User added successfully\n";
//      }

   $db->close();


?>


</body>
</html>
