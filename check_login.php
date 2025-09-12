<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    echo json_encode([
        'loggedin' => true,
        'fullname' => $_SESSION['fullname']
    ]);
} else {
    echo json_encode(['loggedin' => false]);
}
?>