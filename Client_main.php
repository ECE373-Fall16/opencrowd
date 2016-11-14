<!DOCTYPE   html>
<html>
    <head>
        <title>Customer Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
        <link rel = "stylesheet" type = "text/css" href="input_style.css"/>
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
            <?php  $uname=$_GET["name_ID"]; ?>
        <div class = "bodyformat">
            <h3> Welcome: <?php echo "$uname"; ?></h3> 
<<<<<<< HEAD
<br>
<br>
<h3> Submit a new list</h3> 
<form action="./newlist.php" method="POST">
<input type="hidden" name="name_ID" value="$uname">
Items <input type="text" name="items"><br>
Address of Store <input type="text" name="address"><br>
<input type="submit" value="Submit List">
</form>
 
        
=======
            <br>
            <br>
                <h2> Enter your order</h2> 
                <h6> items separate by a space</h6>
                <form action="newlist.php" method="get">
                    <input type="hidden" name="name_ID" value="$uname">
                    items <input type="text" name="items"><br>
                    <input type="submit">
                </form>
>>>>>>> 37de12c6df6eb175172d8123dab99b3c02c4ca18
        </div>
    </body>
</html>
