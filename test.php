<?php 

	$stuff="lots, of, stuff";
	$se = "of";
	$newstuff=str_replace("lots, ","","$stuff");
	$pos = strpos($stuff,"wqeqweqwe");
	$pos=(int)$pos;
//	echo "pos is : $pos<br>";
//	echo $newstuff;
	
	$my = "haha thats funny";
	$sub = strpos($my,"haha" );
	echo $sub;

?>
