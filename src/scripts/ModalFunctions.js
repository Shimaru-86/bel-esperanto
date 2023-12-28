function showModal(modalId, msgModal) {

  const modal = document.getElementById(modalId);
  if(modal) {

    if(modalId === "modalLogin") {
      //Apaga os campos do formulário para novas entradas.
      document.getElementById("txtEmailLogin").value = "";
      document.getElementById("txtSenhaLogin").value = "";
      //Ativa o botão de Logar para evitar que esteja desativado
      enableButton("btLoginAccount", "Logar");
      //Mostra a janela modalLogin
      modal.style.display = 'block';
    }

    if(modalId === "modalRegister") {
      //Desativa o botão de ir para login e ativa o botão de abrir conta.
      document.getElementById("btCreateAccount").classList.remove("w3-hide");
      document.getElementById("btGoToLogin").classList.add("w3-hide");
      //Apaga os campos do formulário para novas entradas.
      document.getElementById("txtRegistryName").value = "";
      document.getElementById("txtRegistryEmail").value = "";
      document.getElementById("numRegistryPhone").value = "";
      document.getElementById("numRegistryCpf").value = "";
      document.getElementById("txtRegistryPassword").value = "";
      //Tira a cor das validações da senha.
      document.getElementById("pPassSix").classList.remove("w3-text-green");
      document.getElementById("pPassSpecial").classList.remove("w3-text-green");
      document.getElementById("pPassCapital").classList.remove("w3-text-green");
      document.getElementById("pPassLower").classList.remove("w3-text-green");
      document.getElementById("pPassNumber").classList.remove("w3-text-green");
      //Ativa o botão de Abrir Conta para evitar que esteja desativado
      enableButton("btCreateAccount", "Abrir Conta");
      //Mostra a janela modalRegister
      modal.style.display = 'block';
    }

    //modalNews pNewsInModal

    if(msgModal !== "" && modalId === "modalNews") {
      document.getElementById('pNewsInModal').innerText = msgModal;
      modal.style.display = 'block';
    }
    
    if(msgModal !== "" && modalId === "modalAlert") {
      document.getElementById('pAlertInModal').innerHTML = msgModal;
      modal.style.display = 'block';
    }

    if(msgModal !== "" && modalId === "modalError") {
      document.getElementById('pErrorInModal').innerHTML = msgModal;
      modal.style.display = 'block';
    }
  }
  
}

function hideModal(modalId) {
  const modal = document.getElementById(modalId);
  if (modal) {
    modal.style.display = 'none';
  }
}

function seePassWord(inputId, iconId) {
  const senhaInput = document.getElementById(inputId);
  const eyeIcon = document.getElementById(iconId);

  if (senhaInput.type === "password") {
    senhaInput.type = "text";
    eyeIcon.classList.remove("fa-eye");
    eyeIcon.classList.add("fa-eye-slash");
  } else {
    senhaInput.type = "password";
    eyeIcon.classList.remove("fa-eye-slash");
    eyeIcon.classList.add("fa-eye");
  }
}

function colorEdges(elementId) {
  let element = document.getElementById(elementId);
  element.classList.add("w3-border");
  element.classList.add("w3-border-red");
}

function discolorEdges(elementId) {
  let element = document.getElementById(elementId);
  element.classList.remove("w3-border-red");
}
