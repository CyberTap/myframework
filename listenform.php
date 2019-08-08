<?php
session_start();
$connection = mysql_connect("localhost", "root", "");

mysql_select_db('multimedia',$connection);

			$query = "SELECT * FROM audio";
			$apath = mysql_query($query);
			if (!isset($apath)){
				echo "not found";
			}
			$fullmpath = [];
			$artist = [];
			$titleofm = [];
			while ($row = mysql_fetch_assoc($apath)){
			$fullmpath[] = $row['path'].'.mp3';
			$artist[] = $row['artist'];
			$titleofm[] = $row['title'];
			print_r($row);
}
		
	$_SESSION['titleofm']=$titleofm;
	$_SESSION['artist']=$artist;
	$_SESSION['fullmpath']=$fullmpath;
	mysql_close($connection); // Closing Connection
	echo $titleofm;
	echo $artist;
	echo $fullmpath;
	session_write_close();
	header('Location: index.php?cat=content&p=listen');
?>