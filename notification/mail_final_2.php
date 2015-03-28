<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="mystyle.css">
</head>
<body>  
<div id="container">  
 <h1>Send Mail</h1>  

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
$_SESSION['selted']=$_POST['selted'];


?>
<form action="mail_final_3.php" method="post" >
<ul>  
      <li>  
       <label for="subject">Subject</label>  
       <input type="text" name="subject" /></li>  
      <li>  
       <label for="message">Message</label>  
       <textarea name="message"  cols="45" rows="15"></textarea>
	   </li>
	    <li> 
			<label for="attachment">Attachment</label>  
       <input type="text" name="attach" /></li>  	     
     <li><input type="submit" value="Submit" /></li>  
    </ul> 
 </form>  
  </div>  
 </body>  
</html>  