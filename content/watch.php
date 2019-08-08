<?php 
$titleofmov = "keine session vorhanden";
$yearofmov = "keine session vorhanden";
$pathofmov = "keine session vorhanden";
if (isset($_SESSION['titleofmov'])) {
  $titleofmov = $_SESSION['titleofmov'];
}
if (isset($_SESSION['yearofmov'])) {
  $yearofmov = $_SESSION['yearofmov'];
}
if (isset($_SESSION['fullpath'])) {
  $pathofmov = $_SESSION['fullpath'];
}
echo"<div>
  <h3 style='float:left;''>".$titleofmov."</h3><p style='float:right;margin-left:10px;margin-top:20px;'>".$yearofmov."</p>
    <video id='video_with_controls' controls>
         <source src='".$pathofmov."' type='video/mp4' />
       Ihr Browser kennt das HTML5-audio-Element noch nicht.
      </video>
<hr>
</div>";


unset($_SESSION['titleofmov']);
unset($_SESSION['yearofmov']);
unset($_SESSION['fullpath']);?>