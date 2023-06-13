$(document).ready(function() {
    $('.light-table-filter').keyup(function() {
      var query = $(this).val().toLowerCase();
      
      $('#table_id tbody tr').each(function() {
        var nombre = $(this).find('td:nth-child(1)').text().toLowerCase();
        var apellidos = $(this).find('td:nth-child(2)').text().toLowerCase();
        var correo = $(this).find('td:nth-child(3)').text().toLowerCase();
        var tipoDocumento = $(this).find('td:nth-child(4)').text().toLowerCase();
        var numeroDocumento = $(this).find('td:nth-child(5)').text().toLowerCase();
        var rol = $(this).find('td:nth-child(7)').text().toLowerCase();
        
        if (
          nombre.includes(query) ||
          apellidos.includes(query) ||
          correo.includes(query) ||
          tipoDocumento.includes(query) ||
          numeroDocumento.includes(query) ||
          rol.includes(query)
        ) {
          $(this).show();
        } else {
          $(this).hide();
        }
      });
    });
});s  