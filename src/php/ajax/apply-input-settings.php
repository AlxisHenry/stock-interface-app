<?php

$content = trim(file_get_contents("php://input"));

$data = json_decode($content, true);


echo json_encode($data);