<?php
  session_start();
?>
<!DOCTYPE   html>
<html>
    <head>
        <title>Client list  Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
              <li><a href = "<?php echo "Client_main_submitted.php";?>">Home</a></button><li>
            </ul>
            
            <ul id="menu2">
              <li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
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

	$uname=$_SESSION["name_ID"];
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

	<?php//delete button?>
	<form action="updatedelete.php" method="POST">
	<input type="hidden" name="flag" value="<?php $del=1;echo$del;?>"/>
	<input type="submit" value="Delete Your List"/>
	</form> 

    </body>
</html>
