<?php
require_once("_db.php");
session_start();
$username = isset($_POST["username"]) ? htmlspecialchars($_POST["username"]) : "";
$email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
$password = isset($_POST["password"]) ? htmlspecialchars($_POST["password"]) : "";

if ($_SERVER["REQUEST_METHOD"]== "POST"){
  if (!empty ($username) && !empty ($email) && !empty ($password)) {
    try {
      $request = $_DB->prepare("SELECT * FROM User");
      $request->execute();
      $users = $request->fetch();
    } catch (PDOException $e) {
      echo "Error while getting datas from db " . $e->getMessage();
      die();
    }
    if ($username == $users["username"]
    && $email== $users["email"]
    && $password == $users["password"]) {
      $_SESSION["username"] = $_POST["username"];
      $_SESSION["email"] = $_POST["email"];
      $_SESSION["password"] = $_POST["password"];

      header("location: /php/Boombox/game.php");
    }
    else if($username != $users["username"]
    && $password != $users["password"]
    && $email != $users["email"]){
      echo "<h4>CHECK YOUR INFOS...</h4>";
      echo "<h4 id='sulink'>...OR SIGN UP HERE </h4>";
      //<a  href='signup.php'></a>
    }
    else if ($username != $users["username"]){
      echo "<h4>wrong username...CHECK YOUR INFOS!</h4>";
    }
    else if ($password != $users["password"]){
      echo "<h4>wrong password...CHECK YOUR INFOS!</h4>";
    }
    else if ($email != $users["email"]){
      echo "<h4>wrong email...CHECK YOUR INFOS!</h4>";
    }
    else{
      echo "<h4>YOU MUST IDENTIFY YOURSELF TO PLAY...</h4>";
    }
    //}
  }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>login</title>
  <link href="assets/vendor/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>
  <header>
    <nav>
      <ul>
        <li>
          <form class="formlogin" action="signup.php" method="post">
            <!--<label for="usrn">username :</label>-->
            <input id ="usrn" type="text" name="username" placeholder="USERNAME" value="">
            <!--<label for="mel">e-mail :</label>-->
            <input id = "ml" type="text" name="email" placeholder="EMAIL" value="">
            <!--<label for="pwd">password :</label>-->
            <input id = "pwd" type="password" name="password" placeholder="PASSWORD"value="">
            <input  id="subm" type="submit" name="submit" value="LOG IN">
          </form>
        </li>
      </ul>
    </nav>
  </header>
</body>
</html>
