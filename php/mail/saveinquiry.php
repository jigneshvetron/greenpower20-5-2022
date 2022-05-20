<?php
header('Content-type:application/json;charset=utf-8');

ini_set('display_errors', 1);
error_reporting(E_ALL);
require('user_function.php');
require("../lib/class.phpmailer.php");
require("../lib/PHPMailerAutoload.php");
require("../lib/SMTP.php");
require("../lib/dotenv/dotenv.php");

use DotEnv\DotEnv;
(new DotEnv('../../.env'))->load();


/*********** Below three function define in root path contents/user_function.php file **************/
$user_os        =   getOS();
$user_browser   =   getBrowser();
$current_ip     =   current_ip();
/**************************************************************************************************/

function send_mail($email,$subject,$message,$to,$full_name) {
	//************Send mail process*************//	
	$mail = new PHPMailer(); // create a new object
	$mail->IsSMTP(); // enable SMTP
	$mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mail->SMTPAuth = true; // authentication enabled
	$mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
	$mail->Host = getenv('Host');
	$mail->Port = getenv('Port');
	$mail->IsHTML(true);
	/* Sent mail from */
	$mail->Username = getenv('Username');
	$mail->Password = getenv('Password');
	/*$mail->SetFrom($email);*/
	$mail->From = $email;
	$mail->FromName = $full_name;
	$mail->Subject = $subject;
	$mail->Body = $message;
	/* Sent mail to */
	//$mail->AddAddress("vetron.marketing@gmail.com");
	$mail->AddAddress(getenv('FromEmail'));
	$mail->addReplyTo($email);
	/*$file_tmp  = $_FILES['recipient-resume']['tmp_name'];
	$file_name = $_FILES['recipient-resume']['name'];
	$mail->AddAttachment($file_tmp, $file_name);*/
	 if(!$mail->Send()) {
		//echo  $mail->ErrorInfo;
		return false;
	 } else {
	 	if($to!="") {
	 		if (reply_mail($to,$email,$full_name) == false ) {
	 			return false;
	 		} else {
	 			return true;
	 		}
	 	}
		return true;
	 }
}

function reply_mail($to,$from,$full_name) {

	$subject="Thank you for inquiring about our product and reaching us - Green Power";
	$message='<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
    <table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
        <tbody>
            <tr>
                <td align="center" valign="top">
                    <div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#6CB544">
                        <table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
                            <tbody>
                                <tr>
                                    <td width="8" style="width:8px"></td>
                                    <td>
                                        <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
                                    </td>
                                    <td width="8" style="width:8px"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
            <tr>
                <td align="center" valign="top">
                    <table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
                        <tbody>
                            <tr>
                                <td width="8" style="width:8px"></td>
                                <td>
                                    <div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
                                        <img src="https://greenpwr.eu/images/logo/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="GREEN POWER™️">
                                        <div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:24px;text-align:center;word-break:break-word">
                                            <div style="font-size:24px">Dear '.$full_name.',</div>
                                            <div style="font-size:18px">Thank you for inquiring with GREEN POWER<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;">TM</span></div>
                                        </div>
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Thanks for getting in touch! This is an automatic response to let you know that we have received your contact form and our Personnel will reach out to you within 1-2 business days.</div>
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">For any general questions, you can head to our FAQ section.</div>
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">Please feel free to send us reply to this email if you have any extra details that can help us assist you.</div>
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;font-size:14px;color:rgba(0,0,0,0.87);line-height:20px;padding-top:20px;text-align:center">We look forward to working with you very soon.</div>
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;padding-top:20px;font-size:12px;line-height:16px;color:#5f6368;letter-spacing:0.3px;text-align:center">Kind regards<br><a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.87);text-decoration:inherit">GREEN POWER<span style="font-size: 0.4em;vertical-align: text-top;font-weight: 700;line-height: 2em;margin-left: 2px;">TM</span></a>
                                        </div>
                                    </div>
                                    <div style="text-align:left">
                                        <div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
                                            <div style="direction:ltr">Copyright © 2021, Green Power, <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center"></a></div>
                                        </div>
                                    </div>
                                </td>
                                <td width="8" style="width:8px"></td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
</div>';

	//************Replay mail process*************//	
	$mails = new PHPMailer(); // create a new object
	$mails->IsSMTP(); // enable SMTP
	$mails->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
	$mails->SMTPAuth = true; // authentication enabled
	$mails->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
	$mails->Host = getenv('Host');
	$mails->Port = getenv('Port');
	$mails->IsHTML(true);
	$mails->Username = getenv('Username');
	$mails->Password = getenv('Password');
	$mails->From = 'info@greenpwr.eu';
	$mails->FromName = 'Green Power';
	$mails->Subject = $subject;
	$mails->Body = $message;
	$mails->AddAddress($from);
	$mails->addReplyTo($to);
	/*$file_tmp  = $_FILES['recipient-resume']['tmp_name'];
	$file_name = $_FILES['recipient-resume']['name'];
	$mails->AddAttachment($file_tmp, $file_name);*/
	if(!$mails->Send()) {
		echo  $mails->ErrorInfo;
		return false;
	} else {
		return true;
	}
}

$fullName = isset($_REQUEST['fullname']) == true ? $_REQUEST['fullname'] : "";
$emailID = isset($_REQUEST['email']) == true ? $_REQUEST['email'] : "";
$subject = "Green Power | Inquiry Form";
$phoneCode = isset($_REQUEST['countryCode']) == true ? $_REQUEST['countryCode'] : "";
$phone = isset($_REQUEST['phone']) == true ? $_REQUEST['phone'] : "";
$address = isset($_REQUEST['address']) == true ? $_REQUEST['address'] : "";
$systemIns = isset($_REQUEST['system_installer']) == true ? $_REQUEST['system_installer'] : "";
$project = isset($_REQUEST['project']) == true ? $_REQUEST['project'] : "";
$usage = isset($_REQUEST['usage']) == true ? $_REQUEST['usage'] : "";
$systemType = isset($_REQUEST['system_type']) == true ? $_REQUEST['system_type'] : "";
$panelPlace = isset($_REQUEST['panel_place']) == true ? $_REQUEST['panel_place'] : "";
$finance = isset($_REQUEST['finance']) == true ? $_REQUEST['finance'] : "";

$successArr["flag"] = "true";
$failureArr["flag"] = "false";

if ($fullName == "" || $emailID == "" || $phone == "" || $phoneCode == "" || $address == "" || $systemIns == "" || $project == "" || $usage == "" || $systemType == "" || $panelPlace == "" || $finance == "") {
	echo json_encode($failureArr);
} else {
	$sub = 'Green Power - Inquiry Form';
	//$to = 'vetron.marketing@gmail.com';
	$to = getenv('FromEmail');
	$msg='<!doctype html>
	<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	</head>
	<body>
		<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#f2f5f9">
			<table role="presentation" width="100%" border="0" cellspacing="0" cellpadding="0" bgcolor="#f2f5f9">
				<tbody>
					<tr>
						<td align="center" valign="top">
							<div style="padding:0!important;margin:0!important;display:block!important;min-width:100%!important;width:100%!important;background:#6CB544">
								<table border="0" cellspacing="0" cellpadding="0" style="max-width:516px;min-width:220px;width: 100%;">
									<tbody>
										<tr>
											<td width="8" style="width:8px"></td>
											<td>
												<div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-bottom-width:0px;background:#ffffff;margin-top:20px;padding:20px" align="center"></div>
											</td>
											<td width="8" style="width:8px"></td>
										</tr>
									</tbody>
								</table>
							</div>
						</td>
					<tr>
						<td align="center" valign="top">
							<table border="0" cellspacing="0" cellpadding="0" style="padding-bottom:20px;max-width:516px;min-width:220px;width: 100%;">
								<tbody>
									<tr>
										<td width="8" style="width:8px"></td>
										<td>
											<div style="border-style:solid;border-width:10px;border-color:#e4eaf3;border-top-width:0px;background:#ffffff;margin-bottom: 20px;padding:0px 20px 40px 20px" align="center">
												<img src="https://greenpwr.eu/images/logo/logo.png" width="260" height="52" aria-hidden="true" style="margin-bottom:16px" alt="GREEN POWER™️">
												<div style="font-family:Google Sans,Roboto,RobotoDraft,Helvetica,Arial,sans-serif;border-bottom:thin solid #dadce0;color:rgba(0,0,0,0.87);line-height:32px;padding-bottom:25px;text-align:center;word-break:break-word">
													<div style="font-size:24px"> Inquiry Form </div>
												</div>

												<div style="padding-top:30px; ">
												<table style="border: 1px solid #f2f5f9;background-color: #f2f5f9;border-radius: 3px;text-align: left;vertical-align: top;border-collapse: collapse;width: 100%;">
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Name</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;"><b>'.$fullName.'</b></td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Email</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$emailID.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Phone</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$phoneCode.' - '.$phone.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Address</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$address.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">System Installer</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;"><b>'.$systemIns.'</b></td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Project</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;"><b>'.$project.'</b></td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Monthly electric usage in kWh</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$usage.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">System Type</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$systemType.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Solar Panel Place</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$panelPlace.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Finance</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$finance.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">Browser</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$user_browser.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">IP Address</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$current_ip.'</td>
													</tr>
													<tr>
														<td style="padding: 10px;border:1px solid #c4cdda;width: 160px;">OS</td>
														<td style="padding: 10px;border:1px solid #c4cdda;font-weight: bold;">'.$user_os.'</td>
													</tr>
												</table>
												</div>
											</div>
											<div style="text-align:left">
												<div style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center">
													<div style="direction:ltr">Copyright © 2021, Green Power, <a style="font-family:Roboto-Regular,Helvetica,Arial,sans-serif;color:rgba(0,0,0,0.54);font-size:11px;line-height:18px;text-align:center"></a></div>
												</div>
											</div>
										</td>
										<td width="8" style="width:8px"></td>
									</tr>
								</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</body>
	</html>';

	//************Send mail process*************//	
	$mailFlag = send_mail($emailID, $sub, $msg, $to, $fullName);
	if ($mailFlag == true) {
		echo json_encode($successArr);
	} else {
		echo json_encode($failureArr);
	}
	
}
exit;
?>
