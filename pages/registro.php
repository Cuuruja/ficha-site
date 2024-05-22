<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Minha Aplicação</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="../index.html">Início <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Minhas Fichas</a>
            </li>
          </ul>
          <div class="form-inline">
            <a href="login.html" class="btn btn-primary mr-2">Login</a>
            <a href="registro.html" class="btn btn-primary">Registro</a>
        </div>
        </div>
      </nav>
    
<main class="conteudo d-flex justify-content-center align-items-center min-vh-100 " id="conteudo">
    <div class="card p-4" style="width: 100%; max-width: 400px;">
        <h2 class="text-center mb-4">Cadastre-se</h2>
        <form id="formRegistro" action="registro.php" method="post">
            <div class="form-group">
                <label for="usuario">Usuário:</label>
                <input type="text" id="usuario" name="usuario" class="form-control" placeholder="Usuário" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="senha">Senha:</label>
                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" required>
            </div>
            <div class="form-group">
                <label for="confirm_senha">Repita sua Senha:</label>
                <input type="password" id="confirm_senha" name="confirm_senha" class="form-control" placeholder="Repita sua senha" required>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-block">Registrar</button>
            </div>
        </form>
    </div>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include_once '../php/conexao.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nome = $_POST['usuario'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

  $sql = "INSERT INTO usuarios (usuario, email, senha) VALUES ('$nome', '$email', '$senhaCriptografada')";

  if ($conn->query($sql) === TRUE) {
      echo "Cadastro realizado com sucesso.";
  } else {
      echo "Erro ao cadastrar: " . $conn->error;
  }
}

?>
