
<?php
require("lib/dotenv/dotenv.php");
use DotEnv\DotEnv;
(new DotEnv('.env'))->load();
//mail
require('mail/savecontact.php');
//airtable
require('airtable/savecontact.php');
//mailchimp
require('mailchimp/savecontact.php');
//sendinblue
require('sendinblue/savecontact.php');
//mail
if(getenv('mail')=='enable')
{
      send_mail($emailID, $sub, $msg, $to, $fullName);
}
//airtable
if(getenv('airtable')=='enable')
{
	airtable();
}
//mailchimp
if(getenv('mailchimp')=='enable')
{
	mailchimp();
	
}
//sendinblue
if(getenv('sendinblue')=='enable')
{
	sendinblue();
	 
	
}
?>