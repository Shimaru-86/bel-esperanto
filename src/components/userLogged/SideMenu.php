<div id="sideMenu"
  class="w3-collapse w3-white w3-animate-left"
  style="display: none; width: 280px; position: fixed; top: 52px; left: 0; z-index: 100">
  <br/>
  <div class="w3-container w3-row">
    <div class="w3-col s8 w3-bar">
      <span>Bem Vindo, <strong><?php echo($_SESSION['userData']['estudanteNome']) ?></strong></span><br/>
    </div>
  </div>
  <hr/>
  <div class="w3-bar-block">
    <button class="w3-bar-item w3-button w3-padding" onclick="showPanel('myProfile')"><i class="fa fa-user-circle fa-fw"></i> Meu Perfil</button>
    <button class="w3-bar-item w3-button w3-padding" onclick="showPanel('myAccount')"><i class="fa fa-money fa-fw"></i> Minha Conta</button>
    <button class="w3-bar-item w3-button w3-padding" onclick="showPanel('myNetwork')"><i class="fa fa-group fa-fw"></i> Minha Rede</button>
    <button class="w3-bar-item w3-button w3-padding" onclick="showPanel('myCourses')"><i class="fa fa-edit fa-fw"></i> Meus Cursos</button>
    <button class="w3-bar-item w3-button w3-padding" onclick="showPanel('availableCourses')"><i class="fa fa-list-ul fa-fw"></i> Cursos Disponíveis</button>
    <button class="w3-bar-item w3-button w3-padding" id="btLogOff" onclick="logOff()"><i class="fa fa-power-off fa-fw"></i> Sair</button>
  </div>
  <br/>
</div>