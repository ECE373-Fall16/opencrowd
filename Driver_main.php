<?php
  session_start();
?>
<!DOCTYPE   html>

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
       $uname=$_SESSION["name_ID"];
    ?>
	
        <div class= "nav">
            <ul id="menu1">
               	<form action="Driver_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="submit" value="Home"/>
		</form>
		<form action="./Register/register-Driver.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="hidden" name="flag" value=2>
		<input type="submit" value="Update Information"/>
		</form>
            </ul>
            
            <ul id="menu2">
              <li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
            </ul> 
        </div>
        <div class = "bodyformat">
            <h3> Welcome to LettuceBuy <?php echo "$uname";?>! </h3> <br/>
        
        <h4>
	<?php
	$newflag=(int)$newflag;
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
        <input type="hidden" name="name_ID" value="<?php echo "$uname";?>">
        ID <input type="text" name="listID"><br>
        <input type="submit" value="Pick List">
        </form>
        
        
        
DISPLAYING INFORMATION </br>
<?php
class MyDB extends SQLite3
   {
	function __construct()
	{
	  $this->open('./databases/lettucebuy.db');//opened my database
	}
   }
	
   $db = new MyDB();
   if(!$db){ //checking if doesn't exist
	echo $db->lastErrorMsg();
   } else {
	echo "Opened database for login check for clients!!!<br>";
   }
   $returned_set = $db->query("SELECT * FROM drivers WHERE USERNAME='$uname';");
   $entry = $returned_set->fetcharray();
       $firstname = $entry['FIRSTNAME'];
       $lastname = $entry['LASTNAME'];
	   $username = $entry['USERNAME'];
	   $pass = $entry['PASSWORD'];
	   $street = $entry['STREET'];
	   $city = $entry['CITY'];
	   $state = $entry['STATE'];
	   $phone = $entry['PHONE'];
	   $question = $entry['QUESTION'];
	   $ans = $entry['SECURE'];
	   
	   //echo "The old username is: $olduname <br>";
	   echo "The firstname is: $firstname <br>";
	   echo "The lastname is: $lastname <br>";
	   echo "The username is: $username <br>";
	   echo "The password is: $pass <br>";
	   echo "The street is: $street <br>";
	   echo "The city is: $city <br>";
	   echo "The state is: $state <br>";
	   echo "The phone is: $phone <br>";
	   echo "The question is: $question <br>";
	   echo "The ans is: $ans <br>";
	   
	   //FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE
?>
        
        </div>
    </body>
</html>
