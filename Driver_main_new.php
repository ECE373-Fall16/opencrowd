<?php
  session_start();

//   FLAG = 1 MEANS INVALID ID when list is picked
//   flag=2 meansthe status is confirmed
?>

<!DOCTYPE  html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="robots" content="index,follow">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="refresh" content="10">

        <title>Driver Main</title>

        <link href="1140.css" rel="stylesheet" type="text/css">
        <link href="style.css" rel="stylesheet" type="text/css">

    </head>
    <body>

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
       $firstname=$_SESSION["firstname"];
       $lastname=$_SESSION["lastname"];

    ?>
	
        <div class= "nav">
            <ul id="menu1">
              <li><a href = "<?php echo "Driver_main_new.php";?>">Home</a></button><li>
              <li><a href = "<?php echo "./Register/register-Driver.php?flag=2";?>">Update Credentials</a></button><li>
            </ul>
            
            <ul id="menu2">
              <li><a href = "<?php echo "index.php?logout=-1";?>">Log Out</a></button><li>
            </ul> 
        </div>
        <div class = "bodyformat">
        <div class="container12">
           <header>
                <div class = "row">
                    <div class= "column7" id="header-pic">
                        <a href= "" ><img src ="logo%20LettuceBuy.png"></a>
                    </div>
                    <div class = "column5">
                        <div class="nav-select">
                            
                        </div>
                    </div>
                </div>
            </header>
        </div>
        <div class="grey-background">
            <div class="container12">
            <h1 id="home"> Welcome to LettuceBuy <?php echo "$firstname $lastname";?>! </h1><br/>
                <div class="row">
                    <div class="column6" id="">
                        <h2>Available Orders:</h2>

			<?php
			$newflag=$_GET["flag"];
			$newflag=(int)$newflag;
			if($newflag==1)echo "Sorry invalid ID<br>";
			if($newFlah==2)echo "Client has confirmed the delivery.<br>";

			echo "Please select an ID of available list from below:<br>";
			$returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
			while ($entry = $returned_set->fetcharray()) {
			    echo 'ID: ' . $entry['ID']; 
			    $ID =  $entry['ID']; 
			    echo '<html><br></html>';
			    echo 'Items: ' . $entry['items'];
			    echo '<html><br></html>';
			    echo 'Address/Name of Store: ' . $entry['address'];
			    echo '<html><br></html>';
			    $addressCqu = $db->query("SELECT street FROM clients WHERE CURRENTLIST=$ID");
			    $street = $addressCqu->fetcharray();
			    $addressCqu = $db->query("SELECT city FROM clients WHERE CURRENTLIST=$ID");
			    $city = $addressCqu->fetcharray();
			    $addressCqu = $db->query("SELECT state FROM clients WHERE CURRENTLIST=$ID");
			    $state = $addressCqu->fetcharray();
			    echo 'Address for delivery:' . $street["street"] . ',' . $city["city"] . ',' . $state["state"];
			    echo '<html><br></html>';
			    

			}

			?>

                    </div>
                    <div class="column6">
                        <div class="">

                            <form action="driver_fetch.php" method="POST">
                                <h2>Choose a list </h2>
                                    <div class="row">
                                        <div class="column6">
                                            <div class = "para-input">
                                                <input type="number" class="small-fld" name="listID" placeholder="Order ID">
                                            </div>
                                        </div>
                                        <div class="column1">
                                        </div>        
                                    </div>
                            
                               
                            <div class="btn-container">
                                <input type="submit" class="large-btn large-magnify" value="Pick List">
                            </div>
                            
                        </form>

                    </div>
                </div>
               
            </div>
            </div>
            
        </div> 


    </body>
</html>
