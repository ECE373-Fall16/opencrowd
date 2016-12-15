<?php
	      class MyDB extends SQLite3
     	 	 {
       		   function __construct()
     	 	    {
       		      $this->open('../databases/lettucebuy.db');
       		   }
      		 }
    	   $db = new MyDB();
	$test="sup2525";
	$encrypt= md5($test);
	echo "$encrypt<br>";
	echo gettype($encrypt);
	$check=$db->query("SELECT PASSWORD FROM clients WHERE USERNAME='l';");
 	$info = $check->fetcharray();
	echo "HERE IS THE PW:" . gettype($info['PASSWORD']);

?>
