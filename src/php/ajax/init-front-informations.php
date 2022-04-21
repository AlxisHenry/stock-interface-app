<?php

include '../functions.php';

echo json_encode(array(
    "asset" => getAssetName(),
    "date" => FormatLastConnection(),
    "count" => GetCountOfAlerts(),
    "countState" => Front_OBJECT_(6, 'id')->getState()
));

