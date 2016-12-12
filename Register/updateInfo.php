<?php
   class MyDB extends SQLite3
   {
	function __construct()
	{
	  $this->open('../databases/lettucebuy.db');//opened my database
	}
   }
	
   $db = new MyDB();
   if(!$db){ //checking if doesn't exist
	echo $db->lastErrorMsg();
   } else {
	#echo "Opened database for login check for clients!!!<br>";
   }
   
   //$olduname=$_POST["oldName_ID"];
   //$uname=$_POST["name_ID"];  
   //$pass=$_POST["password"];
   //$Caddress=$_POST["address"];
   //$phone=$_POST["phone"]; 
   
   //======================add user to db
  $olduname=$_POST["oldName_ID"];//this is the actual username
  $firstname=$_POST["firstname"];
  $lastname=$_POST["lastname"];
  $phone=$_POST["phone"];
  $street=$_POST["street"];
  $city=$_POST["city"];
  $state=$_POST["state"];
  $question=$_POST["question"];
  $answer=$_POST["answer"];
   echo "The username is $olduname and will update his first name to : $firstname <br>";//good

//checking password match
$check=strcmp("$pass","$confirm");
$place=0;
if($check!=$place){
	$db->close();
	header ("Location: register-Client.php?flag=1");//flag 1 means a mismatch in passwords PROBLEM WE NEED TO KNOW THAT IT IS UPDATING AS WELL
} 


//$_SESSION["name_ID"]="$uname";

    //update database
$returned_set = $db->querySingle("SELECT COUNT(*) FROM clients WHERE USERNAME='$olduname';");

//need to check if it is a driver instead
$returned_set2 = $db->querySingle("SELECT COUNT(*) FROM drivers WHERE USERNAME='$olduname';");
//echo "$returned_set2  $olduname <br>";
if($returned_set==0 && $returned_set2==0){//checking if we did not find ID in clients nor drivers
		$db->close();
		echo "There is not clients with the corresponging ID<br>";
		#header ("Location: Driver_main.php?flag=1&name_ID=$uname"); //if wrong ID then go back to main
}
else{ //we found an username

   //if it is a client
   if ($returned_set != 0){
       echo "found a client <br>" ;//good
//----------------------------------------CLIENT------------------------------------------------------------------       
//We need to check FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE,CURRENTLIST to not be empty to update

        if(!empty($firstname)){
            echo "going to update first name";
              $sql =<<<EOF
                UPDATE clients SET FIRSTNAME = "$firstname" WHERE USERNAME = "$olduname"
EOF;
        }
        
        if(!empty($lastname)){
            echo "going to update last name";            
              $sql2 =<<<EOF
                UPDATE clients SET LASTNAME = "$lastname" WHERE USERNAME = "$olduname"      
EOF;
        }
        /*
        if(!empty($pass)){//password gets checked with confirm
              $sql3 =<<<EOF
                UPDATE clients SET PASSWORD = "$pass" WHERE USERNAME = "$olduname"      
EOF;
        }
        */
        if(!empty($phone)){
              $sql3 =<<<EOF
                UPDATE clients SET PHONE = "$phone" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($street)){
              $sql4 =<<<EOF
                UPDATE clients SET STREET = "$street" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($city)){
              $sql5 =<<<EOF
                UPDATE clients SET CITY = "$city" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($state)){
              $sql6 =<<<EOF
                UPDATE clients SET STATE = "$state" WHERE USERNAME = "$olduname"      
EOF;
        }
        
        
//end of checking each field to update-----------------------------------------------------
//DONE UPDATING

        $ret = $db->exec($sql);
        $ret2 = $db->exec($sql2);  
        $ret3 = $db->exec($sql3);  
        $ret4 = $db->exec($sql4);  
        $ret5 = $db->exec($sql5);  
        $ret6 = $db->exec($sql6);  

        
       if(!$ret || !$ret2 || !$ret3 || !$ret4 || !$ret5 || !$ret6){//checking if any of the updates failed
            echo "there was an error";
            echo $db->lastErrorMsg();
       } else {
           echo "Got updated! ?<br>";
           //testing status (succeeded)
           /*
           $returned_set = $db->query("SELECT * FROM clients WHERE USERNAME='$olduname';");
           $entry = $returned_set->fetcharray();
           $first = $entry['FIRSTNAME'];
           $last = $entry['LASTNAME'];           
    	   $username = $entry['USERNAME'];
    	   $pass = $entry['PASSWORD'];
    	   $addr = $entry['ADDRESS'];
    	   $phone = $entry['PHONE'];
    	   echo "The firstname is: $first <br>";
    	   echo "The lastname is: $last <br>";    	   
    	   echo "The old username is: $olduname <br>";
    	   echo "The old username is: $olduname <br>";
    	   echo "The username is: $username <br>";
    	   echo "The password is: $pass <br>";
    	   echo "The address is: $addr <br>";
    	   echo "The phone is: $phone <br>";
    	   */
    	   //$db->close();
    	   //echo "Status should be completed! Here we can link to other file";
    	   $db->close();
    	   header("Location: ../Client_main.php?flag=2&name_ID=$olduname");
        }
       
   }else{//it is a driver then

       #echo "found a driver <br>" ;
//---------------------------------------DRIVER-------------------------------------------------------------------       
//We need to check FIRSTNAME,LASTNAME,USERNAME,PASSWORD,STREET,CITY,STATE,PHONE,QUESTION,SECURE,CURRENTLIST to not be empty to update
    
        if(!empty($firstname)){
            echo "going to update first name";
              $sql =<<<EOF
                UPDATE drivers SET FIRSTNAME = "$firstname" WHERE USERNAME = "$olduname"
EOF;
        }
        
        if(!empty($lastname)){
            echo "going to update last name";            
              $sql2 =<<<EOF
                UPDATE drivers SET LASTNAME = "$lastname" WHERE USERNAME = "$olduname"      
EOF;
        }
        /*
        if(!empty($pass)){//password gets checked with confirm
              $sql3 =<<<EOF
                UPDATE clients SET PASSWORD = "$pass" WHERE USERNAME = "$olduname"      
EOF;
        }
        */
        if(!empty($phone)){
              $sql3 =<<<EOF
                UPDATE drivers SET PHONE = "$phone" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($street)){
              $sql4 =<<<EOF
                UPDATE drivers SET STREET = "$street" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($city)){
              $sql5 =<<<EOF
                UPDATE drivers SET CITY = "$city" WHERE USERNAME = "$olduname"      
EOF;
        }
        if(!empty($state)){
              $sql6 =<<<EOF
                UPDATE drivers SET STATE = "$state" WHERE USERNAME = "$olduname"      
EOF;
        }
        
        
//end of checking each field to update-----------------------------------------------------
//DONE UPDATING

        $ret = $db->exec($sql);
        $ret2 = $db->exec($sql2);  
        $ret3 = $db->exec($sql3);  
        $ret4 = $db->exec($sql4);  
        $ret5 = $db->exec($sql5);  
        $ret6 = $db->exec($sql6);  

        
       if(!$ret || !$ret2 || !$ret3 || !$ret4 || !$ret5 || !$ret6){//checking if any of the updates failed
        echo "there was an error";
        echo $db->lastErrorMsg();
   } else {
       #echo "Got updated! ?";
       //testing status (succeeded)
       /*
       $returned_set = $db->query("SELECT * FROM drivers WHERE USERNAME='$olduname';");
       $entry = $returned_set->fetcharray();
       $firstname = $entry['FIRSTNAME'];
	   $username = $entry['USERNAME'];
	   $pass = $entry['PASSWORD'];
	   $addr = $entry['ADDRESS'];
	   $phone = $entry['PHONE'];
	   echo "The firstname is: $firstname <br>";
	   echo "The old username is: $olduname <br>";
	   echo "The username is: $username <br>";
	   echo "The password is: $pass <br>";
	   echo "The address is: $addr <br>";
	   echo "The phone is: $phone <br>";
	   */
	   //$db->close();
	   //echo "Status should be completed! Here we can link to other file";
	   $db->close();
	   header("Location: ../Driver_main.php?flag=2&name_ID=$uname");
    
   }
   
}
}
?>