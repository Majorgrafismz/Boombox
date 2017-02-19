<?php
require_once("_db.php");
require ("_login.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>sign up</title>
  <link rel="stylesheet" href="assets/css/boomstyle2.css" type="text/css">
</head>
<?php
//validations des inputs avec "sanitization" anti injections sql et html---------------------------------------
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $uzername = isset($_POST["uzername"]) ? mysql_real_escape_string(htmlspecialchars ($_POST["uzername"])) : "";
  $zemail = isset($_POST["zemail"]) ? mysql_real_escape_string(htmlspecialchars ($_POST["zemail"])) : "";
  $pazzword = isset($_POST["pazzword"]) ? mysql_real_escape_string(htmlspecialchars ($_POST["pazzword"])) : "";
  if (empty($uzername) && empty($zemail) && empty($pazzword)){
    echo "<h4 class='errmess'>All fields are required..!</h4>";
  }
  elseif (empty($uzername)){
    echo "<h4 class='errmess' class='errmess'>enter an username please !</h4>";
  }
  elseif (empty($zemail)){
    echo "<h4 class='errmess'>enter an e-mail please !</h4>";
  }
  elseif (empty($pazzword)){
    echo "<h4 class='errmess'>enter a password please !</h4>";
  }else {
    //insertion des données dansla base---------------------------------------------------------------------------------
    try {
      $request = $_DB->prepare("INSERT INTO User (username, email, password) VALUES (:username, :email, :password)");
      $request->execute(array("username" => $uzername, "email" => $zemail, "password" => $pazzword));
      // redirection vers la page game si les données sont dans la base---------------------------------------------------
      header("location: /blank/php/Boombox/game.php");
    } catch (PDOException $e) {
      echo "Error while writing datas to db " . $e->getMessage();
      die();
    }
  }
}
?>
<body>
  <div class="mainsu">
    <h3 class="brand">- BLKRZ 2.02 -</h3>
    <p class="brand" id="pstyle">a Cosmos High Technologies project</p>
    <div class="formu">
      <form class="formsign" action="signup.php" method="post">
        <label for="uzernem">USERNAME</label><br/>
        <input class="nptsign" id ="uzernem" type="text" name="uzername" placeholder="please enter an username" value=""><br/>
        <label for="imel">EMAIL</label><br/>
        <input class="nptsign" id = "imel" type="text" name="zemail" placeholder="please enter an e-mail adress" value=""><br/>
        <label for="passe">PASSWORD</label><br/>
        <input class="nptsign" id = "passe" type="password" name="pazzword" placeholder="please enter a password" value=""><br/>
        <input  class="nptsign" id="zubm" type="submit" name="zubmit" value="SIGN UP">
      </form>
    </div>
  </div>
  <footer>
    - BLKRZ 2.02 is a musical project ingeneered by LAWD for Cosmos High Tecnologies. -
  </footer>
</body>
</html>
