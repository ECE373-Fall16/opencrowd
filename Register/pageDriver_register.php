<!DOCTYPE  html>
<html>
    <head>
        <title>New Driver Sign up</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
        <link rel = "stylesheet" type = "text/css" href="input_style.css"/>
        
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
                <li><a href = "../index.html">Home</a></li>
                <li><a href = "../about.html">About</a></li>
                <li><a href = "../contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
                <li><a href = "../index.html">Go Back</a></li>
            </ul>
        </div>
        <div class = "bodyformat">
            <h2> Sign up as Driver</h2>
	    <h2> <?php $newflag=$_GET["flag"]; 
		$uname=$_GET["name_ID"];
		$newflag=(int)$newflag;
		if($newflag==1)echo "Sorry username:'$uname' has been taken, Please try another one" ?> </h2>

            <form action="driver_register.php" method="POST">
                Name: <input type="text" name="name_ID"><br>
                Password: <input type="password" name="password"><br>
                Phone Number: <input type="text" name="phone"><br>
                <input type="submit" value="Sign Up">
            </form>
        </div>
    </body>
</html> 


