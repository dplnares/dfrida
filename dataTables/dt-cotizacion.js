// funciond ata table para modales de categorias de productos crear y eliminar registros sina ctualizar la pagina
document.addEventListener("DOMContentLoaded", function () {
  //verrificar si la ruta es la correcta
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/cotizacionList";
  if (currentPath == appPath) {
    //si es correcta la ruta inicializa el datatable

    // Verifica si el DataTable ya está inicializado y destrúyelo si es así
    if ($.fn.DataTable.isDataTable("#dataTableCotizaciones")) {
      $("#dataTableCotizaciones").DataTable().destroy();
    }

    // Estructura de dataTableCotizaciones
    $("#dataTableCotizaciones thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ttulo Cotizacion</th>
          <th scope="col">Nombre Comercial</th>
          <th scope="col">Fecha</th>
          <th scope="col">Nombre Solicitante</th>
          <th scope="col">Numero Cel</th>
          <th scope="col">Total</th>
          <th scope="col">Estado</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableCotizaciones
    var columnDefsCotizacion = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1; // Para el número de fila
        },
      },
      { data: "tituloCoti" },
      { data: "nombreComercialCoti" },
      { data: "fechaCoti" },
      { data: "nombreCoti" },
      { data: "celularCoti" },
      {
        data: "totalCoti",
        render: function (data, type, row) {
          return "S/ " + data;
        },
      },
      { data: "estadoCoti" },
      { data: "buttons" },
    ];

    var tableCotizacion = $("#dataTableCotizaciones").DataTable({
      columns: columnDefsCotizacion,
    });

    // Titulo dataTableCotizaciones
    $(".tituloCotizacion").text("Todas las Cotizaciones");

    // Solicitud inicial de dataTableCotizaciones
    var data = new FormData();
    data.append("todasLasCotizaciones", true);

    $.ajax({
      url: "ajax/cotizacion.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableCotizacion.clear();
        tableCotizacion.rows.add(response);
        tableCotizacion.draw();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText); // Procedencia de error
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });
  }
});

// funcionalidad para data table para modal  de categorias de productos crear y eliminar registros sin actualizar la pagina
document.addEventListener("DOMContentLoaded", function () {
  //verificar si la ruta es la correcta
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/pedidosList";
  if (currentPath == appPath) {
    //si es correcta la ruta inicializa el datatable
    // Verifica si el DataTable ya está inicializado y destrúyelo si es así
    if ($.fn.DataTable.isDataTable("#dataTableSeleccionarCotizacionPedidos")) {
      $("#dataTableSeleccionarCotizacionPedidos").DataTable().destroy();
    }

    // Estructura de dataTableCotizaciones
    $("#dataTableSeleccionarCotizacionPedidos thead").html(`
        <tr>
        <th scope="col">#</th>
        <th scope="col">Titulo Cotizacion</th>
        <th scope="col">Nombre Comercial</th>
        <th scope="col">Fecha</th>
        <th scope="col">Nombre Solicitante</th>
        <th scope="col">Total</th>
        <th scope="col">Acciones</th>
        </tr>
        `);

    // Definición inicial de dataTableCotizaciones
    var columnDefsCotizacion = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return (
            '<input type="radio" name="selectRow" class="selectRow" value="' +
            row.idCoti +
            '">'
          );
        },
        orderable: false,
      },
      { data: "tituloCoti" },
      { data: "nombreComercialCoti" },
      { data: "fechaCoti" },
      { data: "nombreCoti" },
      {
        data: "totalCoti",
        render: function (data, type, row) {
          return "S/ " + data;
        },
      },
      { data: "buttons" },
    ];

    var tableCotizacion = $("#dataTableSeleccionarCotizacionPedidos").DataTable(
      {
        columns: columnDefsCotizacion,
      }
    );

    // Titulo dataTableCotizaciones
    $("#titleModalSeleccionarCotizacionPedidosLabel").text(
      "Seleccione una Cotización"
    );

    // Solicitud inicial de dataTableCotizaciones
    var data = new FormData();
    data.append("todasLasCotizacionesPedidosVista", true);

    $.ajax({
      url: "ajax/cotizacion.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableCotizacion.clear();
        tableCotizacion.rows.add(response);
        tableCotizacion.draw();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText); // Procedencia de error
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });

    // Evento para seleccionar solo una fila a la vez
    $("#dataTableSeleccionarCotizacionPedidos tbody").on(
      "change",
      'input[type="radio"]',
      function () {
        $('input[type="radio"]').not(this).prop("checked", false);
        var selectedIdCoti = $(this).val();
        console.log("ID de Cotización seleccionada: ", selectedIdCoti);
      }
    );
    
  }
});
// Fin
