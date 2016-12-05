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
	       <form action="index.php" method="GET">
	       <input type"hidden" name="logout" value="<?php $log=-1;echo $log;?>" />
	       <input type="submit" value="Logout"/>
	       </form>
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
	$update=$_GET["update"]; //this flag gets information where it was redirected from
	$update=(int)$update;

	//obtaining list number of client
        $entry = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
	$entry = $entry->fetcharray();
	$data = $entry['CURRENTLIST'];
	$data = (int)$data;


	//checking if list has been fetched or not
	 $stat = $db->query("SELECT status FROM list WHERE ID=$data;");
	 $stat = $stat->fetcharray(); //getting the number of currentlist to be compared
	 $test = $stat['status'];
	 
	 $numcheck=strcmp($test,'fetched'); 
        	
	if($numcheck==0){ //if the list has been fetched
	   $update=2;
	}


	if($update==1)echo "Your list has been successfully updated<br>";
	elseif($update==2)echo "Your list has been fetched by a driver, please call them instead<br>";

	if($update==0 || $update==1){ //either coming from login or after updating list
		echo "Your list is available to all drivers<br>";
		echo "Your list ID is:$data<br>";
		echo "Here are the details of your list:-<br>";	
            	echo '<html><br></html>';
	}
	
        $returned_set = $db->query("SELECT * FROM list WHERE ID=$data;");
        while ($entry = $returned_set->fetcharray()) {
	    echo 'Items: ' . $entry['items'];
            echo '<html><br></html>';
	    echo 'Address of Store: ' . $entry['address'];
            echo '<html><br></html>';
        }
	
	if($update==2){//list has been fetched, display driver info
		$getinfo = $db->query("SELECT * FROM drivers WHERE CURRENTLIST=$data;"); //picking driver that has same ID
 		while ($info = $getinfo->fetcharray()){
            	 echo '<html><br></html>';
		 echo 'Name: ' . $info['USERNAME'];
            	 echo '<html><br></html>';
		 echo 'Phone Number: ' . $info['PHONE'];
            	 echo '<html><br></html>';
	 	 echo 'Address: ' . $info['ADDRESS'];
              	 echo '<html><br></html>';
		}
	}

?>

        </h4> 
	<h2>If you wish to enter more items, please enter your list once again</h2>
	<form action="updatedelete.php" method="GET">
	<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/><br>
	<input type="hidden" name="flag" value="<?php $up=0;echo$up;?>"/><br>
	More Items:<input type="text" name="items"><br>
	Change Address of Store:<input type="text" name="address"><br>
	<input type="submit" value="Update Your List"/>
	</form> 

	<?php//delete button?>
	<form action="updatedelete.php" method="GET">
	<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
	<input type="hidden" name="flag" value="<?php $del=1;echo$del;?>"/>
	<input type="submit" value="Delete Your List"/>
	</form> 

    </body>
</html>
