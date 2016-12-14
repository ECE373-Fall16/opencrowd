<?php //flag=1-->quantity was negative
      //flag=2-->item did not exist in the cart to begin with
      //flag=3-->same item was added
      //flag=4-->Delete items
      //flag=5-->empty list entered

session_start();
?>
<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="5">

        <title>Update Your Order</title>
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
                            <div class = "column5">
                        <div class="nav-option menu-nav">
                            <ul >
              			<li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
                            </ul>
                        </div>
                    </div>
                        </div>
                    </div>
                </header>
            </div>
        <div class="grey-background">
            <div class="container12">
                <h1 id="home">New future of grocery shopping</h1>
                <div class="row">
                     <div class="column9">
                        <div class="row">    
                        <div class="column3">
                            <h1 id="topping">Current Order</h1>
				<div class="barter-container">
					<h3>
			<?php
				       class MyDB extends SQLite3
					 {
					   function __construct()
					    {
					      $this->open('databases/lettucebuy.db');
					   }
					 }
				   $db = new MyDB();

				$uname=$_SESSION["name_ID"];
				$update=$_GET["update"]; //this flag gets information where it was redirected from
				$update=(int)$update;

				//obtaining list number of client
				$entry = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
				$entry = $entry->fetcharray();
				$data = $entry['CURRENTLIST'];
				$data = (int)$data;
				echo "$data";//good


				//checking if list has been fetched or not
				 $stat = $db->query("SELECT status FROM list WHERE ID=$data;");//NEED TO CHECK FOR INCOMPLETE ONES?
				 $stat = $stat->fetcharray(); //getting the number of currentlist to be compared
				 $test = $stat['status'];
				 
				 $numcheck=strcmp($test,'fetched'); 
					
				if($numcheck==0){ //if the list has been fetched
				   $update=2;
				}


				if($update==1)echo "Your list has been successfully updated<br>";
				elseif($update==2)echo "Your list has been fetched by a driver, please call them if any changes need to be made to your list.<br>";

				if($update==0 || $update==1){ //either coming from login or after updating list
					echo "Your list is available to all drivers<br>";
					echo "Here are the details of your list:-<br>";	
					echo '<html><br></html>';
				}
				

				//----------------------------------------- Text in the  CURRENT ORDER  box:
				$newvar=$_SESSION["listItem"];
			        echo "Your List: $newvar";

				$returned_set = $db->query("SELECT address FROM list WHERE ID=$data;");
				$entry = $returned_set->fetcharray();
				$returned_ID = $db->query("SELECT CURRENLIST FROM clients WHERE USERNAME=$uname;");
				$listID = $returned_ID->fetcharray();
				    echo "ID: " . $listID["CURRENTLIST"];
				    echo '<html><br></html>';
				    echo "Items: " . "$newvar";
				    echo '<html><br></html>';
				   if($entry['address']==""){echo "Address/Name of Store: None";echo '<html><br></html>';}
				    else{echo 'Address/Name of Store: ' . $entry['address'];
				    echo '<html><br></html>';}
				//}
				//----------------------------------------------------------------------------------


				if($update==2){//list has been fetched, display driver info
					$getinfo = $db->query("SELECT * FROM drivers WHERE CURRENTLIST=$data;"); //picking driver that has same ID
					while ($info = $getinfo->fetcharray()){
					 echo '<html><br></html>';
					 echo 'Name: ' . $info['USERNAME'];
					 echo '<html><br></html>';
					 echo 'Phone Number: ' . $info['PHONE'];
					 echo '<html><br></html>';
					 //echo 'Address: ' . $info['ADDRESS'];
					 //echo '<html><br></html>';
					}
				}

			?>
					</h3>
				</div>
                        </div>

			<?php  // THIS IF STATEMENT IS TO TAKE OUT THE MIDDLE PART (ADD AND DELETE FUNCTIONS) WHEN THE STATUS OF LIST IS NOT  INCOMPLETE
			//-------------------------------------------------------------------------------------------------------------------------------
			//getting status
			$listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
	                $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
            		$check = $listnum['CURRENTLIST'];
            		$check = (int)$check; //have int form of current list
			echo "$check <br>";

           		$returned_set = $db->query("SELECT * FROM list WHERE ID='$check';");
		        $entry = $returned_set->fetcharray();
           		$status = $entry['status'];
           		//echo "$status";

			//when driver presses confirm button:
			if ($status == "completed"){?>
				<font color='blue'><h2>Your groceries have arrived! Please confirm below: </font><br></h2>
				<form action="Client_main_done.php">
				<input type="submit" value="My groceries have arrived"/>
				</form>
			        <?php
			}


			//$flag="incomplete";#FLAG IS WORKING
			$flag="$status";
			echo "the flag is: $flag";
			if ($flag=="incomplete"){
		/*
			//flags for errors 

                        $flag=$_GET["flag"];
                        $flag=(int)$flag;
                        if ($flag==1){
                        ?>
                                <p class=""><font color="red">Please select an item or choose a valid quantity</font></p>
                        <?php
                        }elseif($flag==3){
                        ?>
                                <p class=""><font color="red">The item already exists in your current list, please delete and update again</font></p>
                        <?php
                        }elseif($flag==4){
                        ?>
                                <p class=""><font color="red">The item has been deleted from your cart</font></p>
*/			
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
                        }elseif($flag==6){
			?>
                                <p class=""><font color="red">Your list was successfully updated</font></p>
			<?php 
			}
			?>
			

			<form action="addupdel.php" method= "POST">
                        <input type="hidden" name="listSubmitted" value="1">

                        <div class="column5">
                                <h1 id="topping">Add more items to current order</h1>
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
                                    <input type="number" id="item-number" class="small-fld" name="quantity" value="0" placeholder="Quantity">    
                                </div>
                            </div>
                        <div class="row">
                            <div class="column2">
                                <div class= btn-container>
                                    <input type="submit" class="large-btn large-magnify" name="button" value="Add Items">
                                </div>
                            </div>
                             <div class="column2">
                                <div class= btn-container>
                                    <input type="submit" class="large-btn large-magnify" name="button" value="Delete Items">
                                </div>
                            </div>
                        </div>  

                    </div>
                </div>  
                    </div>
		
		</form>

		<?php
			}//IFEnd

		//----------------------------------------------------------------------------------------------------------------------------
			?>

                   <div class="column3">
                        <div class="barter-container" >
                            <h1 id="topping">Current Status of your Order:</h1>
                            <!-- status php -->
	<h3>	
	<?php
		
	    //displaying  status--------------------------------------------  THE STATUS IS FOUND IN PREVIOUS php PART

            //uname=$_SESSION['name_ID'];
/*
            $listnum = $db->query("SELECT CURRENTLIST FROM clients WHERE USERNAME='$uname';");
            $listnum = $listnum->fetcharray(); //getting the number of currentlist to be compared
            $check = $listnum['CURRENTLIST'];
            $check = (int)$check; //have int form of current list


           $returned_set = $db->query("SELECT * FROM list WHERE ID='$check';");
           $entry = $returned_set->fetcharray();
           $status = $entry['status'];
*/
           echo "$status";
	   //---------------------------------------------------
	

	?>
	</h3>

                        </div> 
                        <div id="barter-list barter-container" class="ui list">
                        </div>

			<?php if ($status=="incomplete"){?>
                        <div class="btn-container">
			    <form action="./newlist.php" method= "POST">
                                <input type="submit" class="large-btn large-magnify" name="button" value="Add to Order">
                        </div>
			 <div class="btn-container">
                                <input type="submit" class="large-btn large-magnify" name="button" value="Delete Order">

                            </form>
                        </div>
			<?php } ?>
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
