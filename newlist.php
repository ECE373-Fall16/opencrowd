
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
//$items=$_POST["items"];
//could get items from session:
$items=$_SESSION["listItem"];
$address=$_POST["address"];

//here we have items and number respectively
$stuff=var_dump($item[0]);
echo "stuff is $stuff";


 $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
 $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
 $check = $listnum['CURRENTLIST'];
 $check = (int)$check; //have int form of current list 

 $temp = -1; 

if($items==""){
//if items list is empty do not proceed and send  error to clientmain
	header("Location: Client_main.php?flag=5");
}
else{ //items is not  empty then proceed to add to database---


if($check == -1){ //user does not already has a list online


 $sql =<<<EOF
      INSERT INTO list (items,address,status)
      VALUES ("$items","$address", "incomplete");
EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 
  //taking ID of row where we inserted into database and giving it to parameter in CLIENTS table
  $rollid = $db->lastInsertRowID();

  $clientschange =<<<EOF
      UPDATE clients SET CURRENTLIST = $rollid WHERE USERNAME = "$uname"
EOF;

   $ret = $db->exec($clientschange);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
        $db->close();
	//header("Location: Client_main_submitted.php");
	header("Location: Client_main_update_order.php");
   }
} 
else{ //user already had list which means $check was a number different than -1
   $db->close();
   header("Location: Client_main.php?flag=1");
}

}//endif checking empty list  ---
?>
</body>
</html>
