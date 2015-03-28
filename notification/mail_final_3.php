<?php
session_start();
if (isset($_SESSION["key"]))
{
	if($_SESSION["key"]==false)
	{
		header('Refresh: 0;notlog.html');
	}
	else
	{
		$_SESSION["key"]=true;
	}
}
else
{
	header('Refresh: 0;notlog.html');
}
require_once('class.phpmailer.php');
$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for GMail
$mail->Host = "smtp.gmail.com";
$mail->Port = 465; // or 587
$mail->IsHTML(true);
$mail->Username = "username";
$mail->Password = "pwd";
$mail->Subject = $_POST['subject'];
$mail->Body = $_POST['message'];
if(isset($_POST['attach']))
{
$mail->AddAttachment($_POST['attach']);    
}
$count=0;
$_SESSION['ct']=0;
foreach($_SESSION["selted"] as $idee) 
{
if($count==0)
{
	$mail->AddAddress($idee);
	$count++;
	$_SESSION['ct']=$_SESSION['ct']+1;
}
}
$count=0;
foreach($_SESSION["selted"] as $idee) 
{
	if($count>0)
	{
		$_SESSION['ct']=$_SESSION['ct']+1;
		$mail->AddAddress($idee);
	}	
	$count++;
}
 if(!$mail->Send())
    {
    echo "Error!".$mail->ErrorInfo;
    }
    else
    {
    header('Refresh: 0;/notification/sent.php');
    }
?>
  