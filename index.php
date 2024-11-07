<?php
session_start();

function calcularMedia($nota1, $nota2, $nota3, $nota4) {
  $soma = $nota1 + $nota2 + $nota3 + $nota4;
  $media = $soma / 4;
  return number_format($media, 2);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Médias de Notas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    body {
      margin: 0;
      font-family: Arial, Helvetica, sans-serif;
      background-color: #f0f2f5;
    }

    .navbar {
      background-color: #343a40; /* Cor da barra de navegação ajustada */
      padding: 10px 0;
      animation: slideDown 0.5s ease-in-out;
    }

    .navbar a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      padding: 15px;
      transition: color 0.3s ease;
    }

    .navbar a:hover {
      color: #0056b3; /* Cor do texto ao passar o mouse */
    }
    

    .container {
      margin-top: 30px;
    }

    .card {
      border-radius: 20px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      animation: fadeIn 1s ease-in-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .list-group-item {
      border: none;
      margin-bottom: 10px;
      border-radius: 10px;
      transition: transform 0.3s ease;
    }

    .list-group-item:hover {
      transform: scale(1.02);
    }
  </style>
</head>

<body>

  <div class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Calculadora de Notas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="3index.html">Início</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="4sobre.html">Sobre</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="2cursos.html">Cursos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="1contato.html">Contato</a>
          </li>
        </ul>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="card p-4">
          <h2 class="text-center">Cadastrar Aluno</h2>
          <form action="receba.php" method="post">
            <div class="mb-3">
              <label for="nome" class="form-label">Nome do Aluno</label>
              <input type="text" name="nome" id="nome" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="nota1" class="form-label">1° Bimestre</label>
              <input type="number" name="nota1" id="nota1" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="nota2" class="form-label">2° Bimestre</label>
              <input type="number" name="nota2" id="nota2" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="nota3" class="form-label">3° Bimestre</label>
              <input type="number" name="nota3" id="nota3" class="form-control" step="0.01" required>
            </div>
            <div class="mb-3">
              <label for="nota4" class="form-label">4° Bimestre</label>
              <input type="number" name="nota4" id="nota4" class="form-control" step="0.01" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Cadastrar Aluno</button>
          </form>
        </div>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-md-8 offset-md-2">
        <h3 class="text-center">Alunos Cadastrados</h3>
        <ul class="list-group">
          <?php
          if (isset($_SESSION['notas'])) {
            foreach ($_SESSION['notas'] as $index => $aluno) {
              echo '<li class="list-group-item">';
              echo '<div class="d-flex justify-content-between align-items-center">';
              echo '<div>';
              echo '<strong>Nome:</strong> ' . htmlspecialchars($aluno['nome']) . '<br>';
              echo '<strong>Nota 1:</strong> ' . htmlspecialchars($aluno['nota1']) . '<br>';
              echo '<strong>Nota 2:</strong> ' . htmlspecialchars($aluno['nota2']) . '<br>';
              echo '<strong>Nota 3:</strong> ' . htmlspecialchars($aluno['nota3']) . '<br>';
              echo '<strong>Nota 4:</strong> ' . htmlspecialchars($aluno['nota4']) . '<br>';
              echo '<strong>Média:</strong> ' . calcularMedia($aluno['nota1'], $aluno['nota2'], $aluno['nota3'], $aluno['nota4']) . '<br>';
              echo '</div>';
              echo '<div>';
              echo '<a href="editar.php?index=' . $index . '" class="btn btn-warning btn-sm">Editar</a> ';
              echo '<a href="apagar.php?index=' . $index . '" class="btn btn-danger btn-sm">Remover</a>';
              echo '</div>';
              echo '</div>';
              echo '</li>';
            }
          }
          ?>
        </ul>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>

</html>
