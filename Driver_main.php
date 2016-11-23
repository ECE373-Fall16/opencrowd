
<html>
    <head>
        <title>Driver Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
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
    ?>
        <div class= "nav">
            <ul id="menu1">
               	<form action="Driver_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="submit" value="Home"/>
		</form>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
              <li><a href = "index.html">Log Out</a></button><li>
            </ul> 
        </div>
        <?php  $uname=$_GET["name_ID"]; ?>
        <div class = "bodyformat">
            <h3> Welcome to LettuceBuy <?php echo "$uname";?>! </h3> <br/>
        
        <h4><?php
	$newflag=$_GET["flag"];
//	$newflag=(int)$newflag;
	if($newflag==1)echo "Sorry invalid ID<br>";
	echo "Please select an ID of available list from below:<br>";
        $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID']; 
            echo '<html><br></html>';
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
            echo '<html><br></html>';
        }
        ?>
        </h4> 
        <form action="driver_fetch.php" method="GET">
        <input type="hidden" name="name_ID" value="<?php echo $uname;?>">
        ID <input type="text" name="listID"><br>
        <input type="submit" value="Pick List">
        </form>
        
        </div>
    </body>
</html>
