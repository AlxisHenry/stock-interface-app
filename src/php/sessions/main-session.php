<?php

session_start();

function CheckSessionExist():void {

    if (!$_SESSION['login']) {
        header("Location: ../../../../index.php");
        die();
    }

}

function CheckSessionAccount():void {

    $ACCOUNT_TYPE = GetSession('login', 'typeAccount');

    if ($ACCOUNT_TYPE !== 'view' && str_contains($_SERVER['REQUEST_URI'], 'view.php')) {
        header("Location: ../../../../index.php");
        die();
    } elseif ($ACCOUNT_TYPE === 'admin' || $ACCOUNT_TYPE === 'dev') {
        if (!(str_contains($_SERVER['REQUEST_URI'], '?nav='))) {
            header("Location: ../../../../index.php");
            die();
        }
    }

}

function GetSession(string $session, string $attr):string|int {

    return match ($session) {
        'load' => match ($attr) {
            'timestamp' => $_SESSION['load']['timestamp'],
            'hostname' => $_SESSION['load']['hostname'],
            'browser' => $_SESSION['load']['browser'],
            'system' => $_SESSION['load']['system'],
            default => false,
        },
        'login' => match ($attr) {
            'user' => $_SESSION['login']['user'],
            'password' => $_SESSION['login']['password'],
            'typeAccount' => $_SESSION['login']['typeAccount'],
            'timestamp' => $_SESSION['login']['timestamp'],
            'formatDate' => $_SESSION['login']['formatDate'],
            'hostname' => $_SESSION['login']['hostname'],
            'browser' => $_SESSION['login']['browser'],
            'system' => $_SESSION['login']['system'],
            'lastActivity' => $_SESSION['login']['history'],
            default => false,
        },
        default => false,
    };

}