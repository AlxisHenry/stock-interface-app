<?php

include 'configuration/database-connexion.php';

spl_autoload_register(function ($class_name) {
    include '../class/' . $class_name . '.class.php';
});

function LastTimeUserConnected(): string
{

    // todo: Le problème est que l'actualisation de la dernière connection s'effectue lors du login :
    // todo 1ere possibilité : Effectué la requête sur la dernière date dans les logs.  // Pas pratique car la dernière = celle-ci si on l'ajoute à la connexion.
    // todo 2nd possibilité : Enregistrer la date dans la session et update la table à la déconnection. // Try this solution first

    $GetDateOfLastConnexion = "SELECT `derniereConnection` AS 'DATE' FROM `Access` WHERE `username` = 'tfadmin'";;
    $DB_QUERY = Connection()->query($GetDateOfLastConnexion);
    $lastConnection = $DB_QUERY->fetch();
    $DB_QUERY->closeCursor();

    $today = date("Y-m-d H:i:s");
    $lastConnection = $lastConnection['DATE'];

    $today = new DateTime($today);
    $lastConnection = new DateTime($lastConnection);

    $difference = $today->diff($lastConnection);

    $month = $difference->m;
    $days = $difference->d;
    $hours = $difference->h;
    $minutes = $difference->i;
    $seconds = $difference->s;

    if ($month === 0) {
        if ($days === 0) {
            if ($hours  === 0) {
                if ($minutes === 0) {
                    if ($seconds < 60) {
                            $dateToShow = ' un instant.';
                    }
                } else {
                    $dateToShow = $minutes . ' minutes';
                }
            } else {
                $dateToShow = $hours . ' heures';
            }
        } else {
            $dateToShow = $days. ' jours';
        }
    } else {
        $dateToShow = $month . ' mois';
    }

    return $dateToShow;
}

function UPDATE_LAST_CONNEXION():string {

    /* Le problème est qu'au refresh de la page la date prise est celle de l'user. */
    return 'UPDATE `Access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = "tfadmin" ';

}

function UPDATE_LOGS_TABLE($TARGET, $TEMP_ASSET): string
{
    return "INSERT INTO `Logs` (`user` , `date`, `asset`) VALUES ((SELECT `id` FROM `Access` WHERE `username` = '$TARGET'), (SELECT NOW()), '$TEMP_ASSET');";
}

function VIEW_ACCESS_EMPLOYEE($TARGET): string
{
    return "SELECT * FROM `Access` WHERE `username` = '$TARGET'";
}

function GET_ASSET_NAME(): string
{
    return strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);
}

function GET_DATE(): string
{
    return date('d/m/Y h:i');
}

function CHANGE_ACCESS_BOOLEAN($value, $target) {
    return "UPDATE `Access` SET `status` = '$value' WHERE `username` = '$target'";
}

function SetTitle() {
    switch ($_GET['nav']) {
        case 'c-users':
            return 'Configuration Utilisateurs - Timken';
        case 'c-article':
            return 'Configuration Articles - Timken';
        case 'c-ccout':
            return 'Configuration Centre de Coûts - Timken';
        case 'c-famille':
            return 'Configuration Familles - Timken';
        case 's-entry':
            return 'Entrée de stock - Timken';
        case 's-checkout':
            return 'Sortie de stock - Timken';
        case 'visu':
            return 'Visualiser le stock - Timken';
        case 'alerts':
            return 'Alertes de stock - Timken';
        case 'settings':
            return 'Paramètres - Timken';
        case 'mvmt':
            return 'Derniers mouvements - Timken';
        default:
            return 'Gestion de stock - Timken';
    }
}