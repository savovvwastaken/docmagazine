<?php

error_reporting ( 15 );
date_default_timezone_set ( 'Europe/Sofia' );

$file = 'index.php';
$last_modified_time = filemtime($file);
$etag = md5_file($file);

header("Last-Modified: ".gmdate("D, d M Y H:i:s", $last_modified_time)." GMT");
header("Etag: $etag"); 
 
$path = '';
$lang_id = 1; $lang = 'bg';
session_start ();
 
include_once ($path . "inc/var.inc.php");
include_once ($path . "inc/path.inc.php");
include_once ($path . "adodb5/adodb.inc.php");
include_once ($path . "inc/db.inc.php");
include_once ($path . "lib/lib.inc.php");
 
$inc_path = $path . 'smarty-3.1.30/libs/';
$incfilename = $inc_path . "Smarty.class.php";
require_once ($incfilename);
 
if (isset ( $_GET ['type'] )) $type = secure ( $_GET ['type'] ); else $type = 0;
if (isset ( $_GET ['link'] )) $link = StripItem ( $_GET ['link'] ); else $link = '';
if (isset ( $_GET ['id'] )) $id = secure ( $_GET ['id'] ); else $id = 0;
if (isset ( $_GET ['offset'] )) $offset = secure ( $_GET ['offset'] ); else $offset = 0;
   
$smarty = new Smarty ();
$smarty->setTemplateDir ( $path . 'smarty/templates/' )->setCompileDir ( $path . 'smarty/templates_c/' )->setPluginsDir ( $inc_path . 'plugins' )->setCacheDir ( $path . 'smarty/cache/' )->setConfigDir ( $path . 'smarty/configs/' );
  
include_once ("files/web/home.php");

switch ($type) {
	case "0" :
		$type = '';
		$smarty->assign ( 'type', $type );
		include_once ("files/web/index.php");
		break;
	case "login" :
		include_once ("files/web/login.php");
		break;
	case "documents" :
		include_once ("files/web/documents.php");
		break;
  case "registration" :
		include_once ("files/web/registration.php");
		break;		
   case "confirm" :
	   include_once ("files/web/confirm.php");
	   break; 
 case "subscriptions" :
		include_once ("files/web/subscriptions.php");
		break;  
  case "exit" :
	   $sql="update $tableusers_log set date_logout=NOW() where id = ".$_SESSION['user_login']['login_id'];
     $rs =$db->Execute($sql);
     unset($_SESSION['user_login']);
     	header ( "Location: " . $path_site.'login/' );
		break;      
	default : // empty
		header ( "Location: " . $path_site );
		break;
}
?>