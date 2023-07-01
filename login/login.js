const form = document.querySelector('form');
const tipoDocumento = document.getElementById('tipo_documento');
const numDocInput = document.querySelector('input[name="numero_documento"]');
const contrasenaInput = document.querySelector('input[name="contrasena"]');

form.addEventListener('submit', function(event) {
  event.preventDefault();
  const numDocValue = numDocInput.value.trim();
  const contrasenaValue = contrasenaInput.value.trim();

  if (tipoDocumento.value === "Seleccione tipo de documento") {
    alert("Por favor, seleccione un tipo de documento");
    tipoDocumento.focus();
    return;
  }

  alertSuccess('Inicio de sesión exitoso.');
  setTimeout(function() {
    location.href = '../Layout/inicio.html';
  }, 2000);
});

function alertSuccess(message) {
  const alertBox = document.createElement('div');
  alertBox.classList.add('alert-box', 'success');
  alertBox.textContent = message;
  document.body.appendChild(alertBox);
  setTimeout(function() {
    alertBox.remove();
  }, 2000);
}