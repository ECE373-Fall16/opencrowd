
<?php

session_start();//start session

//$uname=$_GET["item"];
//getting current items
$items=$_SESSION["listItem"];
$quan=$_POST["quantity"];
$quan=(int)$quan;

$newItem=$_POST["item"];
$newItem=(string)$newItem;


//$flag=$_POST["flag"];
//$flag=(int)$flag;

//getting the new items that is going to be added
//if($flag==1){ //adding items
	//$pos = strpos($items,$newItem);
	//$pos=(int)$pos;
	//echo "$newItem<br>";
	//echo "$items<br>";
	//echo $pos;
	/*
	if($pos!=0){//found in string, send flag back

		header("Location: Client_main.php?flag=3"); //ask them to delete first
	}
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
		header("Location:./Client_main.php?flag=1");
	}
	//echo "the concatenation is: $items <br>";
	
	//checking if that item had already been added


	//updating session variable
	$_SESSION["listItem"]=$items;
	$newvar=$_SESSION["listItem"];

	//echo "the session variable is now: $newvar";
	if ($newItem != "" && $quan > 0)header("Location:./Client_main.php");
//}

//elseif($flag==2){ //delete
//	//first we check if the item existed or not in the current shopping list
//	$pos = strpos($items,$newItem); //will be false if not found
//	$pos=(int)$pos;
//	if($pos==0){ //not found
//		header("Location: ./Client_main.php?flag=2"); //item not yet selected
//	}
//	else{ //found it, delete it
//		//here pos contains the starting position of our item
//		$len = strlen($newItem); //length of item
//		$newlen = $newlen+4; //removing empty spaces
//		$remove = substr($items,$len, $newlen); //I have the entire string I want to cut
//		$_SESSION"listItem"] = str_replace($remove,"",$items);
//		
//	}
//
//}

?>

