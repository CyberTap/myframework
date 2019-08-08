<?php
if (!isset($_SESSION['login_user'])){
   echo 'Please Log in again';
   echo $_SESSION['login_user'];
exit();
}
else {
   	echo "<h2>you are logged in</h2>";
   }
?>

this is homeee
