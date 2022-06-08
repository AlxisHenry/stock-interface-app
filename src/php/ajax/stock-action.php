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
        $newQteGiven = $target_article->getQuantityGiven();
        $newQteTotal = intval($newQteStock) + $target_article->getQuantityGiven();
        $__ARTICLES__->UpdateStock(intval($newQteStock),intval($newQteTotal), intval($newQteGiven), $target_article->getId());
        $__MOUVEMENT__->New('e', $values['order'], intval($values['qty']), intval($target_article->getId()), 1, 1, $values['commentary']);
        echo json_encode([$target_article->getNom(), $target_article->getQuantityStock(), $target_article->getQuantityMin(), true]);
        break;
    case 'out':
        $newQteStock = $target_article->getQuantityStock() - intval($values['qty']);
        $newQteGiven = $target_article->getQuantityGiven() + intval($values['qty']);
        $newQteTotal = $newQteStock + $newQteGiven;
        if(intval($newQteStock) < 0) {
            echo json_encode([$target_article->getNom(), $target_article->getQuantityStock(), $target_article->getQuantityMin(), false]);
        } else {
            $__ARTICLES__->UpdateStock(intval($newQteStock),intval($newQteTotal), intval($newQteGiven), $target_article->getId());
            $__MOUVEMENT__->New('s', $values['order'], intval($values['qty']), intval($target_article->getId()), 1, 1, $values['commentary']);
            echo json_encode([$target_article->getNom(), $target_article->getQuantityStock(), $target_article->getQuantityMin(), true]);
        }
        break;
    default:
        echo false;
}