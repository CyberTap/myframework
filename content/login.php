
<?php

if(!isset($_SESSION['login_user'])){
echo '
<br><br>
<div id="main">
<div id="login">
<h2>Login Form</h2>
<form action="login-script.php" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<br><br>
<input name="submit" type="submit" value=" Login ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
';}
else{

	echo "You are already logged in";
	echo "<br>Your Session is:".print_r($_SESSION);
}
?>



