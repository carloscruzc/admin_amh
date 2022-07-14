<?php

namespace App\controllers;

defined("APPPATH") or die("Access denied");
require_once dirname(__DIR__) . '/../public/librerias/mpdf/mpdf.php';
require_once dirname(__DIR__) . '/../public/librerias/fpdf/fpdf.php';
require_once dirname(__DIR__) . '/../public/librerias/phpqrcode/qrlib.php';

use \Core\View;
use \Core\MasterDom;
use \App\controllers\Contenedor;
use \Core\Controller;
use \App\models\RegistroAsistencia as RegistroAsistenciaDao;
use \App\models\Habitaciones as HabitacionesDao;
use \App\models\Asistentes as AsistentesDao;
use \App\models\Caja as CajaDao;
use \DateTime;
use \DatetimeZone;

class Caja extends Controller
{


    private $_contenedor;
    function __construct(){
        parent::__construct();
        $this->_contenedor = new Contenedor;
        View::set('header',$this->_contenedor->header());
        View::set('footer',$this->_contenedor->footer());
    }

    public function getUsuario(){
      return $this->__usuario;
    }

    public function index()
    {
        $extraHeader = <<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="/assets/img/amh.png">
        <link rel="icon" type="image/png" href="/assets/img/amh.png">
        <title>
            CAJA - AMH 
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

html;
        $extraFooter = <<<html
        <script src="/js/jquery.min.js"></script>
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
        
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

        <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

html;


            View::set('header', $extraHeader);
            View::set('footer', $extraFooter);
            View::render("caja");
    
    }

    public function getSell(){

        $user_id = $_POST['user_id'];

        $data_user = CajaDao::getDataUser($user_id);

        $checks = '';
        $total_productos = 0;
        $total_pago = 0;
        $check_disabled = '';
        $array_precios = [];
        $array_productos = [];

        $productos_pendientes_comprados = CajaDao::getProductosPendComprados($user_id);

        foreach($productos_pendientes_comprados as $key => $value) {
            $disabled = '';
            $checked = '';
            $pend_validar ='';

            if($value['es_congreso'] == 1 && $value['clave_socio'] == ""){
                $precio = $value['amout_due'];
            }elseif($value['es_congreso'] == 1 && $value['clave_socio'] != ""){
                $precio = $value['amout_due'];
            }
            else if($value['es_servicio'] == 1 && $value['clave_socio'] == ""){
                $precio = $value['precio_publico'];
            }else if($value['es_servicio'] == 1 && $value['clave_socio'] != ""){
                $precio = $value['precio_publico'];
            }
            else if($value['es_curso'] == 1  && $value['clave_socio'] == ""){
                $precio = $value['precio_publico'];
            }else if($value['es_curso'] == 1  && $value['clave_socio'] != ""){
                $precio = $value['precio_publico'];
            }
            
            $count_producto = CajaDao::getCountProductos($user_id,$value['id_producto'])[0];

            

            if($value['estatus_compra'] == 1){
                $disabled = 'disabled';
                $checked = 'checked';
                $pend_validar ='Pagado y validado por AMH';
                // $btn_imp = '';
                // $productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = 'display:none;';
                
            }
            
            else if($value['estatus_compra'] == null){
                $pend_validar = 'Pendiente de Pagar';
                // $btn_imp = '<a class="btn btn-primary" href="/Home/print/'.$productos_pendientes_comprados[0]['clave'].'" target="blank_">Imprimir Formato de Pago</a>';
                // $ocultar = '';
                // $disabled = 'disabled';
                $checked = 'checked';
                $total_productos += $count_producto['numero_productos'];
                $total_pago += $count_producto['numero_productos'] * $precio;
                array_push($array_precios,['id_product'=>$value['id_producto'],'precio'=>$precio,'cantidad'=>$count_producto['numero_productos']]);
                array_push($array_productos,['id_product'=>$value['id_producto'],'precio'=>$precio,'cantidad'=>$count_producto['numero_productos'],'nombre_producto'=>$value['nombre_producto']]);

                if($value['max_compra'] <= 1){
                    $numero_productos = '<input type="number" id="numero_articulos'.$value['id_producto'].'" name="numero_articulos" value="'.$value['max_compra'].'" style="border:none;" readonly>';
                }else{
                    $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos'.$value['id_producto'].'" name="numero_articulos" data-id-producto="'.$value['id_producto'].'" data-precio="'.$precio.'" data-nombre-producto="'.$value['nombre_producto'].'" '.$disabled.'>';
                    for($i = 1; $i <= $value['max_compra']; $i++){                    
                        $numero_productos .= '<option value="'.$i.'">'.$i.'</option>';                
                    }
                    $numero_productos .= '</select>';
                }
    
    
                $checks .= <<<html
    
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-check">
                            <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" {$disabled} {$checked} data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}">
                            <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                                {$value['nombre_producto']} <span style="font-size: 13px; text-decoration: underline; color: green;">{$pend_validar}</span>
                            </label>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                    <button class="btn btn-sm btn-primary btn_desbloquear_precio" id="btn_desbloquear_precio{$value['id_producto']}" data-id-producto = {$value['id_producto']}>desbloquear precio</button>

                    <input type="number" class="precio_articulo" id="precio_articulo{$value['id_producto']}" name="precio_articulo[]" value="{$precio}" style="border:none;" readonly data-id-producto="{$value['id_producto']}"  data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}"> - {$value['tipo_moneda']}
                        
                    </div>
    
                    <div class="col-md-2">
                        {$numero_productos}
                    </div>
                </div>
    
                <hr>
html;
                $numero_productos = '';
            }

            
        }

        $productos_no_comprados = CajaDao::getProductosNoComprados($user_id);


        foreach($productos_no_comprados as $key => $value) {


            if($value['es_congreso'] == 1 && $value['clave_socio'] == ""){
                $precio = $value['amout_due'];
            }elseif($value['es_congreso'] == 1 && $value['clave_socio'] != ""){
                $precio = 0;
                $checked = 'checked';
            }
            else if($value['es_servicio'] == 1 && $value['clave_socio'] == ""){
                $precio = $value['precio_publico'];
            }else if($value['es_servicio'] == 1 && $value['clave_socio'] != ""){
                $precio = 0;
                $precio = $value['precio_publico'];
            }
            else if($value['es_curso'] == 1  && $value['clave_socio'] == ""){
                $precio = $value['precio_publico'];
            }else if($value['es_curso'] == 1  && $value['clave_socio'] != ""){
                $precio = 0;
                $precio = $value['precio_publico'];
            }

            if($value['max_compra'] <= 1){
                $numero_productos = '<input type="number" id="numero_articulos'.$value['id_producto'].'" name="numero_articulos" value="'.$value['max_compra'].'" style="border:none;" readonly>';
            }else{
                $numero_productos = '<select class="form-control select_numero_articulos" id="numero_articulos'.$value['id_producto'].'" name="numero_articulos" data-id-producto="'.$value['id_producto'].'"  data-precio="'.$precio.'" data-nombre-producto="'.$value['nombre_producto'].'">';
                for($i = 1; $i <= $value['max_compra']; $i++){                    
                    $numero_productos .= '<option value="'.$i.'">'.$i.'</option>';                
                }
                $numero_productos .= '</select>';
            }
            

            $checks .= <<<html

            <div class="row">
                 <div class="col-md-8">
                     <div class="form-check">
                         <input class="form-check-input checks_product" type="checkbox" value="{$value['id_producto']}" id="check_curso_{$value['id_producto']}" name="checks_cursos[]" data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}" {$check_disabled}>
                         <label class="form-check-label" for="check_curso_{$value['id_producto']}">
                             {$value['nombre_producto']}
                         </label>
                     </div>
                 </div>
               
                 <div class="col-md-2">
                 <button class="btn btn-sm btn-primary btn_desbloquear_precio" id="btn_desbloquear_precio{$value['id_producto']}" data-id-producto = {$value['id_producto']}>desbloquear precio</button>

                 <input type="number" class="precio_articulo precio_articulo_general" id="precio_articulo{$value['id_producto']}" name="precio_articulo[]" value="{$precio}" style="border:none;" readonly data-id-producto="{$value['id_producto']}"  data-precio="{$precio}" data-nombre-producto="{$value['nombre_producto']}"> - {$value['tipo_moneda']}
                 </div>

                 <div class="col-md-2">
                        {$numero_productos}
                 </div>

             </div>

             <hr>
html;

            $numero_productos = '';
        }


        $data = [
            "status" => "success",
            "checks" => $checks,
            "precios" => $array_precios,
            "productos" => $array_productos,
            "nombre_completo" => $data_user['nombre'].' '.$data_user['apellidop'].' '.$data_user['apellidom'],
            "datos_user" => $data_user
        ];

        echo json_encode($data);
 
    }

    public function buscarPassword(){
        $usuario = new \stdClass();
        $usuario->_password = MD5($_POST['password']);
        $user = CajaDao::getUserByPassword($usuario);
        if (count($user)>=1) {
            // $user['nombre'] = utf8_encode($user['nombre']);
            $data = [
                'status' => 'success',
                'admin' => $user                
            ];
        }else{
            $data = [
                'status' => 'error'             
            ];
        }

        echo json_encode($data);
    }

    public function UpdateFiscalData(){

        $user_id = $_POST["modal_user_id"];
        $business_name_iva = $_POST['business_name_iva'];
        $code_iva = $_POST['code_iva'];
        $email_receipt_iva = $_POST['email_receipt_iva'];
        $direccion = $_POST['direccion'];
        $postal_code_iva = $_POST['postal_code_iva'];

        $data = new \stdClass();
        $data->_user_id = $user_id;
        $data->_business_name_iva = $business_name_iva;    
        $data->_code_iva = $code_iva;   
        $data->_email_receipt_iva = $email_receipt_iva;
        $data->_direccion = $direccion;   
        $data->_postal_code_iva = $postal_code_iva;


        $updateFiscalData = CajaDao::UpdateFiscalData($data);

        if($updateFiscalData){
            echo "success";
        }else{
            echo "fail";
        }

        

    }
    // public function getSell(){
    //     $codigo = $_POST['codigo'];

    //     date_default_timezone_set('America/Mexico_City');

    //     // $this->generaterQr($clave_ticket);

    //     $datos_user = AsistentesDao::getDatauser($codigo)[0];
    //     $user_id = $datos_user['user_id']; 

        
        
    //     $nombre_completo = $datos_user['nombre'] . " " . $datos_user['apellidop'] . " " . $datos_user['apellidom'];


    //     $productos = CajaDao::getProductosPendientesPagoTicketSitio($user_id);

    //     // echo count($productos);
    //     // exit;

    //     if(count($productos) <= 0){
    //         $data = [
    //             "status" => 'fail'
    //         ];
    //         echo json_encode($data);
    //     }

    //     $tipo_cambio = CajaDao::getTipoCambio()['tipo_cambio'];

      
       

    //     foreach($productos as $key => $value){            
            
            
    //         // if($value['es_congreso'] == 1){
    //         //     $precio = $value['amout_due'];
    //         // }else if($value['es_servicio'] == 1){
    //         //     $precio = $value['precio_publico'];
    //         // }else if($value['es_curso'] == 1){
    //         //     $precio = $value['precio_publico'];
    //         // }

            
           
    //         $total_productos = CajaDao::getCountProductos($user_id,$value['id_producto'])[0];
    //         $productos[$key]['cantidad'] = $total_productos['numero_productos'];
         
    //         // array_push($productos[$key],["cantidad" => $total_productos['numero_productos']]);


    //     }


    //     if($productos){
    //         $data = [
    //             "status" => 'success',
    //             "nombre_completo" => $nombre_completo,
    //             "datos_user" => $datos_user,
    //             "productos" => $productos,
    //             "tipo_cambio" => $tipo_cambio
                
    //         ];
    //         echo json_encode($data);
    //     }
        
    // }


    public function setPay(){

        $user_id = $_POST['user_id'];
        $metodo_pago = $_POST['metodo_pago'];
        $total_pesos = $_POST['total_pesos'];
        $pendientes_pago = json_decode($_POST['array'],true);

        if(isset($_POST['descripcion'])){
            $descripcion = $_POST['descripcion'];
        }else{
            $descripcion = '';
        }


        $data_user = CajaDao::getDataUser($user_id);
        $referencia = $data_user['referencia'];
        $clave = $this->generateRandomInt();
        $flag = 0;

        
        $productos_transaccion = '';


        foreach($pendientes_pago as $key => $value){
            
            $productos_transaccion .= $value['nombre_producto'].' -  $'.$value['precio'].','; 
            
            $existePendiente = CajaDao::pendientesPagoByProductAndUser($user_id,$value['id_product']);

            if($existePendiente){
                //actualizar falta el precio
                $updateStatus = CajaDao::updateStatusPendientePagoByUserAndId($user_id,$value['id_product'],$metodo_pago,$value['precio']);

                if($updateStatus){

                    $getProducto = CajaDao::getAsignaProductoByIdProductAndUser($user_id,$value['id_product']);

                    if(!$getProducto){
                        
                        $data = new \stdClass();
                        $data->_user_id = $user_id;
                        $data->_id_producto = $value['id_product'];             
                        

                        $insertAsiganProducto = CajaDao::insertAsignaProducto($data);

                        if($insertAsiganProducto){                       
                            $flag = 1;
                        }
                    }   
                }

            }else{

                for($i = 0; $i < $value['cantidad'];$i++){
                //insertar
                    $data_pendiente = new \stdClass();
                    $data_pendiente->_user_id = $user_id;
                    $data_pendiente->_id_producto = $value['id_product']; 
                    $data_pendiente->_reference = $referencia; 
                    $data_pendiente->_clave = $clave;
                    $data_pendiente->_monto = $value['precio'];
                    $data_pendiente->_tipo_pago = $metodo_pago;
                
                    $insert_pendiente = CajaDao::insertPendientePago($data_pendiente);

                    if($insert_pendiente){

                        // $getProducto = CajaDao::getAsignaProductoByIdProductAndUser($user_id,$value['id_product']);

                        // if(!$getProducto){
                            
                            $data = new \stdClass();
                            $data->_user_id = $user_id;
                            $data->_id_producto = $value['id_product'];             
                            

                            $insertAsiganProducto = CajaDao::insertAsignaProducto($data);

                            if($insertAsiganProducto){                       
                                $flag = 1;
                            }
                        // }   
                    }
                }

                //end for
            }

            
        }
        

        if($flag == 1){
            $productos_transaccion = substr($productos_transaccion, 0, -1);
            
             //guarar en transaccion
             $dataTransaccion = new \stdClass();
             $dataTransaccion->_user_id = $user_id;
             $dataTransaccion->_referencia_transaccion = $referencia;
             $dataTransaccion->_productos = $productos_transaccion;
            //  $dataTransaccion->_total_dolares = $total_usd;
             $dataTransaccion->_total_pesos = $total_pesos;
             $dataTransaccion->_tipo_pago = $metodo_pago;
             $dataTransaccion->_descripcion = $descripcion;
             $dataTransaccion->_utilerias_administradores_id  = $_SESSION['utilerias_administradores_id'];

             $insertTransaccion = CajaDao::insertTransaccion($dataTransaccion);

             if($insertTransaccion){
                echo "success";
             }else{
                echo "fail";
            }
            
        }
        else{
            echo "fail";
        }

        // echo "success";
    }

    public function removePendientesPago(){
        $id_producto = $_POST['id_producto'];
        $user_id = $_POST['user_id'];
        // echo $_POST['cantidad'];

        $delete = CajaDao::deletePendientesProductosByUser($user_id,$id_producto);

        if($delete){
            echo "success";
        }else{
            echo "fail";
        }
    }

    public function SearchConcidenciaUsers()
    {
        $concidencia = $_POST['concidencia'];

        if (isset($concidencia) && isset($concidencia) && !empty($concidencia) && !empty($concidencia)) {
            $cons = AsistentesDao::getDatauser($concidencia);

            echo json_encode($cons);
        }
    }


    public function corteCaja(){
        $extraHeader = <<<html
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="apple-touch-icon" sizes="76x76" href="https://foromusa.com/assets/images/Musa0-01.png">
        <link rel="icon" type="image/png" href="https://foromusa.com/assets/images/Musa0-01.png">
        <title>
            CAJA - APM 
        </title>
        <!--     Fonts and icons     -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
        <!-- Nucleo Icons -->
        <link href="/assets/css/nucleo-icons.css" rel="stylesheet" />
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- Font Awesome Icons -->
        <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
        <link href="/assets/css/nucleo-svg.css" rel="stylesheet" />
        <!-- CSS Files -->
        <link id="pagestyle" href="/assets/css/soft-ui-dashboard.css?v=1.0.5" rel="stylesheet" />
        <link rel="stylesheet" href="/css/alertify/alertify.core.css" />
        <link rel="stylesheet" href="/css/alertify/alertify.default.css" id="toggleCSS" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

html;
        $extraFooter = <<<html
        <script src="/js/jquery.min.js"></script>
        <script src="/js/validate/jquery.validate.js"></script>
        <script src="/js/alertify/alertify.min.js"></script>
        <!-- -------- END FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
        <!--   Core JS Files   -->
        <script src="/assets/js/core/popper.min.js"></script>
        <script src="/assets/js/core/bootstrap.min.js"></script>
        <script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
        <script src="/assets/js/plugins/smooth-scrollbar.min.js"></script>
        <!-- Kanban scripts -->
        <script src="/assets/js/plugins/dragula/dragula.min.js"></script>
        <script src="/assets/js/plugins/jkanban/jkanban.js"></script>
        <script>
            var win = navigator.platform.indexOf('Win') > -1;
            if (win && document.querySelector('#sidenav-scrollbar')) {
                var options = {
                    damping: '0.5'
                }
                Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
            }
        </script>
        <!-- Github buttons -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
        <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="/assets/js/soft-ui-dashboard.min.js?v=1.0.5"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

        <script src="http://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="http://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />
        
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

        <script src="//cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js" defer></script>
        <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css" />

html;
        View::set('header', $extraHeader);
        View::set('footer', $extraFooter);
        View::render("corte_caja");
    }
    

    //user id y clave pendiente clave
    public function print($user_id,$clave = null)
    {
        date_default_timezone_set('America/Mexico_City');

        // $this->generaterQr($clave);        

        $datos_user = CajaDao::getDataUser($user_id);
        $user_id = $datos_user['user_id'];        


        $productos = CajaDao::getLastTransaccionByUser($user_id);

   

        
        $reference = $productos['referencia_transaccion'];
        $fecha = $productos['fecha_transaccion'];
        $tipo_pago = $productos['tipo_pago'];
        
        $nombre_completo = $datos_user['nombre'] . " " . $datos_user['apellidop'] . "\n " . $datos_user['apellidom'];


        $pdf = new \FPDF($orientation = 'P', $unit = 'mm', $format = 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);    //Letra Arial, negrita (Bold), tam. 20
        $pdf->setY(1);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('plantillas/orden.png', 0, 0, 210, 300);
        
        // $pdf->SetFont('Arial', 'B', 25);
        // $pdf->Multicell(133, 80, $clave_ticket, 0, 'C');

        //$pdf->Image('1.png', 1, 0, 190, 190);
        $pdf->SetFont('Arial', 'B', 5);    //Letra Arial, negrita (Bold), tam. 20
        //$nombre = utf8_decode("Jonathan Valdez Martinez");
        //$num_linea =utf8_decode("Línea: 39");
        //$num_linea2 =utf8_decode("Línea: 39");

        $espace = 105;
        $total = array();
        $pro = explode(",",$productos['productos']);

 
        foreach($pro as $key => $value){  

            // $total_productos = CajaDao::getCountProductos($user_id,2)[0];

            // $count_productos = $total_productos['numero_productos'];

            $pro_precio = explode("-",$value);
            $solo_precio = explode("$",$pro_precio[1]);
            // var_dump($pro_precio);
            // echo number_format($solo_precio[1],2);
            // exit;


            //Nombre Curso
            $pdf->SetXY(22, $espace);
            $pdf->SetFont('Arial', 'B', 8);  
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Multicell(100, 4, utf8_decode($pro_precio[0]) , 0, 'C');

            //Costo
            $pdf->SetXY(115, $espace);
            $pdf->SetFont('Arial', 'B', 8);  
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Multicell(100, 4, number_format($solo_precio[1],2) ." MXN", 0, 'C');

            $espace = $espace + 6;
        }

        $tipo_cambio = CajaDao::getTipoCambio()['tipo_cambio'];
        

        //folio
        $pdf->SetXY(5, 50);
        $pdf->SetFont('Arial', 'B', 13);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, $datos_user['clave'], 0, 'C');

        //fecha
        $pdf->SetXY(120,65);
        $pdf->SetFont('Arial', 'B', 13);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, $fecha, 0, 'C');

        //Nombre
        $pdf->SetXY(120,20);
        $pdf->SetFont('Arial', 'B', 10);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, utf8_decode($nombre_completo), 0, 'C');

        //Nombre empresa
        $pdf->SetXY(120,35);
        $pdf->SetFont('Arial', 'B', 10);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, utf8_decode($datos_user['business_name_iva']), 0, 'C');

        //RFC
        $pdf->SetXY(120,40);
        $pdf->SetFont('Arial', 'B', 10);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, utf8_decode($datos_user['code_iva']), 0, 'C');

        //RFC
        $pdf->SetXY(120,45);
        $pdf->SetFont('Arial', 'B', 10);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, utf8_decode($datos_user['email_receipt_iva']), 0, 'C');

        

      

        //total dolares
        // $pdf->SetXY(125, 199);
        // $pdf->SetFont('Arial', 'B', 13);  
        // $pdf->SetTextColor(0, 0, 0);
        // $pdf->Multicell(100, 10, number_format($productos['total_dolares']).' USD', 0, 'C');

        //total pesos
        $pdf->SetXY(138, 265);
        $pdf->SetFont('Arial', 'B', 13);  
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(100, 10, '$ '.number_format($productos['total_pesos'],2).'', 0, 'C');

        //tipo pago
        // $pdf->SetXY(125, 265);
        // $pdf->SetFont('Arial', 'B', 13);  
        // $pdf->SetTextColor(0, 0, 0);
        // $pdf->Multicell(100, 10, $tipo_pago, 0, 'C');

        //imagen Qr
        // $pdf->Image('qrs/'.$clave.'.png' , 152 ,245, 35 , 38,'PNG');


        $pdf->Output();
        // $pdf->Output('F','constancias/'.$clave.$id_curso.'.pdf');

        // $pdf->Output('F', 'C:/pases_abordar/'. $clave.'.pdf');
    }

    function generateRandomInt($length = 10)
    {
        return substr(str_shuffle("0123456789"), 0, $length);
    }



    public function mostrarLista($clave)
    {
        $lista_registrados = RegistroAsistenciaDao::getRegistrosAsistenciasByCode($clave);

        echo json_encode($lista_registrados);
    }

    public function borrarRegistrado($id_user)
    {

        $id_asistencia = '';
        $delete_registrado = RegistroAsistenciaDao::delete($id_user);

        echo json_encode($delete_registrado);
    }

    public function registroAsistencia($clave, $code){
        
        $user_clave = RegistroAsistenciaDao::getInfo($clave)[0];
        $especialidades = RegistroAsistenciaDao::getEspecialidades();
        $asistencia = RegistroAsistenciaDao::getIdRegistrosAsistenciasByCode($code)[0];

        $fecha = new DateTime('now', new DateTimeZone('America/Cancun'));
        $hora_actual = substr($fecha->format(DATE_RFC822), 15, 5);
        $a_tiempo = '';

        if (
            intval(substr($hora_actual, 0, 2)) > intval(substr($asistencia['hora_asistencia_inicio'], 0, 2))
            && intval(substr($hora_actual, 0, 2)) < intval(substr($asistencia['hora_asistencia_fin'], 0, 2))
        ) {
            $a_tiempo = 1;
            $aqui = 1;
        } else if (
            intval(substr($hora_actual, 0, 2)) == intval(substr($asistencia['hora_asistencia_fin'], 0, 2))
            && intval(substr($hora_actual, 3, 6)) <= intval(substr($asistencia['hora_asistencia_fin'], 3, 6))
        ) {
            $a_tiempo = 1;
            $aqui = 2;
        } else if (
            intval(substr($hora_actual, 0, 2)) == intval(substr($asistencia['hora_asistencia_inicio'], 0, 2))
            && intval(substr($hora_actual, 3, 6)) >= intval(substr($asistencia['hora_asistencia_inicio'], 3, 6))
        ) {
            $a_tiempo = 1;
            $aqui = 3;
        } else {
            $a_tiempo = 2;
            $aqui = 4;
        }
            if ($user_clave) {
                $hay_asistente = RegistroAsistenciaDao::findAsistantById($user_clave['utilerias_asistentes_id'], $asistencia['id_asistencia'])[0];
                if ($hay_asistente) {
                    $msg_insert = 'success_find_assistant';
                } else {
                    $msg_insert = 'fail_not_found_assistant';
                    $insert = RegistroAsistenciaDao::addRegister($asistencia['id_asistencia'], $user_clave['utilerias_asistentes_id'], $a_tiempo);
                }
    
                $data = [
                    'datos' => $user_clave,
                    'especialidades' => $especialidades,
                    'status' => 'success',
                    'msg_insert' => $msg_insert,
                    'hay_asistente' => $hay_asistente,
                    'asistencia' => $asistencia,
                    'hora_actual' => $hora_actual,
                    'a_tiempo' => $a_tiempo,
                    'aqui' => $aqui,
                    'hora_actual' => intval(substr($hora_actual, 0, 2)),
                    'hora_fin' => intval(substr($asistencia['hora_asistencia_fin'], 0, 2)),
                ];
            } else {
                $data = [
                    'status' => 'fail'
                ];
            }

        echo json_encode($data);
    }



    public function registroAsistenciaCheckin($clave, $code)
    {

        $clave_habitacion = '';
        $id_asigna_habitacion = '';

        $user_clave = RegistroAsistenciaDao::getInfo($clave)[0];
        $linea_principal = RegistroAsistenciaDao::getEspecialidades();
        $bu = RegistroAsistenciaDao::getBu();
        $posiciones = RegistroAsistenciaDao::getPosiciones();
        $asistencia = RegistroAsistenciaDao::getIdRegistrosAsistenciasByCode($code)[0];

        $habitaciones = HabitacionesDao::getAsignaHabitacionByIdRegAcceso($user_clave['id_registro_acceso'])[0];
        if ($habitaciones) {
            $clave_habitacion = $habitaciones['clave'];
            $id_asigna_habitacion = $habitaciones['id_asigna_habitacion'];
            $numero_habitacion = $habitaciones['id_habitacion'];
        }


        $fecha = new DateTime('now', new DateTimeZone('America/Cancun'));
        $hora_actual = substr($fecha->format(DATE_RFC822), 15, 5);
        // $a_tiempo = '';

        if (
            intval(substr($hora_actual, 0, 2)) > intval(substr($asistencia['hora_asistencia_inicio'], 0, 2))
            && intval(substr($hora_actual, 0, 2)) < intval(substr($asistencia['hora_asistencia_fin'], 0, 2))
        ) {
            $a_tiempo = 1;
            $aqui = 1;
        } else if (
            intval(substr($hora_actual, 0, 2)) == intval(substr($asistencia['hora_asistencia_fin'], 0, 2))
            && intval(substr($hora_actual, 3, 6)) <= intval(substr($asistencia['hora_asistencia_fin'], 3, 6))
        ) {
            $a_tiempo = 1;
            $aqui = 2;
        } else if (
            intval(substr($hora_actual, 0, 2)) == intval(substr($asistencia['hora_asistencia_inicio'], 0, 2))
            && intval(substr($hora_actual, 3, 6)) >= intval(substr($asistencia['hora_asistencia_inicio'], 3, 6))
        ) {
            $a_tiempo = 1;
            $aqui = 3;
        } else {
            $a_tiempo = 2;
            $aqui = 4;
        }
        // || substr($hora_actual,0,2) > substr($asistencia['hora_asistencia_fin'],0,2)


        if ($user_clave) {
            $hay_asistente = RegistroAsistenciaDao::findAsistantById($user_clave['utilerias_asistentes_id'], $asistencia['id_asistencia'])[0];
            if ($hay_asistente) {
                $msg_insert = 'success_find_assistant';
            } else {
                $msg_insert = 'fail_not_found_assistant';
                $insert = RegistroAsistenciaDao::addRegister($asistencia['id_asistencia'], $user_clave['utilerias_asistentes_id'], $a_tiempo);
            }

            $data = [
                'datos' => $user_clave,
                'linea_principal' => $linea_principal,
                'bu' => $bu,
                'posiciones' => $posiciones,
                'status' => 'success',
                'msg_insert' => $msg_insert,
                'hay_asistente' => $hay_asistente,
                'asistencia' => $asistencia,
                'hora_actual' => $hora_actual,
                'a_tiempo' => $a_tiempo,
                'aqui' => $aqui,
                'hora_actual' => intval(substr($hora_actual, 0, 2)),
                'hora_fin' => intval(substr($asistencia['hora_asistencia_fin'], 0, 2)),
                'clave_habitacion' => $clave_habitacion,
                'id_asigna_habitacion' => $id_asigna_habitacion,
                'numero_habitacion' => $numero_habitacion,
                'anchor_abrir_pdf' => "<a href='/RegistroAsistencia/abrirpdf/{$user_clave['clave']}' target='_blank' style='display:none;' id='a_abrir_etiqueta'>abrir</a>",
                'anchor_abrir_gafete' => "<a href='/RegistroAsistencia/abrirpdfGafete/{$user_clave['clave']}/{$user_clave['clave_ticket']}' target='_blank' style='display:none;' id='a_abrir_gafete' class='btn btn-info'><i class='fa fal fa-address-card' style='font-size: 18px;'></i>Presione esté botón para descargar el gafete</a>",

            ];
        } else {
            $data = [
                'status' => 'fail'
            ];
        }

        echo json_encode($data);
    }

    public function abrirpdf($clave, $noPages = null)
    {

        $datos_user = AsistentesDao::getRegistroAccesoHabitacionByClaveRA($clave)[0];
        $nombre_completo = strtoupper($datos_user['nombre'] . " " . $datos_user['apellido_paterno'] . " " . $datos_user['apellido_materno']);
        //$nombre_completo = utf8_decode($_POST['nombre']);
        $num_habitacion = $_POST['num_habitacion'];


        $pdf = new \FPDF($orientation = 'L', $unit = 'mm', array(37, 155));

        for ($i = 1; $i <= $noPages; $i++) {


            $pdf->AddPage();
            $pdf->SetFont('Arial', 'B', 5);    //Letra Arial, negrita (Bold), tam. 20
            $textypos = 5;
            $pdf->setY(2);

            // $pdf->Image('https://convencionasofarma2022.mx/assets/pdf/iMAGEN_aso.png', 1, 0, 150, 40);
            $pdf->SetFont('Arial', '', 5);    //Letra Arial, negrita (Bold), tam. 20

            $pdf->SetXY(8.3, 9);
            $pdf->SetFont('Times', 'B', 10);
            #4D9A9B
            $pdf->SetTextColor(0, 0, 0);
            $pdf->Multicell(120, 4.2, $nombre_completo . utf8_decode(" #habitación") . " - " . $datos_user['numero_habitacion'], 0, 'C');
            // $pdf->Multicell(120, 4.2, $nombre_completo .utf8_decode(" #habitación") ." - ".$datos_user['numero_habitacion'], 0, 'C');
            // $pdf->Multicell(120, 3.5, $numero_habitacion, 0, 'C');



            $textypos += 6;
            $pdf->setX(2);

            $textypos += 6;
        }

        $pdf->Output();
        // $pdf->Output('F', 'C:/pases_abordar/'. $clave.'.pdf');


    }



    public function abrirpdfGafete($clave, $clave_ticket = null){

        $this->generaterQr($clave_ticket);
        $datos_user = AsistentesDao::getRegistroAccesoByClaveRA($clave)[0];

        $nombre_completo = mb_strtoupper($datos_user['nombre']) . "\n\n" . mb_strtoupper($datos_user['apellido_paterno']) . "\n\n" . mb_strtoupper($datos_user['apellido_materno']);

        

        $pdf = new \FPDF($orientation = 'P', $unit = 'mm', array(390, 152));
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 8);    //Letra Arial, negrita (Bold), tam. 20
        $pdf->setY(1);
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Image('qrs/gafetes/'.$clave_ticket.'.png', 50, 85, 50, 50);
        $pdf->SetFont('Arial', 'B', 25);
        // $pdf->Multicell(133, 80, $clave_ticket, 0, 'C');

        //$pdf->Image('1.png', 1, 0, 190, 190);
        $pdf->SetFont('Arial', 'B', 5);    //Letra Arial, negrita (Bold), tam. 20
        //$nombre = utf8_decode("Jonathan Valdez Martinez");
        //$num_linea =utf8_decode("Línea: 39");
        //$num_linea2 =utf8_decode("Línea: 39");

        $pdf->SetXY(29, 260);
        $pdf->SetFont('Arial', 'B', 30);
        #4D9A9B
        $pdf->SetTextColor(0, 0, 0);
        $pdf->Multicell(95, 10, utf8_decode($nombre_completo), 0, 'C');
        $pdf->output();
    }




    public function generaterQr($clave_ticket)
    {

        // $id_constancia = $_POST['id_constancia'];
        // $user_id = $_SESSION['utilerias_asistentes_id'];

        // var_dump($user_id);
        //Eliminar los archivos del servidor
        //$this->deleteFiles($id_constancia);


        // $codigo_rand = $this->generateRandomString();
        $codigo_rand = $clave_ticket;

        $config = array(
            'ecc' => 'H',    // L-smallest, M, Q, H-best
            'size' => 11,    // 1-50
            'dest_file' => '../public/qrs/' . $codigo_rand . '.png',
            'quality' => 90,
            'logo' => 'logo.jpg',
            'logo_size' => 100,
            'logo_outline_size' => 20,
            'logo_outline_color' => '#FFFF00',
            'logo_radius' => 15,
            'logo_opacity' => 100,
        );

        // Contenido del código QR
        $data = $codigo_rand;

        // Crea una clase de código QR
        $oPHPQRCode = new PHPQRCode();

        // establecer configuración
        $oPHPQRCode->set_config($config);

        // Crea un código QR
        $qrcode = $oPHPQRCode->generate($data);

        //   $url = explode('/', $qrcode );
    }

 
}


class PHPQRCode
{ // class start

    /** Configuración predeterminada */
    private $_config = array(
        'ecc' => 'H',                       // Calidad del código QR L-menor, M, Q, H-mejor
        'size' => 15,                       // Tamaño del código QR 1-50
        'dest_file' => '',        // Ruta de código QR creada
        'quality' => 100,                    // Calidad de imagen
        'logo' => '',                       // Ruta del logotipo, vacío significa que no hay logotipo
        'logo_size' => null,                // tamaño del logotipo, nulo significa que se calcula automáticamente de acuerdo con el tamaño del código QR
        'logo_outline_size' => null,        // Tamaño del trazo del logotipo, nulo significa que se calculará automáticamente de acuerdo con el tamaño del logotipo
        'logo_outline_color' => '#FFFFFF',  // color del trazo del logo
        'logo_opacity' => 100,              // opacidad del logo 0-100
        'logo_radius' => 0,                 // ángulo de empalme del logo 0-30
    );


    public function set_config($config)
    {

        // Permitir configurar la configuración
        $config_keys = array_keys($this->_config);

        // Obtenga la configuración entrante y escriba la configuración
        foreach ($config_keys as $k => $v) {
            if (isset($config[$v])) {
                $this->_config[$v] = $config[$v];
            }
        }
    }

    /**
     * Crea un código QR
     * @param    Contenido del código QR String $ data
     * @return String
     */
    public function generate($data)
    {

        // Crea una imagen de código QR temporal
        $tmp_qrcode_file = $this->create_qrcode($data);

        // Combinar la imagen del código QR temporal y la imagen del logotipo
        $this->add_logo($tmp_qrcode_file);

        // Eliminar la imagen del código QR temporal
        if ($tmp_qrcode_file != '' && file_exists($tmp_qrcode_file)) {
            unlink($tmp_qrcode_file);
        }

        return file_exists($this->_config['dest_file']) ? $this->_config['dest_file'] : '';
    }

    /**
     * Crea una imagen de código QR temporal
     * @param    Contenido del código QR String $ data
     * @return String
     */
    private function create_qrcode($data)
    {

        // Imagen de código QR temporal
        $tmp_qrcode_file = dirname(__FILE__) . '/tmp_qrcode_' . time() . mt_rand(100, 999) . '.png';

        // Crea un código QR temporal
        \QRcode::png($data, $tmp_qrcode_file, $this->_config['ecc'], $this->_config['size'], 2);

        // Regresar a la ruta temporal del código QR
        return file_exists($tmp_qrcode_file) ? $tmp_qrcode_file : '';
    }

    /**
     * Combinar imágenes de códigos QR temporales e imágenes de logotipos
     * @param  String $ tmp_qrcode_file Imagen de código QR temporal
     */
    private function add_logo($tmp_qrcode_file)
    {

        // Crear carpeta de destino
        $this->create_dirs(dirname($this->_config['dest_file']));

        // Obtener el tipo de imagen de destino
        $dest_ext = $this->get_file_ext($this->_config['dest_file']);

        // Necesito agregar logo
        if (file_exists($this->_config['logo'])) {

            // Crear objeto de imagen de código QR temporal
            $tmp_qrcode_img = imagecreatefrompng($tmp_qrcode_file);

            // Obtener el tamaño de la imagen del código QR temporal
            list($qrcode_w, $qrcode_h, $qrcode_type) = getimagesize($tmp_qrcode_file);

            // Obtener el tamaño y el tipo de la imagen del logotipo
            list($logo_w, $logo_h, $logo_type) = getimagesize($this->_config['logo']);

            // Crea un objeto de imagen de logo
            switch ($logo_type) {
                case 1:
                    $logo_img = imagecreatefromgif($this->_config['logo']);
                    break;
                case 2:
                    $logo_img = imagecreatefromjpeg($this->_config['logo']);
                    break;
                case 3:
                    $logo_img = imagecreatefrompng($this->_config['logo']);
                    break;
                default:
                    return '';
            }

            // Establezca el tamaño combinado de la imagen del logotipo, si no se establece, se calculará automáticamente de acuerdo con la proporción
            $new_logo_w = isset($this->_config['logo_size']) ? $this->_config['logo_size'] : (int)($qrcode_w / 5);
            $new_logo_h = isset($this->_config['logo_size']) ? $this->_config['logo_size'] : (int)($qrcode_h / 5);

            // Ajusta la imagen del logo según el tamaño establecido
            $new_logo_img = imagecreatetruecolor($new_logo_w, $new_logo_h);
            imagecopyresampled($new_logo_img, $logo_img, 0, 0, 0, 0, $new_logo_w, $new_logo_h, $logo_w, $logo_h);

            // Determinar si se necesita un golpe
            if (!isset($this->_config['logo_outline_size']) || $this->_config['logo_outline_size'] > 0) {
                list($new_logo_img, $new_logo_w, $new_logo_h) = $this->image_outline($new_logo_img);
            }

            // Determine si se necesitan esquinas redondeadas
            if ($this->_config['logo_radius'] > 0) {
                $new_logo_img = $this->image_fillet($new_logo_img);
            }

            // Combinar logotipo y código QR temporal
            $pos_x = ($qrcode_w - $new_logo_w) / 2;
            $pos_y = ($qrcode_h - $new_logo_h) / 2;

            imagealphablending($tmp_qrcode_img, true);

            // Combinar las imágenes y mantener su transparencia
            $dest_img = $this->imagecopymerge_alpha($tmp_qrcode_img, $new_logo_img, $pos_x, $pos_y, 0, 0, $new_logo_w, $new_logo_h, $this->_config['logo_opacity']);

            // Generar imagen
            switch ($dest_ext) {
                case 1:
                    imagegif($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 2:
                    imagejpeg($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 3:
                    imagepng($dest_img, $this->_config['dest_file'], (int)(($this->_config['quality'] - 1) / 10));
                    break;
            }

            // No es necesario agregar logo
        } else {

            $dest_img = imagecreatefrompng($tmp_qrcode_file);

            // Generar imagen
            switch ($dest_ext) {
                case 1:
                    imagegif($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 2:
                    imagejpeg($dest_img, $this->_config['dest_file'], $this->_config['quality']);
                    break;
                case 3:
                    imagepng($dest_img, $this->_config['dest_file'], (int)(($this->_config['quality'] - 1) / 10));
                    break;
            }
        }
    }

    /**
     * Acaricia el objeto de la imagen
     * @param    Objeto de imagen Obj $ img
     * @return Array
     */
    private function image_outline($img)
    {

        // Obtener ancho y alto de la imagen
        $img_w = imagesx($img);
        $img_h = imagesy($img);

        // Calcula el tamaño del trazo, si no está configurado, se calculará automáticamente de acuerdo con la proporción
        $bg_w = isset($this->_config['logo_outline_size']) ? intval($img_w + $this->_config['logo_outline_size']) : $img_w + (int)($img_w / 5);
        $bg_h = isset($this->_config['logo_outline_size']) ? intval($img_h + $this->_config['logo_outline_size']) : $img_h + (int)($img_h / 5);

        // Crea un objeto de mapa base
        $bg_img = imagecreatetruecolor($bg_w, $bg_h);

        // Establecer el color del mapa base
        $rgb = $this->hex2rgb($this->_config['logo_outline_color']);
        $bgcolor = imagecolorallocate($bg_img, $rgb['r'], $rgb['g'], $rgb['b']);

        // Rellena el color del mapa base
        imagefill($bg_img, 0, 0, $bgcolor);

        // Combina la imagen y el mapa base para lograr el efecto de trazo
        imagecopy($bg_img, $img, (int)(($bg_w - $img_w) / 2), (int)(($bg_h - $img_h) / 2), 0, 0, $img_w, $img_h);

        $img = $bg_img;

        return array($img, $bg_w, $bg_h);
    }


    private function image_fillet($img)
    {

        // Obtener ancho y alto de la imagen
        $img_w = imagesx($img);
        $img_h = imagesy($img);

        // Crea un objeto de imagen con esquinas redondeadas
        $new_img = imagecreatetruecolor($img_w, $img_h);

        // guarda el canal transparente
        imagesavealpha($new_img, true);

        // Rellena la imagen con esquinas redondeadas
        $bg = imagecolorallocatealpha($new_img, 255, 255, 255, 127);
        imagefill($new_img, 0, 0, $bg);

        // Radio de redondeo
        $r = $this->_config['logo_radius'];

        // Realizar procesamiento de esquinas redondeadas
        for ($x = 0; $x < $img_w; $x++) {
            for ($y = 0; $y < $img_h; $y++) {
                $rgb = imagecolorat($img, $x, $y);

                // No en las cuatro esquinas de la imagen, dibuja directamente
                if (($x >= $r && $x <= ($img_w - $r)) || ($y >= $r && $y <= ($img_h - $r))) {
                    imagesetpixel($new_img, $x, $y, $rgb);

                    // En las cuatro esquinas de la imagen, elige dibujar
                } else {
                    // arriba a la izquierda
                    $ox = $r; // centro x coordenada
                    $oy = $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // parte superior derecha
                    $ox = $img_w - $r; // centro x coordenada
                    $oy = $r;        // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // abajo a la izquierda
                    $ox = $r;        // centro x coordenada
                    $oy = $img_h - $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }

                    // abajo a la derecha
                    $ox = $img_w - $r; // centro x coordenada
                    $oy = $img_h - $r; // centro coordenada y
                    if ((($x - $ox) * ($x - $ox) + ($y - $oy) * ($y - $oy)) <= ($r * $r)) {
                        imagesetpixel($new_img, $x, $y, $rgb);
                    }
                }
            }
        }

        return $new_img;
    }

    // Combinar las imágenes y mantener su transparencia
    private function imagecopymerge_alpha($dest_img, $src_img, $pos_x, $pos_y, $src_x, $src_y, $src_w, $src_h, $opacity)
    {

        $w = imagesx($src_img);
        $h = imagesy($src_img);

        $tmp_img = imagecreatetruecolor($src_w, $src_h);

        imagecopy($tmp_img, $dest_img, 0, 0, $pos_x, $pos_y, $src_w, $src_h);
        imagecopy($tmp_img, $src_img, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dest_img, $tmp_img, $pos_x, $pos_y, $src_x, $src_y, $src_w, $src_h, $opacity);

        return $dest_img;
    }


    private function create_dirs($path)
    {

        if (!is_dir($path)) {
            return mkdir($path, 0777, true);
        }

        return true;
    }


    private function hex2rgb($hexcolor)
    {
        $color = str_replace('#', '', $hexcolor);
        if (strlen($color) > 3) {
            $rgb = array(
                'r' => hexdec(substr($color, 0, 2)),
                'g' => hexdec(substr($color, 2, 2)),
                'b' => hexdec(substr($color, 4, 2))
            );
        } else {
            $r = substr($color, 0, 1) . substr($color, 0, 1);
            $g = substr($color, 1, 1) . substr($color, 1, 1);
            $b = substr($color, 2, 1) . substr($color, 2, 1);
            $rgb = array(
                'r' => hexdec($r),
                'g' => hexdec($g),
                'b' => hexdec($b)
            );
        }
        return $rgb;
    }


    private function get_file_ext($file)
    {
        $filename = basename($file);
        list($name, $ext) = explode('.', $filename);

        $ext_type = 0;

        switch (strtolower($ext)) {
            case 'jpg':
            case 'jpeg':
                $ext_type = 2;
                break;
            case 'gif':
                $ext_type = 1;
                break;
            case 'png':
                $ext_type = 3;
                break;
        }

        return $ext_type;
    }
} // class end
