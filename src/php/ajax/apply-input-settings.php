<?php

include '../functions.php';

$content = trim(file_get_contents("php://input"));

$FORM_INFORMATIONS = json_decode($content, true);

function SettingsInputsData($Type, $Target, $Null, $Status, $Final): array
{
    return array([$Type, $Target, $Null, $Status, $Final]);
}

echo json_encode(SettingsInputsData('password', null, false, true, null));
//echo json_encode(SettingsInputsData('password', 'tfadmin', false, false, false));