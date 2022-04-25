<?php

include '../functions.php';

echo json_encode([
    "asset" => getAssetName(),
    "date" => FormatLastConnection(),
    "count" => GetCountOfAlerts(),
    "countState" => Front_OBJECT_(6, 'id')->getState()
]);

