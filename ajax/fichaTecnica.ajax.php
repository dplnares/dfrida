<?php
require_once "../controller/fichaTecnica.controller.php";
require_once "../model/fichaTecnica.model.php";
require_once "../functions/fichaTecnica.functions.php";
//inicio de secion 
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
//funciones para escuchar entrada de datos desde $.ajax de jquery
//datatable de FichaTecnica
if (isset($_POST["todasLasFichasTecnicas"])) {
  $todasLasFichasTecnicas = new FichaTecnicaAjax();
  $todasLasFichasTecnicas->ajaxDTableFichaTecnica();
}
//  crear Cotizacion
if (isset($_POST["jsonCrearfichaTecnica"], $_POST["jsonFichaTecnicaBase64"])) {
  $create = new FichaTecnicaAjax();
  $create->jsonCrearfichaTecnica = $_POST["jsonCrearfichaTecnica"];
  $create->jsonFichaTecnicaBase64 = $_POST["jsonFichaTecnicaBase64"];
  $create->ajaxCrearFichaTecnia($_POST["jsonCrearfichaTecnica"], $_POST["jsonFichaTecnicaBase64"]);
}

//  visualizar datos ficha tecnica
if (isset($_POST["codFichaTec"])) {
  $view = new FichaTecnicaAjax();
  $view->codFichaTec = $_POST["codFichaTec"];
  $view->ajaxViewEditFichaTecnica($_POST["codFichaTec"]);
}

//editar ficha tecnica
if (isset($_POST["jsonEditarFichaTecnica"], $_POST["jsonFichaTecnicaBase64"])) {
  $edit = new FichaTecnicaAjax();
  $edit->jsonEditarFichaTecnica = $_POST["jsonEditarFichaTecnica"];
  $edit->jsonFichaTecnicaBase64 = $_POST["jsonFichaTecnicaBase64"];
  $edit->ajaxEditarFichaTecnica($_POST["jsonEditarFichaTecnica"], $_POST["jsonFichaTecnicaBase64"]);
}
//borrar FichaTecnica
if (isset($_POST["jsonBorraFichaTecnica"])) {
  $delete = new FichaTecnicaAjax();
  $delete->jsonBorraFichaTecnica = $_POST["jsonBorraFichaTecnica"];
  $delete->ajaxBorrarFichaTecnica($_POST["jsonBorraFichaTecnica"]);
}
//  Descargar ficha tecnica
if (isset($_POST["jsonDescargarFichaTecnica"])) {
  $pdf = new FichaTecnicaAjax();
  $pdf->jsonDescargarFichaTecnica = $_POST["jsonDescargarFichaTecnica"];
  $pdf->ajaxDescargarFichaTecnica($_POST["jsonDescargarFichaTecnica"]);
}
/////////////////////////////

class FichaTecnicaAjax
{
  //datatable de FichaTecnica
  public function ajaxDTableFichaTecnica()
  {
    $todasLasFichasTecnicas = FichaTecnicaController::ctrDTableFichaTecnica();
    foreach ($todasLasFichasTecnicas as &$fichaTec) {
      $fichaTec['buttons'] = FunctionFichaTecnica::getBtnFichaTec($fichaTec["idFichaTec"]);
      $fichaTec['descargaFicha'] = FunctionFichaTecnica::getBtnDescargarFichaTec($fichaTec["idFichaTec"]);
      $fichaTec['estadoFichaTec'] = FunctionFichaTecnica::getEstadoFichaTec($fichaTec["estadoFichaTec"]);
    }
    //mostar todos los ProductosMprima DataTable
    echo json_encode($todasLasFichasTecnicas);
  }

  //  crear ficha tecnica
  public function ajaxCrearFichaTecnia($jsonCrearfichaTecnica, $jsonFichaTecnicaBase64)
  {
    $crearFichaTecnica = json_decode($jsonCrearfichaTecnica, true);

    $response = FichaTecnicaController::ctrCrearFichaTecnica($crearFichaTecnica, $jsonFichaTecnicaBase64);
    echo json_encode($response);
  }

  //  visualizar datos ficha tecnica
  public function ajaxViewEditFichaTecnica($codFichaTec)
  {
    $codFichaTec = json_decode($codFichaTec, true);
    $response = FichaTecnicaController::ctrViewDatosFichaTecnica($codFichaTec);
    echo json_encode($response);
  }

  //  editar ProductosMprima
  public function ajaxEditarFichaTecnica($jsonEditarFichaTecnica, $jsonFichaTecnicaBase64)
  {
    $editarFichaTecnica = json_decode($jsonEditarFichaTecnica, true);

    $response = FichaTecnicaController::ctrEditarFichaTecnica($editarFichaTecnica, $jsonFichaTecnicaBase64);

    echo json_encode($response);
  }
  //borrar FichaTecnica
  public function ajaxBorrarFichaTecnica($jsonBorraFichaTecnica)
  {
    $borrarFichaTecnica = json_decode($jsonBorraFichaTecnica, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = FichaTecnicaController::ctrDeleteFichaTecnica($borrarFichaTecnica);
    echo json_encode($response);
  }

  //  Descargar ficha tecnica
  public function ajaxDescargarFichaTecnica($jsonDescargarFichaTecnica)
  {
    $codCotiB64 = json_decode($jsonDescargarFichaTecnica, true); // Decodificar la cadena de texto JSON en un array asociativo
    $response = FichaTecnicaController::ctrDescargarFichaTecnica($codCotiB64);
    echo json_encode($response);
  }
}

