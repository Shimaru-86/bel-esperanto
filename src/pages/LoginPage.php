<div id="loginPage" class="w3-theme-action">
  <!-- Top Menu -->
  <?php include("./src/components/userNotLogged/TopLogInMenu.php"); ?>

  <!-- Página de Conteúdo -->
  <div class="w3-main w3-margin-bottom" style="margin-top: 35px">
    <?php include("./src/components/userNotLogged/LandingPageContent.php"); ?>
    <hr />
    <?php include("./src/components/general/InfoDarkArea.php"); ?>
    <?php include("./src/components/general/Footer.php"); ?>
  </div>

  <!-- Páginas Modais -->
  <?php include("./src/components/modals/ModalLogin.php"); ?>
  <?php include("./src/components/modals/ModalRegister.php"); ?>
  <?php include("./src/components/modals/ModalAlert.php"); ?>
  <?php include("./src/components/modals/ModalError.php"); ?>
  <?php include("./src/components/modals/ModalNews.php"); ?>

  <!-- Adiciona os Scripts -->
  <script src="./src/scripts/ButtonFunctions.js"></script>
  <script src="./src/scripts/LoginAccount.js"></script>
  <script src="./src/scripts/ModalFunctions.js"></script>
  <script src="./src/scripts/RegistryFunctions.js"></script>
</div>