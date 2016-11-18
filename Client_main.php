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
		   echo "Welcome to LettuceBuy $uname!";
	?></h3> 
        <div class= "nav">
            <ul id="menu1">
		<form action="Client_main.php" method="GET">
		<input type="hidden" name="name_ID" value="<?php echo "$uname";?>"/>
		<input type="submit" value="Home"/>
		</form>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
               <li><a href = "index.html">Log Out</a></li>
            </ul>
         </div>
        <div class = "bodyformat">
           <br>
<br>
<h3> Submit a new list</h3> 
<form action="./newlist.php" method="POST">
<input type="hidden" name="name_ID" value="$uname">
Items <input type="text" name="items"><br>
Address of Store <input type="text" name="address"><br>
<input type="submit" value="Submit List">
</form>
 
        
        </div>
    </body>
</html>
