<?php 
$errors = '';
$myemail = 'freepickupkr@gmail.com';//<-----Put Your email address here.
if(empty($_POST['name'])  || 
   empty($_POST['email']))
{
    $errors .= "\n Error: all fields are required";
}

$name = $_POST['name']; 
$email_address = $_POST['email']; 
$message1 = $_POST['message1']; 
$now=date("Y-m-d H:i:s", time());

if (!preg_match(
"/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", 
$email_address))
{
    $errors .= "\n Error: Invalid email address";
}

if( empty($errors))
{
	$to = $myemail; 
	$email_subject  = '=?UTF-8?B?'.base64_encode( "Free Pick Up Apply" ).'?=';
	$email_body = "Free Pick Up Apply as below
	\n\n Full name: $name \n Email: $email_address
	\n\n Message \n $message1
	\n---------------------------------------
	\n 작성일자 : $now
	\n---------------------------------------
	";


	$headers = "From: $myemail\n"; 
	$headers .= "Reply-To: $email_address";
	
	mail($to,$email_subject,$email_body,$headers);
	//redirect to the 'thank you' page
	header('Location: contact-form-thank-you.html');
} 
?>
<html>
<head>
	<title>Contact form handler</title>
</head>

<body>
<!-- This page is displayed only if there is some error -->
<?php
echo nl2br($errors);
?>



</body>
</html>