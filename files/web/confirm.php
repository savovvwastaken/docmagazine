<?php
 $text="";
 $sql="select * from $tableusers where link= '$link' ";
 $row = $db->GetRow($sql);
  
 if (!empty($row)) {
   if ($row['status']==1)
     $text = "Вие вече сте направили потвърждение.";
   else {
      $sql="update $tableusers set status=1 where id = ".$row['id'];
      $rs =$db->Execute($sql);
      
      $text = "Вие потвърдихте успешно вашия акаунт";
   } 
 }  else {
   header ( "Location: " . $path_site );
 }

$smarty->assign('text', $text); 

$smarty->display('confirm.tpl');
?>