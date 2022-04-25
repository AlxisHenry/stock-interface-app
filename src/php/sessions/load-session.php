<?php

$_SESSION['load'] = [
    "timestamp" => time(),
    "hostname" => getAssetName(),
    "browser" => getBrowser(),
    "system" => getOs(),
];
