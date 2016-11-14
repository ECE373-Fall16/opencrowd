
<html>
    <head>
        <title>Driver Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
        <link rel = "stylesheet" type = "text/css" href="input_style.css"/>
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
                <li><a href = "Driver_main.php">Home</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
               <button><a href = "index.html">Log Out</a></button>
            </ul> 
        </div>
        <?php  $uname=$_GET["name_ID"]; ?>
        <div class = "bodyformat">
            <h3> Welcome: <?php echo "$uname"; ?></h3> <br/>
        
<<<<<<< HEAD
        <h4><?php
	echo "Please select an ID from below:<br>";
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
        <form action="driver_fetch.php" method="POST">
        <input type="hidden" name="name_ID" value="$uname">
        ID <input type="text" name="listID"><br>
        <input type="submit" value="Pick List">
        </form>
=======
            <h3><?php
            $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
            while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID'] . '  items: ' . $entry['items'];
            echo '<html><br></html>';
            }
            ?>
            </h3> 
            <h2>Enter the ID of the order </h2>
            <form action="driver_fetch.php" method="get">
                <input type="hidden" name="name_ID" value="$uname">
                ID <input type="text" name="listID"><br>
                <input type="submit">
            </form>
>>>>>>> 37de12c6df6eb175172d8123dab99b3c02c4ca18
        
        </div>
    </body>
</html>
