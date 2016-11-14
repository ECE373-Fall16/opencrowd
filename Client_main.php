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
                <buttom><a href = "index.html">Log Out</a></buttom>
            </ul>
         </div>
            <?php  $uname=$_GET["name_ID"]; ?>
        <div class = "bodyformat">
            <h3> Welcome: <?php echo "$uname"; ?></h3> 
            <br>
            <br>
                <h4> Enter your order</h4> 
                <h6> items separate by a space</h6>
                <form action="newlist.php" method="get">
                    <input type="hidden" name="name_ID" value="$uname">
                    items <input type="text" name="items"><br>
                    <input type="submit">
                </form>
        </div>
    </body>
</html>
