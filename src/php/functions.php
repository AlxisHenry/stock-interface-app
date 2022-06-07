<?php

include 'sessions/main-session.php';
include 'configuration/database-connexion.php';
include 'get_class_object.php';

/* Globals functions */

function datetime(): DateTime
{
    $datetime = new DateTime();
    $timezone = new DateTimeZone('Europe/Amsterdam');
    $datetime->setTimezone($timezone);
    return $datetime;
}

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
    $tab = ['Windows NT 10.0; Win64; x64', 'Windows NT 7.0', 'MacOS', 'Linux'];
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

function GetStockInUrl(string $url):Articles|bool {
    $TEST_URL = (bool)strpos($url, '&id=');

    if (!$TEST_URL) return false;

    $EntryUrl = $url;
    $id = explode('&', $EntryUrl);
    $id_value = intval((explode('=', $id[1]))[1]);

    if (!$id_value) return false;
    if ($id_value < 0) return false;

    $ARTICLE = Articles_OBJECT_($id_value, 'id');

    if (!$ARTICLE) return false;

    return $ARTICLE;

}

function InitializeStockEntry():Articles|string {

    $CHECK_ARTICLE = GetStockInUrl($_SERVER['REQUEST_URI']);
    return !$CHECK_ARTICLE ? '' : $CHECK_ARTICLE;

}

function GetFamilyList():string {
    $QUERY = Connection()->query('SELECT * FROM `familles`');
    $LIST = ["<option value='null' selected>Choisissez une famille</option>"];
    $id = 1;
    while ($STOCK = $QUERY->fetch()) {
        $LIST[] = "<option data-name='". $STOCK['nom'] ."' class='opt-family-". $STOCK['id'] ."' value='" . $STOCK["id"] . "' data-id='" . $STOCK["id"] . "'>" . $STOCK['nom'] . "</option>\n";
        $id++;
    }
    $QUERY->closeCursor();
    return implode(" ", $LIST);
}

function GetArticlesList():string {
    $QUERY = Connection()->query('SELECT * FROM `articles`');
    $LIST = ['<option selected>Sélectionner un article</option>'];
    $id = 1;
    while ($STOCK = $QUERY->fetch()) {
        $LIST[] = "<option data-name='". $STOCK['nom'] ."' class='opt-name-". $STOCK['id'] ."' value='" . $STOCK["id"] . "' data-id='" . $STOCK["id"] . "'>" . $STOCK['nom'] . "</option>\n";
        $id++;
    }
    $QUERY->closeCursor();
    return implode(" ", $LIST);
}

function GetUsersList():string {
    $QUERY = Connection()->query('SELECT * FROM `utilisateurs`');
    $LIST = ['<option disabled selected value>Sélectionner un utilisateur</option>'];
    $id = 1;
    while ($STOCK = $QUERY->fetch()) {
        $LIST[] = "<option data-name='". $STOCK['nom'] ."' class='opt-name-". $STOCK['id'] ."' value='" . $STOCK["id"] . "' data-id='" . $STOCK["id"] . "'>" . $STOCK['nom'] . ' ' . $STOCK['prenom'] . "</option>\n";
        $id++;
    }
    $QUERY->closeCursor();
    return implode(" ", $LIST);
}

function GetMaxCount():int {

    $QUERY = Connection()->query('SELECT MAX(id) FROM `articles`');
    return intval($QUERY->fetch()[0]);

}

function GetPagesCount():array {
    $COUNT_ROWS = Connection()->query("SELECT COUNT(*) AS Lignes FROM `utilisateurs`");
    $perPage = 50;
    return [ceil(($COUNT_ROWS->fetch()[0]) / $perPage), $perPage];
}

function GetFamily(string $url):Familles|bool {
    $FAMILY_URL = (bool)strpos($url, '&id=');

    if (!$FAMILY_URL) return false;

    $EntryUrl = $url;
    $id = explode('&', $EntryUrl);
    $id_value = intval((explode('=', $id[1]))[1]);

    if (!$id_value) return false;
    if ($id_value < 0) return false;

    $FAMILY = Familles_OBJECT_($id_value, 'id');

    if (!$FAMILY) return false;

    return $FAMILY;

}

function InitializeFamily():Familles|string {

    $CHECK_FAMILY = GetFamily($_SERVER['REQUEST_URI']);
    return !$CHECK_FAMILY ? '' : $CHECK_FAMILY;

}