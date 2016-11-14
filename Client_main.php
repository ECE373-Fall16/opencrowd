<!DOCTYPE   html>
<html>
    <head>
        <title>Customer Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
                <li><a href = "Client_main.php">Home</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
                <button><a href = "index.html">Log Out</a></button>
            </ul>
         </div>
            <!some how we need to add the the function that click on log out will actually log out of the system not only go to the index page>
            <?php  $uname=$_GET["name_ID"]; ?>
        <div class = "bodyformat">
            <h3> Welcome: <?php echo "$uname"; ?></h3> 
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
