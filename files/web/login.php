<?php
$err= array();   
if (isset($_POST['uname'])) $uname=StripItem($_POST['uname']); else $uname="";
if (isset($_POST['upass'])) $upass=StripItem($_POST['upass']); else $upass="";

if (isset($_POST['exit'])) {
//exit

}

if (isset($_POST['sendlogin'])) {
//login
   if (!$uname) $err['uname']  ="Въведете потреб. име";
   if (!$upass) $err['upass']  ="Въведете парола";
   if (empty($err)) {
     $sql="select * from $tableusers where uname = '$uname' and upass = '".sha1($upass)."'  and status=1 ";
      
     $row = $db->GetRow($sql);
     
     if (!empty($row)) {
     $sql="insert into $tableusers_log (user_id, date_login) values (".$row['id'].", NOW()) ";
     $rs =$db->Execute($sql);
     $login_id = $db->Insert_ID();
     
      $_SESSION['user_login']['id'] =  $row['id'];
      $_SESSION['user_login']['uname'] =  $row['uname'];
      $_SESSION['user_login']['login_id'] =  $login_id;
     } else 
        $err['upass']="Невалидно потребителско име или парола!";
   }

}

$smarty->assign('uname', $uname);
$smarty->assign('upass', $upass);
$smarty->assign('err', $err);

$smarty->display('login.tpl');
?>