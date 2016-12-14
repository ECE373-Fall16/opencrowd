
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

$_POST["listItem"]='Apple 3,Orange 3,peaches 4';
$_POST["address"]="";
$_POST["button"]="Submit List";

include 'testing/client_register.php';

//some changes
$result;
$correctresult='Location: Client_main_update_order.php';

include 'testing/newlist.php';

echo $result."\n";
//echo strcmp($result,$correctresult);
        if(strcmp($result,$correctresult)!=0)// if strings are different
	{
                $db->close();
		echo "exited with five failed new list simple submit test\n";
                exit(5);
		}
	else{
	echo "we are gocci with test five: new list simple submit test\n";
		}

$db->close();
?>
