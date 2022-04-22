<?php

include 'sessions/main-session.php';
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

    $lastConnection = Access_OBJECT_(1, 'id')->getDerniereConnection();
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

function getBrowser():string
{
    if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera') || strpos($_SERVER['HTTP_USER_AGENT'], 'OPR/')) return 'Opera';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Edge')) return 'Edge';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome')) return 'Chrome';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Safari')) return 'Safari';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox')) return 'Firefox';
    elseif (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') || strpos($_SERVER['HTTP_USER_AGENT'], 'Trident/7')) return 'Internet Explorer';

    return 'Not find...';
}

function getOs(): string
{
    $tab = array('Windows NT 10.0; Win64; x64', 'Windows NT 7.0', 'MacOS', 'Linux');
    foreach($tab as $os){
        if(stripos($_SERVER['HTTP_USER_AGENT'], $os))
            return $os;
    }
    return 'Not find...';
}


/* Globals functions -- END */

function GetCountOfAlerts() {
    $_ALERT_SEUIL = Alertes_OBJECT_(1, 'id')->getSeuil();
    $COUNT_ALERT = Connection()->query("SELECT COUNT(*) AS Alertes FROM `articles` WHERE `quantityStock` <= $_ALERT_SEUIL");
    return $COUNT_ALERT->fetch()[0];
}
