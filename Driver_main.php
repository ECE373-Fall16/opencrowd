
<html>
    <head>
        <title>Driver Home Page</title>
        <link rel = "stylesheet" type = "text/css" href="navigation-style.css"/>
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
    //=============================================================================================open db
       $db = new MyDB();
    ?>
        <div class= "nav">
            <ul id="menu1">
                <li><a href = "Driver_main.php">Home</a></li>
                <li><a href = "about.html">About</a></li>
                <li><a href = "contact.html">Contact</a></li>
            </ul>
            
            <ul id="menu2">
               <buttom><a href = "index.html">Log Out</a></buttom>
            </ul> 
            <!some how we need to add the the function that click on log out will actually log out of the system not only go to the index page>
        </div>
        <?php  $uname=$_GET["name_ID"]; ?>
        <div>
            <h3> Welcome: <?php echo "$uname"; ?></h3> <br/>
        
        <h3><?php
        $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
        while ($entry = $returned_set->fetcharray()) {
            echo 'ID: ' . $entry['ID'] . '  items: ' . $entry['items'];
            echo '<html><br></html>';
        }
        ?>
        </h3> 
        <form action="driver_fetch.php" method="get">
        <input type="hidden" name="name_ID" value="$uname">
        ID <input type="text" name="listID"><br>
        <input type="submit">
        </form>
        
        </div>
    </body>
</html>
