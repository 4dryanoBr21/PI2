document.addEventListener("DOMContentLoaded", function () {
  const btnCadastrar = document.querySelector("button");

  btnCadastrar.addEventListener("click", function () {
    const nome = document.getElementById("nome").value.trim();
    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value;
    const confirmar = document.getElementById("confirmar").value;

    if (!nome || !email || !senha || !confirmar) {
      alert("Por favor, preencha todos os campos.");
      return;
    }

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("Digite um e-mail válido.");
      return;
    }

    if (senha !== confirmar) {
      alert("As senhas não coincidem.");
      return;
    }

    if (senha.length < 6) {
      alert("A senha deve ter pelo menos 6 caracteres.");
      return;
    }

    alert("Cadastro realizado com sucesso!");
    window.location.href = "login.html"; 
  });
});