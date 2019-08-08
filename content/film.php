
<div>
<h2>Watch Movies</h2>
<p>Please search for a movie you would like to watch</p>
<form id="filmform" method="post" action="filmform.php">

<div>
<label for="ftitleID">Film title</label>
<input type="text" id="ftitleID" name="ftitle" placeholder="Z.b. avengers / mustang / small">
</div>		
<br><!--
<div>
<label for="pathID">Pfad:</label>
<input type="text" id="pathID" name="path" placeholder="/videos/mustang">
</div>-->
<br>
<div>
<input type="submit" value="Ansehen">
</div>
</form>

</div>
<hr>
<h2>Upload</h2>
<a href="index.php?p=filmupload" style=""><button type="button">I want to Upload</button></a>
<!--
<div>
	<h3 style="float:left;"><?php echo $titleofmov;?></h3><p style="float:right;margin-left:10px;margin-top:20px;"><?php echo $yearofmov;?>/p>
		<video id="video_with_controls" controls>
     		 <source <?php echo"src='".$fullpath."'";?> type="video/mp4" />
       Ihr Browser kennt das HTML5-audio-Element noch nicht.
    	</video>

</div>-->