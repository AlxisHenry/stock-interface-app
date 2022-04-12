<?php

$Save = $_POST['settings'];

foreach ($Save as $Sv => $toSave ) {
    if (empty($toSave)) {
        unset($Save[array_search($toSave, $Save)]);
    }
}

if (count($Save) != 5) {

    echo "Une erreur est survenue";

} else {

    echo "Ok";

}