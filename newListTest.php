<html>
<body>

<?php
//running create_all.php to create databases
   //exec('php databases/create_all.php') ; //didnt work


   class MyDB extends SQLite3
   {
      function __construct()
      {
         
         $this->open('databases/lettucebuy.db');
      }
   }
  
//=============================================================================================

   $db = new MyDB();
  
  
  //hardcoding a new list into $db to test database / otherwise lettucebuy.db will be empty
  $sql =<<<EOF
      CREATE TABLE clients
      (ID  INTEGER PRIMARY KEY        AUTOINCREMENT,
      USERNAME            TEXT     NOT NULL,
      PASSWORD            TEXT     NOT NULL,
      CURRENTLIST  INTEGER
      );
EOF;
$ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "Table created successfully<br>";
   }
   
//====================================================================================
//add list to db
$username=$_GET["name_ID"];
$pass=$_GET["password"];
$items=$_GET["items"]; //simplistic way; items separated by a comma

//check
echo"\n";
echo "The user name is " . $username." and the items are ".$items."<br>"; 



//----------------------------------- Creating user info to test code
 $sql =<<<EOF
      INSERT INTO clients (USERNAME,PASSWORD,CURRENTLIST)
      VALUES ("$username", "$pass", "$items");
EOF;

//================================check exist DONT THINK IS NEEDED HERE 
//SINCE PERSON IS ALREADY SINGED IN
/*
//sql gets [ID password currentlist] of the specified username
    $sql =<<<EOF
        SELECT COLUMNS FROM clients WHERE USERNAME=$username;
EOF;
     $ret = $db->exec($sql);
     if(!$ret)
       {
         echo "exist: false\n";
       }
       else
       {
         echo "exist: true\n";
       }

*/
//================================end check
   //printing sql
   /*
   $result = $sql->query('SELECT * FROM clients') ;
    while ($row = $result->fetchArray())
    {
        //var_dump($row);
        echo "User: {$row['USERNAME']}\nPasswd: {$row['PASSWORD']}\nItems: {$row['LIST']}";
    }*/
     $ret = $db->query('SELECT * FROM clients');
     while($row = $ret->fetchArray(SQLITE3_ASSOC) )   {
        //var_dump($row);
        //echo "User: {$row['USERNAME']}\nPasswd: {$row['PASSWORD']}\nItems: {$row['LIST']}";
        echo "USERNAME = ". $row['USERNAME'] . "<br>";
        echo "PASSWORD = ". $row['PASSWORD'] . "<br>";
        echo "CURRENTLIST = ". $row['CURRENTLIST'] . "<br>";
        //echo "LIST = ". $row['LIST'] . "<br>";
        
    }
  //--------------------------------------------------- 
   
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
      echo "user added successfully <br>";
   }
   $db->close();
   
 //--------------------------------------
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

