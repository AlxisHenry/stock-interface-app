<?php

include '../functions.php';

echo json_encode(array(
    "asset" => getAssetName(),
    "date" => FormatLastConnection()
));

