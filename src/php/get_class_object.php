<?php

spl_autoload_register('loadClass');

function loadClass($class) {
    include 'class/' . $class . '.class.php';
}

function Access_OBJECT_(string|int $value, string $by):Access {

    $QUERY = getRequest($by, 'Access');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Access::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Alertes_OBJECT_(string|int $value, string $by):Alertes {

    $QUERY = getRequest($by, 'Alertes');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Alertes::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Articles_OBJECT_(string|int $value, string $by):Articles {

    $QUERY = getRequest($by, 'Articles');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Articles::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Centres_OBJECT_(string|int $value, string $by):Centres {

    $QUERY = getRequest($by, 'Centres');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Centres::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Familles_OBJECT_(string|int $value, string $by):Familles {

    $QUERY = getRequest($by, 'Familles');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Familles::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;

}

function Front_OBJECT_(string|int $value, string $by):Front {

    $QUERY = getRequest($by, 'Front');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Front::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;

}

function Logs_OBJECT_(string|int $value, string $by):Logs {

    $QUERY = getRequest($by, 'Logs');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Logs::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Mouvements_OBJECT_(string|int $value, string $by):Mouvements {

    $QUERY = getRequest($by, 'Mouvements');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Mouvements::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function Utilisateurs_OBJECT_(string|int $value, string $by):Utilisateurs {

    $QUERY = getRequest($by, 'Utilisateurs');
    $QUERY = Connection()->prepare($QUERY);
    $QUERY->bindValue(':value', $value, PDO::PARAM_STR|PDO::PARAM_INT);
    $QUERY->execute();
    $QUERY->setFetchMode(PDO::FETCH_CLASS, Utilisateurs::class);
    $RESULT = $QUERY->fetch();
    $QUERY->closeCursor();
    return $RESULT;
}

function getRequest(string|int $by, string $table):string {

    return match ($table) {
        'Access' => match ($by) {
            'username' => "SELECT * FROM `access` WHERE `username`=:value",
            'password' => "SELECT * FROM `access` WHERE `password`=:value",
            'type' => "SELECT * FROM `access` WHERE `type`=:value",
            'derniereConnection' => "SELECT * FROM `access` WHERE `derniereConnection`=:value",
            'status' => "SELECT * FROM `access` WHERE `status`=:value",
            'commentaire' => "SELECT * FROM `access` WHERE `commentaire`=:value",
            'dateCreation' => "SELECT * FROM `access` WHERE `dateCreation`=:value",
            'dateModification' => "SELECT * FROM `access` WHERE `dateModification`=:value",
            'CreateUser' => "SELECT * FROM `access` WHERE `CreateUser`=:value",
            'EditUser' => "SELECT * FROM `access` WHERE `EditUser`=:value",
            default => "SELECT * FROM `access` WHERE `id`=:value",
        },
        'Alertes' => match ($by) {
            'mail' => "SELECT * FROM `alertes` WHERE `mail`=:value",
            'mailModification' => "SELECT * FROM `alertes` WHERE `mailModification`=:value",
            'menu' => "SELECT * FROM `alertes` WHERE `menu`=:value",
            'menuModification' => "SELECT * FROM `alertes` WHERE `menuModification`=:value",
            'seuil' => "SELECT * FROM `alertes` WHERE `seuil`=:value",
            'seulModification' => "SELECT * FROM `alertes` WHERE `seulModification`=:value",
            default => "SELECT * FROM `alertes` WHERE `id`=:value",
        },
        'Articles' => match ($by) {
            'id' => "SELECT * FROM `articles` WHERE `id`=:value",
            'famille' => "SELECT * FROM `articles` WHERE `famille`=:value",
            'nom' => "SELECT * FROM `articles` WHERE `nom`=:value",
            'commentaire' => "SELECT * FROM `articles` WHERE `commentaire`=:value",
            'code' => "SELECT * FROM `articles` WHERE `code`=:value",
            'localisation' => "SELECT * FROM `articles` WHERE `localisation`=:value",
            'dateCreation' => "SELECT * FROM `articles` WHERE `dateCreation`=:value",
            'dateModification' => "SELECT * FROM `articles` WHERE `dateModification`=:value",
            'createUser' => "SELECT * FROM `articles` WHERE `createUser`=:value",
            'editUser' => "SELECT * FROM `articles` WHERE `editUser`=:value",
            default => "SELECT * FROM `articles` WHERE `id`=:value",
        },
        'Centres' => match ($by) {
            'code' => "SELECT * FROM `centres` WHERE `code`=:value",
            'commentaire' => "SELECT * FROM `centres` WHERE `commentaire`=:value",
            'dateCreation' => "SELECT * FROM `centres` WHERE `dateCreation`=:value",
            'dateModification' => "SELECT * FROM `centres` WHERE `dateModification`=:value",
            'createUser' => "SELECT * FROM `centres` WHERE `createUser`=:value",
            'editUser' => "SELECT * FROM `centres` WHERE `editUser`=:value",
            default => "SELECT * FROM `centres` WHERE `id`=:value",
        },
        'Familles' => match ($by) {
            'nom' => "SELECT * FROM `familles` WHERE `nom`=:value",
            'commentaire' => "SELECT * FROM `familles` WHERE `commentaire`=:value",
            'dateCreation' => "SELECT * FROM `familles` WHERE `dateCreation`=:value",
            'dateModification' => "SELECT * FROM `familles` WHERE `dateModification`=:value",
            'createUser' => "SELECT * FROM `familles` WHERE `createUser`=:value",
            'editUser' => "SELECT * FROM `familles` WHERE `editUser`=:value",
            default => "SELECT * FROM `familles` WHERE `id`=:value",
        },
        'Front' => match ($by) {
            'nom' => "SELECT * FROM `front` WHERE `nom`=:value",
            'comment' => "SELECT * FROM `front` WHERE `comment`=:value",
            'state' => "SELECT * FROM `front` WHERE `state`=:value",
            'modification' => "SELECT * FROM `front` WHERE `modification`=:value",
            'count' => "SELECT * FROM `centres` WHERE `count`=:value",
            default => "SELECT * FROM `front` WHERE `id`=:value",
        },
        'Logs' => match ($by) {
            'user' => "SELECT * FROM `logs` WHERE `user`=:value",
            'date' => "SELECT * FROM `logs` WHERE `date`=:value",
            'asset' => "SELECT * FROM `logs` WHERE `asset`=:value",
            default => "SELECT * FROM `logs` WHERE `id`=:value",
        },
        'Mouvements' => match ($by) {
            'dateMouvement' => "SELECT * FROM `mouvements` WHERE `dateMouvement`=:value",
            'creator' => "SELECT * FROM `mouvements` WHERE `creator`=:value",
            'type' => "SELECT * FROM `mouvements` WHERE `type`=:value",
            'quantite' => "SELECT * FROM `mouvements` WHERE `quantite`=:value",
            'article' => "SELECT * FROM `mouvements` WHERE `article`=:value",
            'users' => "SELECT * FROM `mouvements` WHERE `users`=:value",
            'centreDeCout' => "SELECT * FROM `mouvements` WHERE `centreDeCout`=:value",
            'commentaire' => "SELECT * FROM `mouvements` WHERE `commentaire`=:value",
            'dateCreation' => "SELECT * FROM `mouvements` WHERE `dateCreation`=:value",
            'dateModification' => "SELECT * FROM `mouvements` WHERE `dateModification`=:value",
            'createUser' => "SELECT * FROM `mouvements` WHERE `createUser`=:value",
            'editUser' => "SELECT * FROM `mouvements` WHERE `editUser`=:value",
            default => "SELECT * FROM `mouvements` WHERE `id`=:value",
        },
        'Utilisateurs' => match ($by) {
            'nom' => "SELECT * FROM `utilisateurs` WHERE `nom`=:value",
            'centreDeCout' => "SELECT * FROM `utilisateurs` WHERE `centreDeCout`=:value",
            default => "SELECT * FROM `utilisateurs` WHERE `id`=:value",
        },
        default => false,
    };

}