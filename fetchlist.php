<html>
<body>

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


        $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");


while ($entry = $returned_set->fetcharray()) {
    echo 'ID: ' . $entry['ID'] . '  items: ' . $entry['items'];
    echo '<html><br></html>';
}

$db->close();
?>

<form action="driver_fetch.php" method="get">
Name: <input type="text" name="name_ID"><br>
Password: <input type="text" name="password"><br>
ID <input type="text" name="listID"><br>
<input type="submit">
</form>





</body>
</html> 