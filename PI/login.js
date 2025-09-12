document.addEventListener("DOMContentLoaded", function () {
  const loginButton = document.querySelector("button");

  loginButton.addEventListener("click", function () {
    const email = document.getElementById("email").value.trim();
    const senha = document.getElementById("senha").value.trim();

    const emailValido = "admin";
    const senhaValida = "admin";

    if (email === emailValido && senha === senhaValida) {
      window.location.href = "lobby.html";
    } else {
      alert("E-mail ou senha incorretos.");
    }
  });
});