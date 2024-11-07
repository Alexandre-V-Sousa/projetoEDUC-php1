<?php
session_start();


if (!isset($_SESSION['notas'])) {
    $_SESSION['notas'] = [];
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $notas = [
        'nome' => $_POST['nome'],
        'nota1' => $_POST['nota1'],
        'nota2' => $_POST['nota2'],
        'nota3' => $_POST['nota3'],
        'nota4' => $_POST['nota4'],
    ];

    $_SESSION['notas'][] = $notas;
}


header('Location: index.php');
exit;
