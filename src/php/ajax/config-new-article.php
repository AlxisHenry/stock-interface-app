<?php

$name = $_GET['name'];
$qteStock = $_GET['quantity'];
$comment = $_GET['commentary'];
$family = $_GET['family'];
$code = $_GET['code'];
$localisation = $_GET['localisation'];

$__Article__ = new Articles();
$__Article__->Insert($family, $name, $qteStock, $comment, $code, $localisation);
