<?php

include '../functions.php';

$__Article__ = new Articles();

$ARTICLE = $_POST['Article_Data'];
$family = intval($ARTICLE['family']);
$name = $ARTICLE['nom'];
$id = intval($ARTICLE['id']);
$qteStock = intval($ARTICLE['quantity']);
$qteMin = intval($ARTICLE['quantityMin']);
$comment = $ARTICLE['comment'];
$code = $ARTICLE['code'];
$localisation = $ARTICLE['localisation'];
$type = $ARTICLE['type'];

if ($type === 'insert') {
    $__Article__->Insert($family, $name, $qteStock, $qteMin, $comment, $code, $localisation);
    echo json_encode(['insert', $name]);
} elseif ($type === 'update') {
    $__Article__->Update($family, $name, $comment, $qteMin, $code, $localisation, $id);
    echo json_encode(['update', $name]);
} elseif ($type === 'delete') {
    $__Article__->Delete($id);
}