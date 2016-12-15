
<?php

if(file_exists ('testing/lettucebuy.db')){
	unlink('testing/lettucebuy.db');
}
include 'testing/create_all.php';

$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='client';
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

include 'testing/newlist.php';
//==============================================================================up till here list added
$_POST["firstname"]='first123name';
$_POST["lastname"]='lastname';
$_POST["name_ID"]='driver';// the only difference
$_POST["password"]='12345';
$_POST["confirm"]='12345';
$_POST["phone"]='6178885585';
$_POST["street"]='133 f street';
$_POST["city"]='lesington';
$_POST["state"]='Fc';
$_POST["question"]=3;
$_POST["answer"]='hi man you';

include 'testing/driver_register.php';

$_POST["listID"]=1;
include 'testing/driver_fetch.php';




//============================================up till here driver registered============================
include 'testing/Driver_main_done.php';
$correctresult='Location: Driver_main_fetched_new.php';


$db = new MyDB();
if(strcmp($result,$correctresult)!=0)// if strings are different
        {
                $db->close();
                echo "exited with 9 failed: after driver complete wrong return address after fetching\n";
                exit(9);
                }

$drivret = $db->querySingle("SELECT COUNT(*) FROM list where status = 'completed' and ID =1;");

if($drivret!=1){ //neither client nor driver
                $db->close();
                echo "exited with 9 list was not fetched\n";
               exit(9);
}
$db->close();
//=============================================up till here driver completed=============================
$_POST["name_ID"]='client';

include 'testing/Client_main_done.php';
$correctresult='Location: Client_main.php?flag=8';


$db = new MyDB();
if(strcmp($result,$correctresult)!=0)// if strings are different
        {
                $db->close();
                echo "exited with 9 failed: after client complete wrong return address after fetching\n";
                exit(9);
                }

$drivret = $db->querySingle("SELECT COUNT(*) FROM list where status = 'confirmed' and ID =1;");

if($drivret!=1){ //neither client nor driver
                $db->close();
                echo "exited with 9 list was not changed when client click confirm\n";
               exit(9);
}
$db->close();




//=============================================up till here client completed=============================
        echo "we are gocci with test nine: fetching list\n";
?>
