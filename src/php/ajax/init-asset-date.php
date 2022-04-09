<?php

include '../functions.php';

echo json_encode(array(
    "asset" => GET_ASSET_NAME(),
    "date" => LastTimeUserConnected()
));

