<!DOCTYPE   html>
<html>
    <head>
        <title>Customer Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    <body>
	 <h3>
		<?php 
              	   $uname=$_GET["name_ID"];
		   $newflag=$_GET["flag"];
		   $check = $_GET["check"];
                   echo "$check<br>";
		   echo "Welcome to LettuceBuy $uname!";
        	?></h3> 
        <div class= "nav">
            <ul id="menu1">
		<form action="Client_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="hidden" name="flag" value="<?php echo "$newflag";?>"/>
		<input type="submit" value="Home"/>
		</form>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
	    <ul id="menu2">
              <li><a href = "index.html">Log Out</a></button><li>
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
	?>
	
</h3> 
<form action="./newlist.php" method="GET">
<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
Items <input type="text" name="items"><br>
Address of Store <input type="text" name="address"><br>
<input type="submit" value="Submit List"/>
</form>
 
        
        </div>
    </body>
</html>
