function enableButton(idButton, textButton) {
  document.getElementById(idButton).innerHTML = textButton;
  document.getElementById(idButton).disabled = false;
}

function disableButton(idButton, textButton) {
  document.getElementById(idButton).innerHTML = textButton;
  document.getElementById(idButton).disabled = true;
}