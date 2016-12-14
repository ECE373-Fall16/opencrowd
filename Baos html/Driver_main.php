<?php
  session_start();
?>
<!DOCTYPE   html>

<html>
    <head>
        <title>Driver Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>

    <meta http-equiv="refresh" content="5"></head>
    
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
       $uname=$_SESSION["name_ID"];
       $firstname=$_SESSION["firstname"];
       $lastname=$_SESSION["lastname"];
    ?>
	
        <div class= "nav">
            <ul id="menu1">
              <li><a href = "<?php echo "Driver_main.php";?>">Home</a></button><li>
              <li><a href = "<?php echo "/Regiser/register-Driver.php?update=2";?>">Update Profile</a></button><li>
            </ul>
            
            <ul id="menu2">
              <li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
            </ul> 
        </div>
        <div class = "bodyformat">
            <h3> Welcome to LettuceBuy <?php echo "$firstname $lastname";?>! </h3> <br/>
        
        <h4>
	<?php
	$newflag=$_GET["flag"];
	$newflag=(int)$newflag;
	if($newflag==1)echo "Sorry invalid ID<br>";
	echo "Please select an ID of available list from below:<br>";
        $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID']; 
	    $ID =  $entry['ID']; 
            echo '<html><br></html>';
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
	    $addressCqu = $db->query("SELECT street FROM clients WHERE CURRENTLIST=$ID");
	    $street = $addressCqu->fetcharray();
	    $addressCqu = $db->query("SELECT city FROM clients WHERE CURRENTLIST=$ID");
	    $city = $addressCqu->fetcharray();
	    $addressCqu = $db->query("SELECT state FROM clients WHERE CURRENTLIST=$ID");
	    $state = $addressCqu->fetcharray();
	    echo 'Address for delivery:' . $street["street"] . ',' . $city["city"] . ',' . $state["state"];
            echo '<html><br></html>';
	    

        }

        ?>
        </h4> 
        <form action="driver_fetch.php" method="POST">
        ID <input type="text" name="listID"><br>
        <input type="submit" value="Pick List">
        </form>
        
        </div>
    </body>
</html>
