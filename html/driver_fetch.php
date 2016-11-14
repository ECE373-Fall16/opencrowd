<html><body>
    
<?php
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/lettucebuy.db');
      }
   }
//=============================================================================================open db
   $db = new MyDB();

//====================================================================================add list to db
$uname=$_POST["name_ID"];
$pass=$_POST["password"];
$listID=$_POST["listID"];
$flag = 1;

 // $intID = (int) $listID;
 // $returned_set = $db->query("SELECT ID FROM list WHERE status='incomplete';");
 // while ($entry = $returned_set->fetcharray()) {
 //         $result = (int) $entry;

 //         if($result!==$intID){echo $;}
 //         else{ 
 //       	$flag =1; //found ID in list
 //       } 
 //  }

	if($flag==0){//checking if we did not found ID in list
		$db->close();
		header ("Location: Driver_main.php"); //if wrong ID then go back to main
	}

  $sql =<<<EOF
      UPDATE drivers SET CURRENTLIST = $listID WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 

   $sql =<<<EOF
      UPDATE list SET status = 'fetched' WHERE ID = "$listID"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
  	$db->close();
  ; }
?>
<form action="Driver_main_fetched.php" method="POST">
<input type="hidden" name="name_ID" value="$uname">
<input type="submit">
</form>
<?php
  header("Location: Driver_main_fetched.php");
?>
   



</body>
</html>
