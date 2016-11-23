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
               <button><a href = "index.html">Log Out</a></button>
            </ul> 
        </div>
        <div class = "bodyformat">
        
        <h4>
	<?php
	$uname=$_POST("name_ID");
        $returned_num = $db->query("SELECT CURRENTLIST FROM drivers WHERE USERNAME='$uname';");
//	$returned_num = (int) $returned_set;
	
        $returned_set = $db->query("SELECT * FROM list WHERE ID=$returned_num;");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID']; 
            echo '<html><br></html>';
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
        }
       ?>
        </h4> 
        </div>
    </body>
</html>
