<?php

if(isset($_POST['submit']))
{
$allowedExts = array("mp4", "mov");
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
 
    if (file_exists("video/" . $_FILES["file"]["name"]))
      {
        echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
       move_uploaded_file($_FILES["file"]["tmp_name"],"video/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "video/" . $_FILES["file"]["name"];
      }
    }
    $connection = mysql_connect("localhost", "root", "", "multimedia");


    $aFilePath = "video/".$fileName;
    $ftitle = $_POST['vtitle'];
    $query = "INSERT into video (title,videopath) VALUES ('$fileName', '$aFilePath')";
    
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
 
<input type="file" class="hide" name="file" id="file" /> 
<!--<button onclick="document.getElementById('file').click()" class="upload">Datei Auswählen</button>-->
 <label for="vtitle"><span>Title:</span></label>
 
<input type="text" name="vtitle" id="vtitle" placeholder="Avici, Blues Brothers etc."/> 
<br />
<br />
<input type="submit" name="submit" value="Submit" />
</form>