<?php 

	$stuff="lots, of, stuff";
	$se = "of";
	$newstuff=str_replace("lots, ","","$stuff");
	$pos = strpos($stuff,"wqeqweqwe");
	$pos=(int)$pos;
//	echo "pos is : $pos<br>";
//	echo $newstuff;
	
	$my = "haha 2, to 3";
	$to = str_word_count($my);
	echo $to;

?>
