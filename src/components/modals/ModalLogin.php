<div>
  <!-- Modal para Login -->
  <div id="modalLogin" class="w3-modal w3-theme-light">
    <div class="w3-modal-content w3-theme-light w3-animate-zoom" style="max-width: 600px">
      <div class="w3-center">
        <br />
        <span onclick="hideModal('modalLogin')" class="w3-button w3-text-red w3-xlarge w3-transparent w3-display-topright" title="Fechar">X</span>
        <h2 class="w3-center w3-color-d2"><b>Fazer Login</b></h2>
      </div>

      <form class="w3-container w3-margin">
        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-user w3-color-d2"></i>
          </div>
          <div class="w3-rest">
            <input class="w3-input w3-border" id="txtEmailLogin" type="text" placeholder="Email" autocomplete="email" />
          </div>
        </div>
  
        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-eye w3-color-d2 pointer" id="eyeIconLogin" onclick="seePassWord('txtSenhaLogin', 'eyeIconLogin')"></i>
          </div>
          <div class="w3-rest">
            <input class="w3-input w3-border" id="txtSenhaLogin" type="password" placeholder="Senha" autocomplete="current-password" />
          </div>
        </div>
      </form>

      <div class="w3-container">
        <button id="btLoginAccount" class="w3-button w3-round w3-block w3-section w3-blue w3-ripple w3-padding" onclick="loginAccount()">Logar</button>
      </div>

      <div class="w3-container w3-border-top w3-padding-16">
        <button onclick="hideModal('modalLogin')" type="button" class="w3-button w3-red w3-round w3-left">Cancelar</button>

        <span class="w3-right w3-padding w3-right-align">
          <button
            class="w3-button w3-text-blue"
            style="background: none; border: none; padding: 0; font: inherit; cursor: pointer"
            onclick="alert('Criar função para lembrar senha.')"
            >
            Esqueci Minha Senha
          </button>
        </span>
      </div>

    </div>
  </div> <!-- Fim do Modal para Login -->
</div>