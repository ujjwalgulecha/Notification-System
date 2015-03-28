<!DOCTYPE html>  
 <head>
 <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>  
  
  <body>  
   <div id="container">  
    <h1>Send SMS</h1>  
	<?php 
	session_start();
	$_SESSION['selted']=$_POST['selted'];
	?>

    <form action="send_sms_1.php" method="post">  
     <ul>  
      <li>  
       <label for="smsMessage">Message</label>  
       <textarea name="smsMessage" id="smsMessage" cols="45" rows="15"></textarea>  
      </li>  
     <li><input type="submit" name="sendMessage" id="sendMessage" value="Send Message" /></li>  
    </ul>  
   </form>  
  </div>  
 </body>  
</html>  