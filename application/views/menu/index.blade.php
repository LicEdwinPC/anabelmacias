@layout('template/estructura')
@section('contenido')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Notice-->
            <div class="alert alert-custom alert-white alert-shadow fade show gutter-b" role="alert">
                <div class="alert-icon">
                    <span class="svg-icon svg-icon-primary svg-icon-xl">
                        <!--begin::Svg Icon | path:assets/media/svg/icons/Tools/Compass.svg-->
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24" />
                                <path d="M7.07744993,12.3040451 C7.72444571,13.0716094 8.54044565,13.6920474 9.46808594,14.1079953 L5,23 L4.5,18 L7.07744993,12.3040451 Z M14.5865511,14.2597864 C15.5319561,13.9019016 16.375416,13.3366121 17.0614026,12.6194459 L19.5,18 L19,23 L14.5865511,14.2597864 Z M12,3.55271368e-14 C12.8284271,3.53749572e-14 13.5,0.671572875 13.5,1.5 L13.5,4 L10.5,4 L10.5,1.5 C10.5,0.671572875 11.1715729,3.56793164e-14 12,3.55271368e-14 Z" fill="#000000" opacity="0.3" />
                                <path d="M12,10 C13.1045695,10 14,9.1045695 14,8 C14,6.8954305 13.1045695,6 12,6 C10.8954305,6 10,6.8954305 10,8 C10,9.1045695 10.8954305,10 12,10 Z M12,13 C9.23857625,13 7,10.7614237 7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 C17,10.7614237 14.7614237,13 12,13 Z" fill="#000000" fill-rule="nonzero" />
                            </g>
                        </svg>
                        <!--end::Svg Icon-->
                    </span>
                </div>
                <!-- ALERTAS -->
                <?php
                if (strlen($this->session->flashdata('message')) > 0) {
                ?>
                    <div class="alert-text">
                        <?php
                        echo  $this->session->flashdata('message');
                        ?>
                        <br />
                    </div>
                <?php
                }
                ?>

            </div>
            <!--end::Notice-->
            <!--begin::Example-->
            <!--begin::Card-->
            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                        <h3 class="card-label"></h3>
                    </div>
                    <div class="card-toolbar">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-toggle="modal" data-target="#exampleModalCenter">
                            <i class="ki ki-plus icon-md mr-2"></i>Agregar Menu
                        </button>
                        
                    </div>
                </div>
                <div class="card-body">
                    <div id="kt_calendar"></div>
                </div>
            </div>
            <!--end::Card-->
            
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>


<!-- Modal-->
<div class="modal fade" id="exampleModalCenter" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <form class="form" novalidate="novalidate" id="frmAddMenu">
                    <div class="form-group">    
                        <div class="input-group date">
                            <input id="kt_datepicker_2" name="fecha_menu" type="text" class="form-control" readonly  placeholder="Selecciona la fecha"/>
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <i class="la la-calendar-check-o"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Comida <span class="text-danger">*</span></label>
                        <input type="text" name="comida" class="form-control form-control-solid h-auto py-5 px-6"  placeholder="Nombre del Platillo" autocomplete="off"/>
                        <span class="form-text text-muted">Ingresa el nombre de la comida</span>
                    </div>
                    <div class="form-group">
                        <label>Postre <span class="text-danger">*</span></label>
                        <input type="text" name="postre" class="form-control form-control-solid h-auto py-5 px-6"  placeholder="Nombre del Postre" autocomplete="off"/>
                        <span class="form-text text-muted">Ingresa el nombre del postre.</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="UI" name="UI" value="<?php echo base64_encode($this->ion_auth->user()->row()->id);?>">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" id="BtnGuardaMenu" class="btn btn-primary font-weight-bold">Guardar</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')

<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo THEME_URL . 'assets/plugins/custom/fullcalendar/fullcalendar.bundle.js'; ?>"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo THEME_URL . 'assets/js/pages/features/calendar/basic.js'; ?>"></script>
<!--end::Page Scripts-->
<script src="<?php echo THEME_URL . 'assets/plugins/custom/fullcalendar/core/index.global.js';?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-datepicker.es.js')?>"></script>
<script>

    jQuery(document).ready(function() {
        KTBootstrapDatepicker.init();
        KTMenus.init();
        var PATH = "<?php echo site_url();?>";
    });

    var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

			var jsonMenus = <?php echo isset($datos) ? $datos : "[]";?>
    
			

    // Class definition

    var KTBootstrapDatepicker = function () {

    var arrows;
    if (KTUtil.isRTL()) {
        arrows = {
            leftArrow: '<i class="la la-angle-right"></i>',
            rightArrow: '<i class="la la-angle-left"></i>'
        }
    } else {
        arrows = {
            leftArrow: '<i class="la la-angle-left"></i>',
            rightArrow: '<i class="la la-angle-right"></i>'
        }
    }

    // Private functions
    var demos = function () {
        
        // input group layout
        $('#kt_datepicker_2').datepicker({
            language: 'es',
            rtl: KTUtil.isRTL(),
            todayHighlight: true,
            orientation: "bottom left",
            templates: arrows,
            datesDisabled: <?php echo isset($fechas_inhabiles) ? $fechas_inhabiles : "[]";?>,
        });

        
    }

    return {
        // public functions
        init: function() {
            demos();
        }
    };
    }();

    

    var KTMenus = function() {

        var _handleMenusForm = function() {
            var validation;

            // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
            validation = FormValidation.formValidation(
                KTUtil.getById('frmAddMenu'), {
                    fields: {
                        fecha_menu: {
                            validators: {
                                notEmpty: {
                                    message: 'La Fecha  es requerida'
                                }
                                // date: {
                                //     format: 'YYYY/MM/DD',
                                //     message: 'El valor no es una fecha valida',
                                // },
                            }
                        },
                        comida: {
                            validators: {
                                notEmpty: {
                                    message: 'La descripcion de la comida es requerida'
                                }
                            }
                        },
                        postre: {
                            validators: {
                                notEmpty: {
                                    message: 'La descripcion del postre es requerida'
                                }
                            }
                        }
                    },
                    plugins: {
                        trigger: new FormValidation.plugins.Trigger(),
                        submitButton: new FormValidation.plugins.SubmitButton(),
                        // defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
                        bootstrap: new FormValidation.plugins.Bootstrap()
                    }
                }
            );

            $('#BtnGuardaMenu').on('click', function(e) 
            {
                    e.preventDefault();

                    validation.validate().then(function(status) {
                        if (status == 'Valid') {

                              console.log(status);
                              var URL  = "<?php echo site_url();?>";

                            $.ajax({
                                url:  URL+ 'Menu/agregar',
                                method: "POST",
                                dataType: "json",
                                data: $('#frmAddMenu').serialize(),
                                success: function(result) {
                                    // debugger;
                                    // console.log(result);

                                    if (result.estatus == 'error') {
                                        swal.fire({
                                            text: result.mensaje,
                                            icon: "error",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, vamos!",
                                            customClass: {
                                                confirmButton: "btn font-weight-bold btn-light-primary"
                                            }
                                        }).then(function() {
                                            // KTUtil.scrollTop();
                                        });
                                    } else {
                                        swal.fire({
                                            text: result.mensaje,
                                            icon: "success",
                                            buttonsStyling: false,
                                            confirmButtonText: "Ok, vamos!",
                                            customClass: {
                                                confirmButton: "btn font-weight-bold btn-light-primary"
                                            }
                                        }).then(function() {
                                            CierraPopup();
											
                                            // window.location.href=PATH +'auth/index';
                                        });

                                    }

                                },
                                error: function() {
                                    swal.fire({
                                        text: result.mensaje,
                                        icon: "error",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, vamos!",
                                        customClass: {
                                            confirmButton: "btn font-weight-bold btn-light-primary"
                                        }
                                    }).then(function() {
                                        // KTUtil.scrollTop();
                                    });
                                }
                            });

                            
                        } else {
                            swal.fire({
                                text: "Disculpa, parece que se detectaron algunos errores, por favor intentalo nuevamente.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, vamos!",
                                customClass: {
                                    confirmButton: "btn font-weight-bold btn-light-primary"
                                }
                            }).then(function() {
                                CierraPopup();
                                //KTUtil.scrollTop();
                            });
                        }
                    });
            });
        }

        // Public Functions
        return {
            // public functions
            init: function() {
                _handleMenusForm();
            }
        };

    }();

   function CierraPopup(){
        $("#exampleModalCenter").modal('hide');//ocultamos el modal
        $('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
        $('.modal-backdrop').remove();//eliminamos el backdrop del modal
   }

   

</script>
<script src="<?php echo THEME_URL . 'assets/plugins/custom/fullcalendar/core/locales/es.global.js';?>"></script>

@endsection
