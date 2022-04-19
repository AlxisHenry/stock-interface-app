<?php

include '../functions.php';

$TARGET = $_POST['target'];
$ID = $_POST['id'];
$PASSWORD = $_POST['pass'];
$TYPE = $_POST['type'];

if ($TYPE === 'logs') {

    if (Access_OBJECT_($TARGET, 'username')->getType() === 'admin') {
        if (Front_OBJECT_('3', 'id')->getState()) {
            try {
                $REQUEST = "INSERT INTO `logs` (user, date, asset) VALUES (:user, (SELECT NOW()), :asset);";
                $QUERY = Connection()->prepare($REQUEST);
                $QUERY->bindValue(':user', Access_OBJECT_($TARGET, 'username')->getId(), PDO::PARAM_INT);
                $QUERY->bindValue(':asset', getAssetName());
                $QUERY->execute();
                echo "true";
            } catch (Exception $e) {
                echo $e;
            }
        }
    } else if (Access_OBJECT_($TARGET, 'usenrame')->getType() === 'view') {
        if (Front_OBJECT_('4', 'id')) {
            try {
                $REQUEST = "INSERT INTO `logs` (user, date, asset) VALUES (:user, (SELECT NOW()), :asset);";
                $QUERY = Connection()->prepare($REQUEST);
                $QUERY->bindValue(':user', Access_OBJECT_($TARGET, 'username')->getId(), PDO::PARAM_INT);
                $QUERY->bindValue(':asset', getAssetName());
                $QUERY->execute();
                echo "true";
            } catch (Exception $e) {
                echo $e;
            }
        }
    } else {
        try {
            $REQUEST = "INSERT INTO `logs` (user, date, asset) VALUES (:user, (SELECT NOW()), :asset);";
            $QUERY = Connection()->prepare($REQUEST);
            $QUERY->bindValue(':user', Access_OBJECT_($TARGET, 'username')->getId(), PDO::PARAM_INT);
            $QUERY->bindValue(':asset', getAssetName());
            $QUERY->execute();
            echo "true";
        } catch (Exception $e) {
            echo $e;
        }
    }

}
