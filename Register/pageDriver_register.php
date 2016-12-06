<!DOCTYPE  html>
<html>
    <head>
        <?php $newflag=$_GET["flag"]; 
		$uname=$_GET["name_ID"];
		$newflag=(int)$newflag;
		if ($newflag==2){//means updating
		?>
		    <title>Updating Information Of Driver</title>
		  <?php  
		}else{
		    ?>
		    <title>New Driver Sign up</title>
		    <?php
		}
		?>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
        <link rel = "stylesheet" type = "text/css" href="input_style.css"/>  
    </head>
    
    <body>
        <div class= "nav">
            <ul id="menu1">
                <li><a href = "../index.php">Home</a></li>
                <li><a href = "../about.html">About</a></li>
                <li><a href = "../contact.php">Contact</a></li>
            </ul>
            
            <ul id="menu2">
                <li><a href = "../index.php">Go Back</a></li>
            </ul>
        </div>
        <div class = "bodyformat">
            <?php
        if ($newflag==2){//means updating
		      ?>
                <h2> Update Your Information</h2>
		      <?php  
		}else{
		    ?>
                <h2> Sign up as Driver</h2>
		    <?php
		}
		?>    
	    <h2> <?php 
		if($newflag==1)echo "Sorry username:'$uname' has been taken, Please try another one" ?> </h2>
		
		<?php		
        if($newflag==2){//updating
            ?>

            <form action="updateInfo.php" method="GET">
                <input type="hidden" name="oldName_ID" value="<?php echo $uname;?>">
                Name: <input type="text" name="name_ID"><br>
                Password: <input type="password" name="password"><br>
                Phone Number: <input type="text" name="phone"><br>
                Address: <input type="text" name="address"><br>
                <input type="submit" value="Update">
            </form>
        <?php
        }else{
            ?>
            ?>
            <form action="driver_register.php" method="POST">
                Name: <input type="text" name="name_ID"><br>
                Password: <input type="password" name="password"><br>
                Phone Number: <input type="text" name="phone"><br>
                Address: <input type="text" name="address"><br>
                <input type="submit" value="Sign Up">
            </form>
            <?php
            
        }	?>	
            
        </div>
    </body>
</html> 


