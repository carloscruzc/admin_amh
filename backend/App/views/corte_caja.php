<?php echo $header; ?>
<style>
    .font-totales{
        font-size: 25px;
        font-weight: bold;
    }
</style>

<body class="g-sidenav-show  bg-gray-100">
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <div class="row">
            <div class="col-11 m-auto">
                <div class="mt-7 m-auto">
                    <div class="card card-body mt-n6 overflow-hidden m-5">
                        <div class="row mb-0">
                            <div class="col-auto">
                                <div class="bg-gradient-pink avatar avatar-xl position-relative">
                                    <!-- <img src="../../assets/img/bruce-mars.jpg" alt="profile_image" class="w-100 border-radius-lg shadow-sm"> -->
                                    <span class="fa fa-bell " style="font-size: xx-large;"></span>
                                </div>
                            </div>
                            <div class="col-auto my-auto">
                                <div class="h-100">
                                    <h5 class="mb-0">
                                        CORTE CAJA 
                                    </h5>
                                    <h6><b><?php echo $nombre; ?></b></h6>
                                    <p class="mb-0 font-weight-bold text-sm">
                                    </p>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3">
                                <!-- <div class="nav-wrapper position-relative end-0">
                                    <ul class="nav nav-pills nav-fill p-1 bg-transparent" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1 active" href="#cam1" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                                <span class="fa fa-clock-o"></span>
                                                <span class="ms-1">Registro</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link mb-0 px-0 py-1" id="lista-tab" href="#cam2" data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                                <span class="fa fa-check-circle-o"></span>
                                                <span class="ms-1">Lista</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show position-relative active height-350 border-radius-lg" id="cam1" role="tabpanel" aria-labelledby="cam1">

                <div class="mt-7">
                    <div class="row">
                        <div class="col-10 m-auto">
                            <div class="card card-body mt-n6 overflow-hidden">
                                <div class="col-12">
                                    <div class="">
                                        <div class="col-auto">
                                            <div class="row mt-4">
                                                <div class="col-lg-3 col-sm-6">
                                                    <div class="card h-100">
                                                        <div class="card-header pb-0 p-3">

                                                            <div class="row gx-2 gx-sm-3">
                                                                <div class="col">
                                                                    <div class="form-group">
                                                                        <input style="font-size: 35px" type="text" id="codigo_qr_venta" name="codigo_qr_venta" class="form-control form-control-lg text-center" minlength="11" maxlength="11" autocomplete="off" autocapitalize="off" autofocus>

                                                                        <input style="font-size: 35px" type="hidden" id="codigo_qr_venta_hidden" name="codigo_qr_venta_hidden" class="form-control form-control-lg text-center" minlength="11" maxlength="11" autocomplete="off" autocapitalize="off" autofocus>

                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="d-flex justify-content-between">
                                                                <h6 class="mb-0">Nombre: <br> <span id="nombre_completo" class="text-thin">Nombre</span> </h6>
                                                                <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Información del asistente">
                                                                    <i class="fas fa-info" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <!-- <div class="card-body"> -->
                                                        <div class="row m-2">
                                                            <div class="col-5">
                                                                <!-- <img class="w-100 h-100 avatar" id="img_asistente" src="/img/user.png" alt="user"> -->
                                                            </div>
                                                            <!-- <div class="col-6">
                                                                <h6>Especialidad: <span class="text-thin" id="especialidad_user"> Ninguna</span></h6>
                                                              
                                                            </div> -->
                                                        </div>
                                                        <br>
                                                        <div class="row m-2">
                                                            <h6>Correo: <span class="text-thin" id="correo_user"> _____</span></h6>
                                                            <h6>Teléfono: <span class="text-thin" id="telefono_user"> 00 0000 0000</span></h6>
                                                            <input type="hidden" id="user_id" name="user_id">

                                                            <a href="" id="generar_gafete" target="_blank" style="display: none;">gafete</a>
                                                            <a href="" id="imprimir_comprobante" target="_blank" style="display: none;">comprobante</a>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-9 col-sm-6 mt-sm-0 mt-4">
                                                    <div class="card">
                                                        <div class="card-header pb-0 p-3">
                                                            <div class="d-flex justify-content-between">
                                                                <!-- <h6 class="mb-0"><span class="fa fa-list-alt"></span> <?php echo $nombre; ?></h6> -->
                                                                <button type="button" class="btn btn-icon-only btn-rounded btn-outline-secondary mb-0 ms-2 btn-sm d-flex align-items-center justify-content-center" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="<?php echo $descripcion; ?>">
                                                                    <i class="fas fa-info" aria-hidden="true"></i>
                                                                </button>
                                                            </div>
                                                            <div class="card p-4" style="overflow-y: auto;">
                                                                <table id="lista_productos" class="align-items-center mb-0 table table-borderless dataTable no-footer">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Producto</th>
                                                                            <th>Cantidad</th>
                                                                            <th>Precio Unitario USD</th>
                                                                            <th>Precio Unitario pesos $</th>
                                                                            <th>Total USD</th>
                                                                            <th>Total $</th>
                                                                        </tr>
                                                                    </thead>

                                                                    <tbody>
                                                                        <?php echo $tabla; ?>

                                                                    </tbody>

                                                                </table>

                                                            </div>

                                                            <div class="row mt-3">
                                                                <div class="col-md-6">
                                                                <div class="cont-totales">
                                                                            <div>
                                                                                <span class="font-totales">Total USD: <span id="total_usd"></span></span>

                                                                            </div>
                                                                            <div>

                                                                                <span class="font-totales">Total pesos mexicanos: $ <span id="total_pesos"></span></span>
                                                                            </div>
                                                                            <br>
                                                                            <div>

                                                                                <span class="font-totales">Cambio pesos mexicanos: $ <span id="total_cambio"></span></span>
                                                                            </div>
                                                                        </div>
                                                                    

                                                                </div>

                                                                <div class="col-md-6 cont-totales"  style="display: none;">
                                                                    <div style="display:flex; justify-content: space-evenly;">
                                                                        

                                                                        <div id="cont-input-pay">
                                                                            <div>
                                                                                <label>Metodo de Pago *</label>
                                                                                <select class="form-control" id="metodo_pago" name="metodo_pago" style="width: auto; display:none;">
                                                                                    <option value="">Seleccione una opción</option>
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
                                                                    <!-- <div style="display:flex; justify-content:end;"> -->
                                                                    <!-- <select class="form-control" id="metodo_pago" name="metodo_pago" style="width: auto; display:none;">
                                                                        <option value="">Seleccione una opción</option>
                                                                        <option value="Efectivo">Efectivo</option>
                                                                        <option value="Tarjeta">Tarjeta Credito / Debito</option>

                                                                    </select> -->
                                                                    <!-- </div> -->
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div style="display:flex; justify-content:end;">

                                                                        <button id="btn_pagar" class="btn btn-primary" style="display: none;" disabled>Pagar</button>
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
            </div>



            <div class="tab-pane fade position-relative height-350 border-radius-lg" id="cam2" role="tabpanel" aria-labelledby="cam2">
                <div class="row">
                    <div class="col-10 m-auto">
                        <div class="card p-4" style="overflow-y: auto;">
                            <table id="lista-reg" class="align-items-center mb-0 table table-borderless dataTable no-footer">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Precio Unitario</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php echo $tabla; ?>

                                </tbody>

                            </table>

                        </div>


                    </div>
                </div>

            </div>
        </div>



    </main>


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
                    // alert('Se está borrando');

                },
                success: function(respuesta) {
                    console.log(respuesta);
                    console.log('despues de borrar');
                    // alert('Bien borrado');
                    swal("¡Se borró correctamente!", "", "success").
                    then((value) => {
                        $("#codigo_qr_venta").focus();
                        window.location.reload();
                    });
                },
                error: function(respuesta) {
                    console.log(respuesta);
                    // alert('Error');
                    swal("¡Ha ocurrido un error al intentar borrar el registro!", "", "warning").
                    then((value) => {
                        $("#codigo_qr_venta").focus();
                    });
                }
            })
        }

        // function bloquearRegistro() {
        //     let codigo = '';
        //     var link_a = $(location).attr('href');
        //     var clave_a = link_a.substr(link_a.indexOf('codigo/') + 7, link_a.length);

        //     let date = new Date();

        //     let anio = date.getFullYear();
        //     let mes = (parseInt(date.getMonth()) + 1);
        //     let dia = date.getDate();

        //     console.log(date);
        //     console.log(anio + ' ' + mes + ' ' + dia);

        //     let mes_asist = parseInt($('#fecha').html().substr(5, 2));
        //     let dia_asist = parseInt($('#fecha').html().substr(8, 2));
        //     let anio_asist = parseInt($('#fecha').html().substr(0, 4));

        //     // console.log(anio_asist);

        //     if (mes != mes_asist || dia != dia_asist || anio != anio_asist) {
        //         document.getElementById('codigo_qr_venta').setAttribute('disabled', '');
        //         if (mes_asist < 9) {
        //             if (dia < dia_asist || mes < mes_asist || anio < anio_asist) {
        //                 Swal.fire('¡El evento que registro su administrador ocurrirá el <br>' + dia_asist + '-0' + mes_asist + '-' + anio_asist + '!', 'Contacte a su administrador', "warning").
        //                 then((value) => {
        //                     $("#codigo_qr_venta").focus();
        //                 });
        //             } else if (dia > dia_asist || mes > mes_asist || anio > anio_asist) {
        //                 Swal.fire('¡El evento que registro su administrador ya ocurrió el <br>' + dia_asist + '-0' + mes_asist + '-' + anio_asist + '!', 'Contacte a su administrador', "warning").
        //                 then((value) => {
        //                     $("#codigo_qr_venta").focus();
        //                 });
        //             }
        //         } else {
        //             Swal.fire('¡El evento que registro su administrador ya ocurrió el ' + dia_asist + '-' + mes_asist + '-' + anio_asist + '! Contacte a su administrador', "", "warning").
        //             then((value) => {
        //                 $("#codigo_qr_venta").focus();
        //             });
        //         }
        //     }
        // }

        $(document).ready(function() {

            let codigo = '';
            var link_a = $(location).attr('href');
            var clave_a = link_a.substr(link_a.indexOf('codigo/') + 7, link_a.length);

            // bloquearRegistro();

            // mostrarDatos(clave_a);

            // var table = $('#lista_productos').DataTable({
            //     "drawCallback": function(settings) {
            //         $('.current').addClass("btn bg-gradient-musa btn-rounded").removeClass("paginate_button");
            //         $('.paginate_button').addClass("btn").removeClass("paginate_button");
            //         $('.dataTables_length').addClass("m-4");
            //         $('.dataTables_info').addClass("mx-4");
            //         $('.dataTables_filter').addClass("m-4");
            //         $('input').addClass("form-control");
            //         $('select').addClass("form-control");
            //         $('.previous.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
            //         $('.next.disabled').addClass("btn-outline-info opacity-5 btn-rounded mx-2");
            //         $('.previous').addClass("btn-outline-info btn-rounded mx-2");
            //         $('.next').addClass("btn-outline-info btn-rounded mx-2");
            //         $('a.btn').addClass("btn-rounded");
            //         $('.odd').addClass("bg-gray-conave-100");
            //     },
            //     "language": {

            //         "sProcessing": "Procesando...",
            //         "sLengthMenu": "Mostrar _MENU_ registros",
            //         "sZeroRecords": "No se encontraron resultados",
            //         "sEmptyTable": "Ningún dato disponible en esta tabla",
            //         "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            //         "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            //         "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            //         "sInfoPostFix": "",
            //         "sSearch": "Buscar:",
            //         "sUrl": "",
            //         "sInfoThousands": ",",
            //         "sLoadingRecords": "Cargando...",
            //         "oPaginate": {
            //             "sFirst": "Primero",
            //             "sLast": "Último",
            //             "sNext": "Siguiente",
            //             "sPrevious": "Anterior"
            //         },
            //         "oAria": {
            //             "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            //             "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            //         }

            //     }
            // });


            function mostrarDatos(clave) {
                $.ajax({
                    url: "/RegistroAsistencia/mostrarLista/" + clave,
                    type: "POST",
                    dataType: 'json',
                    beforeSend: function() {
                        // $('#lista-reg > tbody').empty();
                        console.log("Procesando....");

                    },
                    success: function(respuesta) {
                        console.log(respuesta);
                        // $('#lista-reg > tbody').empty();
                        console.log('despues de borrar');

                        $.each(respuesta, function(index, el) {

                            // $('#lista-reg > tbody:last-child').append(
                            //         '<tr>'+
                            //             '<td>'+el.nombre_completo+'</td>'+
                            //             '<td><u><a href="mailto:'+el.email+'"><span class="fa fa-mail-bulk"> </span> '+el.email+'</a></u></td>'+
                            //             '<td><u><a href="https://api.whatsapp.com/send?phone=52'+el.nombre_linea+'&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><span class="fa fa-whatsapp" style="color:green;"> </span> '+el.nombre_linea+'</a></u></td>'+
                            //             '<td>'+el.nombre_linea+'</td>'+
                            //             '<td>'+el.nombre_bu+'</td>'+                
                            //         '</tr>');

                            // $('#lista-reg').empty();
                            // table.row.add([
                            //     // el.nombre_completo,
                            //     // el.email,
                            //     // el.telefono,
                            //     // el.nombre_linea,
                            //     // el.nombre_bu
                            //     '<td>'+el.nombre_completo+'</td>',
                            //     '<td><u><a href="mailto:'+el.email+'"><span class="fa fa-mail-bulk"> </span> '+el.email+'</a></u></td>',
                            //     '<td><u><a href="https://api.whatsapp.com/send?phone=52'+el.nombre_linea+'&text=Buen%20d%C3%ADa,%20te%20contacto%20de%20parte%20del%20Equipo%20Grupo%20LAHE%20%F0%9F%98%80" target="_blank"><span class="fa fa-whatsapp" style="color:green;"> </span> '+el.nombre_linea+'</a></u></td>',
                            //     '<td>'+el.nombre_linea+'</td>',
                            //     '<td>'+el.nombre_bu+'</td>'
                            // ]).draw();
                        });

                        // var tables = $('#lista-reg').DataTable();



                    },
                    error: function(respuesta) {
                        console.log(respuesta);
                    }
                })
            }

            $("#btn_pagar").on("click", function() {
                // alert("funciona");
                var metodo_pago = $("#metodo_pago").val();
                var user_id = $("#user_id").val();
                var total_usd = $("#total_usd").text();
                var total_pesos = $("#total_pesos").text();
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
                                    user_id,
                                    metodo_pago,
                                    total_usd,
                                    total_pesos
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
                                            $('#generar_gafete')[0].click();
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
                } else {
                    //seleccionar metodo de pago
                    Swal.fire('Selecciona un metodo de pago', '', 'info');
                }



            });



            $("#codigo_qr_venta").on('change', function() {
                codigo = $('#codigo_qr_venta').val();
                $("#codigo_qr_venta_hidden").val(codigo);
                console.log(codigo);

                $('#codigo_qr_venta').val('');

                console.log(codigo);

                getSell(codigo);


            });

            function getSell(codigo) {
                $.ajax({
                    url: "/Caja/getSell",
                    type: "POST",
                    data: {
                        codigo
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        console.log("Procesando....");
                    },
                    success: function(respuesta) {

                        console.log(respuesta.status);
                        console.log(respuesta);
                        if (respuesta.status == "success") {

                            crearTabla(respuesta);

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

            function crearTabla(respuesta) {
                var table = '';
                var total_usd = 0;
                var total_pesos = 0;

                if(Object.keys(respuesta).length > 0){
                    
                    $("#imprimir_comprobante").attr('href','/Caja/print/'+respuesta.datos_user.user_id+'/'+respuesta.datos_user.clave);
                    $("#generar_gafete").attr('href','/RegistroAsistencia/abrirpdfGafete/'+respuesta.datos_user.clave_user);
                    $("#user_id").val(respuesta.datos_user.user_id);
                    $("#nombre_completo").html(respuesta.nombre_completo);
                    $("#correo_user").html(respuesta.datos_user.usuario);
                    $("#telefono_user").html(respuesta.datos_user.telephone);
                    $(".cont-totales").show();
                    $("#btn_pagar").show();
                    $("#metodo_pago").show();


                    $.each(respuesta.productos, function(key, value) {
                        var precio = 0;
                        var socio = "";
                        // console.log("funcioina");
                        // console.log(value.es_congreso);
                        // console.log(value.es_servicio);
                        // console.log(value.es_curso);

                        // if (value.es_congreso == 1) {
                        //     precio = value.amout_due;
                        // } else if (value.es_servicio == 1) {
                        //     precio = value.precio_publico;
                        // } else if (value.es_curso == 1) {
                        //     precio = value.precio_publico;
                        // }

                        if(value.es_congreso == 1 && value.clave_socio == ""){
                            precio = value.amout_due;
                            socio = "";
                        }else if(value.es_congreso == 1 && value.clave_socio != ""){
                            precio = value.amout_due;
                            socio = "";
                        }
                        else if(value.es_servicio == 1 && $value.clave_socio == ""){
                            precio = value.precio_publico;
                            socio = "";
                        }else if(value.es_servicio == 1 && $value.clave_socio != ""){
                            precio = 0;
                            socio = "Socio APM - Sin Costo";
                        }
                        else if(value.es_curso == 1  && value.clave_socio == ""){
                            precio = value.precio_publico;
                        }else if(value.es_curso == 1  && value.clave_socio != ""){
                            precio = 0;
                            socio = "Socio APM - Sin Costo";
                        }

                        table += `<tr>
                                    <td><button class="btn btn-danger btn-sm btn-icon-only btn-delete" style="margin-top: 10px; margin-right:10px;" value="${value.id_pendiente_pago}" data-id-producto="${value.id_producto}">x</button>${value.nombre}</td>
                                    <td>${value.cantidad}</td>
                                    <td>${precio} USD</td>
                                    <td>$ ${precio * respuesta.tipo_cambio}</td>
                                    <td>${precio * value.cantidad} USD</td>
                                    <td>$ ${(precio * value.cantidad) * respuesta.tipo_cambio}</td>
                                </tr>`;

                        total_usd += precio * value.cantidad;
                        total_pesos += (precio * value.cantidad) * respuesta.tipo_cambio;

                    });

                    $("#total_usd").html(total_usd);
                    $("#total_pesos").html(total_pesos);

                    $("#lista_productos").find('tbody').html(table);

                }


            }

            $("table#lista_productos").on("click", "button.btn-delete", function() {
                var id_producto = $(this).attr('data-id-producto');
                var user_id = $("#user_id").val();

                Swal.fire({
                    title: '¿Remover el producto?',
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

                    // console.log("se habilita");
                } else {
                    $("#btn_pagar").attr('disabled', 'disabled');
                    $("#total_cambio").html("");
                    // console.log("se desabilita");
                }
            });




        });
    </script>

</body>

<?php echo $footer; ?>

</html>