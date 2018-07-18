<?php
  
 
$smarty->assign('path_site', $path_site);
$smarty->assign('path_doc', $path_doc);

$title = $description=$keywords = $brand_title;

$smarty->assign('id', $id);
$smarty->assign('offset', $offset);
$smarty->assign('link', $link);
$smarty->assign('type', $type);
$smarty->assign('url', $url);

$smarty->assign('title', $title);
$smarty->assign('description', $description);
$smarty->assign('keywords', $keywords);
$smarty->assign('brand_title', $brand_title);
?>
