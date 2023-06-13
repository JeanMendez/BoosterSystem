function mostrarAlerta() {
    alert("Usuario editado correctamente");
    window.location.href = '../Gestion_academica/consultar_user.html';
  }

  function mostrarAlerta1() {
    alert("Nota registrada exitosamente");
    window.location.href = '../Gestion_academica/consultar_notas.html';
  }

  function mostrarAlerta4() {
    alert("Usuario registrado exitosamente");
    window.location.href = '../gestionAcademica/registrarUser.php';
  }

  function mostrarAlertaDuplicado() {
    alert("Este numero de documento ya existe.");
    window.location.href = '../gestionAcademica/registrarUser.php';
  }

  function mostrarConfirmacion() {
    if (confirm("¿Está seguro de que deseas eliminar este usuario?")) {
      // Acción a realizar si el usuario hace clic en "Aceptar"
      window.location.href = '../Gestion_academica/consultar_user.html';
    }
  }
  
  function mostrarConfirmacion1() {
    if (confirm("¿Deseas regresar a la pagina anterior?")) {
      // Acción a realizar si el usuario hace clic en "Aceptar"
      window.location.href = '../Gestion_academica/consultar_user.html';
    }
  }

  function mostrarConfirmacion2() {
    if (confirm("¿Deseas regresar a la pagina anterior?")) {
      // Acción a realizar si el usuario hace clic en "Aceptar"
      window.location.href = '../Gestion_academica/consultar_notas.html';
    }
  }

  function mostrarConfirmacion3() {
    if (confirm("¿Está seguro de que deseas eliminar este archivo?")) {
      // Acción a realizar si el usuario hace clic en "Aceptar"
      window.location.href = '../Gestion_academica/cargar_carnet.html';
    }
  }
  