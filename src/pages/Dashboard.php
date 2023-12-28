<div id="dashboardPage">

  <!-- Top Menu -->
  <?php include("./src/components/userLogged/TopLoggedMenu.php"); ?>

  <!-- Side Menu -->
  <?php include("./src/components/userLogged/SideMenu.php"); ?>

  <!-- Página de Conteúdo -->
  <div class="w3-main w3-margin-bottom w3-white" style="margin-top: 60px">

    <!-- Meu Painel de Menu -->
    <?php include("./src/components/userLogged/screen/MyMenuPanel.php"); ?>

    <!-- Perfil -->
    <?php include("./src/components/userLogged/screen/MyProfile.php"); ?>
    <!-- Minha Conta -->
    <?php include("./src/components/userLogged/screen/MyAccount.php"); ?>
    <!-- Minha Rede -->
    <?php include("./src/components/userLogged/screen/MyNetwork.php"); ?>
    <!-- Meus Cursos -->
    <?php include("./src/components/userLogged/screen/MyCourses.php"); ?>
    <!-- Cursos Disponíveis -->
    <?php include("./src/components/userLogged/screen/AvailableCourses.php"); ?>
  </div>

  <!-- Footer -->
  <div>
    <?php include("./src/components/general/InfoDarkArea.php"); ?>
    <?php include("./src/components/general/Footer.php"); ?>
  </div>

  <!-- Páginas Modais -->
  <?php include("./src/components/modals/ModalAlert.php"); ?>
  <?php include("./src/components/modals/ModalError.php"); ?>
  <?php include("./src/components/modals/ModalNews.php"); ?>

  <!-- Adiciona os Scripts -->
  <script src="./src/scripts/ButtonFunctions.js"></script>
  <script src="./src/scripts/SideMenuFunctions.js"></script>
  <script src="./src/scripts/ModalFunctions.js"></script>
  <script src="./src/scripts/ScreenFunctions.js"></script>
</div>