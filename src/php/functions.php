<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'configuration/database-connexion.php';
include 'get_class_object.php';

/* Globals functions */

function getAssetName():string
{
    return strtoupper(explode('.', gethostbyaddr($_SERVER['REMOTE_ADDR']))[0]);
}

function getFormatDate():string
{
    return date('d/m/Y h:i');
}

function setCurrentTitle():string
{
    return match ($_GET['nav']) {
        'c-users' => 'Configuration Utilisateurs - Timken',
        'c-article' => 'Configuration Articles - Timken',
        'c-ccout' => 'Configuration Centre de Coûts - Timken',
        'c-famille' => 'Configuration Familles - Timken',
        's-entry' => 'Entrée de stock - Timken',
        's-checkout' => 'Sortie de stock - Timken',
        'visu' => 'Visualiser le stock - Timken',
        'alerts' => 'Alertes de stock - Timken',
        'settings' => 'Paramètres - Timken',
        'mvmt' => 'Derniers mouvements - Timken',
        default => 'Gestion de stock - Timken',
    };
}

function FormatLastConnection():string {

    $lastConnection = Access_OBJECT_('tfadmin', 'username')->getDerniereConnection();
    $today = date("Y-m-d H:i:s");
    $today = new DateTime($today);
    $lastConnection = new DateTime($lastConnection);
    $difference = $today->diff($lastConnection);

    $dateToShow = '';
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
                    if ($minutes === 1) {
                        $dateToShow = $minutes . ' minute';
                    } else {
                        $dateToShow = $minutes . ' minutes';
                    }
                }
            } else {
                if ($hours === 1) {
                    $dateToShow = $hours . ' heure';
                } else {
                    $dateToShow = $hours . ' heures';
                }
            }
        } else {
            if ($days === 1) {
                $dateToShow = $days. ' jour';
            } else {
                $dateToShow = $days. ' jours';
            }
        }
    } else {
        $dateToShow = $month . ' mois';
    }

    return $dateToShow;

}

/*$todayFormat = new DateTime($today);
    $lastConnection = new DateTime($lastConnection);

    $difference = $todayFormat->diff($lastConnection);

    $lastConnection = '';
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
                        $lastConnection = ' un instant.';
                    }
                } else {
                    $lastConnection = $minutes . ' minutes';
                }
            } else {
                $lastConnection = $hours . ' heures';
            }
        } else {
            $lastConnection = $days. ' jours';
        }
    } else {
        $lastConnection = $month . ' mois';
    }*/



/* Globals functions -- END */
/* SQL Request */

function UPDATE_LAST_CONNEXION():string {
    return 'UPDATE `access` SET `derniereConnection` = (SELECT NOW()) WHERE `username` = "tfadmin" ';
}

function UPDATE_LOGS_TABLE($TARGET, $TEMP_ASSET): string
{
    return "INSERT INTO `logs` (`user` , `date`, `asset`) VALUES ((SELECT `id` FROM `access` WHERE `username` = '$TARGET'), (SELECT NOW()), '$TEMP_ASSET');";
}

function VIEW_ACCESS_EMPLOYEE($TARGET): string
{
    return "SELECT * FROM `access` WHERE `username` = '$TARGET'";
}


function CHANGE_ACCESS_BOOLEAN($value, $target) {
    return "UPDATE `access` SET `status` = '$value' WHERE `username` = '$target'";
}


function CHECK_SETTINGS_STATE($features): bool|array|PDOStatement
{

    return (Connection()->query("SELECT `state` FROM `front` WHERE `nom` LIKE '%$features%';"))->fetchAll();

}

function GET_PASSWORD($account): bool|array|PDOStatement
{

    $QUERY = Connection()->query("SELECT `password` FROM `access` WHERE `username` LIKE '$account';");

    return $QUERY->fetchAll();

}



