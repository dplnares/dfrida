<?php
require_once "../controller/ingresoProd.controller.php";
require_once "../model/ingresoProd.model.php";
require_once "../functions/ingresoProd.functions.php";
//inicio de secion 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//funciones para escuchar entrada de datos desde $.ajax de jquery
//datatable de Cotizaciones
if (isset($_POST["todasLasCotizaciones"])) {
  $todasLasCotizaciones = new IngresoProdAjax();
  $todasLasCotizaciones->ajaxDTableCotizaciones();
}
  //  crear ingreso productos
if (isset($_POST["jsonCrearIngProd"], $_POST["jsonProductosIngProd"])) {
  $create = new IngresoProdAjax();
  $create->jsonCrearIngProd = $_POST["jsonCrearIngProd"];
  $create->jsonProductosIngProd = $_POST["jsonProductosIngProd"];
  $create->ajaxCrearIngresoProd($_POST["jsonCrearIngProd"], $_POST["jsonProductosIngProd"]);
}

//editar ProductosMprima
if (isset($_POST["jsonEditarProductosMprima"])) {
  $edit = new IngresoProdAjax();
  $edit->jsonEditarProductosMprima = $_POST["jsonEditarProductosMprima"];
  $edit->ajaxEditarProductosMprima($_POST["jsonEditarProductosMprima"]);
}
//borrar cotizacion
if (isset($_POST["jsonBorraCotizacion"])) {
  $delete = new IngresoProdAjax();
  $delete->jsonBorraCotizacion = $_POST["jsonBorraCotizacion"];
  $delete->ajaxBorrarCotizacion($_POST["jsonBorraCotizacion"]);
}
//Agregar Producto al ingreso
if (isset($_POST["codAddIngProdModal"])) {
  $add = new IngresoProdAjax();
  $add->codAddIngProdModal = $_POST["codAddIngProdModal"];
  $add->ajaxAgregarIngProducto($_POST["codAddIngProdModal"]);
}

//  Descargar PDF de la cotizacion
if (isset($_POST["jsonPdfCotizacion"])) {
  $pdf = new IngresoProdAjax();
  $pdf->jsonPdfCotizacion = $_POST["jsonPdfCotizacion"];
  $pdf->ajaxDescargarPdfCotizacion($_POST["jsonPdfCotizacion"]);
}
/////////////////////////////

class IngresoProdAjax
{
  //datatable de cotizaciones
  public function ajaxDTableCotizaciones()
  {
    $todasLasCotizaciones = ingresoProdController::ctrDTableCotizaciones();
    foreach ($todasLasCotizaciones as &$cotizacion) {
      $cotizacion['buttons'] = FunctionIngresoProd::getBtnCotizacion($cotizacion["idCoti"]);
      $cotizacion['estadoCoti'] = FunctionIngresoProd::getEstadoCoti($cotizacion["estadoCoti"]);
    }
    //mostar todos los ProductosMprima DataTable
    echo json_encode($todasLasCotizaciones);
  }

  //  crear ingreso productos
  public function ajaxCrearIngresoProd($jsonCrearIngProd, $jsonProductosIngProd, )
  {
    $crearIngresoProd = json_decode($jsonCrearIngProd, true);

    $response = ingresoProdController::ctrCrearIngresoProd($crearIngresoProd, $jsonProductosIngProd);
    echo json_encode($response);
  }

  //  editar ProductosMprima
  public function ajaxEditarProductosMprima($jsonEditarProductosMprima)
  {
    $editarProductosMprima = json_decode($jsonEditarProductosMprima, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = ingresoProdController::ctrEditProductMprima($editarProductosMprima);
    echo json_encode($response);
  }
  //borrar ProductosMprima
  public function ajaxBorrarCotizacion($jsonBorraCotizacion)
  {
    $borrarCotizacion = json_decode($jsonBorraCotizacion, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = ingresoProdController::ctrDeleteCotizacion($borrarCotizacion);
    echo json_encode($response);
  }

  //Agregar Producto a la cotizacion
  public function ajaxAgregarIngProducto($codAddIngProdModal)
  {
    $codIngProducto = json_decode($codAddIngProdModal, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = ingresoProdController::ctrAgregarIngProducto($codIngProducto);
    echo json_encode($response);
  }

  //  Descargar PDF de la cotizacion
  public function ajaxDescargarPdfCotizacion($jsonPdfCotizacion)
  {
    $codCotiPdf = json_decode($jsonPdfCotizacion, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = ingresoProdController::ctrDescargarPdfCotizacion($codCotiPdf);
    echo json_encode($response);
  }
}

