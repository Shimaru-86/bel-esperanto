<div>
  <!-- Janela Modal para Registro -->
  <div id="modalRegister" class="w3-modal w3-theme">
    <div class="w3-modal-content w3-theme w3-animate-zoom" style="max-width: 600px">
      <div class="w3-center"><br />
        <span onclick="hideModal('modalRegister')" class="w3-button w3-text-white w3-xlarge w3-transparent w3-display-topright" title="Fechar">X</span>
        <h2 class="w3-center w3-text-black"><b>Criar Conta</b></h2>
      </div>

      <form class="w3-container w3-margin">
  
        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-user w3-text-black"></i>
          </div>
          <div class="w3-rest">
            <input onfocus="discolorEdges('txtRegistryName')" class="w3-input w3-border" id="txtRegistryName" type="text" placeholder="Seu nome completo" autocomplete="username" />
          </div>
        </div>
  
        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-envelope-o w3-text-black"></i>
          </div>
          <div class="w3-rest">
            <input onfocus="discolorEdges('txtRegistryEmail')" class="w3-input w3-border" id="txtRegistryEmail" type="text" placeholder="Email" autocomplete="email" />
          </div>
        </div>
  
        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-phone w3-text-black"></i>
          </div>
          <div class="w3-rest">
            <input
              id="numRegistryPhone"
              type="number"
              placeholder="Telefone"
              maxlength="11"
              class="w3-input w3-border" 
              onfocus="discolorEdges('numRegistryPhone')"
              pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})"
              onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"
            />
          </div>
        </div>

        <div id="sectionNumCpf" class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-drivers-license-o w3-text-black"></i>
          </div>
          <div class="w3-rest">
            <input
              id="numRegistryCpf"
              type="number"
              placeholder="CPF"
              maxlength="11"
              class="w3-input w3-border" 
              onfocus="discolorEdges('numRegistryCpf')"
              pattern="(\([0-9]{2}\))\s([9]{1})?([0-9]{5})-([0-9]{4})"
              onkeypress="return event.charCode >= 48 && event.charCode <= 57" autocomplete="off"
            />
          </div>
        </div>

        <div class="w3-row w3-section">
          <div class="w3-col" style="width: 50px">
            <i class="w3-xxlarge fa fa-eye w3-text-black pointer" id="eyeIconRegister" onclick="seePassWord('txtRegistryPassword', 'eyeIconRegister')"></i>
          </div>
          <div class="w3-rest">
            <input onfocus="discolorEdges('txtRegistryPassword')" onchange="passwordValidation(document.getElementById('txtRegistryPassword').value)" class="w3-input w3-border" id="txtRegistryPassword" type="password" placeholder="Digite sua senha" autocomplete="off" />
          </div>

          <div class="">
            <p class="w3-small" id="pPassSix">6 caracteres</p>
            <p class="w3-small" id="pPassSpecial">1 caracter especial</p>
            <p class="w3-small" id="pPassCapital">1 letra maiúscula</p>
            <p class="w3-small" id="pPassLower">1 letra minúscula</p>
            <p class="w3-small" id="pPassNumber">1 número</p>
          </div>
        </div>
  
      </form>

      <button id="btCreateAccount" onclick="registry()" class="w3-button w3-round w3-block w3-section w3-theme-d5 w3-ripple w3-padding">Abrir Conta</button>
      <button id="btGoToLogin" onclick="goToLogin()" class="w3-button w3-round w3-block w3-section w3-theme-d5 w3-ripple w3-padding w3-hide">Fazer Login</button>

      <hr/>

      <div class="w3-container w3-border-top w3-padding-16">
        <button onclick="hideModal('modalRegister')" type="button" class="w3-button w3-red w3-round w3-left">Cancelar</button>
      </div>

    </div>
  </div> <!-- Fim da Janela Modal para Registro -->
</div>