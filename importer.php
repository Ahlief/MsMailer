<?php 
$sql ="LOAD DATA INFILE '/var/www/html/Msmailer/impo.csv' 
		INTO TABLE cli 
		FIELDS TERMINATED BY ',' 
		ENCLOSED BY '\"'
	  	LINES TERMINATED BY '\r\n'
	  	IGNORE 1 LINES;";
$db->query($sql);
 ?>