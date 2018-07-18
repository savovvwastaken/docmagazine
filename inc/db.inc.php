<?php
 

$db = NewADOConnection('mysqli');
$conn = $db->Connect($sys_dbhost, $sys_dbuser, $sys_dbpasswd, $sys_dbname);

if (!$conn) die("В момента възниква грешка, моля да ни извините!!"); 
else {
 $sql = "set names utf8";
 $rs = $db->Execute($sql);
}
 
?>
