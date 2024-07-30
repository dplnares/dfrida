document.addEventListener("DOMContentLoaded", function () {
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/almacenMateriaPrima";
  if (currentPath == appPath) {
    if ($.fn.DataTable.isDataTable("#dataTableAlmacenMateriaPrima")) {
      $("#dataTableAlmacenMateriaPrima").DataTable().destroy();
    }

    $("#dataTableAlmacenMateriaPrima thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre</th>
          <th scope="col">Codigo</th>
          <th scope="col">Unidad Medida</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Total S/.</th>
          </tr>
      `);

    var columnDefsAlmacenMprima = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreMprimaAlma" },
      { data: "codigoMprimaAlma" },
      { data: "unidadMprimaAlma" },
      { data: "cantidadMprimaAlma" },
      {
        data: "totalProdAlmaMprima",
        render: function (data, type, row) {
          return "S/ " + data;
        },
      },
    ];

    var tableAlmacenMprima = $("#dataTableAlmacenMateriaPrima").DataTable({
      columns: columnDefsAlmacenMprima,
    });

    $(".tituloAlmacenMateriaPrima").text(
      "Stock de Productos Almacen Productos Materia Prima"
    );

    var data = new FormData();
    data.append("todosLosProductosAlmacenMprima", true);

    $.ajax({
      url: "ajax/almacenMateriaPrima.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableAlmacenMprima.clear();
        tableAlmacenMprima.rows.add(response);
        tableAlmacenMprima.draw();

        // Evento para el botón de descarga
        document
          .getElementById("btnDescargarInventarioProductosPrima")
          .addEventListener("click", function () {
            crearArchivoExcel(
              response,
              "InventarioProductosPrima",
              "Inventario_Productos_Prima"
            );
          });
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText);
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });
  }
});

// Descargar archivo Excel de la tabla de productos en almacen de materia prima
const crearArchivoExcel = (data, nombreHoja, nombreArchivo) => {
  const cabecerasPersonalizadas = [
    "ID Almacén Materia Prima",
    "ID Materia Prima",
    "Código Materia Prima",
    "Nombre Materia Prima",
    "Unidad de Medida",
    "Cantidad",
    "Precio",
    "Fecha de Actualización",
  ];

  const clavesPermitidas = [
    "idAlmaMprima",
    "idMprima",
    "codigoMprimaAlma",
    "nombreMprimaAlma",
    "unidadMprimaAlma",
    "cantidadMprimaAlma",
    "precioMprimaAlma",
    "DateUpdate",
  ];

  const dataFiltrada = data.map((objeto) => {
    const objetoFiltrado = {};
    clavesPermitidas.forEach((clave) => {
      objetoFiltrado[clave] =
        objeto[clave] !== null && objeto[clave] !== ""
          ? objeto[clave]
          : "Sin Inf.";
    });
    return objetoFiltrado;
  });

  var workbook = XLSX.utils.book_new();

  // Crear la hoja de cálculo con las cabeceras personalizadas
  const ws = XLSX.utils.json_to_sheet(dataFiltrada, {
    header: clavesPermitidas,
  });

  // Reemplazar las cabeceras por las personalizadas
  XLSX.utils.sheet_add_aoa(ws, [cabecerasPersonalizadas], { origin: "A1" });

  const date = new Date().toLocaleDateString().replaceAll("/", "-");
  XLSX.utils.book_append_sheet(workbook, ws, nombreHoja);

  var excelBuffer = XLSX.write(workbook, {
    bookType: "xlsx",
    type: "array",
  });

  var blob = new Blob([excelBuffer], {
    type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
  });

  var url = URL.createObjectURL(blob);
  var link = document.createElement("a");
  link.href = url;
  link.download = nombreArchivo + ".xlsx";
  link.click();

  URL.revokeObjectURL(url);
};
