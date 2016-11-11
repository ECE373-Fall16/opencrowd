<html>
<body>

<?php
/*
   class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('databases/lettucebuy.db');
      }
   }
   */
//=============================================================================================open 
db
   //$db = new MyDB();
   
//====================================================================================add 
list to db
$username=$_POST["name_ID"];
$items=$_POST["items"]; //simplistic way; items separated by a comma

//check
echo "The user name is " . $username." and the items are 
".$items."<br>"; 
//================================check exist DONT THINK IS NEEDED HERE 
SINCE PERSON IS ALREADY SINGED IN
/*
//sql gets [ID password currentlist] of the specified username
    $sql =<<<EOF
        SELECT COLUMNS FROM clients WHERE USERNAME=$username;
EOF;
     $ret = $db->exec($sql);
     if(!$ret)
       {
         echo "false";
       }
       else
       {
         echo "true";
       }

*/
//================================end check

/*
 $sql =<<<EOF
      INSERT INTO list (items,status)//can items be an array?
      VALUES ('$items', 'incomplete');//why incomplete?

EOF;

   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "items added\n";
   }
  //$roll=$db->query('SELECT ID from list WHERE items="$items"');
  $rollid = $db->lastInsertRowID();
  echo $rollid;
  $sql =<<<EOF
      UPDATE clients SET CURRENTLIST = $rollid WHERE USERNAME = 
"$username"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "clients updated\n";
   }

   $db->close();
*/

?>


</body>
</html>

