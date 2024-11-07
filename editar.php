<?php
session_start();


if (isset($_GET['index'])) {
  $index = $_GET['index'];
  if (isset($_SESSION['notas'][$index])) {
    $aluno = $_SESSION['notas'][$index];
  } else {
    header('Location: index.php');
    exit;
  }
} else {
  header('Location: index.php');
  exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $_SESSION['notas'][$index] = [
    'nome' => $_POST['nome'],
    'nota1' => $_POST['nota1'],
    'nota2' => $_POST['nota2'],
    'nota3' => $_POST['nota3'],
    'nota4' => $_POST['nota4'],
  ];
  header('Location: index.php');
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title>Editar Aluno</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <div class="container">
    <h2>Editar Aluno</h2>
    <form action="" method="post">
      <label for="nome">Nome do aluno</label>
      <input type="text" name="nome" id="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required>
      <p></p>
      <label for="nota1">1°bimestre</label>
      <input type="number" name="nota1" id="nota1" step="0.01" value="<?php echo htmlspecialchars($aluno['nota1']); ?>"
        required>
      <p></p>
      <label for="nota2">2°bimestre</label>
      <input type="number" name="nota2" id="nota2" step="0.01" value="<?php echo htmlspecialchars($aluno['nota2']); ?>"
        required>
      <p></p>
      <label for="nota3">3°bimestre</label>
      <input type="number" name="nota3" id="nota3" step="0.01" value="<?php echo htmlspecialchars($aluno['nota3']); ?>"
        required>
      <p></p>
      <label for="nota4">4°bimestre</label>
      <input type="number" name="nota4" id="nota4" step="0.01" value="<?php echo htmlspecialchars($aluno['nota4']); ?>"
        required>
      <button type="submit" class="btn btn-primary">Salvar</button>
      <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
    crossorigin="anonymous"></script>
</body>

</html>