</div>
</div>

<div class="sb-sidenav-footer">
  <div class="small">Sesión iniciada como:</div>
  <?php echo $_SESSION["nombre"] ?>
</div>
</nav>
</div>

<div id="layoutSidenav_content">
  <main class="bg">
    <div class="container-fluid px-4">
      <h1 class="mt-4">
        Cotizacion D'Frida
      </h1>
    </div>

    <form role="form" method="post" class="row g-3 m-2 formNuevaCotizacio " id="formNuevaCotizacio">

      <div class="container row g-8" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">

        <h3>Datos de la Empresa</h3>

        <!-- datos de la cotizacion Enpresa -->
        <div class="form-group col-md-10">
          <label for="tituloCotiAdd" class="form-label" style="font-weight: bold">Titulo Cotizacion:</label>
          <input type="text" class="form-control" id="tituloCotiAdd" name="tituloCotiAdd"
            placeholder="Ingrese un titulo de Cotizacion">
        </div>
        <div class="col-md-2">
          <label for="fechaCotiAdd" class="form-label" style="font-weight: bold">Fecha Cotizacion: </label>
          <input type="date" class="form-control" id="fechaCotiAdd" name="fechaCotiAdd">
        </div><br>

        <div class="form-group col-md-4">
          <label for="razonSocialCotiAdd" class="form-label" style="font-weight: bold">Razon Social :</label>
          <input type="text" class="form-control" id="razonSocialCotiAdd" name="razonSocialCotiAdd"
            placeholder="Ingrese la razon social de la empresa">
        </div>

        <div class="form-group col-md-4">
          <label for="nombreComercialCotiAdd" class="form-label" style="font-weight: bold">Nombre Comercial :</label>
          <input type="text" class="form-control" id="nombreComercialCotiAdd" name="nombreComercialCotiAdd"
            placeholder="Nombre comercial de la empresa">
        </div>

        <div class="form-group col-md-4">
          <label for="rucCotiAdd" class="form-label" style="font-weight: bold">Ruc :</label>
          <input type="number" class="form-control" id="rucCotiAdd" name="rucCotiAdd"
            placeholder="Ingrese el Ruc de la empresa">
        </div>
        <div class="form-group col-md-8" style="margin-bottom: 10px;">
          <label for="detalleCotiAdd" class="form-label" style="font-weight: bold">Observaciones: </label>
          <input type="text" class="form-control" id="detalleCotiAdd" name="detalleCotiAdd"
            placeholder="Ingrese observacion para la cotizacion Opcional">
        </div>
        <!-- fin -->
      </div>

      <div class="container row g-3" style="border: 3px solid #808080; padding: 3px; margin-left: 2px;">
        <div class="d-flex align-items-center justify-content-between">
          <h3>Cliente Nuevo</h3>
          <div class="form-check form-switch ms-auto" style="transform: scale(1.5);">
            <input class="form-check-input" type="checkbox" id="clienteNuevoSwitch" name="clienteNuevoSwitch">
            <label class="form-check-label" for="clienteNuevoSwitch"></label>
          </div>
        </div>
        <div id="clienteNuevoSection">
          <div class="row">
            <!-- Select2 para pedidos -->
            <div class="form-group col-md-12">
              <h4>Seleccionar Cliente</h4>
              <select class="form-select" id="idClienteAddCotizacion" name="idClienteAddCotizacion" data-selected="">
                <!-- Las opciones se agregarán dinámicamente -->
              </select>
            </div>
          </div>
        </div>

        <div id="datosSolicitanteSection" style="display: none;">
          <h3>Datos de Solicitante</h3>
          <div class="row">
            <div class="form-group col-md-10">
              <label for="nombreCotiAdd" class="form-label" style="font-weight: bold">Nombres Solicitante:</label>
              <input type="text" class="form-control" id="nombreCotiAdd" name="nombreCotiAdd" value=""
                placeholder="Nombre del solicitante">
            </div>
            <div class="form-group col-md-2">
              <label for="celularCotiAdd" class="form-label" style="font-weight: bold">Numero Celular:</label>
              <input type="number" class="form-control" id="celularCotiAdd" name="celularCotiAdd" value=""
                placeholder="Ingrese Celular">
            </div>
            <div class="form-group col-md-6">
              <label for="correoCotiAdd" class="form-label" style="font-weight: bold">Correo:</label>
              <input type="text" class="form-control" id="correoCotiAdd" name="correoCotiAdd" value=""
                placeholder="Ingrese Correo">
            </div>
            <div class="form-group col-md-6">
              <label for="direccionCotiAdd" class="form-label" style="font-weight: bold">Direccion: </label>
              <input type="text" class="form-control" id="direccionCotiAdd" name="direccionCotiAdd"
                placeholder="Ingrese Direccion">
            </div>
          </div>
        </div>
      </div>

      <!-- Productos -->
      <div class="container row g-3" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">
        <h3>Productos</h3>
        <div class="d-inline-flex m-2">
          <button type="button" class="btn btn-warning" data-bs-toggle="modal"
            data-bs-target="#modalAddProdCoti">Agregar
            Productos</button>
        </div>

        <div class="row" style="font-weight: bold">
          <div class="col-lg-4">Nombre</div>
          <div class="col-lg-2">Unidad</div>
          <div class="col-lg-2">Cantidad</div>
          <div class="col-lg-2">Precio Producto</div>
        </div>
        <!-- aqui se agregan los productos del modal de prodcutos  -->
        <div class="form-group row AddProductoCotizacion">

          <!-- aqui se agregan los productos selecionado del modal de prodcutos  -->
        </div>

        <!-- total producto  -->
        <div class="form-group row ">
          <div class="form-group col-md-4">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>

          <div class="form-group col-md-2">
            <label for="totalProdCotiAdd" class="form-label" style="font-weight: bold">Total Producto : </label>
            <input type="text" class="form-control" id="totalProdCotiAdd" name="totalProdCotiAdd" value=""
              placeholder="Total Producto" readonly required>
          </div>
        </div>
        <!-- fin -->
      </div>
      <!-- fin -->

      <!-- Calculo totales-->
      <div class="container row g-3" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">
        <h3>Valores Totales Cotizacion</h3>

        <div class="row" style="font-weight: bold">
          <div class="col-lg-4"></div>
          <div class="col-lg-2"> </div>
          <div class="col-lg-2">IGV</div>
          <div class="col-lg-2">Sub Total</div>
          <div class="col-lg-2">Total S/</div>
        </div>
        <div class="form-group row totalCotizacion">
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <button type="button" class="btn btn-info btnCalcularTotal" id="btnCalcularTotal">Calular Total Cotizacion
            </button>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="igvCotizacionAdd" name="igvCotizacionAdd" value=""
              placeholder="IGV" readonly required>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="subTotalCotizacionAdd" name="subTotalCotizacionAdd" value=""
              placeholder="Sub Total Cotizacion" readonly required>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="totalCotizacionAdd" name="totalCotizacionAdd" value=""
              placeholder="Total Cotizacion" readonly required>
          </div>
        </div>
      </div>
      <!-- fin -->
      <div class="container row g-3 p-3 ">
        <button type="button" class="col-2 d-inline-flex-center p-2 btn btn-danger" style="margin-right: 10px;"
          id="btnCerrarCotizacion">Cerrar</button>
        <button type="button" class="col-2 d-inline-flex-center p-2 btn btn-success "
          id="btnRegistrarCotizacion">Registrar
          Cotizacion</button>
      </div>
    </form>
  </main>
</div>
</div>

<!-- Modal productos -->
<div class="modal fade" id="modalAddProdCoti" tabindex="-1" aria-labelledby="modalAddProdCoti" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Clase "modal-lg" agregada aquí -->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAddProdCoti">Lista Productos </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Botones agregados aquí -->
        <button type="button" class="btn btn-success me-4" id="btnAgregarProductAddCotizacion">
          Agregar Producto
        </button>
        <button type="button" class="btn btn-info" id="btnAgregarCategoriaProductAddCotizacion">
          Crear Categoria Producto
        </button>
        <div class="mb-4"></div>
        <!-- Fin de los botones agregados -->
        <table id="dataTableProductos" class="display dataTableProductos">
          <thead>
            <!-- dataTableProductos -->
          </thead>
          <tbody>
            <!--dataTableProductos-->
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Add Product -->
<div class="modal fade" id="modalAddProductoNuevoCotizacion" tabindex="-1" role="dialog"
  aria-labelledby="modalAddProductoNuevoCotizacion" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Nuevo Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <!-- Cuerpo modal -->
      <div class="modal-body">
        <form role="form" id="formCrearProducto">

          <!-- Nombre Producto -->
          <div class="form-group">
            <label for="productName" class="col-form-label">Nombre del Producto:</label>
            <input type="text" class="form-control" id="productName" name="productName" required>
          </div>

          <!-- Categoría -->
          <div class="form-group">
            <label for="productCategory" class="col-form-label">Categoría:</label>
            <select class="form-control" name="productCategory" id="productCategory">
              <!-- Las opciones se cargarán dinámicamente desde JavaScript -->
            </select>
          </div>

          <!-- Codigo Producto -->
          <div class="form-group">
            <label for="productCodigo" class="col-form-label">Codigo Producto:</label>
            <input type="text" class="form-control" id="productCodigo" name="productCodigo" required>
          </div>

          <!-- Unidad -->
          <div class="form-group">
            <label for="productUnit" class="col-form-label">Unidad:</label>
            <input type="text" class="form-control" id="productUnit" name="productUnit" value=""
              placeholder="1/Uni/Docena/etc" required>
          </div>

          <!-- Precio -->
          <div class="form-group">
            <label for="productPrice" class="col-form-label">Precio:</label>
            <input type="number" step="0.01" class="form-control" id="productPrice" name="productPrice" required>
          </div>

          <!-- Detalle Producto -->
          <div class="form-group">
            <label for="productDetail" class="col-form-label">Observacion del Producto:</label>
            <input type="text" class="form-control" id="productDetail" name="productDetail">
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal"
              id="btnCerrarCreacionProductoNuevo">Cerrar</button>
            <button type="button" class="btn btn-primary" id="btnCrearProducto">Crear Producto</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal Crear Categoria produtos -->
<div class="modal fade" id="modalCrearCategoriaProdCotizacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="modalCrearCategoriaProdCotizacion" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalCrearCategoriaProdCotizacion">Crear Nueva Categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form role="form" id="formCrearCategoriaProd">
          <div class="form-group">
            <label for="categoriaNameProd" class="col-form-label">Nombre Categoria</label>
            <input type="text" class="form-control" id="categoriaNameProd" name="categoriaNameProd" required>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="btnCerrarCrearCategoriaCotizacion"
          data-bs-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="btnCrearCategoriaProd">Crear Categoria</button>
      </div>
    </div>
  </div>
</div>