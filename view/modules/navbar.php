<!-- <nav class="sb-topnav navbar navbar-expand navbar-light bg-light"> -->
  <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
  <!-- Navbar Brand-->
  <a class="navbar-brand p-3 logonav" href="index.php"><img src="assets/img/dfridaSnFondo.png" class="imageNavBar"></a>
  <!-- Sidebar Toggle-->
  <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
      class="fas fa-bars  "></i></button>
  <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

  </form>
  <!-- Navbar-->
  <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
        aria-expanded="false"><?php if ($_SESSION["idTipoUsu"] == 1): ?>
          <i class="fa-solid fa-user-shield fa-2x"></i> <!-- Icono para el administrador -->
        <?php elseif ($_SESSION["idTipoUsu"] == 2): ?>
          <i class="fa-solid fa-user-tie fa-2x"></i> <!-- Icono para el responsable -->
        <?php else: ?>
          <i class="fa-solid fa-user-tag fa-2x"></i> <!-- Icono para cualquier otro tipo de usuario -->
        <?php endif; ?></a>
      <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
        <!-- <li><a class="dropdown-item" href="perfil">Perfil</a></li>
        <li>
          <hr class="dropdown-divider" />
        </li> -->
        <li><a class="dropdown-item" href="signout">Cerrar Sesion</a></li>
      </ul>
    </li>
  </ul>
</nav>