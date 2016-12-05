<html>
    <head>
        <title>Driver Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
               	<form action="Driver_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php $uname=$_GET["name_ID"]; echo "$uname";?>"/>
		<input type="submit" value="Home"/>
		</form>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
               <button><a href = "index.html">Log Out</a></button>
            </ul> 
        </div>
        <h4>
	<?php
	       class MyDB extends SQLite3
     	 	 {
       		   function __construct()
     	 	    {
       		      $this->open('databases/lettucebuy.db');
       		   }
      		 }
    	   $db = new MyDB();

	$uname=$_GET["name_ID"];
       // $returned_num = $db->query("SELECT * FROM drivers WHERE USERNAME='$uname';");
        $entry = $db->query("SELECT CURRENTLIST FROM drivers WHERE USERNAME='$uname';");
	$entry = $entry->fetcharray();
	$data = $entry['CURRENTLIST'];
	$data = (int)$data;

	echo "You selected list with ID:$data<br>";
	echo "Here are the details:-<br>";	
        $returned_set = $db->query("SELECT * FROM list WHERE ID=$data AND status='fetched';");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID']; 
            echo '<html><br></html>';
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
        }

	echo "Client info:<br>";
	$returned_set = $db->query("SELECT * FROM clients WHERE CURRENTLIST=$data;");
        while ($entry = $returned_set->fetcharray()) {
	    echo 'Name: ' . $entry['USERNAME'];
            echo '<html><br></html>';
	    echo 'Address: ' . $entry['ADDRESS'];
            echo '<html><br></html>';
	    echo 'Phone Number: ' . $entry['PHONE'];
            echo '<html><br></html>';
        }

       ?>
        </h4> 
    </body>
</html>
