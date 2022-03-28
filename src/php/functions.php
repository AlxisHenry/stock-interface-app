<?php

include 'configuration/database-connexion.php';

function LastTimeUserConnected(): string
{

    // todo: Le problème est que l'actualisation de la dernière connection s'effectue lors du login :
    // todo 1ere possibilité : Effectué la requête sur la dernière date dans les logs.*
    // todo 2nd possibilité : Enregistrer la date dans la session et update la table à la déconnection.


    $dateToShow= '';

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
                    $dateToShow = $difference->s . ' secondes';
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

    return $dateToShow;
}