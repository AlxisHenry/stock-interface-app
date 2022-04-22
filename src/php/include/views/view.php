<?php
include '../../functions.php';

if (!CheckSessionExist('login')) { header("Location: ../../../../index.php"); die(); };
if (GetSession('login', 'typeAccount') !== 'view') { header("Location: ../../../../index.php"); die(); }

var_dump($_SESSION);

?>

<html>

</html>
