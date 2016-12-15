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
$correctresult='Location: ../Login-page.php?flag=1';

$_POST["password"]='654321';

include 'testing/login_clients.php';
echo $result."\n";

        if(strcmp($result,$correctresult)!=0){
                $db->close();
		echo "exited with four/n";
                exit(4);
		}
	else{
	echo "we are gocci with test 4 wrongpass\n";
		}

$db->close();
?>
