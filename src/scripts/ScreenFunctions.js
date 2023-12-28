function hidePanel(panelId) {
  const panel = document.getElementById(panelId);
  const myMenuPanel = document.getElementById("myMenuPanel");
  if (panel) {
    panel.style.display = 'none';
    myMenuPanel.style.display = "block";
  }
}

function showPanel(panelId) {
  const panel = document.getElementById(panelId);
  const myMenuPanel = document.getElementById("myMenuPanel");
  const sideMenu = document.getElementById("sideMenu");
  if (panel) {
    myMenuPanel.style.display = "none";
    sideMenu.style.display = "none";
    panel.style.display = 'block';
  }
}

function showShortName() {
  const shortName = sessionStorage.getItem('estudanteNomeCurto');
  if(shortName) {
    document.getElementById("pShortNameLine1").innerHTML = shortName;
  }
}

//Roda os Scripts Locais
showShortName();