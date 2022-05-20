
<?php
function airtable()
{
$data=array (
  'records' => 
  array (
    array (
      'fields' => 
      array (
        'Full Name' => $_POST['fullname'],
        'Email' => $_POST['email'],
        'Mobile' => $_POST['phone'],
		'Subject' => $_POST['subject'],
		  'Status' => 
        array (
          0 => 'New Web Inquiry',
        ),
		 'Source ' => 
			array (
			  0 => 'Greenpwr.eu Web',
			),
		  'language' => $_POST['language'],
		
      ),
    ),
  ),
);
$je=json_encode($data);
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://api.airtable.com/v0/appx70ZIVSjyZjXvM/Table%201',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$je,
  CURLOPT_HTTPHEADER => array(
    'Authorization: Bearer keypH08O8fFhI3tiR',
    'Content-Type: application/json',
    'Cookie: brw=brwfAGlgsc30J9vk2'
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
		 header("location:https://test.greenpwr.eu/".$lang."/contact/");
	}
	else
	{
	    session_start();
	    $_SESSION['successmsg']="Your message is successfully sent.";
		header("location:https://test.greenpwr.eu/contact/");
	}
}
?>
