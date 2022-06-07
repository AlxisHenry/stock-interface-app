<?php

$_SESSION['login'] = [
    "id" => null,
    "user" => null,
    "password" => null,
    "typeAccount" => null,
    "timestamp" => time(),
    "formatDate" => date('d/m/Y h:i'),
    "hostname" => getAssetName(),
    "browser" => getBrowser(),
    "system" => getOs(),
];
