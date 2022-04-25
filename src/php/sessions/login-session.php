<?php

$_SESSION['login'] = [
    "user" => null,
    "password" => null,
    "typeAccount" => null,
    "timestamp" => time(),
    "formatDate" => date('d/m/Y h:i'),
    "hostname" => getAssetName(),
    "browser" => getBrowser(),
    "system" => getOs(),
];
