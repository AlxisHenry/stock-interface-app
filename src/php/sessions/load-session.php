<?php

$_SESSION['load'] = array(
    "timestamp" => time(),
    "hostname" => getAssetName(),
    "browser" => getBrowser(),
    "system" => getOs(),
);
