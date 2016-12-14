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
//some changes
 $db = new MyDB();

$drivret = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$uname' AND PASSWORD='$pass';");
        if($drivret!=1){ //neither client nor driver
                $db->close();
                exit(1);

}
$db->close();
?>
?>
