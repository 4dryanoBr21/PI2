<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="d-flex justify-content-center align-items-center vh-100">

  <div class="card p-4" style="width: 300px;">
    <h4 class="text-center">Login</h4>
    <form action="login.php" method="POST">
      <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
      <input type="password" name="senha" placeholder="Senha" class="form-control mb-2" required>
      <button type="submit" class="btn btn-primary w-100">Entrar</button>
    </form>
    <button class="btn btn-link w-100 mt-2" data-bs-toggle="modal" data-bs-target="#modalCadastro">
      Registrar
    </button>
  </div>

  <!-- Modal de Cadastro -->
  <div class="modal fade" id="modalCadastro" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content p-3">
        <h5>Criar Conta</h5>
        <form action="registrar.php" method="POST">
          <input type="text" name="nome" placeholder="Nome" class="form-control mb-2" required>
          <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
          <input type="password" name="senha" placeholder="Senha" class="form-control mb-2" required>
          <button type="submit" class="btn btn-success w-100">Cadastrar</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>