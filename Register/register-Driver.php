<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Register as Driver</title>

        <link href="<?php echo "../1140.css"?>" rel="stylesheet" type="text/css">
        <link href="<?php echo "../style.css"?>"  rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container12">
           <header>
                <div class = "row">
                    <div class= "column7" id="header-pic">
                        <a href= "" ><img src ="logo%20LettuceBuy.png"></a>
                    </div>
                    <div class = "column5">
                    </div>
                </div>
            </header>
            <h1 id="home">Create your LettuceBuy Account as Driver</h1>
            <div class="row">
                <div class="column5" id="register-pic">
                     <a href= "" ><img src ="groceries2.jpg"></a> 
                </div>
                <div class="column7">
                    <div class="signup-container">

			<font color="red">
				<?php $flag=$_GET["flag"];
			        if($flag==3)echo "Please fill out all of the fields below";
			        echo "<br>";
				?>
			</font>

                        <form action="driver_register.php" method="POST">
                            
                            <p class="input-direction">Name</p>
                                <div class="row">
                                    <div class="column3">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="firstname"  placeholder="First name...">
                                        </div>
                                    </div>
                                    <div class="column3">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="lastname"  placeholder="Last name...">
                                        </div>
                                     </div>        
                            </div>
                            <p class="input-direction">Choose your username</p>
			   <h5><font color="red">
				<?php $flag=$_GET["flag"];
				      $flag=(int)$flag;
				      
				      if($flag==2){	
				        $uname=$_GET["name_ID"];
					echo "Sorry '$uname' has been taken, try another one";
				      }
				?>
			   </h5></font>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="name_ID"  placeholder="">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div>
                             <p class="input-direction">Create your password</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="password" class="small-fld" name="password"  placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 

				<h4><font color="red">
 				<?php $flag=$_GET["flag"];
				      $flag=(int)$flag;
				      
				      if($flag==1){	
					echo "Both passwords did not match";
				      }
				?>                         
			        </div> 
				</h4></font>

                             <p class="input-direction">Confirm your password</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="password" class="small-fld" name="confirm"  placeholder="Confirm Password">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                             <p class="input-direction">Mobile phone</p>
                                <div class="row">
                                    <div class="column6">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="phone"  placeholder="eg. XXX-XXX-XXXX">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                             <p class="input-direction">Home Address</p>
                                <div class="row">
                                    <div class="column4">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="street"  placeholder="Street">
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <div class = "para-input">
                                            <input type="text" class="small-fld" name="city"  placeholder="City">
                                        </div>
                                    </div>
                                    <div class="column2">
                                        <div class = "para-input">
                                            <select name="state" class="small-fld">
                                            <option value="AL">Alabama</option>
                                            <option value="AK">Alaska</option>
                                            <option value="AZ">Arizona</option>
                                            <option value="AR">Arkansas</option>
                                            <option value="CA">California</option>
                                            <option value="CO">Colorado</option>
                                            <option value="CT">Connecticut</option>
                                            <option value="DE">Delaware</option>
                                            <option value="DC">District of Columbia</option>
                                            <option value="FL">Florida</option>
                                            <option value="GA">Georgia</option>
                                            <option value="HI">Hawaii</option>
                                            <option value="ID">Idaho</option>
                                            <option value="IL">Illinois</option>
                                            <option value="IN">Indiana</option>
                                            <option value="IA">Iowa</option>
                                            <option value="KS">Kansas</option>
                                            <option value="KY">Kentucky</option>
                                            <option value="LA">Louisiana</option>
                                            <option value="ME">Maine</option>
                                            <option value="MD">Maryland</option>
                                            <option value="MA">Massachusetts</option>
                                            <option value="MI">Michigan</option>
                                            <option value="MN">Minnesota</option>
                                            <option value="MS">Mississippi</option>
                                            <option value="MO">Missouri</option>
                                            <option value="MT">Montana</option>
                                            <option value="NE">Nebraska</option>
                                            <option value="NV">Nevada</option>
                                            <option value="NH">New Hampshire</option>
                                            <option value="NJ">New Jersey</option>
                                            <option value="NM">New Mexico</option>
                                            <option value="NY">New York</option>
                                            <option value="NC">North Carolina</option>
                                            <option value="ND">North Dakota</option>
                                            <option value="OH">Ohio</option>
                                            <option value="OK">Oklahoma</option>
                                            <option value="OR">Oregon</option>
                                            <option value="PA">Pennsylvania</option>
                                            <option value="RI">Rhode Island</option>
                                            <option value="SC">South Carolina</option>
                                            <option value="SD">South Dakota</option>
                                            <option value="TN">Tennessee</option>
                                            <option value="TX">Texas</option>
                                            <option value="UT">Utah</option>
                                            <option value="VT">Vermont</option>
                                            <option value="VA">Virginia</option>
                                            <option value="WA">Washington</option>
                                            <option value="WV">West Virginia</option>
                                            <option value="WI">Wisconsin</option>
                                            <option value="WY">Wyoming</option>
                                        </select>
                                        </div>
                                    </div>
                                </div> 
                              <p class="input-direction">Select Your Security Questions:</p> 
                                <div class = "para-input">
                                    <select  name="quesion" class="small-fld">
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
                                           <input type="text" class="small-fld" name="answer"  placeholder="Your Answer...">
                                        </div>
                                    </div>
                                    <div class="column1">
                                    </div>        
                                </div> 
                            <div class="btn-container">
                                <input type="submit" class="large-btn large-magnify" value="Create Your Account">
                            </div>
                            
                        </form>
                    </div>
                </div>
               
            </div>
        </div> 


    </body>
</html>
