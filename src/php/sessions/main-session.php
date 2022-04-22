<?php

session_start();

function CheckSessionExist(string $session):bool {

    if ($_SESSION[$session]) {
        return true;
    }

    return false;

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