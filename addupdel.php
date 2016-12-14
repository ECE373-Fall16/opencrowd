

<?php

session_start();//start session

//$uname=$_GET["item"];
//getting current items
$items=$_SESSION["listItem"];
$quan=$_POST["quantity"];
$quan=(int)$quan;

$newItem=$_POST["item"];
$newItem=(string)$newItem;

$submitted=$_POST["listSubmitted"];//it is 1 if  we are adding from Client_main_update_order.php
$button=$_POST["button"];


$flag=$_POST["adding"];
$flag=(int)$flag;

//getting the new items that is going to be added
if($button=="Add Item"){ //adding items  deleted $flag ==1
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
	if(strpos($items,$newItem)!== false){//found in string, send flag back

		if($submitted=="0")header("Location: Client_main.php?flag=3"); //ask them to delete first
		elseif($submitted=="1")header("Location: Client_main_update_order.php?flag=3"); //ask them to delete first
	}
	elseif ($items == "" && $newItem != "" && $quan > 0){// checking  1. empty list so correct concatanation  2. newItem is selected 3. quantity is not zero or negative
		$items .= "$newItem  $quan";
		$_SESSION["listItem"]=$items;
		$newvar=$_SESSION["listItem"];
		if ($newItem != "" && $quan > 0 && $submitted=="0")header("Location:./Client_main.php");
		elseif ($newItem != "" && $quan > 0 && $submitted=="1")header("Location:./Client_main_update_order.php");

	}
	elseif ($newItem != "" && $quan > 0){
		$items .= ","." $newItem  $quan";
		$_SESSION["listItem"]=$items;
		$newvar=$_SESSION["listItem"];
		if ($newItem != "" && $quan > 0 && $submitted!="1")header("Location:./Client_main.php");
		elseif ($newItem != "" && $quan > 0 && $submitted=="1")header("Location:./Client_main_update_order.php");


	}
	elseif ($quan<=0 && $submitted=="0"){
	//can send a flag saying that  an incorrect value was entered
		//NEED TO CHECK WHERE WE NEED TO REDIRECT TO
		header("Location:./Client_main.php?flag=1");
	}
        elseif ($quan<=0 && $submitted=="1"){header("Location:./Client_main_update_order.php?flag=1");}

		//header("Location:./Client_main.php?flag=1");
	//echo "the concatenation is: $items <br>";
	
	//checking if that item had already been added


	//updating session variable
//	$_SESSION["listItem"]=$items;
//	$newvar=$_SESSION["listItem"];

	//echo "the session variable is now: $newvar";
//	if ($newItem != "" && $quan > 0 && $submitted!="1")header("Location:./Client_main.php");
//	if ($newItem != "" && $quan > 0 && $submitted=="1")header("Location:./Client_main_update_order.php");
}


elseif($button=="Delete Items"){ //delete    $flag==2
	//first we check if the item existed or not in the current shopping list
	$pos = strpos($items,$newItem); //will be false if not found
	if($pos!=0)$pos=$pos-2;

	if(strpos($items,$newItem)!==false){ //found it, delete it
		//here pos contains the starting position of our item
		if(str_word_count($item) == 1 && $pos==0){ 
			$_SESSION["listItem"] = ""; //put empty string if only one item left
			if($submitted=="0")header("Location: ./Client_main.php?flag=4");
			elseif($submitted=="1")header("Location: ./Client_main_update_order.php?flag=4");
		}
		else{
			$len = strlen($newItem); //length of item
			$newlen = $len+5; //removing empty spaces
			$remove = substr($items,$pos, $newlen); //I have the entire string I want to cut
			$_SESSION["listItem"] = str_replace($remove,"",$items);

			if($submitted=="0")header("Location: ./Client_main.php?flag=4");
			elseif($submitted=="1")header("Location: ./Client_main_update_order.php?flag=4");

		}
		
	}else{ //could not find the item
				
		if($submitted=="0")header("Location: ./Client_main.php?flag=2");
		elseif($submitted=="1")header("Location: ./Client_main_update_order.php?flag=2");
	}
	
}

?>





