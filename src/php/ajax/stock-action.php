<?php

include '../functions.php';

$values = $_POST['values'];
$type = $_POST['type'];
$__MOUVEMENT__ = new Mouvements();
$__ARTICLES__ = new Articles();
$target_article = Articles_OBJECT_($values['article'], 'id');

switch ($type) {
    case 'in':
        $newQteStock = $target_article->getQuantityStock() + intval($values['qty']);
        $newQteTotal = intval($newQteStock) + $target_article->getQuantityGiven();
        $__ARTICLES__->UpdateStock(intval($newQteStock), intval($newQteTotal), $target_article->getId());
        $__MOUVEMENT__->New('e', $values['order'], intval($values['qty']), intval($target_article->getId()), 1, 1, $values['commentary']);
        break;
    case 'out':
        $newQteStock = $target_article->getQuantityStock() - intval($values['qty']);
        $newQteGiven = $target_article->getQuantityGiven() + intval($values['qty']);
        $newQteTotal = $newQteStock + $newQteGiven;
        echo json_encode([$newQteTotal, $newQteStock, $newQteGiven]);
        break;
    default:
        echo false;
}