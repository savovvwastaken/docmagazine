<?php

$last_doc = $db->GetAssoc("select * from $tabledocuments where 1 order by date desc limit 0, 3");
$smarty->assign('last_doc', $last_doc);

$smarty->display('index.tpl');

?>
