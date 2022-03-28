<!DOCTYPE html>
<html>
<?php
$ASSET = strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);
$DATE = gmdate('d/m/Y h:i');
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
    <div class="col-md-6 mb-4 d-flex container form-container">
        <div class="form-card card indigo form-white">
            <div class="card-body">
                <h3 class="text-center white-text py-3">TIMKEN</h3>
                <div class="md-form">
                    <i class="fa fa-user"></i>
                    <input type="text" id="form-id" class="form-control" placeholder="admin" value="admin" disabled>
                    <label for="form-id">Votre identifiant</label>
                </div>
                <div class="md-form">
                    <i class="fa fa-lock prefix white-text"></i>
                    <input type="password" id="form-pass" class="form-control">
                    <label for="form-pass">Veuillez saisir votre mot de passe</label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary submit-admin-panel">Me connecter</button>

            <div class="employee-session">
                <div class="redirect-employee">Vous travaillez ici ? <i class="redirect-dashboard-user fa fa-solid fa-arrow-right-from-bracket"></i></div>
            </div>
        </div>
    </div>

    <div class="contain-send-message"></div>

    <div class="about-user">

        <div class="contain-asset-name"> <?= $ASSET ?> </div>
        <div class="contain-date"> <?= $DATE ?> </div>

    </div>

    <script src='./src/js/jquery-3.6.0.min.js'></script>
    <script src='./src/js/index.js' type="module"></script>

</body>

</html>