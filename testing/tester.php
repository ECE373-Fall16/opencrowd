<?php

if(file_exists ('lettucebuy.db')){
	unlink('lettucebuy.db');
}
include 'create_all.php';

$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='cat';
$_POST["password"]='12345';
$_POST["confirm"]='12345';
$_POST["phone"]='6178885585';
$_POST["street"]='133 fuk street';
$_POST["city"]='fukington';
$_POST["state"]='FU';
$_POST["question"]=3;
$_POST["answer"]='hi man i fuk you';

include 'client_register.php';



$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='catssss';
$_POST["password"]='12345';
$_POST["confirm"]='12345';
$_POST["phone"]='6178885585';
$_POST["street"]='133 fuk street';
$_POST["city"]='fukington';
$_POST["state"]='FU';
$_POST["question"]=3;
$_POST["answer"]='hi man i fuk you';

include 'client_register.php';

$returned_set = $db->querySingle("SELECT * FROM client WHERE USERNAME='cat';");
$entry = $returned_set->fetcharray();







/*
$db = new MyDB1();
 $sqldisplay =<<<EOF
      select * from clients;
EOF;

$ret = $db->exec($sqldisplay);
echo $ret;
$db->close();
*/

?>
