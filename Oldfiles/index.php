<!DOCTYPE   html>
<html>
    <head>
        <title>LettuceBuy Home</title>
        <link rel = "stylesheet" type = "text/css" href="index_style.css"/>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
                <li><a href = "index.php">Home</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
        </div>
        <div class ="header1"> 
            <h1> Welcome to LettuceBuy</h1>
            <h4> The most convenient way to do grocery or make money in free time!</h4>
        </div>
        <div class = "signup">
	   <h4><font color="red">
	    <?php 
		$loggedout=$_GET["logout"];
		$loggedout=(int)$loggedout;
		if($loggedout==-1)echo "You are logged out, have a good day";
	    ?>
	   <h4></font>
            <h2> Log-in to LettuceBuy</h2>
	  
            <h5><font color="red"> 
		<?php 
			$flag=$_GET["flag"];
			$flag=(int)$flag;
			if($flag==1)echo "Sorry the username/password you entered were incorrect, try again";
		?></font></h5>
            <form action="./Login/login_clients.php" method="GET">
                Name: <input type="text" name="name_ID"><br>
                Password: <input type="password" name="password"><br>
                <input type="submit" value="Login" />
            </form>
        </div>
        <div class = "signup">
            <h3> Sign up for this great service!</h3>
            <a href="./Register/pageClient_register.php"><button>Sign up as Customer</button></a>
            <a href="./Register/pageDriver_register.php"><button>Sign up as Driver</button></a>
        </div>
    </body>
</html>
