<?php

if(file_exists ('testing/lettucebuy.db')){
	unlink('testing/lettucebuy.db');
}
include 'testing/create_all.php';

$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='cat';
$_POST["password"]='12345';
$_POST["confirm"]='12345';
$_POST["phone"]='6178885585';
$_POST["street"]='133 f street';
$_POST["city"]='lesington';
$_POST["state"]='Fc';
$_POST["question"]=3;
$_POST["answer"]='hi man you';

include 'testing/client_register.php';



$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='cat';
$_POST["password"]='12345';
$_POST["confirm"]='12345';
$_POST["phone"]='6178885585';
$_POST["street"]='133 f street';
$_POST["city"]='lesington';
$_POST["state"]='F';
$_POST["question"]=3;
$_POST["answer"]='hi man you';

include 'testing/client_register.php';

//some changes
 $db = new MyDB();

$drivret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname' AND PASSWORD='$pass';");
        if($drivret!=1){ //neither client nor driver
                $db->close();
                exit(2);

}
$db->close();
?>
?>
