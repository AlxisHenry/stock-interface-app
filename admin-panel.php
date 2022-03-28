<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='content-type' content='text/html' charset='utf-8' />
    <title>Gestion du stock</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel='icon' href='/assets/favicon.ico'>
    <link href='./src/css/main.css' media='all' rel='stylesheet' type='text/css'/>

    <?php
    include 'src/php/functions.php';

    session_start();
    $_SESSION['user'] = [
        "id" => 'username',
        "password" => 'password',
        "lastConnection" => 'derniereConnection',
        "thisConnectionDate" => date("Y-m-d H:i:s"),
        "state" => 'status',
        "type" => 'type'
    ];
    ?>

</head>

<body>

<header class="panel-header">



    <div class="last-connected-date"><span class="date-span">Dernière connection il y a <span class="time"><?= LastTimeUserConnected() ?></span></span></div>


</header>


</body>

</html>