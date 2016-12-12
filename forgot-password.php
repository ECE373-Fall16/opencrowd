<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>forgot pasword customer</title>

        <link href="1140.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container12">
           <header>
                <div class = "row">
                    <div class= "column7" id="header-pic">
                        <a><img src ="logo%20LettuceBuy.png"></a>
                    </div>
                    <div class = "column5">
                    </div>
                </div>
            </header>
            
            <h1 id="home">Forgot your password?</h1>
            <div class="row">
                <div class="column5" id="register-pic">
                     <a><img src ="groceries1.jpg"></a> 
                </div>
                <div class="column7">
<?php 
	$flag=$_GET["flag"];
	$flag=(int)$flag;
	if($flag==0){//will be 0 when you first enter forgot --> to verify uname
		if(isset($_GET["error"])){
		   $message=$_GET["error"];?>

		<h3><font color="red">
		  <?php echo "$message <br>";}?>
		</font></h3>

                    <form action="./Login/login_clients.php" method="POST">
                        <div class="signup-container">
			    <input type"hidden" name="flag" value=<?php echo "$flag";?>>
                            <p class="input-direction">Verify your Username</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="name_ID"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                <input type="submit" class="large-btn large-magnify" value="Submit">
                                </div> 
			</form>
<?php 	} elseif ($flag==1){
	
	if(isset($_GET["error"])){
		   $message=$_GET["error"];?>

		<h3><font color="red">
		  <?php echo "$message <br>";}?>
		</font></h3>
  
			<form action="forgotpw.php" method="POST">
                             <p class="input-direction">New password</p>

                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="password" class="small-fld" name="password"  placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                             <p class="input-direction">Confirm new password</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="password" class="small-fld" name="confirm"  placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                             <p class="input-direction">Mobile phone</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                           <input type="text" class="small-fld" name="phone"  placeholder="XXX-XXX-XXXX">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 

                            <p class="input-direction">Select Your Security Questions:</p> 
                                <div class = "para-input">
                                    <select  name="question" class="small-fld">
                                    <option value="0">Select a question from the following options.</option>
                                    <option value="1">Who's your daddy?</option>
                                    <option value="2">What is your favorite color?</option>
                                    <option value="3">What is your mother's favorite aunt's favorite color?</option>
                                    <option value="4">Where does the rain in Spain mainly fall?</option>
                                    <option value="5">If Mary had three apples, would you steal them?</option>
                                    <option value="6">What brand of food did your first pet eat?</option>
                                    </select>
                                </div>
                            <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="answer"  placeholder="Your Answer">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                            <div class="btn-container">
                                <input type="submit" class="small-btn small-magnify" value="Submit">
                            </div>
                        </div>
                    </form>
		<?php }?>
                </div>
               
            </div>
        </div> 


    </body>
</html>
