<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\PruebasCovidSitio as PruebasCovidSitioDao;
use \App\models\Asistencias as AsistenciasDao;
use \App\models\Conceptos as ConceptosDao;
use \DateTime;
use \DatetimeZone;
// use \App\models\Linea as LineaDao;

class Conceptos extends Controller
{

  private $_contenedor;

  function __construct()
  {
    parent::__construct();
    $this->_contenedor = new Contenedor;
    View::set('header', $this->_contenedor->header());
    View::set('footer', $this->_contenedor->footer());
    // if (Controller::getPermisosUsuario($this->__usuario, "seccion_asistencias", 1) == 0)
    //   header('Location: /Principal/');
  }

  public function getUsuario()
  {
    return $this->__usuario;
  }

  public function index()
  {
    $extraHeader = <<<html
html;
    $permisoGlobalHidden = (Controller::getPermisoGlobalUsuario($this->__usuario)[0]['permisos_globales']) != 1 ? "style=\"display:none;\"" : "";
    $asistentesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistentes", 1) == 0) ? "style=\"display:none;\"" : "";
    $vuelosHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vuelos", 1) == 0) ? "style=\"display:none;\"" : "";
    $pickUpHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pickup", 1) == 0) ? "style=\"display:none;\"" : "";
    $habitacionesHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_habitaciones", 1) == 0) ? "style=\"display:none;\"" : "";
    $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1) == 0) ? "style=\"display:none;\"" : "";
    $cenasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_cenas", 1) == 0) ? "style=\"display:none;\"" : "";
    $aistenciasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_asistencias", 1) == 0) ? "style=\"display:none;\"" : "";
    $vacunacionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_vacunacion", 1) == 0) ? "style=\"display:none;\"" : "";
    $pruebasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_pruebas_covid", 1) == 0) ? "style=\"display:none;\"" : "";
    $configuracionHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_configuracion", 1) == 0) ? "style=\"display:none;\"" : "";
    $utileriasHidden = (Controller::getPermisosUsuario($this->__usuario, "seccion_utilerias", 1) == 0) ? "style=\"display:none;\"" : "";

$extraFooter =<<<html
      <script>
        $(document).ready(function(){

          $('#asistencia-list').DataTable({
            "drawCallback": function(settings) {
                $('.current').addClass("btn bg-gradient-pink text-white btn-rounded").removeClass("paginate_button");
                $('.paginate_button').addClass("btn").removeClass("paginate_button");
                $('.dataTables_length').addClass("m-4");
                $('.dataTables_info').addClass("mx-4");
                $('.dataTables_filter').addClass("m-4");
                $('input').addClass("form-control");
                $('select').addClass("form-control");
                $('.previous.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.next.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
                $('.previous').addClass("btn-outline-info btn-rounded mx-2");
                $('.next').addClass("btn-outline-info btn-rounded mx-2");
                $('a.btn').addClass("btn-rounded");
            },
            "language": {

                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }

            }
        });

          $("#muestra-cupones").tablesorter();
          var oTable = $('#muestra-cupones').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                 "order": false
            });

            // Remove accented character from search input as well
            $('#muestra-cupones input[type=search]').keyup( function () {
                var table = $('#example').DataTable();
                table.search(
                    jQuery.fn.DataTable.ext.type.search.html(this.value)
                ).draw();
            });

            var checkAll = 0;
            $("#checkAll").click(function () {
              if(checkAll==0){
                $("input:checkbox").prop('checked', true);
                checkAll = 1;
              }else{
                $("input:checkbox").prop('checked', false);
                checkAll = 0;
              }

            });

            $("#export_pdf").click(function(){
              $('#all').attr('action', '/Empresa/generarPDF/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#export_excel").click(function(){
              $('#all').attr('action', '/Empresa/generarExcel/');
              $('#all').attr('target', '_blank');
              $("#all").submit();
            });

            $("#delete").click(function(){
              var seleccionados = $("input[name='borrar[]']:checked").length;
              if(seleccionados>0){
                alertify.confirm('¿Segúro que desea eliminar lo seleccionado?', function(response){
                  if(response){
                    $('#all').attr('target', '');
                    $('#all').attr('action', '/Empresa/delete');
                    $("#all").submit();
                    alertify.success("Se ha eliminado correctamente");
                  }
                });
              }else{
                alertify.confirm('Selecciona al menos uno para eliminar');
              }
            });

        });
      </script>
html;
    $tabla = '';
    $datos = ConceptosDao::getAll();
    
    foreach ($datos as $key => $value) {

      $tabla.=<<<html
      <tr>
        <td>{$value['nombre']}</td>
        <td id="descripcion_asistencia" width="20">{$value['descripcion']}</td>
        <td class="text-center">{$value['precio_publico']}</td>        
        <td class="text-center">
        <button style='' class='btn btn-icon-only btn-danger delete_product' value={$value['id_producto']} data-bs-toggle="tooltip" target="_blank" data-bs-placement="left" data-bs-original-title="Eliminar concepto">x</button>
        </td>
      </tr>
 
html;
    }

    $num_asistencias = AsistenciasDao::getNumAsistencias()['total'];
    $date = date("Y").'-'.date("m").'-'.date("d");

      $productos = '';
      foreach (AsistenciasDao::getProductos() as $key => $value) {
          $productos .=<<<html
      <option value="{$value['id_producto']}"> {$value['nombre']}</option>
html;
      }


      // View::set('lineas',$lineas);
      View::set('tabla',$tabla);
      View::set('num_asistencias',$num_asistencias);
      View::set('asideMenu',$this->_contenedor->asideMenu());
      View::set('header',$this->_contenedor->header($extraHeader));
      View::set('footer',$this->_contenedor->footer($extraFooter));
      View::set('productos',$productos);
      View::render("conceptos_all");
    }
  

    public function conceptosAdd() {

      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      $tipo = $_POST['tipo'];
      $precio = $_POST['precio_publico'];

      $data = new \stdClass();
      $data->_clave = $this->generateRandomString();
      $data->_nombre = $nombre;
      $data->_descripcion = $descripcion;
      $data->_tipo = $tipo;
      $data->_precio = $precio;      
  
      $id = ConceptosDao::insert($data);
      if($id >= 1){
        // $this->alerta($id,'add');
        echo '<script>
          alert("Concepto Registrada con exito");
          window.location.href = "/Conceptos";
        </script>';

       
      }else{
        // $this->alerta($id,'error');
        echo '<script>
        alert("Error al registrar el concepto, consulte a soporte");
        window.location.href = "/Conceptos";
      </script>';
      }


    }


    public function deleteProduct(){
      $id_producto = $_POST['id_producto'];

      $delete = ConceptosDao::deleteProducto($id_producto);

      if($delete){
        echo "success";
      }else{
        echo "fail";
      }
    }



    function generateRandomString($length = 6) { 
      return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length); 
  } 

  // View::set('permisoGlobalHidden', $permisoGlobalHidden);
  // View::set('asistentesHidden', $asistentesHidden);
  // View::set('vuelosHidden', $vuelosHidden);
  // View::set('pickUpHidden', $pickUpHidden);
  // View::set('habitacionesHidden', $habitacionesHidden);
  // View::set('cenasHidden', $cenasHidden);
  // View::set('aistenciasHidden', $aistenciasHidden);
  // View::set('vacunacionHidden', $vacunacionHidden);
  // View::set('pruebasHidden', $pruebasHidden);
  // View::set('configuracionHidden', $configuracionHidden);
  // View::set('utileriasHidden', $utileriasHidden);
  // View::set('header', $this->_contenedor->header($extraHeader));
  // View::set('footer', $this->_contenedor->footer($extraFooter));
  // View::render("asistencias_all");

}
