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
		 include_once("ViaNettSMS.php");
        $Mobile = "+919008239720";
        // Declare variables.
        $Username = "charujainmb@gmail.com";
        $Password = "2pe5q";
        $MsgSender = $Mobile;
        $Message = $_POST['smsMessage'];
		$count=0;
		foreach($_SESSION['selted'] as $idee) 
		{
			$DestinationAddress = "+91".$idee;
        // Create ViaNettSMS object with params $Username and $Password
        $ViaNettSMS = new ViaNettSMS($Username, $Password);
        try
        {
            // Send SMS through the HTTP API
            $Result = $ViaNettSMS->SendSMS($MsgSender, $DestinationAddress, $Message);
            // Check result object returned and give response to end user according to success or not.
            if ($Result->Success == true)
                {
				echo "Message successfully sent!";
				$flag=0;
				$count=$count+1;
				}
            else
			{
				$flag=1;
                echo "Error occured while sending SMS<br />Errorcode: " . $Result->ErrorCode . "<br />Errormessage: " . $Result->ErrorMessage;
			}
        }
        catch (Exception $e)
        {
            //Error occured while connecting to server.
            $Message = $e->getMessage();
        }
		}
		if(flag==0){$_SESSION['ctsms']=$count;header('Refresh: 0;/notification/sent_sms.php');}
	}
}
else
{
	header('Refresh: 0;notlog.html');
}
?>