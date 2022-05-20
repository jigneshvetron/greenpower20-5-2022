<?php // Process form submission and integrate with Mailchimp API


function mailchimp()
{

// Check user has accepted to sign up to the newsletter

// Set API credentials and build URL
    $data_center = 'us14';
    $audience_id = '29ddc9d315';
    $api_key = getenv('api');
    $url = 'https://' . $data_center . '.api.mailchimp.com/3.0/lists/' . $audience_id . '/members';
    $email=$_POST['email'];
//print_r($api_key);
//die;
    if(isset($_POST['newsletter'])){
        $status='subscribed';
    }
    else
    {
        $status='unsubscribed';
    }
    $user_details = [
        'email_address' =>$email,
        'status' => $status,
        "merge_fields" => [
          "FNAME" => "Green",
          "LNAME" => "Power"
      ]
  ];
//print_r( $user_details);
//die();
  $user_details = json_encode($user_details);
// Send POST request with cURL
  $ch = curl_init($url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLINFO_HEADER_OUT, true);
  curl_setopt($ch, CURLOPT_POST, true);
  curl_setopt($ch, CURLOPT_USERPWD, 'newsletter:' . $api_key);
  curl_setopt($ch, CURLOPT_POSTFIELDS, $user_details);
  curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($user_details)
]);
  $result = curl_exec($ch);
  $result_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
  curl_close($ch);
  // print_r($result);
  $lang=$_POST['store'];
  if($_POST['store']){
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
   }
   header("location:https://test.greenpwr.eu/".$lang."/contact/");
}
else
{
    session_start();
    $_SESSION['successmsg']="Your message is successfully sent.";
    header("location:https://test.greenpwr.eu/contact/");
}



//header("location:https://test.greenpwr.eu/contact/"); 

}
?>