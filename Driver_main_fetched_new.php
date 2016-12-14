<!DOCTYPE  html>
<?php
session_start();
?>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Driver Main</title>

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
                        <div class="nav-option menu-nav">
                            <ul >
              			<li><a href = "<?php echo "Driver_main_fetched_new.php";?>">Home</a></button><li>
               			<button><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button>
                            </ul>
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="grey-background">
            <div class="container12">
                <h1 id="home">Happy to Shop and Earn</h1>


            
                <div class="row">
                    <div class="column6" id="">
                        <h1 id="topping"></h1>
			<h4>
			<?php
				   class MyDB extends SQLite3
				     {
				       function __construct()
					    {
					      $this->open('databases/lettucebuy.db');
					   }
					 }
				   $db = new MyDB();
					$entry = $db->query("SELECT CURRENTLIST FROM drivers WHERE USERNAME='$uname';");
					$entry = $entry->fetcharray();
					$data = $entry['CURRENTLIST'];
					$data = (int)$data;
					
				// Driver confirmed (status of list is completed) and needs to wait until client change status to "confirmed"
				    $returned_set = $db->query("SELECT * FROM list WHERE ID=$data;");
				    $entry = $returned_set->fetcharray();
					$status = $entry['status'];
					//echo "the status is $status";
				    if ($status == "completed"){
					//then it got redirected from Driver_main_done.php
					
					echo "Thank you for your service! We are waiting for the client to confirm...<br>";
					echo "Once client confirms, you can choose more lists!<br>";
					
				    }    
				//----------------------------------
				//Client confirmed that grocries arrived
				    if ($status == "confirmed"){
					//Client pressed "My groceries have arrived" in Client_main_submitted.php
					$db->close();
					header("Location: Driver_main.php?flag=0&name_ID=$uname");       
					
				    }


			       // $returned_num = $db->query("SELECT * FROM drivers WHERE USERNAME='$uname';");
				echo "You selected list with ID:$data<br>";
				echo "Here are the details:-<br>";	
				$returned_set = $db->query("SELECT * FROM list WHERE ID=$data AND status='fetched';");
				while ($entry = $returned_set->fetcharray()) {
				    echo 'ID: ' . $entry['ID']; 
				    echo '<html><br></html>';
				    echo 'Items: ' . $entry['items'];
				    echo '<html><br></html>';
				    echo 'Address of Store: ' . $entry['address'];
				    echo '<html><br></html>';
				}

				echo "Client info:<br>";
				$returned_set = $db->query("SELECT * FROM clients WHERE CURRENTLIST=$data;");
				while ($entry = $returned_set->fetcharray()) {
				    echo 'Name: ' . $entry['FIRSTNAME']. $entry['LASTNAME'];
				    echo '<html><br></html>';
				    echo 'Address for delivery: ' . $entry['street'] . ',' . $entry['city'] . ',' . $entry['state'];
				    echo '<html><br></html>';
				    echo 'Phone Number: ' . $entry['PHONE'];
				    echo '<html><br></html>';
				}

			       ?>
			   <br>
			   <br>
				 <?php 
			    if ($status != "completed"){
				echo 'Please confirm once you are done';
				?>
				<form action="Driver_main_done.php" method="POST">
					<input type="hidden" name="list_ID" value="<?php echo $data;?>">
					<input type="submit" value="Confirm"/>
				</form>
			    <?php
			    
			    }

			    ?>   
			</h4> 


                    </div>
                    <div class="column6">
                        <div class="">
                            <form action="status.php" method="POST">
                                <h1 id="topping">Status of current order</h1>  
                                <h2> I leave some space here to use php to display status of the order</h2>
                                <h1 id="topping">Update order current status</h1>  
                                <div class="btn-container"> <!--Maybe you need to write 1 type of bottum php that change the status of the order then copy and modify it a bit for each buttom -->
                                    <input type="submit" class="large-btn large-magnify" value="On the way to the store!">
                                </div>
                                <div class="btn-container"> <!--Maybe you need to write 1 type of bottum php that change the status of the order then copy and modify it a bit for each buttom -->
                                    <input type="submit" class="large-btn large-magnify" value="Shopping ^-^">
                                </div>
                                <div class="btn-container"> <!--Maybe you need to write 1 type of bottum php that change the status of the order then copy and modify it a bit for each buttom -->
                                    <input type="submit" class="large-btn large-magnify" value="Check Out $$$">
                                </div>
                                <div class="btn-container"> <!--Maybe you need to write 1 type of bottum php that change the status of the order then copy and modify it a bit for each buttom -->
                                    <input type="submit" class="large-btn large-magnify" value="On the way delivering ^0^">
                                </div>
                            </form>
                        </div>
                </div>
               
            </div>
            </div>
            
        </div> 


    </body>
</html>
