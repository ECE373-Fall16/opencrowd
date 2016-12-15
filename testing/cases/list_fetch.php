
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
$correctresult='Location: Driver_main_fetched_new.php';
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




//==============================================================================up till here driver registered

$db = new MyDB();
if(strcmp($result,$correctresult)!=0)// if strings are different
        {
                $db->close();
                echo "exited with 8 failed: fetchlist wrong return address after fetching\n";
                exit(8);
                }

$drivret = $db->querySingle("SELECT COUNT(*) FROM drivers where USERNAME='$uname' and ID =1;");

if($drivret!=1){ //neither client nor driver
                $db->close();
                echo "exited with 8 list was not fetched\n";
               exit(7);
}
// could add more list to test acuracy

$drivret = $db->querySingle("SELECT COUNT(*) FROM list where status = 'fetched' and ID =1;");

if($drivret!=1){ //neither client nor driver
                $db->close();
                echo "exited with 8 list status not changed\n";
               exit(7);
}

$db->close();

        echo "we are gocci with test eight: fetching list\n";
?>
