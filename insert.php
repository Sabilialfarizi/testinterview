
<?php
include_once 'config.php';
if(isset($_POST['submit']))
{   
    $home_team = $_POST['home_team'];
    $away_team = $_POST['away_team'];
    $scorehome = $_POST['score_home'];
    $score_away = $_POST['score_away'];
    $select="SELECT * FROM klasemen Where nama_team=$home_team";

      //KONDISI 
    if (!empty($home_team) && !empty($away_team) && !empty($scorehome) && !empty($score_away)) { 
    $mysqli = "INSERT INTO pertandingan (home_team, away_team, score_home, score_away)
    VALUES ('$home_team','$away_team','$scorehome','$score_away')";
      $result  = mysqli_query($conn, $mysqli);
      
   if ($scorehome == $score_away ) {
      $sql = "UPDATE klasemen SET nama_team= $home_team WHERE Point= 1";
      $result2  = mysqli_query($conn, $sql);
      echo ("seri"); 
    }
   else if($score_away <= $scorehome ) {
      echo("Home Menang");
    }
   else if($scorehome <= $score_away ) {
      echo("Away Menang");
    }
   else if ($result2) {
      header("Location: pertandingan.php");
   }  
      else {
         echo "Error: " . $sql . ":-" . mysqli_error($conn);
      }
 } 
     mysqli_close($conn);
}
?>