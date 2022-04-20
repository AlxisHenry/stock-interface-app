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

/* Globals functions -- END */