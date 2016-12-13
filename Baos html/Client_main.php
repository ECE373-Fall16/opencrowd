<!DOCTYPE  html>
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
                            <ul>
                                <li><a href= "/Login-page.html">Login Here</a></li>
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
                        <p class="">Make a new order or update your current one</p>
                        <div class="row">
                            <div class="column3">
                                <div class="barter-container">
                                        <div class="ui fluid search selection dropdown barter-items">
                                          <input type="hidden" name="item">
                                          <i class="dropdown icon"></i>
                                          <div class="default text">Items</div>
                                          <div class="menu">
                                          
                                          <?php 
                                          //HERE WE SHOULD DISPLAY THE ITEMS FROM THE DATABASE
                                          
                                          //TO WORK ON-------------------------
                                          $returned_set = $db->query("SELECT * FROM list WHERE status='incomplete';");
                                            while ($entry = $returned_set->fetcharray()) {
                                                echo 'ID: ' . $entry['ID']; 
                                                echo '<html><br></html>';
                                    	    echo 'Items: ' . $entry['items'];
                                                echo '<html><br></html>';
                                    	    echo 'Address of Store: ' . $entry['address'];
                                                echo '<html><br></html>';
                                                echo '<html><br></html>';
                                            }
                                          
                                          //-----------------------------------
                                          ?>
                                          <div class="item">Apple</div>
                                          <div class="item">Banana</div>
                                          <div class="item">Cherry</div>
                                          </div>
                                        </div>
                                </div>
                            </div>
                            <div class="column2">
                                <input type="number" id="item-number" class="small-fld" name="quantity" value="0" placeholder="Number ">    
                            </div>
                        </div>
                        <div class="row">
                            <div class="column2">
                                <div class= btn-container>
                                    <input onClick="addList()" type="submit" class="large-btn large-magnify">
                                </div>
                            </div>
                             <div class="column2">
                                <div class= btn-container>
                                    <input onClick="deleteList()" type="submit" class="large-btn large-magnify" value="Delete Items">
                                </div>
                            </div>
                        </div>  

                    </div>
                    <div class="column6">
                        <div id="barter-list" class="ui list">
                        </div>
                        <div class="btn-container">
                            <form action="./newList.php" method= "GET">
                                <input type="submit" class="large-btn large-magnify" value="Submit List ">
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