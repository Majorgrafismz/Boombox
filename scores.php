<?php
require ("_eog.php");
//session_start();
try {
    //prepare insert request
    $request = $_DB->prepare(" SELECT * FROM Score ORDER by score DESC LIMIT 5 ");
    //execute insert request
    $request->execute();
    $scores = $request->fetchAll();
  } catch (PDOException $e) {
    echo "Error while getting scores from db " . $e->getMessage();
    die();
  }




 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>SCORES</title>
     <link rel="stylesheet" href="assets/css/boomstyle.css" type="text/css">
   </head>
   <body>
      <div class="mainscore">
        <?php
        if (count($scores) > 0) {
          for ($i = 0; $i < count($scores); $i++) {
        ?>
          <h4><?php echo $scores[$i]["userid"]."--------------------".$scores[$i]["score"]; ?></h4>
          <hr/>
        <?php
          }
        }

         ?>
      </div>
   </body>
 </html>
