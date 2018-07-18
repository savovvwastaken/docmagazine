<?php
function secure($input) {
	$input = addslashes($input);
	$input = htmlspecialchars($input);
	$input = str_replace("'", "", $input);
	$input = str_replace(".", "", $input);
	$input = str_replace('"', '', $input);
	$input = str_replace("&", "", $input);
	$input = str_replace(":", "", $input);
	$input = str_replace(";", "", $input);
	$input = str_replace("*", "", $input);
	$input = strip_tags($input);
//	$input = mysql_real_escape_string($input);
	$input = substr($input, 0, 255);
	return $input;
}


function securemail($input) {
	$input = addslashes($input);
	$input = htmlspecialchars($input);
	$input = str_replace("'", "", $input);

	$input = str_replace('"', '', $input);
	$input = str_replace("&", "", $input);
	$input = str_replace(":", "", $input);
	$input = str_replace(";", "", $input);
	$input = str_replace("*", "", $input);
	$input = strip_tags($input);
//	$input = mysql_real_escape_string($input);

	return $input;
}


function StripItem ($tt){
	$text=stripslashes($tt);
	$text=str_replace("'","`",$text);
	$text=trim(str_replace('"',"&quot;",$text));
	$text=substr($text, 0, 510);
	return $text;
}

function StripItem2 ($tt){
	$text=stripslashes($tt);
	$text=str_replace("'","`",$text);
	$text=strip_tags($text,'<iframe><strike><object><embed><p><b><br><strong><a><img><li><ul><ol><table><tr><td><th><form><input><div><select><textarea><option><sup><sub><h1><h2><h3><h4><h5><h6><font><span><i><em>');
	return $text;
}

function StripItem_email ($tt){
	$text=stripslashes($tt);
	$text=str_replace("'","`",$text);
	$text=strip_tags($text,'<p><strike><b><br><strong><a><img><li><ul><ol><table><tr><td><sup><sub><h1><h2><h3><h4><h5><h6><font><span>');
	return $text;
}


function is_email($address) {
	//$x = (ereg('^[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+'. '@'.'[-!#$%&\'*+\\/0-9=?A-Z^_`a-z{|}~]+\.' .'[-!#$%&\'*+\\./0-9=?A-Z^_`a-z{|}~]+$', $address));

	$x=preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i', $address);
	$x=preg_match('(^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$)', $address);

	if (!$x) return false;

	$email = $address;
	$has_a = strpos($email, '@');

	if ($has_a === false) return false;
	$has_another = strpos($email, '@', $has_a + 1);

	if (! $has_another === false) return false;
	$has_dot = strpos($email, '.', $has_a + 1);

	if ($has_dot === false)    return false;
	if ($has_dot == strlen($email) - 1) return false;
	list($user, $domain) = explode('@', $email);

	if ($user == '') return false;
	$has_mx = (checkdnsrr($domain, 'A') || checkdnsrr($domain, 'MX'));

	return $has_mx;
}

function MAIL_NVLP($fromname, $fromaddress, $toname, $toaddress, $subject, $message)
{

	$headers  = "MIME-Version: 1.0\n";
	$headers .= "Content-type: text/plain; charset=utf-8\n";
	$headers .= "X-Priority: 3\n";
	$headers .= "X-MSMail-Priority: Normal\n";
	$headers .= "X-Mailer: php\n";
	$headers .= "From: \"".$fromname."\" <".$fromaddress.">\n";
	$headers .= "Return-Path: $fromname <$fromaddress>\n";
	return mail($toaddress, $subject, $message, $headers);
}



function page_count($count, $offset, $link, $rows)
{
	global $num_news;
	$text='';
	$PHP_SELF=$_SERVER['PHP_SELF'];
	$StartItem=$offset;
	$TrailingPages=5;
	//kolko da se listwat
	$ItemsPerPage =$rows;
	//obstiq broi na rezulatata
	$TotalItems = $count;
	//obstiq broi na stranicite
	$TotalPages = ceil($TotalItems/$ItemsPerPage);
	$CurrentPage = (floor($StartItem/$ItemsPerPage))+1;

	if ($CurrentPage>$TotalPages) $CurrentPage=$TotalPages;
	if ($CurrentPage>1)
		$text.='<a href="'.$link.(($CurrentPage-2)*$ItemsPerPage).'">&laquo;</a>  ';
	$NumberedPages = ($TrailingPages*2)+1;
	for ($i=0; $i<$NumberedPages; ++$i)
	{
		$Pagenumber = $CurrentPage+$i-$TrailingPages;
		if ($Pagenumber<$CurrentPage && $Pagenumber > 0)
		{
			$text.='&nbsp;&nbsp;<a href="' .$link. (($Pagenumber-1)*$ItemsPerPage) . '">' . $Pagenumber . '</a>';
			$test='&nbsp;';
		}

		if ($Pagenumber==$CurrentPage)
			$text.= '&nbsp;&nbsp;<b>' . $CurrentPage . '</b>&nbsp;';

		if ($Pagenumber>$CurrentPage && $Pagenumber <= $TotalPages)
		{
			$text.='&nbsp;&nbsp;<a href="'.$link.(($Pagenumber-1)*$ItemsPerPage).'">' . $Pagenumber . '</a>';
		}

	}

	if ($CurrentPage<$TotalPages)
	{
		$text.= '&nbsp;&nbsp;&nbsp;';
		if ($Pagenumber<$TotalPages)  {
			$text.='... &nbsp;<a href="'.$link.(($TotalPages-1)*$ItemsPerPage).'">'.$TotalPages.'</a>';
		}
		$text.='&nbsp;&nbsp; <a href="'.$link.(($CurrentPage)*$ItemsPerPage).'"> &raquo; </a>';

	}
	return $text;
}

function page_count_list($count, $offset, $link, $rows)
{
	global  $path_site, $dict_arr;
	$lng='bg';
	$text='';
	$PHP_SELF=$_SERVER['PHP_SELF'];
	$StartItem=$offset;
	$TrailingPages=2;
	//kolko da se listwat
	$ItemsPerPage =$rows;
	//obstiq broi na rezulatata
	$TotalItems = $count;
	//obstiq broi na stranicite

	$TotalPages = ceil($TotalItems/$ItemsPerPage);
	$CurrentPage = (floor($StartItem/$ItemsPerPage))+1;

	if ($CurrentPage>$TotalPages) $CurrentPage=$TotalPages;
	if ($CurrentPage>1)
		$text.='<a href="'.$link.(($CurrentPage-2)*$ItemsPerPage).'/" title="предишен"> < </a>';
	else
		$text.='';
	$NumberedPages = ($TrailingPages*2)+1;



	$text.='';
	for ($i=0; $i<$NumberedPages; ++$i)
	{
		$Pagenumber = $CurrentPage+$i-$TrailingPages;
		if ($Pagenumber<$CurrentPage && $Pagenumber > 0)
		{

			$text.='<a href="'. $link  . (($Pagenumber-1)*$ItemsPerPage) . '/">' . $Pagenumber . '</a>';

		}

		if ($Pagenumber==$CurrentPage)
			$text.= ($offset?'':'').'<span class="active">' . $CurrentPage . '</span>'.(($count>$offset && $count<= ($offset+$rows))?'':'');

		if ($Pagenumber>$CurrentPage && $Pagenumber <= $TotalPages)
		{
			$text.='<a href="'.$link.(($Pagenumber-1)*$ItemsPerPage).'/">' . $Pagenumber . '</a>';
		}

	}

	if ($CurrentPage<$TotalPages)
	{
		$text.= '';
		if ($Pagenumber<$TotalPages)  {
			$text.='<a href="'.$link.(($TotalPages-1)*$ItemsPerPage).'/">'.$TotalPages.'</a>';
		}
		$text.='';

		$text.='<a href="'.$link.(($CurrentPage)*$ItemsPerPage).'/" title="следващ"> > </a>';

	} else {
		$text.='';
	}

	return $text;
}


function generatePassword ($length)
{

	// start with a blank password
	$password = "";

	// define possible characters
	$possible = "0123456789bcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";

	// set up a counter
	$i = 0;

	// add random characters to $password until $length is reached
	while ($i < $length) {

		// pick a random character from the possible ones
		$char = substr($possible, mt_rand(0, strlen($possible)-1), 1);

		// we don't want this character if it's already in the password
		if (!strstr($password, $char)) {
			$password .= $char;
			$i++;
		}

	}

	// done!
	return $password;

}
 
function DownloadFile ($folder, $file){
	if (!is_file($folder.$file)) {
		die('');
	}
	$ext =explode (".", $file);
	$ext = strtolower(end($ext));


	switch ($ext) {
		case 'pdf':
			$mime_type = 'application/pdf';
			break;

		case 'jpg':
			$mime_type="image/jpeg" ;
			break;

		case 'jpeg':
			$mime_type="image/jpeg" ;
			break;

		case 'gif':
			$mime_type="image/gif" ;
			break;

		case 'swf':
			$mime_type="application/x-shockwave-flash" ;
			break;

		case 'png':
			$mime_type="image/png" ;
			break;

		case 'doc':
			$mime_type="application/msword" ;
			break;

		case 'docx':
			$mime_type="application/vnd.openxmlformats-officedocument.wordprocessingml.document" ;
			break;

		case 'xls':
			$mime_type="application/vnd.ms-excel" ;
			break;

		case 'xlsx':
			$mime_type="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet " ;
			break;

		case 'rar':
			$mime_type="application/zip, application/x-compressed-zip" ;
			break;

		case 'zip':
			$mime_type="application/zip, application/x-compressed-zip" ;
			break;

		case 'ppt':
			$mime_type="application/vnd.ms-powerpoint" ;
			break;

		case 'ppt':
			$mime_type="application/vnd.ms-powerpoint" ;
			break;

		case 'rtf':
			$mime_type="application/rtf" ;
			break;

		default:
			$mime_type = 'application/octet-stream';
			break;


	}

	header("Pragma: public");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	header("Cache-Control: public");
	header("Content-Description: File Transfer");

	header('Content-Type: '.$mime_type);
	header('Content-Disposition: attachment; filename=' .basename($file));
	header("Content-Transfer-Encoding: binary");
	header('Content-Length: ' . filesize($folder.$file));

	readfile($folder.$file);

	//exit;
}

function UploadFile ($files, $path_admin, $path_img, $table, $pole, $pole_id, $t, $filename){
	global $allow_ext, $size_pic, $db;
	$err['file']='';

	$type_=explode(".", $files['name']);
	$ext = strtolower(end($type_));
	$article =0;
	if (in_array($ext, $allow_ext)) {

		if (!$t){
			$sql="insert into $table ($pole) values ($pole_id)";
			$rs =$db->Execute($sql);

			$article=$db->Insert_ID();
			$t = $article;
			$sql="update $table set sort = $article where id = $article";
			$rs =$db->Execute($sql);
		} else $article=$t;

		$file_=$filename.'_big_'.$article.'.'.$ext;

		if (0 == $files['error']) {
			$pi  = pathinfo($files['name']);
			$img_name = $path_admin.$path_img .$file_;
			$kk = move_uploaded_file($files['tmp_name'], $img_name);
			if ($kk){
				chmod ($img_name, 0666);
				$size = getimagesize($img_name);
				if ($size) {

					if ($size[0] == $size_pic['pic']['x'] && $size[1] == $size_pic['pic']['y'] ){
						$pic = $filename.'_pic_'.$article.'.'.$ext;
						$img_name2 = $path_admin.$path_img .$pic;

						copy($img_name,$img_name2);
						chmod ($img_name2, 0666);

						$size = getimagesize($img_name);
						$x=$size[0];
						$y=$size[1];

						$sql="update $table set  big =  '$file_', pic='$pic',   x=$x, y=$y where id = $article";
						$rs =$db->Execute($sql);

					} else {

						if ($size[0]>$size[1]) {
							if ($size[0]>$size_pic['big']['x']) resize_pic($file_, $path_admin.$path_img,$size_pic['big']['x']);
						} else {
							if ($size[1]>$size_pic['big']['y']) resize_pic_y($file_, $path_admin.$path_img,$size_pic['big']['y']);
						}

						$size = getimagesize($img_name);
						$x=$size[0];
						$y=$size[1];

					}

					$sql="update $table set big='$file_',  x=$x, y=$y where id = $article";
					$rs =$db->Execute($sql);


				} else $err['file'].= 'Проблем при качването на файла!';
			} else $err['file'].= 'Проблем при качването на файла!';
		} else $err['file'].= 'Проблем при качването на файла!';

	} else $err['file'].='Непозволен тип на файла!';
	if ($t && $err['file']) {
		$sql="delete from $table where id=$t";
		$rs =$db->Execute($sql);
	}
	$err['id']=$t;
	return $err;
}

function UploadFileOnly ($files, $path_admin, $path_img, $filename, $allow_ext, $w, $h){
	global  $db;
	$err['file']='';
	$type_=explode(".", $files['name']);
	$ext = strtolower(end($type_));
	$img_name=$file_ ='';
	if ($ext){
		if (in_array($ext, $allow_ext)) {

			if (0 == $files['error']) {
				$pi  = pathinfo($files['name']);
				$file_=$filename.'.'.$ext;
				$file_logo=$filename.'_logo.'.$ext;
				$img_name = $path_admin.$path_img .$file_;
				$img_name2 = $path_admin.$path_img .$file_logo;
				 
				$kk = move_uploaded_file($files['tmp_name'], $img_name);
				if ($kk){
					chmod ($img_name, 0666);
					if ($w || $h) {
					copy($img_name,$img_name2);
				    chmod ($img_name2, 0666);
					}  
					$err['name']=$file_;
					 
					if ($w) { resize_pic($file_logo, $path_admin.$path_img,$w); $err['name_logo']=$file_logo;}
					if ($h){ resize_pic_y($file_logo, $path_admin.$path_img,$h); $err['name_logo']=$file_logo;}

				} else $err['file']= 'Проблем при качването на файла!';
			} else $err['file']= 'Проблем при качването на файла!';

		} else $err['file']='Непозволен тип на файла!';
	} else $err['file']='Качете файл!';
	return $err;
}
 
function post($url,$data) {
	global $path_site;
	$html = '<form action="'.$url.'" method="post" name="frm">';
	foreach($data as $key=>$val) {
		$html.= '<input type=hidden name="'.$key.'" value="'.$val.'" />';
	}
	$html.= '</form>';
	$html= '<html><head><meta charset="utf-8"></head><body style="background: #e7e7e7;"><div style="font: normal 23px arial;text-align:center;margin-top:20%;background:url('.$path_site.'img/loader.gif) center bottom no-repeat; padding-bottom:50px;height: 19px;">Моля изчакайте .... </div>
			'.$html.'
					<script>document.frm.submit()</script></body></html>';
	exit($html);
}

?>
