<!-- Dentro do Register Modal -->
<form action="" method="POST">
    <div class="form-floating">
        <input name="cad_nome" type="text" class="form-control" id="cadNome" placeholder="Username"
            style="margin-bottom: 18px;">
        <label for="cadNome">Username</label>
    </div>
    <div class="form-floating mb-3">
        <input name="cad_email" type="email" class="form-control" id="cadEmail" placeholder="name@example.com">
        <label for="cadEmail">Email address</label>
    </div>
    <div class="form-floating">
        <input name="cad_senha" type="password" class="form-control" id="cadSenha" placeholder="Password">
        <label for="cadSenha">Password</label>
    </div>
    <div class="form-floating" style="margin-top: 18px;">
        <input name="cad_senha_confirm" type="password" class="form-control" id="cadSenhaConfirm" placeholder="Password">
        <label for="cadSenhaConfirm">Repeat your Password</label>
    </div>
    <div class="modal-footer">
        <button type="submit" name="submit" class="btn btn-dark">Register</button>
    </div>

    <?php
        if(isset($_POST['submit'])) {

            include_once("conexao.php"); // aqui precisa já retornar o objeto $mysqli

            $nome = $_POST['cad_nome'];
            $email = $_POST['cad_email'];
            $senha = $_POST['cad_senha'];

            // executa o INSERT corretamente
            $sql = "INSERT INTO usuario (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
            $result = $mysqli->query($sql);

            if($result){
                echo "Cadastro feito com sucesso!";
            } else {
                echo "Erro ao cadastrar: " . $mysqli->error;
            }
        }
    ?>
</form>