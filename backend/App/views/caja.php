<?php echo $header; ?>
<style>
    .font-totales{
        font-size: 25px;
        font-weight: bold;
    }

   
</style>

<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content  max-height-vh-100 h-100 border-radius-lg ">
         <!-- Navbar -->
         <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    
                </nav>
              
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        <li class="nav-item d-flex align-items-center">
                            <a href="/Login/cerrarSession" class="nav-link text-body font-weight-bold px-0">
                                <i class="fa fa-power-off me-sm-1"></i>
                                <span class="d-sm-inline d-none">Logout</span>
                            </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav  justify-content-end">
                        

                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item px-2 d-flex align-items-center">

                        </li>
                       
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="row" style="margin-bottom: -50px;">
            <div class="col-11 m-auto">
                <div class="mt-7 m-auto">
                    <div class="card card-body mt-n6 overflow-hidden m-5">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <div class="bg-gradient-pink avatar avatar-xl ">
                                    <!-- <img src="../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                                    <span class="fas fa-cash-register" style="font-size: xx-large;"></span>
                                   
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-0">
                                        CAJA
                                    </h5>
                                    <h6><b><?php echo $nombre; ?></b></h6>
                                    <p class="mb-0 font-weight-bold text-sm">
                                    </p>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="mt-7">
            <div class="row">
                <div class="col-10 m-auto">
                    <div class="card card-body mt-n6 overflow-hidden">
                        <div class="col-12">
                            <div class="">
                                <div class="col-auto">
                                    <div class="row mt-4">
                                        <div class="col-lg-12 col-sm-6">
                                            <div class="card h-100">
                                                <div class="card-header pb-0 p-3">

                                                    <div class="row gx-2 gx-sm-3">
                                                        <div class="col">
                                                            <div class="form-group">

                                                            <input style="font-size: 35px" type="text" class="form-control" id="codigo_qr_venta" name="codigo_qr_venta" list="list_concidencias" autofocus>
                                                            <datalist id="list_concidencias">

                                                            </datalist>                                                                        

                                                                <input style="font-size: 35px" type="hidden" id="codigo_qr_venta_hidden" name="codigo_qr_venta_hidden" class="form-control form-control-lg text-center" minlength="11" maxlength="11" autocomplete="off" autocapitalize="off" autofocus>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex justify-content-between">
                                                        <h6 class="mb-0">Nombre: <br> <span id="nombre_completo" class="text-thin">Nombre</span> </h6>
                                                        <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Informaci??n del asistente">
                                                            <i class="fas fa-info" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <!-- <div class="card-body"> -->
                                                <!-- <div class="row ">
                                                    <div class="col-5">
                                                        <img class="w-100 h-100 avatar" id="img_asistente" src="/img/user.png" alt="user">
                                                    </div>
                                                    
                                                </div> -->
                                                
                                                <div class="row m-2">
                                                    <h6>Correo: <span class="text-thin" id="correo_user"> _____</span></h6>
                                                    <h6>Tel??fono: <span class="text-thin" id="telefono_user"> 00 0000 0000</span></h6>
                                                    <input type="hidden" id="user_id" name="user_id">
                                                    <input type="hidden" id="precio_desbloquedo_por" name="precio_desbloquedo_por">

                                                    <a href="" id="generar_gafete" target="_blank" style="display: none;">gafete</a>
                                                    <a href="" id="imprimir_comprobante" target="_blank" style="display: none;">comprobante</a>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-sm-6 mt-sm-0 mt-4">
                                            <div class="card">
                                                <div class="card-header pb-0 p-3">
                                                    <div class="d-flex justify-content-between">
                                                        <!-- <h6 class="mb-0"><span class="fa fa-list-alt"></span> <?php echo $nombre; ?></h6> -->
                                                        <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="<?php echo $descripcion; ?>">
                                                            <i class="fas fa-info" aria-hidden="true"></i>
                                                        </button>
                                                    </div>
                                                    <div class="card p-4" style="overflow-y: auto;">
                                                        <!-- <table id="lista_productos" class="align-items-center mb-0 table table-borderless dataTable no-footer">
                                                            <thead>
                                                                <tr>
                                                                    <th>Producto</th>
                                                                    <th>Cantidad</th>
                                                                    <th>Precio Unitario pesos $</th>
                                                                    <th>Total $</th>
                                                                </tr>
                                                            </thead>

                                                            <tbody>
                                                                <?php //echo $tabla; ?>

                                                            </tbody>

                                                        </table> -->
                                                        <div id="cont-cheks">

                                                        </div>

                                                    </div>

                                                    <div class="row mt-3">
                                                        <div class="col-md-8">
                                                                <div class="cont-totales">
                                                                    <div class="row">

                                                                        <div class="col-md-8">

                                                                            <div>
                                                                               
                                                                                <button id="btn_desb_precio" style="display: none;" class="btn btn-primary" >Desbloquear precios</button>
                                                                            </div>
                                                                    
                                                                            <div>

                                                                                <span class="font-totales">Total pesos mexicanos: $ <span id="total_pesos_formato"></span></span>
                                                                                <span class="font-totales" style="display: none;">Total pesos mexicanos: $ <span id="total_pesos"></span></span>
                                                                            </div>
                                                                            <br>
                                                                            <div>

                                                                                <span class="font-totales">Cambio pesos mexicanos: $ <span id="total_cambio_formato"></span></span>
                                                                                <span class="font-totales" style="display: none;">Cambio pesos mexicanos: $ <span id="total_cambio"></span></span>
                                                                            </div>
                                                                            
                                                                        </div>

                                                                        <div class="col-md-4" id="cont-descripcion" style="display: none;">
                                                                            <div class="form-group">
                                                                                <label>Descripci??n</label>
                                                                                <textarea class="form-control" id="txt_descripcion" name="txt_descripcion" rows="6" cols="100"> </textarea>
                                                                            </div>
                                                                        </div>

                                                                        
                                                                    </div>
                                                                </div>
                                                            

                                                        </div>

                                                        <div class="col-md-4 cont-totales" >
                                                            <div style="display:flex; justify-content: space-evenly;">
                                                                

                                                                <div id="cont-input-pay">
                                                                    <div>
                                                                        <label>Metodo de Pago *</label>
                                                                        <select class="form-control" id="metodo_pago" name="metodo_pago">
                                                                            <option value="">Seleccione una opci??n</option>
                                                                            <option value="Efectivo">Efectivo</option>
                                                                            <option value="Tarjeta">Tarjeta Credito / Debito</option>

                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label>Ingrese el monto *</label>
                                                                        <input type="number" class="form-control" id="txt_pago" name="txt_pago" min="0" step="0.01">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div style="display:flex; justify-content:start;">
                                                            <!-- <select class="form-control" id="metodo_pago" name="metodo_pago" style="width: auto; display:none;">
                                                                <option value="">Seleccione una opci??n</option>
                                                                <option value="Efectivo">Efectivo</option>
                                                                <option value="Tarjeta">Tarjeta Credito / Debito</option>

                                                            </select> -->
                                                            

                                                            <button type="button" class="btn bg-gradient-primary" data-bs-toggle="modal" data-bs-target="#datosFacturacion" style="display: none;" id="btn_fact">
                                                                Facturaci??n de Datos
                                                            </button>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div style="display:flex; justify-content:end;">

                                                                <button id="btn_pagar" class="btn btn-primary" disabled>Pagar</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <div class="modal fade" id="datosFacturacion" tabindex="-1" role="dialog" aria-labelledby="datosFacturacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="datosFacturacionLabel">Capturar datos de Facturacion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="form-horizontal" id="update_fiscal_data" action="" method="POST">
            <div class="modal-body">
                
                    <input type="hidden" name="modal_user_id" id="modal_user_id">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <label>Raz??n Social *</label>
                            <input class="multisteps-form__input form-control" type="text" id="business_name_iva" name="business_name_iva" placeholder="eg. Christopher Prior Jones" maxlength="100" >
                        </div>
                        <div class="col-12 col-sm-4 mt-1 mt-sm-0">
                            <label>RFC *</label>
                            <input class="multisteps-form__input form-control" type="text" id="code_iva" name="code_iva" placeholder="eg. CPJ41250AS" maxlength="13"  style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                        </div>
                        

                        <div class="col-md-4 col-sm-12">
                            <label>Correo Electr??nico facturaci??n * </label>
                            <input class="multisteps-form__input form-control" type="text" id="email_receipt_iva" name="email_receipt_iva" placeholder="eg. user@domain.com" >
                            <span class="mb-0 text-sm" id="error_email_send" style="display:none;color:red;">Correo electr??nico incorrecto</span>
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label>Direcci??n Fiscal * </label>
                            <input class="multisteps-form__input form-control" type="text" id="direccion" name="direccion" placeholder="" >                            
                        </div>

                        <div class="col-md-4 col-sm-12">
                            <label>CP Fiscal * </label>
                            <input class="multisteps-form__input form-control" type="text" id="postal_code_iva" name="postal_code_iva" placeholder="" >                            
                        </div>


                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-gradient-secondary" data-bs-dismiss="modal" id="cerrar_modal">Cerrar</button>
                <button type="submit" class="btn bg-gradient-primary" id="btn_save_fiscal">Guardar</button>
            </div>
            </form>
            </div>
        </div>
    </div>


    <!--   Core JS Files   -->
    <script src="../../assets/js/core/popper.min.js"></script>
    <script src="../../assets/js/core/bootstrap.min.js"></script>
    <script src="../../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <!-- Kanban scripts -->
    <script src="../../assets/js/plugins/dragula/dragula.min.js"></script>
    <script src="../../assets/js/plugins/jkanban/jkanban.js"></script>
    <script src="../../assets/js/plugins/chartjs.min.js"></script>
    <script src="../../assets/js/plugins/threejs.js"></script>
    <script src="../../assets/js/plugins/orbit-controls.js"></script>
   

    <script>
        function focus_input() {
            $("#codigo_qr_venta").focus();
        }



        function borrarRegister(dato) {
            // alert(dato);
            $.ajax({
                url: "/RegistroAsistencia/borrarRegistrado/" + dato,
                type: "POST",
                dataType: 'json',
                beforeSend: function() {
                    console.log("Procesando....");
                    // alert('Se est?? borrando');

                },
                success: function(respuesta) {
                    console.log(respuesta);
                    console.log('despues de borrar');
                    // alert('Bien borrado');
                    swal("??Se borr?? correctamente!", "", "success").
                    then((value) => {
                        $("#codigo_qr_venta").focus();
                        window.location.reload();
                    });
                },
                error: function(respuesta) {
                    console.log(respuesta);
                    // alert('Error');
                    swal("??Ha ocurrido un error al intentar borrar el registro!", "", "warning").
                    then((value) => {
                        $("#codigo_qr_venta").focus();
                    });
                }
            })
        }

        

        $(document).ready(function() {

            $("#update_fiscal_data").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("update_fiscal_data"));
            for (var value of formData.values()) {
                console.log(value);
            }

            $.ajax({
                url: "/Caja/UpdateFiscalData",
                type: "POST",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {
                    console.log(respuesta);

                    if(respuesta == 'success'){
                        swal("??Se actualizaron los Datos Correctamente!", "", "success")
                        $('#cerrar_modal').click();
                    }else{
                        swal("??Hubo un error al actualizar!", "Contacte a soporte", "error")
                        $('#cerrar_modal').modal();
                    }

                   
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

            // let codigo = '';
            // var link_a = $(location).attr('href');
            // var clave_a = link_a.substr(link_a.indexOf('codigo/') + 7, link_a.length);

            // var precios=<?php //echo json_encode($array_precios); ?>;
            // var productos=<?php //echo json_encode($array_productos); ?>;
            var flag_descripcion = false;

            var precios = [];
            var productos = [];

            // bloquearRegistro();
           
            $("#btn_pagar").on("click", function() {
                var metodo_pago = $("#metodo_pago").val();
                var user_id = $("#user_id").val();
                // var total_usd = $("#total_usd").text();
                var total_pesos = $("#total_pesos").text();
                var descripcion = $("#txt_descripcion").val();
                console.log(user_id);

                if (metodo_pago != '') {
                    Swal.fire({
                        title: 'Se va a procesar el pago.',
                        text: "",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: 'Pagar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: "/Caja/setPay",
                                type: "POST",
                                data: {
                                    'array': JSON.stringify(productos),
                                    user_id,
                                    metodo_pago,
                                    total_pesos,
                                    descripcion
                                },
                                // dataType: 'json',
                                beforeSend: function() {
                                    console.log("Procesando....");
                                },
                                success: function(respuesta) {
                                    console.log(respuesta);

                                    if (respuesta == 'success') {
                                        
                                        $('#imprimir_comprobante')[0].click();
                                        Swal.fire('Pago generado correctamente.', '', 'success').then(() => {
                                            // $('#generar_gafete')[0].click();
                                            setTimeout(function() {
                                                location.reload();
                                            }, 1000);
                                        });

                                    }
                                },
                                error: function(respuesta) {

                                }

                            });
                        }

                    })
                    // var total_usd = $("#total_usd").text();
                    // alert(total_usd);
                } 
                else {
                    //seleccionar metodo de pago
                    Swal.fire('Selecciona un metodo de pago', '', 'info');
                }



            });

            
            $("#btn_desb_precio").on("click", function() {
               
                const { value: password } = Swal.fire({
                    title: 'Se necesitan permisos de administrador',
                    input: 'password',
                    inputLabel: 'Password',
                    inputPlaceholder: 'Ingresa el password',
                    inputAttributes: {
                        maxlength: 15,
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    }
                }).then((password) => {

                    var password = password.value;

                    $.ajax({
                        url: "/Caja/buscarPassword",
                        type: "POST",
                        data: {
                            password
                        },
                        dataType: 'json',
                        beforeSend: function() {
                            console.log("Procesando....");

                        },
                        success: function(respuesta) {
                            
                            if (respuesta.status == "success") {
                                console.log(respuesta);
                                
                                $(".precio_articulo").removeAttr('readonly');
                                $(".precio_articulo").css('border','solid 1px #000');
                                $("#precio_desbloquedo_por").val(respuesta.admin.utilerias_administradores_id);
                                                                
                            }else{
                                Swal.fire('Password incorrecto','','error');
                            }

                        },
                        error: function(respuesta) {
                            console.log(respuesta);
                        }

                    });
                });


            });

            $("#codigo_qr_venta").on("keyup", function(){
                // var estado = $("#residencia").val();
                var concidencia = $(this).val();

                $.ajax({
                    url: "/Caja/SearchConcidenciaUsers",
                    type: "POST",
                    data: {concidencia},
                    dataType: "json",
                    beforeSend: function() {
                        console.log("Procesando....");
                        $('#list_concidencias')
                            .find('option')
                            .remove()
                            .end();
                        // $('#list_concidencias')
                        //     .find('li')
                        //     .remove()
                        //     .end();

                    },
                    success: function(respuesta) {
                        console.log(respuesta);


                        $.each(respuesta, function(key, value) {
                            //console.log(key);
                            console.log(value);
                            $('#list_concidencias')
                                .append($('<option>', {
                                        'data-value': value.user_id 
                                    })
                                    .text(value.user_id+' - '+value.nombre + ' ' + value.apellidop + ' ' + value.apellidom + ' '+ value.usuario + ' ' + value.clave));

                            // $('#list_concidencias').append('<li>'+value.nombre+'</li>');


                        });

                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }

                });
            });



            $("#codigo_qr_venta").on('change', function() {
                codigo = $(this).val();                
                
                var split = codigo.split(" ");
                var user_id = split[0];
                // console.log(user_id);
                $("#codigo_qr_venta_hidden").val(user_id);
                $("#modal_user_id").val(user_id);

                $('#codigo_qr_venta').val('');

                console.log(user_id);

                 getSell(user_id);


            });

            function getSell(user_id) {

                // console.log(user_id)
                $.ajax({
                    url: "/Caja/getSell",
                    type: "POST",
                    data: {
                        user_id
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        console.log("Procesando....");
                        
                    },
                    success: function(respuesta) {
                        console.log(respuesta);
                        console.log(respuesta.status);
                        // console.log(respuesta);
                        if (respuesta.status == "success") {

                            // crearTabla(respuesta);
                            crearChecks(respuesta);
                            precios = respuesta.precios;
                            productos = respuesta.productos;
                            sumarPrecios(precios);
                            sumarProductos(productos);
                            $(".cont-totales").show();
                            $("#cont-descripcion").hide();
                            $("#btn_fact").show();
                            // $("#btn_desb_precio").show();
                            flag_descripcion = false; 
                            
                            // console.log(precios);
                            // console.log(productos);

                            
                        } else{
                            // console.log(Object.keys(respuesta).length);
                            // crearTabla(respuesta);
                           location.reload();
                           console.log("refrescar");
                        }
                    },
                    error: function(respuesta) {
                        Swal.fire('No se encontro ningun registro para este codigo','','error');
                        setTimeout(function(){
                            location.reload();
                        },1000)
                        console.log(respuesta);
                    }

                });
            }

           

            function crearChecks(respuesta) {
                console.log(respuesta.datos_user)
                $("#cont-cheks").html(respuesta.checks);
                $("#user_id").val(respuesta.datos_user.user_id);
                $("#nombre_completo").html(respuesta.nombre_completo);
                $("#correo_user").html(respuesta.datos_user.usuario);
                $("#telefono_user").html(respuesta.datos_user.telefono);
                $("#imprimir_comprobante").attr('href','/Caja/print/'+respuesta.datos_user.user_id+'/'+respuesta.datos_user.clave);

                //modal facturacion
                $("#business_name_iva").val(respuesta.datos_user.business_name_iva);
                $("#code_iva").val(respuesta.datos_user.code_iva);
                $("#email_receipt_iva").val(respuesta.datos_user.email_receipt_iva);
                $("#direccion").val(respuesta.datos_user.direccion);
                $("#postal_code_iva").val(respuesta.datos_user.postal_code_iva);
            }

            


            function format2(n, currency) {
                return currency + n.toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, '$1,');
            }

            $("table#lista_productos").on("click", "button.btn-delete", function() {
                var id_producto = $(this).attr('data-id-producto');
                var user_id = $("#user_id").val();

                Swal.fire({
                    title: '??Remover el producto?',
                    text: "",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Confirmar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: "/Caja/removePendientesPago",
                            type: "POST",
                            data: {
                                id_producto,
                                user_id
                            },
                            cache: false,
                            beforeSend: function() {
                                console.log("Procesando....");

                            },
                            success: function(respuesta) {

                                console.log(respuesta);
                                if (respuesta == "success") {
                                    // location.reload();
                                    var codigo = $("#codigo_qr_venta_hidden").val();
                                    getSell(codigo);
                                }



                            },
                            error: function(respuesta) {
                                console.log(respuesta);
                            }

                        });

                    }

                })

                // alert(id_producto);
                // alert(user_id);

            });

            $("#txt_pago").on('keyup', function() {
                
                var total_pesos = parseFloat($("#total_pesos").text());
                var total_pagar = $(this).val();
                var cambio = 0;


                if (total_pagar >= total_pesos) {
                    $("#btn_pagar").removeAttr('disabled');
                    cambio = total_pagar - total_pesos;
                    $("#total_cambio").html(cambio);
                    $("#total_cambio_formato").html(format2(cambio,''));

                    // console.log("se habilita");
                } else {
                    $("#btn_pagar").attr('disabled', 'disabled');
                    $("#total_cambio").html("");
                    $("#total_cambio_formato").html("");
                    // console.log("se desabilita");
                }
            });



            ///Pagos              
               

            
            $("#cont-cheks").on("change", "input[type=checkbox].checks_product", function() {
                var id_product = $(this).val();
                var precio = $(this).attr('data-precio');
                var cantidad = $("#numero_articulos" + id_product).val();
                var nombre_producto = $(this).attr('data-nombre-producto');

                if (this.checked) {

                    precios.push({
                        'id_product': id_product,
                        'precio': precio,
                        'cantidad': cantidad
                    });
                    sumarPrecios(precios);
                    

                    productos.push({
                        'id_product': id_product,
                        'precio': precio,
                        'cantidad': cantidad,
                        'nombre_producto': nombre_producto
                    });

                    sumarProductos(productos);

                } else if (!this.checked) {

                    for (var i = 0; i < precios.length; i++) {

                        if (precios[i].id_product === id_product) {
                            console.log("remover");
                            precios.splice(i, 1);

                            productos.splice(i, 1);
                            sumarPrecios(precios);
                            sumarProductos(productos);
                        } else if (precios[i].id_product === id_product && precios[i].cantidad === cantidad) {
                            precios.splice(i, 1);

                            productos.splice(i, 1);
                            sumarPrecios(precios);
                            sumarProductos(productos);

                        }
                    }

                    // $.ajax({
                    //     url: "/Home/removePendientesPago",
                    //     type: "POST",
                    //     data: {
                    //         id_product,cantidad
                    //     },
                    //     cache: false,
                    //     beforeSend: function() {
                    //         console.log("Procesando....");

                    //     },
                    //     success: function(respuesta) {

                    //         console.log(respuesta);
                    //         if(respuesta == "success"){
                    //             location.reload();
                    //         }


                    //     },
                    //     error: function(respuesta) {
                    //         console.log(respuesta);
                    //     }

                    // });
                }
                // console.log(productos);
                // sumarPrecios(precios);
                // sumarProductos(productos);

            });

            $("#cont-cheks").on("change", "select.select_numero_articulos", function() {

            // $(".select_numero_articulos").on("change", function() {
                var id_producto = $(this).attr('data-id-producto');
                var cantidad = $(this).val();
                var precio = $(this).attr('data-precio');
                var nombre_producto = $(this).attr('data-nombre-producto');

                if ($("#check_curso_" + id_producto).is(':checked')) {

                    for (var i = 0; i < precios.length; i++) {

                        if (precios[i].id_product === id_producto && precios[i].cantidad != cantidad) {
                            console.log("remover");
                            precios.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad
                            });

                            productos.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad,
                                'nombre_producto': nombre_producto
                            });

                            // precios.push({'id_product':id_product,'precio':precio,'cantidad':cantidad});
                        }

                    }
                    console.log(precios.length);

                    console.log(productos);

                    sumarPrecios(precios);

                }

            });


            $("#cont-cheks").on("click", "button.btn_desbloquear_precio", function() {

                var id_producto = $(this).attr('data-id-producto');

                const { value: password } = Swal.fire({
                    title: 'Se necesitan permisos de administrador',
                    input: 'password',
                    inputLabel: 'Password',
                    inputPlaceholder: 'Ingresa el password',
                    inputAttributes: {
                        maxlength: 15,
                        autocapitalize: 'off',
                        autocorrect: 'off'
                    }
                }).then((password) => {

                    var password = password.value;

                $.ajax({
                    url: "/Caja/buscarPassword",
                    type: "POST",
                    data: {
                        password
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        console.log("Procesando....");

                    },
                    success: function(respuesta) {
                        
                        if (respuesta.status == "success") {
                            console.log(respuesta);
                            
                            // $("#precio_articulo"+id_producto).removeAttr('readonly');
                            // $("#precio_articulo"+id_producto).css('border','solid 1px #000');
                            // $("#precio_desbloquedo_por").val(respuesta.admin.utilerias_administradores_id);

                            $(".precio_articulo").removeAttr('readonly');
                            $(".precio_articulo").css('border','solid 1px #000');
                            $("#precio_desbloquedo_por").val(respuesta.admin.utilerias_administradores_id);
                                                            
                        }else{
                            Swal.fire('Password incorrecto','','error');
                        }

                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }

                });
                    
            });

            
                

            $(".precio_articulo").on("change", function() {
               
                var id_producto = $(this).attr('data-id-producto');
                var cantidad = 1;
                var precio = $(this).val();
                var nombre_producto = $(this).attr('data-nombre-producto');

                

                $("#check_curso_" + id_producto).attr('data-precio',precio);

                // if ($("#check_curso_" + id_producto).is(':checked')) {

                    for (var i = 0; i < precios.length; i++) {

                        if (precios[i].id_product === id_producto) {
                            console.log("remover");
                            precios.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad
                            });

                            productos.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad,
                                'nombre_producto': nombre_producto
                            });

                            // precios.push({'id_product':id_product,'precio':precio,'cantidad':cantidad});
                        }

                    }
                    // console.log(precios.length);

                    // console.log(productos);

                    console.log("se ejecuta");

                    sumarPrecios(precios);
                    sumarProductos(productos);
                    $("#cont-descripcion").show(); 
                    flag_descripcion = true;

                // }
            });

            $(".select_numero_articulos").on("change", function() {
                var id_producto = $(this).attr('data-id-producto');
                var cantidad = $(this).val();
                var precio = $(this).attr('data-precio');
                var nombre_producto = $(this).attr('data-nombre-producto');

                if ($("#check_curso_" + id_producto).is(':checked')) {

                    for (var i = 0; i < precios.length; i++) {

                        if (precios[i].id_product === id_producto && precios[i].cantidad != cantidad) {
                            console.log("remover");
                            precios.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad
                            });

                            productos.splice(i, 1, {
                                'id_product': id_producto,
                                'precio': precio,
                                'cantidad': cantidad,
                                'nombre_producto': nombre_producto
                            });

                            // precios.push({'id_product':id_product,'precio':precio,'cantidad':cantidad});
                        }

                    }
                    console.log(precios.length);

                    console.log(productos);

                    sumarPrecios(precios);

                }
            });

        });


            function sumarPrecios(precios) {
                console.log(precios);

                // var sumaPrecios = <?= $total_pago ?>;
                // var sumaArticulos = <?= $total_productos ?>;

                var sumaPrecios = 0;
                var sumaArticulos = 0;

                precios.forEach(function(precio, index) {

                    console.log("precio " + index + " | id_product: " + precio.id_product + " precio: " + parseInt(precio.precio) + " cantidad: " + parseInt(precio.cantidad))

                    sumaPrecios += parseInt(precio.precio * precio.cantidad);
                    sumaArticulos += parseInt(precio.cantidad);


                });

                

                console.log("Suma precios " + sumaPrecios);

                $("#total_pesos").html((sumaPrecios).toFixed(2));
                $("#total_pesos_formato").html(format2(sumaPrecios,''));

                var total_pagar = $("#txt_pago").val();                
                var cambio = 0;
                if (total_pagar >= sumaPrecios) {
                    $("#btn_pagar").removeAttr('disabled');
                    cambio = total_pagar - sumaPrecios;
                    $("#total_cambio").html(cambio);
                    $("#total_cambio_formato").html(format2(cambio,''));

                    // console.log("se habilita");
                } else {
                    $("#btn_pagar").attr('disabled', 'disabled');
                    $("#total_cambio").html("");
                    $("#total_cambio_formato").html("");
                    // console.log("se desabilita");
                }
            

                

            }

            function sumarProductos(productos) {
                console.log(productos);
                var nombreProductos = '';

                productos.forEach(function(producto, index) {

                    console.log("precio " + index + " | id_product: " + producto.id_product + " precio: " + parseInt(producto.precio) + " cantidad: " + parseInt(producto.cantidad) + " producto: " + producto.nombre_producto)

                    nombreProductos += producto.nombre_producto+',';
                });

                console.log(nombreProductos);
                $("#item_name").val(nombreProductos);
                

            }




        });

        window.addEventListener("keypress", function(event){
            if (event.keyCode == 13){
                event.preventDefault();
            }
        }, false);
    </script>

</body>

<?php echo $footer; ?>

</html>