<?php
session_start();
$connection = mysql_connect("localhost", "root", "");

mysql_select_db('multimedia',$connection);
if (!isset($_POST['submit'])) {
	if (empty($_POST['atitle']) /*&& empty($_POST['path'])*/) {
		$error = "Please enter a title";
		echo $error;
		exit;
	}
	else
	{
		$atitle = $_POST['atitle'];
			$query = "SELECT * FROM audio WHERE title LIKE '%$atitle%'";
			$apath = mysql_query($query);
			if (!isset($apath)){
				echo "not found";
			}
			else
			{
			$fullmpath = [];
			$artist = [];
			$titleofm = [];
			while ($row = mysql_fetch_assoc($apath)){
			$fullmpath[] = $row['path'].'.mp3';
			$artist[] = $row['artist'];
			$titleofm[] = $row['title'];
			print_r($row);
			}
		}
				
	$_SESSION['titleofm']=$titleofm;
	$_SESSION['artist']=$artist;
	$_SESSION['fullmpath']=$fullmpath;
	mysql_close($connection); // Closing Connection
	session_write_close();
	header('Location: index.php?cat=content&p=listen');
	}
}
?>