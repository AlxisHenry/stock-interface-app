<?php

function Connection() {
    $host = 'localhost';
    $database = 'timken_test';
    $username = 'timken';
    $password = 'root';

    try {
        return new PDO('mysql:host=' . $host . ';dbname=' . $database . ';charset=utf8', $username, $password);
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
}
