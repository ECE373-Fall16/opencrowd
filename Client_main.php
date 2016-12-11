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
		   echo "Welcome to LettuceBuy " . $_SESSION["name_ID"] . "!<br>";
		   echo "Today is: " . date("d") ." " . date("M") . ", " . date("Y") . "<br>";
        	?></h3> 
        <div class= "nav">
            <ul id="menu1">
              <li><a href = "<?php echo "Client_main.php";?>">Home</a></button><li>
            </ul>
            
	    <ul id="menu2">
              <li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
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
<form action="./newlist.php" method="POST">
Items <input type="text" name="items"><br>
Address of Store <input type="text" name="address"><br>
<input type="submit" value="Submit List"/>
</form>

        </div>
    </body>
</html>
