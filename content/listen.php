<?php 
$titleofmov = "keine session vorhanden";
$yearofmov = "keine session vorhanden";
$pathofmov = "keine session vorhanden";
if (isset($_SESSION['titleofm'])) {
  $titleofm = $_SESSION['titleofm'];
}
if (isset($_SESSION['artist'])) {
  $artist = $_SESSION['artist'];
}
if (isset($_SESSION['fullmpath'])) {
  $fullmpath = $_SESSION['fullmpath'];
}
if (!empty($titleofm) || !empty($artist) || !empty($fullmpath) ){
	

$i = 0;
foreach($titleofm as $var)
{
	echo"<div class='audio'>
  <h3 style='float:left;''>".$titleofm[$i]."</h3><p style='float:right;margin-left:10px;margin-top:20px;'>".$artist[$i]."</p>
    <audio id='audio_with_controls' controls>
         <source src='".$fullmpath[$i]."' type='audio/mp3' />
       Ihr Browser kennt das HTML5-audio-Element noch nicht.
      </audio>
<hr>
</div>";# code...
$i++;
}
}
else{
	header('Location: index.php?cat=content&p=music');
}
unset($_SESSION['artist']);
unset($_SESSION['fullmpath']);
unset($_SESSION['titleofm']);
?>

   
