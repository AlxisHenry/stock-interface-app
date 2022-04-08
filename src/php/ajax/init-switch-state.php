<?php

include '../functions.php';

$STATE_ELEMENT = Connection()->query("SELECT * FROM `front`");

echo json_encode($STATE_ELEMENT->fetchAll());
