<?php
$root = $_SERVER ["DOCUMENT_ROOT"];

if (isset ( $_SERVER ["SERVER_ADDR"] ) and $_SERVER ["SERVER_ADDR"] == '192.168.110.8') {
	$path_site = '/docmagazine/www/';
	$url = 'http://pig' . $path_site;
 
  $sys_dbhost = 'localhost';
	$sys_dbname = 'docmagazine';
	$sys_dbuser = 'abc';
	$sys_dbpasswd = '2908j14t';
	 
} else {
	
  if (isset ( $_SERVER ["SERVER_ADDR"] ) and $_SERVER ["SERVER_ADDR"] == '::1') {
     $path_site='/workspace/docmagazine/';
     $url= 'http://localhost'.$path_site;
    
    $sys_dbhost='localhost';
	  $sys_dbname='docmagazine';
	  $sys_dbuser='root';
	  $sys_dbpasswd='';
  
  
  } else {
	$path_site = '/';
	$url = 'https://docmagazine.000webhostapp.com/' . $path_site;
  
	$sys_dbhost = 'localhost';
	$sys_dbname = 'id6500850_docmagazine';
	$sys_dbuser = 'id6500850_kalouser';
	$sys_dbpasswd = 'sdf@&wererto67AD34';
  }
 
}

?>
