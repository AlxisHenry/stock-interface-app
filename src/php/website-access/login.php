<?php

include "../functions.php";

$TARGET = $_POST['target'];
$ID = $_POST['id'];
$PASSWORD = $_POST['pass'];
$TYPE = $_POST['type'];

if ($TYPE === 'login') {

    if (Access_OBJECT_($TARGET, 'username')->getUsername() === $TARGET && Access_OBJECT_($TARGET, 'username')->getPassword() === $PASSWORD) {
        if (Access_OBJECT_($TARGET, 'username')->getType() === 'admin') {
            if (Front_OBJECT_('1', 'id')->getState()) {
                if (Access_OBJECT_($TARGET, 'username')->getPassword() === $PASSWORD) {
                    echo json_encode(array(
                        [Access_OBJECT_($TARGET, 'username')->getUsername(), 'true', $TARGET]
                    ));
                    include '../sessions/login-session.php';
                    $_SESSION['login']['user'] = Access_OBJECT_($TARGET, 'username')->getUsername();
                    $_SESSION['login']['password'] = Access_OBJECT_($TARGET, 'username')->getPassword();
                    $_SESSION['login']['typeAccount'] = Access_OBJECT_($TARGET, 'username')->getType();
                } else {
                    echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
                }
            } else {
            echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'disabled', $TARGET]));
            }
        } elseif (Access_OBJECT_($TARGET, 'username')->getType() === 'dev') {
            if (Access_OBJECT_($TARGET, 'username')->getPassword() === $PASSWORD) {
                echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'true', $TARGET]));
                include '../sessions/login-session.php';
            } else {
                echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
            }
        } else {
            echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
        }
    } else {
        echo json_encode(array([Access_OBJECT_($TARGET, 'username')->getUsername(), 'false', $TARGET]));
    }
} elseif ($TYPE === 'view') {

    if (Front_OBJECT_('2', 'id')->getState()) {
        include '../sessions/login-session.php';
        $_SESSION['login']['user'] = 'employee';
        $_SESSION['login']['password'] = 'employee';
        $_SESSION['login']['typeAccount'] = Access_OBJECT_($TARGET, 'username')->getType();
        echo "true";
    } elseif (!Front_OBJECT_('2', 'id')->getState()) {
        echo "false";
    }

}

