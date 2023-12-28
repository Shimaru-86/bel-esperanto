function validateCPF(cpf) {
  // Remove caracteres não numéricos
  cpf = cpf.replace(/[^\d]/g, '');

  if (cpf.length !== 11) {
    return false;
  }

  // Verifica dígitos verificadores
  let sum = 0;
  for (let i = 0; i < 9; i++) {
    sum += parseInt(cpf.charAt(i)) * (10 - i);
  }

  const remainder = (sum * 10) % 11;
  if (remainder === 10 || remainder === parseInt(cpf.charAt(9))) {
    sum = 0;
    for (let i = 0; i < 10; i++) {
      sum += parseInt(cpf.charAt(i)) * (11 - i);
    }

    const secondRemainder = (sum * 10) % 11;
    return secondRemainder === 10 || secondRemainder === parseInt(cpf.charAt(10));
  }

  return false;
}

function passwordValidation(registryPassword) {
  //Variáveis para validação interna da senha
  let pass_specialCharacter;
  let pass_capitalLetter;
  let pass_lowerLetter;
  let pass_number;

  //Variável de controle do loop FOR
  let i;

  //Se torna true se a senha tiver:
    //pelo menos 6 caracteres,
    //pelo menos 1 caracter especial: 32 a 47, 58 a 64, 91 a 96, 123 a 126.
    //pelo menos 1 letra maiúscula: Letras maiúsculas: 65 a 90.
    //pelo menos 1 letra minúscula: Letras minúsculas: 97 a 122.
    //pelo menos 1 número: Números: 48 a 57.
    
  //*Confere se tem Caractere Especial na senha.
  for(i = 0; i <= registryPassword.length - 1; i++) {
    if(
      (registryPassword.codePointAt(i) >= 32 && registryPassword.codePointAt(i) <= 47) ||
      (registryPassword.codePointAt(i) >= 58 && registryPassword.codePointAt(i) <= 64) ||
      (registryPassword.codePointAt(i) >= 91 && registryPassword.codePointAt(i) <= 96) ||
      (registryPassword.codePointAt(i) >= 123 && registryPassword.codePointAt(i) <= 126)
    ) {
      pass_specialCharacter = true;
      document.getElementById("pPassSpecial").innerText = "";
      break;
    }
    else {
      pass_specialCharacter = false;
      document.getElementById("pPassSpecial").innerText = "1 caracter especial";
      continue;
    }
  }

  //*Confere se tem Letra Maiúscula na senha.
  for(i = 0; i <= registryPassword.length - 1; i++) {
    if(registryPassword.codePointAt(i) >= 65 && registryPassword.codePointAt(i) <= 90) {
      pass_capitalLetter = true;
      document.getElementById("pPassCapital").innerText = "";
      break;
    }
    else {
      pass_capitalLetter = false;
      document.getElementById("pPassCapital").innerText = "1 letra maiúscula";
      continue;
    }
  }

  //*Confere se tem Letra Minúscula na senha.
  for(i = 0; i <= registryPassword.length - 1; i++) {
    if(registryPassword.codePointAt(i) >= 97 && registryPassword.codePointAt(i) <= 122) {
      pass_lowerLetter = true;
      document.getElementById("pPassLower").innerText = "";
      break;
    }
    else {
      pass_lowerLetter = false;
      document.getElementById("pPassLower").innerText = "1 letra minúscula";
      continue;
    }
  }

  //*Confere se tem Número na senha.
  for(i = 0; i <= registryPassword.length - 1; i++) {
    if(registryPassword.codePointAt(i) >= 48 && registryPassword.codePointAt(i) <= 57) {
      pass_number = true;
      document.getElementById("pPassNumber").innerText = "";
      break;
    }
    else {
      pass_number = false;
      document.getElementById("pPassNumber").innerText = "1 número";
      continue;
    }
  }

  //*Confere se tem pelo menos seis caracteres na senha
  if(registryPassword.length >= 6) {
    document.getElementById("pPassSix").innerText = "";
  } else {
    document.getElementById("pPassSix").innerText = "6 caracteres";
  }

  //*Confere todas as validações da senha.
  if(pass_specialCharacter && pass_capitalLetter && pass_lowerLetter && pass_number && registryPassword.length >= 6) {
    return true;
  }
  else {
    return false;
  }
}

function registry() {
  //Desativa o botão
  disableButton("btCreateAccount", "Registrando...");

  //Variáveis para receber os valores
  var registryName = document.getElementById("txtRegistryName").value;
  var registryEmail = document.getElementById("txtRegistryEmail").value;
  var registryPhone = document.getElementById("numRegistryPhone").value;
  var registryCpf = document.getElementById("numRegistryCpf").value;
  var registryPassword = document.getElementById("txtRegistryPassword").value;

  //Variáveis para validação
  var validName = false;
  var validEmail = false;
  var validPhone = false;
  var validCpf = false;
  var validPassword = false;

  console.log("Nome: " + registryName + "\nEmail: " + registryEmail + "\nPhone: " + registryPhone + "\nCPF: " + registryCpf + "\nSenha: " + registryPassword);

  //Valida se os dados foram preechidos
  if(registryName === "") {
    colorEdges("txtRegistryName");
    showModal("modalAlert", "Você deve digitar seu nome completo.");
    enableButton("btCreateAccount", "Abrir Conta");
    return;
  }

  if(registryEmail === "") {
    colorEdges("txtRegistryEmail");
    showModal("modalAlert", "Você deve digitar um email que tenha acesso.");
    enableButton("btCreateAccount", "Abrir Conta");
    return;
  }

  if(registryPhone === "") {
    colorEdges("numRegistryPhone");
    showModal("modalAlert", "Você deve digitar o DDD do seu Estado e o número do seu telefone.");
    enableButton("btCreateAccount", "Abrir Conta");
    return;
  }

  if(registryCpf === "") {
    colorEdges("numRegistryCpf");
    showModal("modalAlert", "Digite o número do seu CPF");
    enableButton("btCreateAccount", "Abrir Conta");
    return;
  }

  if(registryPassword === "") {
    colorEdges("txtRegistryPassword");
    showModal("modalAlert", "Digite uma senha.");
    enableButton("btCreateAccount", "Abrir Conta");
    return;
  }
  
  //Valida todos os registros
  if(registryName !== "" && registryEmail !== "" && registryPhone !== "" && registryCpf !== "" && registryPassword !== "") {
    
    //Confere se o nome é válido, ou seja, se tem mais de um nome.
    let nameParts = registryName.split(" ");
    if(nameParts.length <= 1) {
      colorEdges("txtRegistryName");
      showModal("modalAlert", "Você deve digitar seu nome completo.");
      validName = false;
      enableButton("btCreateAccount", "Abrir Conta");
      return;
    }
    else {
      validName = true;
    }

    //Confere se o email é válido
    let user = registryEmail.substring(0, registryEmail.indexOf("@"));
    let domain = registryEmail.substring(registryEmail.indexOf("@")+ 1, registryEmail.length);
        
    if ((user.length >=1) && (domain.length >=3) && (user.search("@")===-1) && (domain.search("@")===-1) && (user.search(" ")===-1) && (domain.search(" ")===-1) && (domain.search(".")!==-1) && (domain.indexOf(".") >=1)&& (domain.lastIndexOf(".") < domain.length - 1)) {
      validEmail = true;
    }
    else {
      colorEdges("txtRegistryEmail");
      showModal("modalAlert", "Email inválido. Digite um email do tipo nome@domínio.com para ser válido.");
      validEmail = false;
      enableButton("btCreateAccount", "Abrir Conta");
      return;
    }

    //Confere se o número de telefone é válido
    if(registryPhone.length < 10 || registryPhone.length > 11) {
      colorEdges("numRegistryPhone");
      showModal("modalAlert", "Número de telefone incorreto. O telefone deve ter 10 ou 11 dígitos, começando pelos dois números do DDD da sua região e depois os números do seu telefone.");
      validPhone = false;
      enableButton("btCreateAccount", "Abrir Conta");
      return;
    }
    else {
      validPhone = true;
    }

    //Confere se CPF é válido
    validCpf = validateCPF(registryCpf);
    if(!validCpf) {
      colorEdges("numRegistryCpf");
      showModal("modalAlert", "Número de CPF incorreto.");
      enableButton("btCreateAccount", "Abrir Conta");
      return;
    }

    //Confere se a senha é válida
    validPassword = passwordValidation(registryPassword);
    if(!validPassword) {
      colorEdges("txtRegistryPassword");
      showModal("modalAlert", "Senha inválida. A senha precisa ter no mínimo 6 caracteres, com pelo menos 1 letra maiúscula, 1 letra minúscula, 1 número e 1 caractere especial.");
      enableButton("btCreateAccount", "Abrir Conta");
      return;
    }

    //Após validação, executa o registro no Banco de Dados
    if(validName && validEmail && validPhone && validCpf && validPassword) {
      let dados = new FormData();
      let xhr; // xmlHttpRequest

      dados.append('registryName', registryName);
      dados.append('registryEmail', registryEmail);
      dados.append('registryPhone', registryPhone);
      dados.append('registryCpf', registryCpf);
      dados.append('registryPassword', registryPassword);
    
      xhr = new XMLHttpRequest();
    
      xhr.onreadystatechange = function() {
        /*
          0- Requisição não inicializada
          1- Estabeleceu requisição com o servidor
          2- Pedido recebido
          3- Processando pedido
          4- Solicitação concluída e resposta pronta
        */
    
        if(xhr.readyState === 4 && xhr.status === 200) {
          console.log("Response é: " + xhr.responseText);

          let responseJSON = JSON.parse(xhr.responseText);

          try {          

            if (responseJSON.registry === "1") {
              showModal("modalNews", "Sua conta foi criada com sucesso. Clique no botão Fazer Login e entre em sua conta.");
              document.getElementById("btCreateAccount").classList.add("w3-hide");
              document.getElementById("btGoToLogin").classList.remove("w3-hide");
            }  else if (responseJSON.registry === "2") {
              showModal("modalAlert", "Erro ao criar conta. Este email já está cadastrado. Clique no botão Fazer Login e entre em sua conta.");
              document.getElementById("btCreateAccount").classList.add("w3-hide");
              document.getElementById("btGoToLogin").classList.remove("w3-hide");
            } else if (responseJSON.registry === "0") {
              showModal("modalAlert", "Erro ao Abrir Conta (1). Tente novamente. Se o erro persistir, entre em contato com o administrador do sistema.");
              enableButton("btCreateAccount", "Abrir Conta");
            } else {
              showModal("modalAlert", "Erro ao Abrir Conta (2). Tente novamente. Se o erro persistir, entre em contato com o administrador do sistema.");
              enableButton("btCreateAccount", "Abrir Conta");
            }
            
          } catch (error) {
            showModal("modalAlert", "Erro ao Abrir Conta (3). Tente novamente. Se o erro persistir, entre em contato com o administrador do sistema. O erro informado é: " + error);
            enableButton("btCreateAccount", "Abrir Conta");
          }
        }
      }
      xhr.open("POST", "./controllers/RegistryAccount.php");
      xhr.send(dados);
    }

  } //Fim da validação de todos os registros

} //Fim da function registry()

function goToLogin() {
  hideModal("modalRegister");
  showModal("modalLogin");
}
