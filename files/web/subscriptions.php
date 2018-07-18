<?php
$err = array();
$subscr=0;  $text=$date_subsr="";
if (isset($_POST['res'])) $res = secure($_POST['res']); else $res = "";
if (isset($_SESSION['user_login']['id'])) { 


if (isset($_POST['sendres'])) {
 if (!$res)  $err['res'] = "Моля, въведете число!";
  if (empty($err)) {
   if ($res==4) {
     $text = "Вие успешно се абонирахте за услугата!";
     $sql="update $tableusers set subscription=1, date_subsr=NOW() where id = ".$_SESSION['user_login']['id'] ;
     $rs =$db->Execute($sql);
    
    $subscr=1;
    }  else  $err['res'] = "Грешен отговор, моля опитайте отново!"; 
 }
}

$row = $db->GetRow("select * from $tableusers where id = ".$_SESSION['user_login']['id']." ");
if (!empty($row))  {
 $subscr =  $row['subscription'];
 $date_subsr  =  $row['date_subsr'];
}

 
}
$smarty->assign('err', $err);
$smarty->assign('res', $res);
$smarty->assign('subscr', $subscr);
$smarty->assign('text', $text);
$smarty->assign('date_subsr', $date_subsr);

$smarty->display('subscriptions.tpl');
?>