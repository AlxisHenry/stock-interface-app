<!DOCTYPE html>
<html lang="en">
<?php
include 'src/php/functions.php';
session_destroy();
session_start();
include 'src/php/sessions/load-session.php';
?>
<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='content-type' content='text/html' charset='utf-8' />
    <title>TEST -- TIMKEN - Gestion de stock en ligne</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='icon' href='./assets/favicon.ico'>
    <link href='./src/css/main.css' media='all' rel='stylesheet' type='text/css' />
</head>

<body>

<?php include 'src/php/include/component/form.php'; ?>

<div class="contain-send-message"></div>

<div class="about-user">

</div>

<script src='./src/js/jquery-3.6.0.min.js'></script>
<script src='src/js/main/index.js' type="module"></script>

</body>

</html>
