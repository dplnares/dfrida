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
        Ingreso Productos D'Frida
      </h1>
    </div>

    <form role="form" method="post" class="row g-3 m-2 formIngresoProd " id="formIngresoProd">

      <div class="container row g-8" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">

        <h3>Datos para el Ingreso</h3>

        <!-- datos de la cotizacion Enpresa -->
        <div class="form-group col-md-8">
          <label for="tituloIngProdAdd" class="form-label" style="font-weight: bold">Descripcion Ingreso:</label>
          <input type="text" class="form-control" id="tituloIngProdAdd" name="tituloIngProdAdd"
            placeholder="Ingrese una una descripcion para el ingreso ">
        </div>

        <div class="col-md-2">
          <label for="btnProduccionProdAdd" class="form-label" style="font-weight: bold">Asignar Produccion: </label>
          <div id="produccionProdAdd">
            <button type="button" class="btn btn-primary w-100" id="btnProduccionProdAdd">Agregar Produccion</button>
          </div>
        </div>

        <div class="col-md-2">
          <label for="fechaIngProdAdd" class="form-label" style="font-weight: bold">Fecha Ingreso: </label>
          <input type="date" class="form-control" id="fechaIngProdAdd" name="fechaIngProdAdd">
        </div><br>

        <!-- fin -->
      </div>

      <!-- Productos -->
      <div class="container row g-3" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">
        <h3>Productos a Almacen</h3>
        <div class="d-inline-flex m-2">
          <button type="button" class="btn btn-warning" data-bs-toggle="modal"
            data-bs-target="#modalAddProdCoti">Agregar Productos</button>
        </div>

        <div class="row" style="font-weight: bold">
          <div class="col-lg-2">Nombre</div>
          <div class="col-lg-2">Codigo</div>
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
            <label for="totalIngProdAddList" class="form-label" style="font-weight: bold">Total Producto : </label>
            <input type="text" class="form-control" id="totalIngProdAddList" name="totalIngProdAddList" value=""
              placeholder="Total Productos" readonly required>
          </div>
        </div>
        <!-- fin -->
      </div>
      <!-- fin -->

      <!-- Calculo totales-->
      <div class="container row g-3" style="border: 3px solid #808080; padding: 3px; margin-left: 2px; ">
        <h3>Valores Totales del Ingreso</h3>

        <div class="row" style="font-weight: bold">
          <div class="col-lg-4"></div>
          <div class="col-lg-2"> </div>
          <div class="col-lg-2">IGV</div>
          <div class="col-lg-2">Sub Total</div>
          <div class="col-lg-2">Total S/</div>
        </div>
        <div class="form-group row totalIngreso">
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <!-- vacio -->
          </div>
          <div class="form-group col-md-2">
            <button type="button" class="btn btn-info btnCalcularTotalIng" id="btnCalcularTotalIng">Calular Total
              Ingreso
            </button>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="igvIngProdAdd" name="igvIngProdAdd" value="" placeholder="IGV"
              readonly required>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="subTotalIngProdAdd" name="subTotalIngProdAdd" value=""
              placeholder="Sub Total Ingreso" readonly required>
          </div>
          <div class="form-group col-md-2">
            <input type="text" class="form-control" id="totalIngProdAdd" name="totalIngProdAdd" value=""
              placeholder="Total Ingreso" readonly required>
          </div>
        </div>
      </div>
      
      <!-- campo que guarde el id del registro-->
      <input type="hidden" class="form-control" id="codProduccion" name="codProduccion">

      <!-- fin -->
      <div class="container row g-3 p-3 ">
        <button type="button" class="col-2 d-inline-flex-center p-2 btn btn-danger" style="margin-right: 10px;"
          id="btnCerrarIngresoProd">Cerrar</button>
        <button type="button" class="col-2 d-inline-flex-center p-2 btn btn-success "
          id="btnRegistrarIngresoProd">Registrar Ingreso a Almacen </button>
      </div>
    </form>
  </main>
</div>
</div>

<!-- Modal produtos -->
<div class="modal fade" id="modalAddProdCoti" tabindex="-1" aria-labelledby="modalAddProdCoti" aria-hidden="true">
  <div class="modal-dialog modal-lg"> <!-- Clase "modal-lg" agregada aquí -->
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="modalAddProdCoti">Lista Productos </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
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