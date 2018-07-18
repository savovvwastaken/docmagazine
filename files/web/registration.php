<?php
$err= array();
$IP = $_SERVER['REMOTE_ADDR'];
$text_send="";  
if (isset($_POST['uname'])) $uname=StripItem($_POST['uname']); else $uname="";
if (isset($_POST['upass'])) $upass=StripItem($_POST['upass']); else $upass="";
if (isset($_POST['email'])) $email=StripItem($_POST['email']); else $email="";
 
 
 if (isset($_POST['sendreg'])) {
  if (!$email) $err['email']  ="Въведете E-mail";
  else if (!is_email($email)) $err['email']  ="Въведете коректен E-mail";
  if (!$uname) $err['uname']  ="Въведете потреб. име";
  if (!$upass) $err['upass']  ="Въведете парола";
  
  if (empty($err)) {
    $count = $db->GetOne("select email from $tableusers where email='$email'") ;
    if ($count )   $err['email']  ="С този E-mail вече съществува акаунт, въведете друг";
    else {
      $rlink = generatePassword(15).mt_rand();
      $sql="insert into $tableusers (date, IP, uname, upass, email, status, link ) values (NOW(), '$IP', '$uname', '".sha1($upass)."', '$email', 0, '$rlink') ";
      $rs =$db->Execute($sql);
      
      	require("PHPMailer/class.phpmailer.php");
	    $mail = new PHPMailer();
			
        $text="";
	    $text='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Потвърдете регистрацията</title>
</head>
		
<body style="padding:0; margin:0; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#292929; background:#ffffff">
<table width="98%" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" border="0">
<tr>
<td>
	<table width="600" cellpadding="0" cellspacing="0" bgcolor="#ffffff" align="center" border="0">
    	<!-- Header -->
		
        <!-- End Header -->
        <!-- Main -->
        <tr>
        	<td colspan="3" height="20"></td>
        </tr>
        <tr>
        	<td width="35"></td>
            <!-- Title -->
            <td width="530">
            	<span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#295185; text-transform:uppercase; font-weight:bold;">Потвърдете регистрацията</span>
            </td>
            <!-- End Title -->
            <td width="35"></td>
        </tr>
        <tr>
       	  <td colspan="3" height="10"></td>
        </tr>
		
        <tr>
        	<td width="35"></td>
            <!-- Content -->
            <td width="530">
           	  <table width="530" cellpadding="0" border="0" cellspacing="0">
                 	<tr>
                        <td width="15" bgcolor="#295185" height="35"></td>
                        <td width="125" bgcolor="#295185"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff;">Здравейте, моля потвърдете регистрацията, като кликнете на линка:</span></td>
                        <td width="15" bgcolor="#e5e5e5"></td>
                        <td width="355" bgcolor="#e5e5e5"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#292929;">
                         <a href="'.$url.'confirm/'.$rlink.'/">'.$url.'confirm/'.$rlink.'/</a>
                        </span></td>
                    </tr>
            	    	<tr>
                    	<td colspan="4" height="1"></td>
                    </tr>
                  <tr>
                     <td width="15" bgcolor="#295185" height="35"></td>
               	     <td width="125" bgcolor="#295185"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff;">Date</span></td>
                     <td width="15" bgcolor="#e5e5e5"></td>
                     <td width="355" bgcolor="#e5e5e5"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#292929;">'.date("Y-m-d H:i:s").'</span></td>
                 </tr>
                 <tr>
                    	<td colspan="4" height="1"></td>
                 </tr>
          	    <tr>
                     <td width="15" bgcolor="#295185" height="35"></td>
               	     <td width="125" bgcolor="#295185"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#fff;">IP</span></td>
                     <td width="15" bgcolor="#e5e5e5"></td>
                     <td width="355" bgcolor="#e5e5e5"><span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#292929;">'.$IP.'</span></td>
                 </tr>
                 <tr>
                    	<td colspan="4" height="1"></td>
                 </tr>
		
               <tr>
                  <td colspan="4" height="25"></td>
                </tr>
                </table>
            </td>
            <!-- End Content -->
            <td width="35"></td>
        </tr>
        <!-- End Main -->
    </table>
</td>
</tr>
</table>
</body>
</html>';


        	$subject='Потвърдете регистрацията: docmagazine ';
            
            $mail->Subject = $subject;
            $mail->From = 'no-replay@docmagazine.000webhostapp.com';
		    $mail->FromName = 'no-replay@docmagazine.000webhostapp.com';
        	$mail->AddAddress($email);
        
       
			$mail->Body    	= $text;
			$mail->CharSet    = 'utf-8';
		 
			$mail->IsHTML(true);
			$oks = $mail->Send();
		
			if ($oks) 
				$text_send = "На посочения от Вас E-mail ще получите линк за потвърждение.";
			else 
				$text_send = "Възникна грешка при изпращане на E-mail.";
			    


      }
   
  
  }
 
 }
 
 
$smarty->assign('uname', $uname);
$smarty->assign('upass', $upass); 
$smarty->assign('email', $email); 
$smarty->assign('err', $err);
$smarty->assign('text_send', $text_send); 
$smarty->display('registration.tpl');
?>