<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Login</title>

        <link href="<?php echo "./1140.css"?>" rel="stylesheet" type="text/css">
        <link href="<?php echo "./style.css"?>"  rel="stylesheet" type="text/css">

    </head>
    <body>
            <div class="container12">
               <header>
                    <div class = "row">
                        <div class= "column7" id="header-pic">
                            <a href= "" ><img src ="logo%20LettuceBuy.png"></a>
                        </div>
                        <div class = "column5">
                            <div class ="menu-nav">
                                <ul >
                                    <li><a href= "<?php echo "/Register/register-Client.php";?>"> Client  </a></li>
                                </ul>
                                <ul>
                                    <li><a href= "<?php echo "/Register/register-Driver.php";?>"> Driver</a></li>
                                </ul>
                                <p>Sign-up: </p>
                            </div>
                        </div>
                    </div>
                </header>
            </div>
        <div class="grey-background">
            <div class="container12">

                <h1 id="home">Login if you have an Account:</h1>

		<?php $stuff=$_GET["check"];echo $stuff;?>

                <div class="row">
                    <div class= "column3 empty">
                        <h1><font color="white"> to make the box central</font></h1>
                    </div>

		           <h5><font color="red"> 
			<?php 
				$flag=$_GET["flag"];
				$flag=(int)$flag;
				if($flag==1)echo "Sorry the username/password you entered were incorrect, try again <br>";
				elseif($flag==3)echo "You are registered, Login below";
			?></font></h5>

                     <div class="column6">   
                        <form action="./Login/login_clients.php" method="GET"> 
                            <div class="sign-in-container">
                                    <div class="column6">
                                        <p class="input-direction">Enter your Username:</p>
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="name_ID" placeholder="Username">
                                        </div>
                                        <p class="input-direction">Enter your Password:</p>
                                        <div class = "para-input">
                                            <input type="password" class="small-fld" name="password" placeholder="Password">
                                        </div>
                                    </div>  
                         </div>
                        
                            <div class= btn-container>
                                <input type="submit" class="large-btn large-magnify" value="Login">
                            </div>  
                           </form>    

                            <li class= "forgot-password"><a href="forgot-password.html">Forgot password?</a></li>
                    </div>
                </div>
            </div> 
        </div>

    </body>
</html>
