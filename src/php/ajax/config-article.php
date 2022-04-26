<?php

include '../functions.php';

/*
 *
 * $name = $_GET['name'];
$qteStock = $_GET['quantity'];
$comment = $_GET['commentary'];
$family = $_GET['family'];
$code = $_GET['code'];
$localisation = $_GET['localisation'];

$__Article__->Insert($family, $name, $qteStock, $comment, $code, $localisation);

 */


$__Article__ = new Articles();

$ARTICLE = $_POST['Article_Data'];

$family = intval($ARTICLE['family']);
$name = $ARTICLE['nom'];
$upname = intval($ARTICLE['upnom']);
$qteStock = intval($ARTICLE['quantity']);
$comment = $ARTICLE['comment'];
$code = $ARTICLE['code'];
$localisation = $ARTICLE['localisation'];

$type = $ARTICLE['type'];

if ($type === 'insert') {
    $__Article__->Insert($family, $name, $qteStock, $comment, $code, $localisation);
} elseif ($type === 'update') {
    $__Article__->Update($family, $comment, $code, $localisation, $upname);
    var_dump($family, $comment, $code, $localisation, $upname);

}