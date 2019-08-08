<?php

if(isset($_POST['submit']))
{
$allowedExts = array("mp3", "ogg");
//echo $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
$fileName = $_FILES['file']['name'];
$extension = substr($fileName, strrpos($fileName, '.') + 1); // getting the info about the image to get its extension
 
/*if ((($_FILES["file"]["type"] == "video/mp4")|| ($_FILES["file"]["type"] == "audio/mp3")|| ($_FILES["file"]["type"] == "audio/wma")|| ($_FILES["file"]["type"] == "image/pjpeg")|| ($_FILES["file"]["type"] == "image/gif")|| ($_FILES["file"]["type"] == "image/jpeg")) && ($_FILES["file"]["size"] < 200000) && in_array($extension, $allowedExts))*/
 
if(in_array($extension, $allowedExts))
  {
  if ($_FILES["file"]["error"] > 0)
    {
     echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
 
    if (file_exists("music/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
       move_uploaded_file($_FILES["file"]["tmp_name"],"music/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "music/" . $_FILES["file"]["name"];
      }
    }
    $connection = mysql_connect("localhost", "root", "", "multimedia");

    $aartist = $_POST['artist'];
    $aFilePath = "music/".$fileName;
    $aFilePath = str_replace(substr($aFilePath, stripos($aFilePath, '.')), '', $aFilePath);

    $aname = $_POST['aname'];
    $query = "INSERT into audio (artist,title,path) VALUES ('$aartist','$aname', '$aFilePath')";
    
mysql_select_db('multimedia');
    $retval = mysql_query( $query, $connection );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}
echo "Entered data successfully\n";
  }

}
?>
<form method="post"  enctype="multipart/form-data" >
 
<input type="file" class="upload" name="file" id="fileup" /> 
<!--<button onclick="document.getElementById('fileup').click()" class="upload">Datei Auswählen</button>-->
 <label for="artist"><span>Artist:</span></label>
 
<input type="text" name="artist" id="artist" placeholder="Avici, Blues Brothers etc."/> 
<br />
 <label for="aname"><span>Title:</span></label>
 
<input type="text" name="aname" id="aname" placeholder="Lets Dance"/> 
<br />
<br />
<input type="submit" name="submit" value="Submit" />
</form>