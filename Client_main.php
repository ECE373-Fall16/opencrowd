<!DOCTYPE  html>


<?php //flag=1-->quantity was negative
      //flag=2-->item did not exist in the cart to begin with
      //flag=3-->same item was added
      //flag=4-->Delete items 
      //flag=5-->empty list entered
      //flag=6 --> client has pressed confirmed  and items arrived
      //flag=7 --> client has deleted his/her list

	session_start();
       $uname=$_SESSION['name_ID'];
       $firstname=$_SESSION["firstname"];
       $lastname=$_SESSION["lastname"];
	?>

<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>LettuceBuy.com</title>
        <script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.css">
        <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.6/semantic.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/semantic-ui/2.2.6/components/dropdown.min.css">
        <script src="https://cdn.jsdelivr.net/semantic-ui/2.2.6/components/dropdown.min.js"></script>
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

              		<li><a href = "<?php echo "Client_main.php";?>">Home</a></button><li>
              		<li><a href = "<?php echo "/Register/register-Client.php?update=2";?>">Update Profile</a></button><li>
            		<li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
                        </div>
                    </div>
                </header>
         

            <h3> Welcome to LettuceBuy <?php echo "$firstname $lastname";?>! </h3> <br/>
	    <!-- <h3> Please enter an item by using the drop down list </h3><br/> -->
	<?php
	class MyDB extends SQLite3
	   {
		function __construct()
		{
	 	 $this->open('./databases/lettucebuy.db');//opened my database
		}
	   }
	
   	$db = new MyDB();
	   if(!$db){ //checking if doesn't exist
		echo $db->lastErrorMsg();
	   } else {
		//echo "Opened database for login check for clients!!!<br>";
	   }

	    $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
 	    $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
            $check = $listnum['CURRENTLIST'];
	    $check = (int)$check; //have int form of current list


	   $returned_set = $db->query("SELECT * FROM list WHERE ID='$check';");
	   $entry = $returned_set->fetcharray();
	   $addres = $entry['ADDRESS'];
	   //echo "The store address is : $check";
		//----------------------------------------------------------------

	?>
        <div class="grey-background">
            <div class="container12">
                <h1 id="home">New future of grocery</h1>
                <div class="row">
                    <div class="column6">
			<?php 
			$flag=$_GET["flag"];
			$flag=(int)$flag;
			if ($flag==1){
			?>
				<p class=""><font color="red">Please select an item or choose a valid quantity</font></p>
			<?php
			 }elseif($flag==2){
			?>
				<p class=""><font color="red">The item was not found in the cart</font></p>
			<?php
			}elseif($flag==3){
			?>
				<p class=""><font color="red">The item already exists in your current list, please delete and update again</font></p>
			<?php
			}elseif($flag==4){
			?>
				<p class=""><font color="red">The item has been deleted from your cart</font></p>
			<?php
			}elseif($flag==5){ //empty list was entered
                        ?>
                                <p class=""><font color="red">The item list was empty!</font></p>
                        <?php
                        }elseif($flag==6){ //empty list was entered
                        ?>
                                <p class=""><font color="green">Thank you for using our service!</font></p>
                        <?php
                        }elseif($flag==7){
			?>
                                <p class=""><font color="red">Your list has been deleted, feel free to add a new one</font></p>
			<?php
			}
			?>

                        <h3>Make a new order or update your current one</h3>

			<form action="addupdel.php" method= "POST">
                        <input type="hidden" name="listSubmitted" value="0">

			<div class="row">
                            <div class="column3">
                                <div class="barter-container">
                                        <div class="ui fluid search selection dropdown barter-items">
                                          <input type="hidden" name="item">
                                          <i class="dropdown icon"></i>
                                          <div class="default text">Items</div>
                                          <div class="menu">
                                          <div class="item">Apple</div>
                                          <div class="item">Banana</div>
                                          <div class="item">Cherry</div>
                                          </div>
                                        </div>
                                </div>
                            </div>
                            <div class="column1">
                                <input type="number" id="item-number" class="small-fld" name="quantity" value="0" placeholder="Number">
                            </div>
                        </div>


                        <div class="row">
                            <div class="column5">
                                <div class="column2 btn-container">
                                    <input type="submit" value="Add Items" name="button" class="large-btn large-magnify">
                                </div>
				<div class= "column2 btn-container">
                                    <input type="submit" value="Delete Items"  class="large-btn large-magnify" name="button">
                                </div>
                            </div>
                        </div>  
			</form>
                    </div>
                     <div class="column5">
                        <div class="barter-container">
				<h3>Your List: </h3>
			<h3><font color="red">
                        <?php #Displaying the list of items that have been selected
			session_start();
			$newvar=$_SESSION["listItem"];

			echo "$newvar";
				?>
			</h3></font>
			</div>
                            <!--    <div id="barter-list" class="ui list">
                                </div> -->
                        <div class="btn-container">
                                <h3> Any Store Preference?</h3>
                            <form action="./newlist.php" method= "POST">
                                <div class="barter-container">
                                <input type="text" id="item-address" class="large-fld" name="address" placeholder="Address/Name of store">
                                </div>

                                <input type="submit" class="large-btn large-magnify" name="button"value="Submit List">
                            </form>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </body>

    <script language="javascript">
        $(".dropdown.barter-items").dropdown();
        var itemsList = [];
        var itemsCount = {};

        var generateElement = function(params){
            var parent = $(params.selector);
            if (!parent) {
                return;
            }
            $("<div />", {
                "class" : params.class,
                "text": params.text
            }).appendTo(parent);
        };
        
        var addList = function() {
            var valueToAdd = $('.dropdown.barter-items input').val();
            var numberToAdd = Number($('#item-number').val());
            if (itemsList.indexOf(valueToAdd) == -1) {
                itemsList.push(valueToAdd); 
                itemsCount[valueToAdd] = numberToAdd;
                generateElement({
                    selector: '#barter-list',
                    class: 'item',
                    text: numberToAdd.toString() + " " + valueToAdd
                });
            }
	
        }
        
        var deleteList = function() {
           itemsList = [];
            itemsCount = {};
            $('#barter-list').empty();    
        }

    </script>
</html>
