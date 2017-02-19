<?php
session_start();
session_destroy();
header("location: /php/Boombox/index.php");
exit;
?>
