<?php
session_start();
if(session_destroy()) // Destroying All Sessions
{
	header("Location: indexs.php"); // Redirecting To Home Page
}
?>