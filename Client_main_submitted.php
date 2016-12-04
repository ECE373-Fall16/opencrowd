<html>
    <head>
        <title>Client list  Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
               	<form action="Client_main.php" method="GET">
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
	$update=$_GET["update"];

        $entry = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
	$entry = $entry->fetcharray();
	$data = $entry['CURRENTLIST'];
	$data = (int)$data;
    
    //new
    $returned_set = $db->query("SELECT * FROM list WHERE ID=$data;");
    $entry = $returned_set->fetcharray();
	$status = $entry['status'];
    echo "the status is $status <br>";
    
    if ($status == "completed"){
        ?>
        <font color='blue'><h2>Your groceries have arrived! Please confirm below: </font><br></h2>
        <form action="Client_main_done.php" method="GET">
        <input type="hidden" name="name_ID" value=<?php echo "$uname";?> >
        <input type="hidden" name="flag" value=1>
        <input type="submit" value="My groceries have arrived"/>
        </form>
        <?php
    }
    
    
    //end of new stuff
    
	$update=(int)$update;
	if($update==1)echo "Your list has been successfully updated<br>";
	elseif($update==2)echo "Your list has been fetched by a driver, please call them instead<br>";

	echo "Your list is available to all drivers<br>";
	echo "Your list ID is:$data<br>";
	echo "Here are the details of your list:-<br>";	
        $returned_set = $db->query("SELECT * FROM list WHERE ID=$data;");
        while ($entry = $returned_set->fetcharray()) {
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
        }
?>
	<h2>If you wish to enter more items, please enter your list once again</h2>
	<form action="updatedelete.php" method="GET">
	<input type="hidden" name="name_ID" value=<?php echo "$uname";?>>
	<input type="hidden" name="flag" value=0>
	More Items:<input type="text" name="items"><br>
	Change Address of Store:<input type="text" name="address"><br>
	<input type="submit" value="Update List">
	</form> 

	<form action="updatedelete.php" method="GET">
	<input type="hidden" name="name_ID" value=<?php echo "$uname";?>>
	<input type="hidden" name="flag" value=1>
	<input type="submit" value="Delete List">
	</form> 

        </h4> 
    </body>
</html>
