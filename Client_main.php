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
                <buttom><a href = "index.html">Log Out</a></buttom>
           </div>
            </ul> 
            <!some how we need to add the the function that click on log out will actually log out of the system not only go to the index page>
            <?php  $uname=$_GET["name_ID"]; ?>
        <div>
            <h3> Welcome: <?php echo "$uname"; ?></h3> 
            <html>
<br>
<br>
<h3> Submit new List</h3> 
<form action="newlist.php" method="get">
<input type="hidden" name="name_ID" value="$uname">
items <input type="text" name="items"><br>
<input type="submit">
</form>
 
        
        </div>
    </body>
</html>