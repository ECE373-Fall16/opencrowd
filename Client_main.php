<?php
  session_start();
?>
<!DOCTYPE   html>
<html>
    <head>
        <title>Customer Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    <body>
	 <h3>
		<?php 
              	  // $uname=$_GET["name_ID"];
		   $newflag=$_GET["flag"];
		  $uname = $_SESSION["name_ID"]; //save username
		   echo "Welcome to LettuceBuy " . $_SESSION["name_ID"] . "!";
        	?></h3> 
        <div class= "nav">
            <ul id="menu1">
		<form action="Client_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="hidden" name="flag" value="<?php echo "$newflag";?>"/>
		<input type="submit" value="Home"/>
		</form>
		<form action="./Register/register-Client.php" method="POST">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="hidden" name="flag" value=2>
		<input type="submit" value="Update Information"/>
		</form>
            </ul>
            
	    <ul id="menu2">
              <li><a href = "<?php echo"index.php";?>">Log Out</a></button><li>
            </ul> 

         </div>
        <div class = "bodyformat">
           <br>
<br>
<h3> <?php
	$newflag=$_GET["flag"];
	$newflag=(int)$newflag;

	if($newflag==0){echo "Submit a new list";}
	elseif($newflag==1){ echo "You already have an active list! <br>";
	      echo "please delete or update it <br>";}
	elseif($newflag==3)echo "Your list has been deleted, feel free to submit a new one<br>";
	?>
	
</h3> 
<form action="./newlist.php" method="GET">
<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
Items <input type="text" name="items"><br>
Address of Store <input type="text" name="address"><br>
<input type="submit" value="Submit List"/>
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
   $returned_set = $db->query("SELECT * FROM clients WHERE USERNAME='$uname';");
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
