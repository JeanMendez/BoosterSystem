$(document).ready(function() {
    $('.light-table-filter').keyup(function() {
      var query = $(this).val().toLowerCase();
      
      $('#table_id tbody tr').each(function() {
        var nombresUsuario = $(this).find('td:nth-child(1)').text().toLowerCase();
        var apellidosUsuario = $(this).find('td:nth-child(2)').text().toLowerCase();
        var correoUsuario = $(this).find('td:nth-child(3)').text().toLowerCase();
        var tipoDocumentoUsuario = $(this).find('td:nth-child(4)').text().toLowerCase();
        var documentoUsuario = $(this).find('td:nth-child(5)').text().toLowerCase();
        var nombreRol = $(this).find('td:nth-child(7)').text().toLowerCase();
        
        if (
          nombresUsuario.includes(query) ||
          apellidosUsuario.includes(query) ||
          correoUsuario.includes(query) ||
          tipoDocumentoUsuario.includes(query) ||
          documentoUsuario.includes(query) ||
          nombreRol.includes(query)
        ) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
});s  