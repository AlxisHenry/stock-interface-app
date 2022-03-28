<?php

include 'configuration/database-connexion.php';

function LastTimeUserConnected(): string
{

    // todo: Le problème est que l'actualisation de la dernière connection s'effectue lors du login :
    // todo 1ere possibilité : Effectué la requête sur la dernière date dans les logs.
    // todo 2nd possibilité : Enregistrer la date dans la session et update la table à la déconnection. // Try this solution

    $GetDateOfLastConnexion = "SELECT `derniereConnection` AS 'DATE' FROM `panel_manage_access` WHERE `username` = 'tfadmin'";;
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
                    if ($seconds < 20) {
                            $dateToShow = ' un instant.';
                    } else {
                        $dateToShow = $seconds . ' seconds';
                    }
                } else {
                    $dateToShow = $minutes . ' minutes';
                }
            } else {
                $dateToShow = $hours . ' hours';
            }
        } else {
            $dateToShow = $days. ' days';
        }
    } else {
        $dateToShow = $month . ' months';
    }

    return $dateToShow;
}