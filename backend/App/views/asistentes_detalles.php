<?php echo $header; ?>
<title>
    Asistentes Detalles - <?php echo $detalles_registro['nombre'] . ' '; echo $detalles_registro['apellido_paterno'] . ' '; echo $detalles_registro['apellido_materno']; ?> - APM - GRUPO LAHE
</title>
<body class="g-sidenav-show  bg-gray-100">
    <?php echo $asideMenu;?>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg position-sticky mt-4 top-1 px-0 mx-4 shadow-none border-radius-xl z-index-sticky" id="navbarBlur" data-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm">
                            <a class="opacity-3 text-dark" href="javascript:;">
                                <svg width="12px" height="12px" class="mb-1" viewBox="0 0 45 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <title>shop </title>
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                        <g transform="translate(-1716.000000, -439.000000)" fill="#252f40" fill-rule="nonzero">
                                            <g transform="translate(1716.000000, 291.000000)">
                                                <g transform="translate(0.000000, 148.000000)">
                                                    <path d="M46.7199583,10.7414583 L40.8449583,0.949791667 C40.4909749,0.360605034 39.8540131,0 39.1666667,0 L7.83333333,0 C7.1459869,0 6.50902508,0.360605034 6.15504167,0.949791667 L0.280041667,10.7414583 C0.0969176761,11.0460037 -1.23209662e-05,11.3946378 -1.23209662e-05,11.75 C-0.00758042603,16.0663731 3.48367543,19.5725301 7.80004167,19.5833333 L7.81570833,19.5833333 C9.75003686,19.5882688 11.6168794,18.8726691 13.0522917,17.5760417 C16.0171492,20.2556967 20.5292675,20.2556967 23.494125,17.5760417 C26.4604562,20.2616016 30.9794188,20.2616016 33.94575,17.5760417 C36.2421905,19.6477597 39.5441143,20.1708521 42.3684437,18.9103691 C45.1927731,17.649886 47.0084685,14.8428276 47.0000295,11.75 C47.0000295,11.3946378 46.9030823,11.0460037 46.7199583,10.7414583 Z"></path>
                                                    <path d="M39.198,22.4912623 C37.3776246,22.4928106 35.5817531,22.0149171 33.951625,21.0951667 L33.92225,21.1107282 C31.1430221,22.6838032 27.9255001,22.9318916 24.9844167,21.7998837 C24.4750389,21.605469 23.9777983,21.3722567 23.4960833,21.1018359 L23.4745417,21.1129513 C20.6961809,22.6871153 17.4786145,22.9344611 14.5386667,21.7998837 C14.029926,21.6054643 13.533337,21.3722507 13.0522917,21.1018359 C11.4250962,22.0190609 9.63246555,22.4947009 7.81570833,22.4912623 C7.16510551,22.4842162 6.51607673,22.4173045 5.875,22.2911849 L5.875,44.7220845 C5.875,45.9498589 6.7517757,46.9451667 7.83333333,46.9451667 L19.5833333,46.9451667 L19.5833333,33.6066734 L27.4166667,33.6066734 L27.4166667,46.9451667 L39.1666667,46.9451667 C40.2482243,46.9451667 41.125,45.9498589 41.125,44.7220845 L41.125,22.2822926 C40.4887822,22.4116582 39.8442868,22.4815492 39.198,22.4912623 Z"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-sm opacity-5 text-dark">Principal</li>
                        <li class="breadcrumb-item text-sm opacity-5"><a class="text-dark" href="/Asistentes/">Asistentes</a></li>
                        <li class="breadcrumb-item text-sm opacity-10 text-dark">Detalles</li>
                    </ol>
                </nav>
                <div class="sidenav-toggler sidenav-toggler-inner d-xl-block d-none ">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </div>
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

        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header p-3 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Detalles - Asistente AMH</h6>
                                    <p class="text-sm mb-0">
                                        Fecha de Alta: <b><?php echo $detalles_registro['date']; ?></b>
                                    </p>
                                    <p class="text-sm">
                                        Usuario: <b><?php echo $detalles['usuario']; ?></b>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row d-flex justify-content-center">

                                <div class="col-md-9 col-12">
                                    <hr class="horizontal dark mt-0 mb-4">
                                    <div class="row">
                                        <div class="col-lg-9 col-md-9 col-12">
                                            <div class="d-flex">
                                                <div>
                                                    <?php echo $img_asistente; ?>
                                                </div>
                                                <div>
                                                    <span class="text-lg font-weight-bold mb-2 mt-2"><?php echo $detalles_registro['nombre'] . ' '; echo $detalles_registro['apellido_paterno'] . ' '; echo $detalles_registro['apellido_materno']; ?>
                                                    <u><a  href="mailto:{$value['email']}"><h6 class="mb-2 text-smy text-black"><span class="fa fa-mail-bulk" style="font-size: 13px"></span> CORREO: <?php echo $detalles_registro['usuario'];?> </h6></a></u>
                                                    <h6 class="mb-2 text-smy text-black"><span class="fa fa-flag" style="font-size: 13px"></span>PAÍS: <?php echo $detalles_registro['pais'];?> </h6>
                                                    <h6 class="mb-2 text-smy text-black"><span class="fa fa-flag" style="font-size: 13px"></span>ESTADO: <?php echo $detalles_registro['estado'];?> </h6>
                                                    <!-- <h6 class="mb-2 text-smy text-black"><span class="fas fa-user-md style="font-size: 13px"></span>CATEGORÍA: <?php echo $detalles_registro['categoria'];?> </h6> -->
                                                    <br> <br>
                                                    <p class="text-sm mb-3"></p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-12 my-auto text-center">

                                            <form class="form-horizontal" action="" method="POST">
                                                <h6 class="mb-2 text-sm text-black">EDITAR USUARIO</h6>
                                                <button class="btn bg-gradient-pink text-white mb-0" type="button" title="Editar Asistente" data-toggle="modal" data-target="#editar-asistente"><i class="fa fa-edit"></i></button>

                                                <input id="input-email" type="text" class="form-control" value="<?php echo $email; ?>" readonly hidden>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <input type="hidden" id="user_id" name="user_id" value="<?=$id_asistente?>">
            <div class="row">
                <div class="col-lg-12 mx-auto">
                    <div class="card mb-4">
                        <div class="card-header p-3 pb-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6>Asignar Productos</h6>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-3 pt-0">
                            <div class="row d-flex justify-content-center">

                                <div class="col-md-9 col-12">
                                    <div class="table-responsive p-0">
                                        <table id="table_admin" class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Nombre
                                                    </th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Asignar</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php echo $tabla_pendientes; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
      
        <div class="modal fade" id="editar-asistente" tabindex="-1" role="dialog" aria-labelledby="editar-asistenteLabel" aria-hidden="true">
            <div class="modal-dialog" role="document" style="max-width: 800px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editar-asistenteLabel">Editar Asistente</h5>
                        <button type="button" class="btn bg-gradient-danger" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">X</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" id="update_detalles" action="" method="POST">
                        <input type="hidden" id="user_id_asis" name="user_id_asis" value="<?=$id_asistente?>">
                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-12 col-lg-4">
                                        <label class="form-label">Clave Socio APM *</label>
                                        <div class="input-group">
                                            <input id="clave_socio" name="clave_socio" maxlength="29" class="form-control" type="text" placeholder="SA937FD" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $detalles_registro['clave_socio']?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                    <div class="col-12 col-lg-2">
                                    </div>
                                    <!-- <div class="col-12 col-lg-4">
                                        <label class="form-label">Categoria Actual</label>
                                        <div class="input-group">
                                            <input id="categoria" readonly name="categoria" maxlength="29" class="form-control" type="text" placeholder="AGREGAR CATEGORIA" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $cate['categoria'] ?>">
                                        </div>
                                    </div> -->
                                </div>
                                <div class="row">
                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Nombre *</label>
                                        <div class="input-group">
                                            <input id="nombre" name="nombre" maxlength="29" class="form-control" type="text" placeholder="Alec" required="" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $detalles_registro['nombre']?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label class="control-label col-md-12 col-sm-1 col-xs-12" for="id_categoria">Categoría <span class="required"></span></label>
                                        <select class="multisteps-form__select form-control all_input_select" name="id_categoria" id="id_categoria">
                                            <option value="" disabled>Seleccione una opción</option>
                                            <?= $optionCate ?>
                                        </select>
                                    </div>
                                    <!-- <div class="col-12 col-lg-6">
                                        <label class="form-label">Segundo Nombre </label>
                                        <div class="input-group">
                                            <input id="segundo_nombre" name="segundo_nombre" maxlength="49" class="form-control" type="text" placeholder="Alec" onfocus="focused(this)" onfocusout="defocused(this)" value="{$detalles_registro['segundo_nombre']}" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div> -->
                                </div>

                                <div class="row">

                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Apellido Paterno *</label>
                                        <div class="input-group">
                                            <input id="apellido_paterno" name="apellido_paterno" maxlength="29" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $detalles_registro['apellido_paterno']?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-6">
                                        <label class="form-label">Apellido Materno *</label>
                                        <div class="input-group">
                                            <input id="apellido_materno" name="apellido_materno" maxlength="29" class="form-control" type="text" placeholder="Thompson" required="required" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $detalles_registro['apellido_materno']?>" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-12 col-6">
                                        <label class="form-label mt-4">Email Registrado y Verificado *</label>
                                        <div class="input-group">
                                            <input id="email" name="email" maxlength="49" class="form-control" type="email" placeholder="example@email.com" onfocus="focused(this)" onfocusout="defocused(this)" value="<?= $detalles_registro['usuario']?>" >
                                            <hr>
                                            <span id="msg_email" style="font-size: 0.75rem; font-weight: 700;margin-bottom: 0.5rem;"></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="button-row d-flex mt-4 col-12">
                                        <button class="btn bg-gradient-success ms-auto mb-0 mx-4" id="btn_upload" name="btn_upload" type="submit" title="Actualizar">Actualizar</button>
                                        <a class="btn bg-gradient-secondary mb-0 js-btn-prev" data-dismiss="modal" title="Prev">Cancelar</a>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

<script>
    $(document).ready(function() {
        $('#asistentes a').addClass('active');
        $('#asistentes .fa-users').addClass('text-white');


        $(".btn-asignar-producto").on("click",function(){
            // alert($(this).val());
            var id_producto = $(this).val();
            var user_id = $("#user_id").val();
            var id_pendiente_pago = $(this).attr('data-id-pendiente-pago');
            // alert(id_pendiente_pago);

            $.ajax({
                url: "/Asistentes/AsignarCurso",
                type: "POST",
                data: {
                    id_producto,user_id,id_pendiente_pago
                },
                dataType: 'json',
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {
                    console.log(respuesta)
                    if (respuesta.status == 'success') {
                       Swal.fire('Se asigno Correctamente','','success');
                       setTimeout(function(){
                            location.reload();
                       },1500);
                    } else {
                        Swal.fire('Error al asignar el curso contacte a soprte','','error');
                       setTimeout(function(){
                            location.reload();
                       },1500);
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });


        $('#generar_clave').on('click', function(event) {

            var link_a = $(location).attr('href');
            var clave_a = link_a.substr(link_a.indexOf('Detalles/') + 9, link_a.length);

            let email_user = '';

            var formData = new FormData(document.getElementById("update_detalles"));
            for (var value of formData) {
                if (value.includes('email')) {
                    email_user = value[1];
                }
            }

            $.ajax({
                url: "/Asistentes/generarClave/" + email_user,
                type: "POST",
                data: formData,
                // dataType: 'json',
                beforeSend: function() {
                    console.log("Procesando....");
                },
                success: function(respuesta) {

                    if (respuesta.status == 'success') {
                        if (respuesta.clave == 'ya_tiene') {
                            swal("!Ya tiene una clave generada!", "", "warning").
                            then((value) => {
                            });
                        } else {
                            swal("!Se generó la clave correctamente!", "", "success").
                            then((value) => {
                                window.location.replace("/Asistentes/Detalles/" + clave_a);
                            });
                        }
                        console.log(respuesta);
                        app.loadPicture();
                    } else {
                        swal("!No se pudo generar una clave para este usuario!", "", "warning").
                        then((value) => {
                            //window.location.replace("/Asistentes")
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta.statuss);
                }

            });


        });

        $("#update_detalles").on("submit", function(event) {
            event.preventDefault();

            var formData = new FormData(document.getElementById("update_detalles"));
            for (var value of formData.values()) {
                console.log(value);
            }

            $.ajax({
                url: "/Asistentes/Actualizar",
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

                    if (respuesta == 'success') {
                        swal("!Se actualizaron tus datos correctamente!", "", "success").
                        then((value) => {
                            window.location.reload();
                        });
                    } else {
                        swal("!Usted No Actualizó Nada!", "", "warning").
                        then((value) => {
                            //window.location.replace("/Asistentes")
                        });
                    }
                },
                error: function(respuesta) {
                    console.log(respuesta);
                }

            });
        });

        $("#email").on("keyup", function() {
            console.log($(this).val());
            $.ajax({
                type: "POST",
                async: false,
                url: "/Asistentes/isUserValidate",
                data: {
                    usuario: $(this).val()
                },
                success: function(data) {
                    console.log(data)
                    if (data == "true") {
                        //el usuario ya existe
                        $("#btn_upload").css('display', 'none');
                        $("#msg_email").css('color', 'red');
                        $("#msg_email").html('Este correo ya se ha registrado');

                    } else {
                        $("#btn_upload").css('display', 'flex');
                        $("#msg_email").css('color', 'red');
                        $("#msg_email").html('');
                    }
                }
            });
        });

    });
</script>

<?php echo $footer; ?>