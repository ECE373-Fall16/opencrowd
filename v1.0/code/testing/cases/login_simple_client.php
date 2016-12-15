
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
$correctresult='Location:../Client_main.php?flag=0';

include 'testing/login_clients.php';

echo $result."\n";
echo strcmp($result,$correctresult);
        if(strcmp($result,$correctresult)!=0)
	{
                $db->close();
		echo "exited with one\n";
                exit(3);
		}
	else{
	echo "we are gocci with test 3 login_simple\n";
		}

$db->close();
?>
