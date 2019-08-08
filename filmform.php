<?php
session_start();
$connection = mysql_connect("localhost", "root", "");

mysql_select_db('multimedia',$connection);
if (!isset($_POST['submit'])) {
	if (empty($_POST['ftitle']) /*&& empty($_POST['path'])*/) {
		$error = "Please enter a title";
		echo $error;
		exit;
	}
	else
	{
		$title = $_POST['ftitle'];
		$vpath = $_POST['path'];
		if (!empty($_POST['ftitle'])){
			$query = "SELECT * FROM video WHERE title LIKE '%$title%'";
			$vpath = mysql_query($query);
			if (!isset($vpath)){
				echo "not found";
			}
			while ($row = mysql_fetch_assoc($vpath)){
			$fullpath = $row['videopath'].'.mp4';
			$yearofmov = $row['year'];
			$titleofmov = $row['title'];
			print_r($row);
			}
		}
		else
		{
			$fullpath = $vpath.'.mp4';
		}
	$_SESSION['titleofmov']=$titleofmov;
	$_SESSION['yearofmov']=$yearofmov;
	$_SESSION['fullpath']=$fullpath;
	mysql_close($connection); // Closing Connection
	echo $fullpath;
	echo $title;
	echo $yearofmov;
	session_write_close();
	header('Location: index.php?cat=content&p=watch');
	}
}
?>