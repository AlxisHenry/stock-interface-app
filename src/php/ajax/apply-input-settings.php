<?php

    include '../functions.php';

    $DATA_OBJECT = $_POST['_DATA_SAVE_'];

    $__DATABASE__ = $DATA_OBJECT['__database__'];
    $__TABLE__ = $DATA_OBJECT['__table__'];
    $__TARGET__ = $DATA_OBJECT['target'];
    $__ACTION__ = $DATA_OBJECT['action'];
    $__VALUE__ = $DATA_OBJECT['value'];

    function Validity($__VALUE__, $__ACTION__, $__DATABASE__):string
    {

        $currentPassword = Access_OBJECT_($__DATABASE__, 'id')->getPassword();
        $currentLevel = Alertes_OBJECT_($__DATABASE__, 'id')->getSeuil();

        // Test global
        if (strlen($__VALUE__) === 0) {
            return json_encode([false, $__ACTION__]);
        } else if (($__VALUE__ === $currentPassword && $__ACTION__ === 'password') || (intval($__VALUE__) === $currentLevel && $__ACTION__ === 'minimal')) {
            return json_encode([null, $__ACTION__]);
        }

        // Test Password
        if ((($__VALUE__ != $currentPassword) && $__ACTION__ === 'password')) {
            if (strlen($__VALUE__) > 4) {
                $QUERY_RESET_PASSWORD = "UPDATE `access` SET `password`=:newPassword WHERE `id`=:id";
                $qPASSWORD = Connection()->prepare($QUERY_RESET_PASSWORD);
                $qPASSWORD->execute([
                    ':newPassword' => $__VALUE__,
                    ':id' => $__DATABASE__
                ]);
                $qPASSWORD->closeCursor();
                return json_encode([true, $__ACTION__]);
            } else {
                return json_encode(['none', $__ACTION__]);
            }
        }

        // Test Alerts
        if ((($__VALUE__ != $currentLevel) && $__ACTION__ === 'minimal')) {
            if ($__VALUE__ >= 0 && $__VALUE__ < 100) {
                $QUERY_RESET_PASSWORD = "UPDATE `alertes` SET `seuil`=:newSeuil WHERE `id`=:id";
                $qPASSWORD = Connection()->prepare($QUERY_RESET_PASSWORD);
                $qPASSWORD->execute([
                    ':newSeuil' => $__VALUE__,
                    ':id' => $__DATABASE__
                ]);
                $qPASSWORD->closeCursor();
                return json_encode([true, $__ACTION__]);
            } else {
                return json_encode(['none', $__ACTION__]);
            }
        }

        return json_encode(['admin', $__ACTION__]);

    }

echo Validity($__VALUE__, $__ACTION__, $__DATABASE__);