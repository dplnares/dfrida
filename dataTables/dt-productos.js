// funciond ata table para modales de categorias de productos crear y eliminar registros sina ctualizar la pagina
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/products";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductos thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Categoria</th>
          <th scope="col">Codigo</th>
          <th scope="col">Unidad</th>
          <th scope="col">Precio</th>
          <th scope="col">Observacion</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProd" },
      { data: "nombreCategoriaProd" },
      { data: "codigoProd" },
      { data: "unidadProd" },
      {
        data: "precioProd",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
      { data: "detalleProd" },
      { data: "buttons" },
    ];

    var tableProductos = $("#dataTableProductos").DataTable({
      columns: columnDefsProductos,
    });

    // Titulo dataTableProductos
    $(".tituloProductos").text("Todos los Productos");

    // Solicitud inicial de dataTableProductos
    var data = new FormData();
    data.append("todosLosProductos", true);

    $.ajax({
      url: "ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableProductos.clear();
        tableProductos.rows.add(response);
        tableProductos.draw();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });
  }
});

// Función para cargar los datos de productos
function cargarDatosProductos(tableProductos) {
  var data = new FormData();
  data.append("todosLosProductos", true);

  $.ajax({
    url: "ajax/products.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      tableProductos.clear();
      tableProductos.rows.add(response);
      tableProductos.draw();
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
    },
  });
}

// Data table modal cotizaciones
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/cotizacion";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductos thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Codigo</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProd" },
      { data: "codigoProd" },
      {
        data: "precioProd",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
      {
        data: "idProd",
        render: function (data, type, row) {
          return (
            '<button class="btn btn-success btnAddProdModalCoti" codAddProdModalCoti="' +
            data +
            '"><i class="fa-solid fa-clipboard-check"></i></button>'
          );
        },
      },
    ];

    var tableProductos = $("#dataTableProductos").DataTable({
      columns: columnDefsProductos,
    });

    // Cargar datos inicialmente
    cargarDatosProductos(tableProductos);

    // Agregar evento de escucha para el evento 'shown.bs.modal' del modal
    $("#modalAddProdCoti").on("shown.bs.modal", function () {
      cargarDatosProductos(tableProductos);
    });
  }
});
//fin

// //data table modal ingresos
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/ingresoProd";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductos thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Codigo</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProd" },
      { data: "codigoProd" },
      {
        data: "precioProd",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
      {
        data: "idProd",
        render: function (data, type, row) {
          return (
            '<button class="btn btn-success btnAddProdModalIng" codAddIngProdModal="' +
            data +
            '"><i class="fa-solid fa-clipboard-check"></i></button>'
          );
        },
      },
    ];

    var tableProductos = $("#dataTableProductos").DataTable({
      columns: columnDefsProductos,
    });

    // Titulo dataTableProductos
    //$(".tituloProductos").text("Todos los Productos");

    // Solicitud inicial de dataTableProductos
    var data = new FormData();
    data.append("todosLosProductos", true);

    $.ajax({
      url: "ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableProductos.clear();
        tableProductos.rows.add(response);
        tableProductos.draw();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });
  }
});
//fin

// //data table modal editar ingresos
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/ingresoProdEdit";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductos thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Codigo</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProd" },
      { data: "codigoProd" },
      {
        data: "precioProd",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
      {
        data: "idProd",
        render: function (data, type, row) {
          return (
            '<button class="btn btn-success btnAddProdModalIng" codAddIngProdModal="' +
            data +
            '"><i class="fa-solid fa-clipboard-check"></i></button>'
          );
        },
      },
    ];

    var tableProductos = $("#dataTableProductos").DataTable({
      columns: columnDefsProductos,
    });

    // Titulo dataTableProductos
    //$(".tituloProductos").text("Todos los Productos");

    // Solicitud inicial de dataTableProductos
    var data = new FormData();
    data.append("todosLosProductos", true);

    $.ajax({
      url: "ajax/products.ajax.php",
      method: "POST",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (response) {
        tableProductos.clear();
        tableProductos.rows.add(response);
        tableProductos.draw();
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
      },
    });
  }
});
//fin
// //data table modal productos cotización para vista pedidos
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/pedidosList";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductosCotizacionPedidos thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Unidad</th>
          <th scope="col">Cantidad</th>
          <th scope="col">Precio</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProdCoti" },
      { data: "unidadProdCoti" },
      { data: "cantidadProdCoti" },
      {
        data: "precioProdCoti",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
    ];

    var tableProductos = $("#dataTableProductosCotizacionPedidos").DataTable({
      columns: columnDefsProductos,
    });
    // Agregar evento de escucha para los botones btnVerProductosPedido
    $(document).on("click", ".btnVerProductosPedido", function () {
      var codPed = $(this).attr("codPed");
      var idCoti = $(this).attr("idCoti");
      // Aquí puedes realizar las acciones necesarias con los valores obtenidos

      // Solicitud inicial de dataTableProductosCotizacionPedidos
      var data = new FormData();
      data.append("codPedDatosPedidos", codPed);
      data.append("idCotiDatosPedidos", idCoti);

      $.ajax({
        url: "ajax/products.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          tableProductos.clear();
          tableProductos.rows.add(response);
          tableProductos.draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
        },
      });
    });
  }
});
//fin

// modal de agregar productos editar cotizacion
document.addEventListener("DOMContentLoaded", function () {
  // Verificar si la ruta es la correcta al mostrar el modal
  var currentPath = window.location.pathname;
  var appPath = "/dfrida/cotizacionListEdit";
  if (currentPath == appPath) {
    // Estructura de dataTableProductos
    $("#dataTableProductosEditarCotizacion thead").html(`
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nombre Producto</th>
          <th scope="col">Codigo</th>
          <th scope="col">Precio</th>
          <th scope="col">Acciones</th>
        </tr>
      `);

    // Definición inicial de dataTableProductos
    var columnDefsProductos = [
      {
        data: null,
        render: function (data, type, row, meta) {
          return meta.row + 1;
        },
      },
      { data: "nombreProd" },
      { data: "codigoProd" },
      {
        data: "precioProd",
        render: function (data, type, row) {
          return "S/ " + data; // Coloca 'S/' delante del valor de la celda
        },
      },
      {
        data: "idProd",
        render: function (data, type, row) {
          return (
            '<button class="btn btn-success btnAddProdModalIngEditarCotizacion" codAddIngProdModal="' +
            data +
            '"><i class="fa-solid fa-clipboard-check"></i></button>'
          );
        },
      },
    ];

    var tableProductos = $("#dataTableProductosEditarCotizacion").DataTable({
      columns: columnDefsProductos,
    });

    // Función para cargar los productos
    function cargarDatosProductos(table) {
      var data = new FormData();
      data.append("todosLosProductos", true);

      $.ajax({
        url: "ajax/products.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        dataType: "json",
        success: function (response) {
          table.clear();
          table.rows.add(response);
          table.draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
          console.log("Error en la solicitud AJAX: ", textStatus, errorThrown);
        },
      });
    }

    // Cargar datos inicialmente
    cargarDatosProductos(tableProductos);

    // Agregar evento de escucha para el evento 'shown.bs.modal' y 'hidden.bs.modal' del modal
    $("#modalAddProductoNuevoEditarCotizacion").on("shown.bs.modal hidden.bs.modal", function () {
      cargarDatosProductos(tableProductos);
    });
  }
});
//fin