<?php
$text=""; $text_ok="";  $err=array();$pay=0;
 
if ($link) {
  if ($link=='new') {
    if (isset($_SESSION['user_login']['id'])) {
     $name = $textdoc = $pic=$doc="";
     if ($_SESSION['user_login']['id']==1)  {
     if (isset($_POST['name'])) $name=StripItem($_POST['name']); else $name="";
     if (isset($_POST['textdoc'])) $textdoc=StripItem2($_POST['textdoc']); else $textdoc="";
     if (isset($_POST['pay'])) $pay=1; else $pay=0;
      if (isset($_POST['create']))  {
       if (!$name) $err['name'] ="Въведете име";
       if (!$textdoc) $err['textdoc'] ="Въведете описание";
       if (isset($_FILES['pic'])) {
                if (isset($_FILES['pic']['name']) && $_FILES['pic']['name']!='') {
                    $type_=explode(".", $_FILES['pic']['name']);
                    $ext = strtolower(end($type_));
                    if (in_array($ext, $allow_ext_pics)) {
                        $pic='pic_'.time().'.'.$ext;
                        if (0 == $_FILES['pic']['error']) {
                            $pi  = pathinfo($_FILES['pic']['name']);
                            $img_name = $path.$path_doc .$pic;
                            $kk = move_uploaded_file($_FILES['pic']['tmp_name'], $img_name);
                            if ($kk){
                                chmod ($img_name, 0666);
                             } else $err['pic'].= 'Проблем при качването на файла!';
                        } else $err['pic']= 'Проблем при качването на файла!';
                        
                    } else $err['pic']='Непозволен тип на файла!';
                } else  $err['pic']='Въведете файл!';
                
        } else  $err['pic']='Въведете файл!'; 
        //end pics
        
        if (isset($_FILES['doc'])) {
                if (isset($_FILES['doc']['name']) && $_FILES['doc']['name']!='') {
                    $type_=explode(".", $_FILES['doc']['name']);
                    $ext = strtolower(end($type_));
                    if (in_array($ext, $allow_ext_files)) {
                        $doc='doc'.time().'.'.$ext;
                        if (0 == $_FILES['doc']['error']) {
                            $pi  = pathinfo($_FILES['doc']['name']);
                            $img_name = $path.$path_doc .$doc;
                            $kk = move_uploaded_file($_FILES['doc']['tmp_name'], $img_name);
                            if ($kk){
                                chmod ($img_name, 0666);
                             } else $err['doc'].= 'Проблем при качването на файла!';
                        } else $err['doc']= 'Проблем при качването на файла!';
                        
                    } else $err['doc']='Непозволен тип на файла!';
                } else  $err['doc']='Въведете файл!';
                
            } else  $err['doc']='Въведете файл!';
            
            if (empty($err)) {
         $sql="insert into $tabledocuments (date, name, text, pic, doc, pay) values ( NOW(), '$name' , '$textdoc', '$pic', '$doc', $pay) ";
         $rs =$db->Execute($sql);
         
         if ($rs)  {
           $text_ok="Вие успешно въведохте документ.";
           }
        }
           }
     
       
     } else  $text="Вие не сте с администраторски права";

   } else 
     $text="Трябва да влезете в профила си с администраторски права";
     
     
     
   $smarty->assign('text_ok', $text_ok);    
   $smarty->assign('pay', $pay);
   $smarty->assign('err', $err);
   $smarty->assign('text', $text);
   $smarty->assign('name', $name);
   $smarty->assign('textdoc', $textdoc);
  
  $smarty->display('documents-new.tpl');
} else {

 $doc_arr = $db->GetRow("select * from $tabledocuments where id = $link ");
 
 if (!empty($doc_arr)) {
 $smarty->assign('doc_arr', $doc_arr);
 
 $subscr=0;
 if (isset($_SESSION['user_login']['id'])) {
      $subscr = $db->GetOne("select subscription from $tableusers where id=".$_SESSION['user_login']['id']) ;
       
 }
 
   if ($subscr==1 or $doc_arr['pay']==0)
   if (isset($_POST['download'])) {
    $filetodownload = $db->GetOne("select doc from $tabledocuments where id=".$link) ;
      DownloadFile ($path.$path_doc,  $filetodownload);
      
     if (isset($_SESSION['user_login']['id'])) {
       $sql="insert into documents_log (user_id, doc_id, date ) values (".$_SESSION['user_login']['id'].", $link, NOW() ) " ;
        $rs =$db->Execute($sql);
     }
   
   
   }
 
   $smarty->assign('subscr', $subscr);
   $smarty->display('documents-view.tpl');
 } else header ( "Location: " . $path_site.'documents/' );
}


} else { 
  $docs_arr = $db->GetAssoc("select * from $tabledocuments where 1 order by date desc limit $offset, $count_page ") ;
  
  $all = $db->GetOne("select count(*) from $tabledocuments");
	$link_site = $path_site.$type.'/offset/';
                     
	if ($all>$count_page)
	$nav = page_count_list($all, $offset, $link_site, $count_page);
	else
	$nav='';
       
   
  $smarty->assign('docs_arr', $docs_arr);
  $smarty->assign('nav', $nav);
  
  
  $smarty->display('documents.tpl');
}
?>