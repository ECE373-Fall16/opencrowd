<?php
  session_start();
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LettuceBuy.com</title>

        <link href="1140.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
            <div class="container12">
               <header>
                    <div class = "row">
                        <div class= "column7" id="header-pic">
                            <a href= "" ><img src ="logo%20LettuceBuy.png"></a>
                        </div>
                        <div class = "column5">
                            <ul>
                                <li><a href=<?php echo"/Login-page.php"?>>Login Here</a></li>
                            </ul>
                        </div>
                    </div>
                </header>
            </div>
        <div class="grey-background">
            <div class="container12">
                <h1 id="home">New future of grocery shopping</h1>
                <div class="row">
                    <div class="column6">
			   <h4><font color="red">

			    <?php 
				$loggedout=$_GET["logout"];
				$loggedout=(int)$loggedout;
				if($loggedout==-1){
					session_unset();
					session_destroy();
					echo "You are logged out, have a good day";
				}
			    ?>

	        	   <h4></font>
                        <div class="barter-container">
                            <p class="ad-txt">Don't want to waste your time on grocery shopping!</p>
                        </div>
                        <div class= btn-container>
                            <form action="/Register/register-Client.php">
                                <input type="submit" class="large-btn large-magnify" value="Sign-up free as Customer">
                            </form>
                        </div>  

                    </div>
                    <div class="column6">
                        <div class="barter-container">
                            <p class="ad-txt">Want to earn money on spare time by doing everyday grocery shoping</p>
                        </div>
                        <div class="btn-container">
                            <form action="/Register/register-Driver.php">
                                <input type="submit" class="large-btn large-magnify" value="Sign-up free as Driver">
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

    </body>
</html>
