<html><body>
    
<?php
   session_start();
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/lettucebuy.db');
      }
   }
//=============================================================================================open db
$db = new MyDB();

$uname=$_SESSION["name_ID"];

//find which list the user had, in order to update it or delete
 $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
 $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
 $check = $listnum['CURRENTLIST'];
 $check = (int)$check; //have int form of current list 



//TO DO: MAKE SURE THAT LIST HASNT BEEN FETCHED YET
   $reset=-1; //temp for holding -1

   $sqldel =<<<EOF
	DELETE from list WHERE ID=$check 
EOF;
  
   $ret = $db->exec($sqldel);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 

   $listreset =<<<EOF
	UPDATE clients SET CURRENTLIST=$reset
EOF;
   $ret = $db->exec($listreset);
    if(!$ret){
	 echo $db->lastErrorMsg();
    } 
   $_SESSION['listItem']="";
   $db->close();
   header("Location: Client_main.php?flag=7");

?>
</body>
</html>
