function showSideMenu() {
  const sideMenu = document.getElementById("sideMenu");
  if (sideMenu.style.display === "block") {
    sideMenu.style.display = "none";
  } else {
    sideMenu.style.display = "block";
  }
}

function handleRequestError() {
  enableButton("btLogOff", "Sair");
  showModal("modalError", "Erro na requisição. Verifique sua conexão ou tente novamente mais tarde.");
}

function handleJSONParseError() {
  enableButton("btLogOff", "Sair");
  showModal("modalError", "Erro ao processar a resposta do servidor. Entre em contato com os administradores.");
}

function logOff() {
  // Desativa o botão de Sair
  disableButton("btLogOff", "Saindo...");

  // Faz a requisição para o Controller
  let xhr; // xmlHttpRequest
  xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function() {
    if(xhr.readyState === 4) {
      if(xhr.status === 200) {
        try {
          let responseObject = JSON.parse(xhr.responseText);

          if(responseObject.logout === "1") {
            // Deslogou
            // Recarregar a página para sair da página logada.
            sessionStorage.clear();
            window.location.href = "./";
          } else {
            enableButton("btLogOff", "Sair");
            showModal("modalError", "Erro ao deslogar. Tente novamente mais tarde. Se o erro persistir, entre em contato com os administradores.");
          }
        } catch (error) {
          handleJSONParseError(); // Tratamento para erro de análise JSON
        }
      } else {
        handleRequestError(); // Tratamento para erro na requisição
      }
    }
  }

  xhr.open("POST", "./controllers/LogoutAccount.php");
  xhr.send(); // Enviar a requisição
}