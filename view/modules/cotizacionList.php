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
      <h1 class="mt-4">Lista Cotizaciones</h1>
      <ol class="breadcrumb mb-4">
        <!-- <li class="breadcrumb-item active">Todos los Usuarios</li> -->
      </ol>
      <div class="d-flex m-2">
        <button type="button" class="btn btn-success" id="btnAddCotizacion">
          Agregar Cotizacion
        </button>
      </div>
      <div class="card mb-4">
        <div class="card-header">
          <!--  Titulo dataTableCotizaciones -->
          <h5 class="mt-4 tituloCotizacion"></h5>
        </div>
        <div class="card-body">
          <!-- dataTableCotizaciones -->
          <table id="dataTableCotizaciones" class="display dataTableCotizaciones">
            <thead>
              <!-- dataTableCotizaciones -->
            </thead>
            <tbody>
              <!--dataTableCotizaciones-->
            </tbody>
          </table>
          <!-- fin -->
        </div>
      </div>
    </div>
  </main>
</div>
</div>
