<?php

mysql_connect("localhost", "atharva", "ath") or die(mysql_error()) ;
mysql_select_db("plagiarism") or die(mysql_error()) ;


$sql = "SELECT Filename FROM files ORDER BY id ASC ";

$i=0;

$str=array();
$path="C:\xampp\htdocs\Plagiarism\new\files";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)) 
{
	

	$str []=$row['Filename'];
	 
 	
	
}

	
	
	

 foreach ($str as $key) 
	 {
	  	foreach ($str as $val) 
	 	{
	 		$new_query="";
	 	
	 		if($key!=$val)
	 		{	echo "$key";	
	 			echo "$val";

	 				ob_start();
	 	 			passthru("/usr/bin/python /Users/atharva/Desktop/Plagiarism/new/cosine_new.py /Users/atharva/Desktop/Plagiarism/new/files/$key /Users/atharva/Desktop/Plagiarism/new/files/$val");
	 				echo "<pre>" . htmlspecialchars(ob_get_clean()) . "</pre>";


	 		}
	 	 

	  	}
	 }

?>