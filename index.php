<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <meta http-equiv='content-type' content='text/html' charset='utf-8' />
    <title>Login (test)</title>
    <!-- fontawesome & favicon -->
    <script src="https://kit.fontawesome.com/2d2078daec.js" crossorigin="anonymous"></script>
    <link rel='icon' href='https://1ja0pa1tvpl63v04fj2l0oby-wpengine.netdna-ssl.com/wp-content/themes/timken/favicon.ico'>
    <!-- Bootstrap lib -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href='src/styles/main.css' media='all' rel='stylesheet' type='text/css' />
</head>

<body>
    <div class="col-md-6 mb-4 d-flex container form-container">
        <div class="form-card card indigo form-white">
            <div class="card-body">
                <h3 class="text-center white-text py-3">TIMKEN</h3>
                <div class="md-form">
                    <i class="fa fa-user"></i>
                    <input type="text" id="form-id" class="form-control" placeholder="admin" disabled>
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

    <div class="contain-send-message">
        <div class="s-message validation-connexion d-none"> <i class="fa-regular fa-circle-check"></i> Vous avez été connnecté, redirection en cours.</div>
        <div class="s-message uncompleted-password d-none"> <i class="fa-solid fa-lock"></i> Pensez à entrer votre mot de passe.</div>
        <div class="s-message error-connexion d-none"><i class="fa-solid fa-xmark"></i>Tentative de connection échouée.</div>
        <div class="s-message features-incomming d-none"> <i class="fa-solid fa-circle-exclamation"></i> Navré, cette fonctionnalité n'est pas encore disponible.</div>
        <div class="s-message contact-admin d-none"><i class="fa-solid fa-screwdriver-wrench"></i>Une panne s'est produite, réssayer plus tard.</div>
        <div class="s-message authorization d-none"><i class="fa-regular fa-square-check"></i>Redirection en cours !</div>
    </div>


    <!-- Javascript-Bibli JQuery :-->
    <script src='src/js/jquery-3.6.0.min.js'></script>
    <script type="module" src='./src/js/index.js'></script>
</body>

</html>