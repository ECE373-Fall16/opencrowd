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

echo "the item to be added: $newItem<br>";
echo "the quantity is: $quan<br>";
echo "Current items: $items";


//$concat="$items" 
if ($items == "" && $newItem != ""){
	$items .= "$newItem  $quan";
}
elseif ($newItem != ""){
	$items .= ","." $newItem  $quan";
}

echo "the concatenation is: $items <br>";

//updating session variable
$_SESSION["listItem"]=$items;
$newvar=$_SESSION["listItem"];

echo "the session variable is now: $newvar";

?>

<html>
<form action="Client_main.php">
<input type="submit" value="Go back"/>
</form>

</html>

