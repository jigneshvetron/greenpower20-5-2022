<?php
// Your code here!
function sendinblue(){
  $email=$_POST['email'];
  $sms=$_POST['countryCode'].$_POST['phone'];
  $fullname=$_POST['fullname'];
$data=array (
  'email' =>$email,
   'attributes' => 
  array (
    'FIRSTNAME' => 'Green',
    'LASTNAME' => 'Power',
     'SMS' => $sms,
  ),
  );
  $je=json_encode($data);
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.sendinblue.com/v3/contacts',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$je,
  CURLOPT_HTTPHEADER => array(
    'api-key: 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',
    'Content-Type: application/json',
    'Accept: application/json',
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;
$lang=$_POST['store'];
	if($_POST['store']){
		 session_start();
	   if($_POST['store']=='es')
   {
        $_SESSION['successmsg']="Su mensaje fue enviado con éxito.";
   }
   else if($_POST['store']=='ge')
   {
        $_SESSION['successmsg']="Ihre Nachricht wurde erfolgreich versandt.";
   }
   else if($_POST['store']=='du')
   {
        $_SESSION['successmsg']="Uw bericht is succesvol verzonden.";
   }
    else if($_POST['store']=='fr')
   {
        $_SESSION['successmsg']="Votre message est envoyé avec succès.";
   }if($_POST['store']=='es')
   {
        $_SESSION['successmsg']="Su mensaje fue enviado con éxito.";
   }
   else if($_POST['store']=='ge')
   {
        $_SESSION['successmsg']="Ihre Nachricht wurde erfolgreich versandt.";
   }
   else if($_POST['store']=='du')
   {
        $_SESSION['successmsg']="Uw bericht is succesvol verzonden.";
   }
    else if($_POST['store']=='fr')
   {
        $_SESSION['successmsg']="Votre message est envoyé avec succès.";
   }
		 header("https://greenpwr.eu/".$lang."/contact/");
	}
	else
	{
	    session_start();
	    $_SESSION['successmsg']="Your message is successfully sent.";
		header("https://greenpwr.eu/contact/");
	}

}
?>
