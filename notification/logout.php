<?php 
session_start();
$_SESSION["key"]=false;
header('Refresh: 0;/notification/admin_login.html');
?>