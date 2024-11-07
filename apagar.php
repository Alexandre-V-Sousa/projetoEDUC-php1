<?php
session_start();


if (isset($_GET['index'])) {
    $index = $_GET['index'];
    if (isset($_SESSION['notas'][$index])) {
        unset($_SESSION['notas'][$index]);
        $_SESSION['notas'] = array_values($_SESSION['notas']); 
    }
}


header('Location: index.php');
exit;
