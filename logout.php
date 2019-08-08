<?php

if(session_status()!= PHP_SESSION_NONE)// Destroying All Sessions
{
	session_destroy();
//header("location: index.php"); // Redirecting To Home Page
}
else{
	header("location: index.php"); // Redirecting To Home Page

}
?>