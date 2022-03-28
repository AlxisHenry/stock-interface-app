<!DOCTYPE html>
<html>
<?php

include 'src/php/functions.php';

$GetDateOfLastConnexion = "SELECT `derniereConnection` AS 'DATE' FROM `panel_manage_access` WHERE `username` = 'tfadmin'";;
$DB_QUERY = Connection()->query($GetDateOfLastConnexion);
$lastConnection = $DB_QUERY->fetch();
$DB_QUERY->closeCursor();

$today = date("Y-m-d H:i:s");
$lastConnection = $lastConnection['DATE'];

$today = new DateTime($today);
$lastConnection = new DateTime($lastConnection);
$difference = $today->diff($lastConnection);

if (($difference->m) == 0) {

    if (($difference->d) == 0) {

        if (($difference->i) == 0) {

            if (($difference->s) == 0) {

            } else {
                $dateToShow= $difference->s . ' secondes';
            }

        } else {
            $dateToShow = $difference->i . ' minutes';
        }

    } else {
        $dateToShow = $difference->d . ' days';
    }

} else {
    $dateToShow = $difference->m . ' months';
}

?>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='content-type' content='text/html' charset='utf-8' />
    <title>Login (test)</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='icon' href='./assets/favicon.ico'>
    <link href='./src/css/main.css' media='all' rel='stylesheet' type='text/css' />
</head>

<body>

<div class="">Dernière connection il y a <?= $dateToShow ?></div>

<script src='./src/js/jquery-3.6.0.min.js'></script>
<script src='./src/js/index.js' type="module"></script>

</body>

</html>