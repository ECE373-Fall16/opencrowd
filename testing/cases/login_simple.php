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

//some changes
$result;
$correctresult='Location:../Driver_main.php?flag=0';

include 'testing/login_clients.php';
echo $result;
        if(!strcmp($result,$correctresult)){
                $db->close();
		echo "exited with one";
                exit(1);
		}
	else{
	echo "we are gocci";
		}

$db->close();
?>
?>
