<?php

include "../functions.php";

$TARGET = $_POST['target'];
$ID = $_POST['id'];
$PASSWORD = $_POST['pass'];
$TYPE = $_POST['type'];
$__LOGS__ = new Logs();
$__ACCESS__ = new Access();

if ($TYPE === 'login') {

    if (Access_OBJECT_($TARGET, 'username')->getUsername() === $TARGET && Access_OBJECT_($TARGET, 'username')->getPassword() === $PASSWORD) {
        if (Access_OBJECT_($TARGET, 'username')->getType() === 'admin' || Access_OBJECT_($TARGET, 'username')->getType() === 'dev') {
            if (Front_OBJECT_('1', 'id')->getState()) {
                if (Access_OBJECT_($TARGET, 'username')->getPassword() === $PASSWORD) {
                    include '../sessions/login-session.php';
                    $_SESSION['login']['id'] = Access_OBJECT_($TARGET, 'username')->getId();
                    $_SESSION['login']['user'] = Access_OBJECT_($TARGET, 'username')->getUsername();
                    $_SESSION['login']['password'] = Access_OBJECT_($TARGET, 'username')->getPassword();
                    $_SESSION['login']['typeAccount'] = Access_OBJECT_($TARGET, 'username')->getType();
                    echo json_encode(([Access_OBJECT_($TARGET, 'username')->getUsername(), 'true', $TARGET]));
                    $__LOGS__->Insert();
                    $__ACCESS__->UpdateLastConnectionTime(
                        datetime()->format('Y-m-d H:i:s'),
                        $_SESSION['login']['id']
                    );
                } else {
                    echo json_encode(([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
                }
            } else {
            echo json_encode(([Access_OBJECT_($TARGET, 'username')->getUsername(), 'disabled', $TARGET]));
            }
        } else {
            echo json_encode(([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
        }
    } else {
        echo json_encode(([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
    }
} elseif ($TYPE === 'view') {
    if (Front_OBJECT_('2', 'id')->getState()) {
        include '../sessions/login-session.php';
        $_SESSION['login']['id'] = Access_OBJECT_($TARGET, 'username')->getId();
        $_SESSION['login']['user'] = 'employee';
        $_SESSION['login']['password'] = 'employee';
        $_SESSION['login']['typeAccount'] = Access_OBJECT_($TARGET, 'username')->getType();
        $__LOGS__->Insert();
        $__ACCESS__->UpdateLastConnectionTime(
            datetime()->format('Y-m-d H:i:s'),
            $_SESSION['login']['id']
        );
        echo "true";
    } elseif (!Front_OBJECT_('2', 'id')->getState()) {
        echo "false";
    }
}

