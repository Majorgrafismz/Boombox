<?php
require("_login.php");
require ("soundz.php");
require ("_eog.php");
require ("_getTime.php");

if (isset($_SESSION["username"]) && isset($_SESSION["email"]) && isset($_SESSION["password"])) {
  echo "<h5><span id='gamehello'>WELCOME ". $_SESSION["username"]. " !</span></h5>";
  echo "<a id='signoutlink' href='deconx.php'>SIGN OUT</a>";
}else{
  header("location: /php/Boombox/signup.php");
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>GAME</title>
  <link href="assets/vendor/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link rel="stylesheet" type="text/css" href="assets/css/<?php echo $link; ?>.css" />
  <script type="text/javascript">
  //----------ecoute et detection d'un event key down et appel d'une function play + ajout d'une nouvelle classe-----------------------------------
  window.addEventListener("keydown", function(event) {
    var audio = document.querySelector(`audio[data-touche="${event.keyCode}"]`);
    var pad = document.querySelector(`.pad[data-touche="${event.keyCode}"]`);
    if(!audio) return;
    audio.play();
    audio.currentTime = 0;
    pad.classList.add("played");
  });
  //----------ecoute et detection d'un event key up et appel de la meme function + remove de la nouvelle classe ----------------------------------
  window.addEventListener("keyup", function(event) {
    var audio = document.querySelector(`audio[data-touche="${event.keyCode}"]`);
    var pad = document.querySelector(`.pad[data-touche="${event.keyCode}"]`);
    if(!audio) return;
    audio.play();
    pad.classList.remove("played");
  });


  </script>
</head>
<body>
  <div class="mainbox">
    <h3 class="brand">- BLKRZ 2.02 -</h3>
    <p class="brand" id="pstyle">a Cosmos High Technologies musical project</p>
    <!-- <input type="button" name="tmswitch" value="Bae Theme" onclick="change()"> -->
    <div class="mainpad">
      <div data-touche= "65" class="pad" id="pad_a">KICK 1
        <br/><kbd>A</kbd>
      </div>
      <div data-touche= "90" class="pad" id="pad_z">KICK 2
        <br/><kbd>Z</kbd>
      </div>
      <div data-touche= "69" class="pad" id="pad_e">HI HAT
        <br/><kbd>E</kbd>
      </div>
      <div data-touche= "82" class="pad" id="pad_r">OP HAT
        <br/><kbd>R</kbd>
      </div><br/>
      <div data-touche= "84" class="pad" id="pad_t">RIDE
        <br/><kbd>T</kbd>
      </div>
      <div data-touche= "89" class="pad" id="pad_y">CLAVE
        <br/><kbd>Y</kbd>
      </div>
      <div data-touche= "85" class="pad" id="pad_u">SNARE 1
        <br/><kbd>U</kbd>
      </div>
      <div data-touche= "73" class="pad" id="pad_i">CLAP
        <br/><kbd>I</kbd>
      </div><br/>
      <div data-touche= "79" class="pad" id="pad_o">SHAKER
        <br/><kbd>O</kbd>
      </div>
      <div data-touche= "80" class="pad" id="pad_p">TOM
        <br/><kbd>P</kbd>
      </div>
      <div data-touche= "81" class="pad" id="pad_q">KICK 3
        <br/><kbd>Q</kbd>
      </div>
      <div data-touche= "83" class="pad" id="pad_s">BASS
        <br/><kbd>S</kbd>
      </div><br/>
      <div data-touche= "68" class="pad" id="pad_d">BELL
        <br/><kbd>D</kbd>
      </div>
      <div data-touche= "70" class="pad" id="pad_f">ORC HIT
        <br/><kbd>F</kbd>
      </div>
      <div data-touche= "71" class="pad" id="pad_g">TIMPANI
        <br/><kbd>G</kbd>
      </div>
      <div data-touche= "72" class="pad" id="pad_h">SNARE 2
        <br/><kbd>H</kbd>
      </div><br/>
    </div>
  </div>
  <div class="butt">
    <button data-touche= "32" class="pad" id="pbutt" ><i class="fa fa-play" aria-hidden="true"></i></button>
    <!-- <input id="pbutt" type="button" value="PLAY"  onclick="play()">-->
  </div>
</div>
</div>

</body>

<script type="text/javascript">
// création d'un tableau réunissant les keyCodes utilisés-----------------------
var kcodz = [
  "65",
  "90",
  "69",
  "82",
  "84",
  "89",
  "85",
  "73",
  "79",
  "80",
  "81",
  "83",
  "68",
  "70",
  "71",
  "72"
];
var playlist = [];
document.getElementById("pbutt").addEventListener("click", function(){
  var z = Math.floor(Math.random() * kcodz.length);
  var x = kcodz[z];
  var odio = document.querySelector(`audio[data-touche="${x}"]`);
  playlist.push(odio);
  console.log(playlist);
  for (var i = 0; i < playlist.length; i++) {
    console.log(playlist[i]);
    var y = playlist[i]
    function  play(){
      setTimeout(y.play(), 1000);
    };
    y.play();
  }
});
</script>
</html>
