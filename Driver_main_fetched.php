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
	echo "Here are the details:<br>";	
        $returned_set = $db->query("SELECT * FROM list WHERE ID=$data;");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID']; 
            echo '<html><br></html>';
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
        }
    ##### --------------New stuff from victors edit ----------------------
    
	echo '<form action="Driver_main.php" method="GET">';
    echo'           		<input type="submit" value="I am done with the delivery"/></input>';
    echo '</form>';'
    
    #echo '<input type="submit" value="I am done with the delivery"/></input>'; 
    
    
    #need to work on setting up database after done
    $returned_set = $db->querySingle("SELECT COUNT(*) FROM list WHERE ID=$entry['ID'];");

	if($returned_set==0){//checking if we did not found ID in list
		$db->close();
		header ("Location: Driver_main.php?flag=1&name_ID=$uname"); //if wrong ID then go back to main
	}

  else{
$sql =<<<EOF
  UPDATE drivers SET CURRENTLIST = $listnum WHERE USERNAME = "$uname"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } 

   $sql =<<<EOF
      UPDATE list SET status = 'fetched' WHERE ID = "$listnum"
EOF;
   $ret = $db->exec($sql);
   if(!$ret){
      echo $db->lastErrorMsg();
   } else {
  	$db->close();
 	 header("Location: Driver_main_fetched.php?name_ID=$uname");
   }
}



?>

       ?>
        </h4> 

    </body>
</html>
         
       
