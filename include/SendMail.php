<?php
class SendMail
{
	function __construct()
	{
		ini_set("SMTP","owain.st.niituniversity.in");
		//ini_set("username","INNU\Moodle");
		//ini_set("password","pass#123");
		ini_set('sendmail_from','no-reply@niituniversity.in');
	}
	
	function mailRegister($email, $fname, $lname, $uname, $pass, $level)
	{
		require_once("mailtest1.inc");
		$mailme = mail($email,"ETIC-Registration Successful",create_content_new_account($email, $fname, $lname, $uname, $pass, $level),"no-reply@niituniversity.in");
		return $mailme;
	}
	function mailpasswchange($email, $fname, $lname, $username, $pass)
	{
		require_once("mailtest1.inc");
		$mailme1 = mail($email,"ETIC-Password Change Successful",create_content_password_reset($email, $fname, $lname, $username, $pass),"no-reply@niituniversity.in");
		return $mailme1;
	}
}
?>
