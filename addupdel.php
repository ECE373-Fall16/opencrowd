
<?php

session_start();//start session

//$uname=$_GET["item"];
//getting current items
$items=$_SESSION["listItem"];
$quan=$_POST["quantity"];
$quan=(int)$quan;
//$_SESSION["listItem"];
//getting the new items that is going to be added
$newItem=$_POST["item"];
$newItem=(string)$newItem;
/*
echo "the item to be added: $newItem<br>";
echo "the quantity is: $quan<br>";
echo "Current items: $items";
*/

//$concat="$items"
if ($items == "" && $newItem != "" && $quan > 0){// checking  1. empty list so correct concatanation  2. newItem is selected 3. quantity is not zero or negative
        $items .= "$newItem  $quan";
}
elseif ($newItem != "" && $quan > 0){
        $items .= ","." $newItem  $quan";
}
else{
//can send a flag saying that  an incorrect value was entered
	header("Location:./Client_main.php"?flag=1);
}
//echo "the concatenation is: $items <br>";

//updating session variable
$_SESSION["listItem"]=$items;
$newvar=$_SESSION["listItem"];

//echo "the session variable is now: $newvar";

header("Location:./Client_main.php");
?>

