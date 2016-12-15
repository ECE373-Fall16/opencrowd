
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
$_POST["address"]="my house";
$_POST["button"]="Submit List";

include 'testing/client_register.php';

//some changes
$result;
$correctresult='Location: Client_main_update_order.php';
//$listItem='Apple 3,Orange 3,peaches 4';

include 'testing/newlist.php';
echo $result."\n";
//echo strcmp($result,$correctresult);
$db = new MyDB();

if(strcmp($result,$correctresult)!=0)// if strings are different
	{
                $db->close();
		echo "exited with 7 failed new list simple submit test wrong return address when adding\n";
                exit(7);
		}

$drivret = $db->querySingle("SELECT COUNT(*) FROM list;");
if($drivret!=1){ //neither client nor driver
                $db->close();
		echo "exited with 7 list did not get added into database\n";
               exit(7);
}
$correctresult="Location: Client_main.php?flag=7";
$db->close();

include 'testing/delete.php';

$db = new MyDB();
if(strcmp($result,$correctresult)!=0)// if strings are different
        {
                $db->close();
                echo "exited with 7 failed new list simple submit test wrong return address when deleting\n";
                exit(7);
                }

$drivret = $db->querySingle("SELECT COUNT(*) FROM list;");

if($drivret!=0){ //neither client nor driver
                $db->close();
                echo "exited with 7 list did not get delete into database\n";
               exit(7);
}
// could add more list to test acuracy
$db->close();
        echo "we are gocci with test seven: deleting list\n";
?>
