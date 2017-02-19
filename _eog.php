<?php
// ------------piste de reflexion------------

require_once("_db.php");
//require("game.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // $userid = isset($_POST["userid"]) ? $_POST["userid"] : "";
  $score = isset($_POST["score"]) ? $_POST["score"] : "";
  //if i have a score then, save it to db
  if ($score) {
    try {
      //prepare insert request
      $request = $_DB->prepare("INSERT INTO Score (score) VALUES (:score)");
      //execute insert request
      $request->execute(array("score" => $score));
    } catch (PDOException $e) {
      echo "Error while writing datas in db " . $e->getMessage();
      die();
    }
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>eog</title>
</head>
<body>
  <div class="scosco">
    YOUR SCORE
    <div class="showScore">
    </div>
    <form class="scor_npt" action="_eog.php" method="post">
      <input type="hidden" id="scorin"name="score" value="">
      <input type="submit" id="savesc" name="savescore" value="SAVE YOUR SCORE">
    </form>
  </div>
</body>
</html>
