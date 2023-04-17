"use strict";

var KTCalendarBasic = function() {

    return {
        //main function to initiate the module
        init: function() {
            var todayDate = moment().startOf('day');
            var YM = todayDate.format('YYYY-MM');
            var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
            var TODAY = todayDate.format('YYYY-MM-DD');
            var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

            var calendarEl = document.getElementById('kt_calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                // eventClick: function(info) {
                //     var eventObj = info.event;

                //     if (eventObj.url) {
                //         var id_menu = 0;

                //         console.log(eventObj.id);

                //         $.ajax({
                //             url: 'Menu/delete',
                //             method: "POST",
                //             dataType: "json",
                //             data: { id: eventObj.id },
                //             success: function(result) {
                //                 // debugger;
                //                 // console.log(result);

                //                 if (result.estatus == 'error') {
                //                     swal.fire({
                //                         text: result.mensaje,
                //                         icon: "error",
                //                         buttonsStyling: false,
                //                         confirmButtonText: "Ok, vamos!",
                //                         customClass: {
                //                             confirmButton: "btn font-weight-bold btn-light-primary"
                //                         }
                //                     }).then(function() {
                //                         KTUtil.scrollTop();
                //                     });
                //                 } else {
                //                     swal.fire({
                //                         text: result.mensaje,
                //                         icon: "success",
                //                         buttonsStyling: false,
                //                         confirmButtonText: "Ok, vamos!",
                //                         customClass: {
                //                             confirmButton: "btn font-weight-bold btn-light-primary"
                //                         }
                //                     }).then(function() {
                //                         // CierraPopup();

                //                         window.location.href = PATH + 'menu/index';
                //                         // $("#kt_calendar").fullCalendar('render');
                //                         // ReloadCalendar();
                //                     });

                //                 }

                //             },
                //             error: function() {
                //                 swal.fire({
                //                     text: result.mensaje,
                //                     icon: "error",
                //                     buttonsStyling: false,
                //                     confirmButtonText: "Ok, vamos!",
                //                     customClass: {
                //                         confirmButton: "btn font-weight-bold btn-light-primary"
                //                     }
                //                 }).then(function() {
                //                     // KTUtil.scrollTop();
                //                 });
                //             }
                //         });


                //         // alert(
                //         //     'Clicked ' + eventObj.title + '.\n' +
                //         //     'Will open ' + eventObj.url + ' in a new tab'
                //         // );

                //         // window.open(eventObj.url);

                //         info.jsEvent.preventDefault(); // prevents browser from following link in current tab.
                //     } else {
                //         // alert('Clicked ' + eventObj.title);
                //     }
                // },
                locale: 'es',
                plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
                themeSystem: 'bootstrap',

                isRTL: KTUtil.isRTL(),

                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },

                height: 800,
                contentHeight: 780,
                aspectRatio: 3, // see: https://fullcalendar.io/docs/aspectRatio

                nowIndicator: true,
                now: TODAY + 'T09:25:00', // just for demo

                views: {
                    dayGridMonth: { buttonText: 'mes' },
                    timeGridWeek: { buttonText: 'semana' },
                    timeGridDay: { buttonText: 'día' }
                },

                defaultView: 'dayGridMonth',
                defaultDate: TODAY,

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                navLinks: true,
                events: jsonMenus,

                eventRender: function(info) {
                    var element = $(info.el);

                    if (info.event.extendedProps && info.event.extendedProps.description) {
                        if (element.hasClass('fc-day-grid-event')) {
                            element.data('content', info.event.extendedProps.description);
                            element.data('placement', 'top');
                            KTApp.initPopover(element);
                        } else if (element.hasClass('fc-time-grid-event')) {
                            element.find('.fc-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        } else if (element.find('.fc-list-item-title').lenght !== 0) {
                            element.find('.fc-list-item-title').append('<div class="fc-description">' + info.event.extendedProps.description + '</div>');
                        }
                    }
                },
                dateClick: function(info) {
                    limpiarFormulario();
                    var fecha = info.dateStr;
                    var arrFecha = fecha.split("-");
                    var fecha2 = arrFecha[2] + "/" + arrFecha[1] + "/" + arrFecha[0];

                    $('#BtnGuardaMenu').show();
                    $('#BotonModificar').hide();
                    $('#BotonBorrar').hide();
                    $('#kt_datepicker_2').val(fecha2);

                    $("#exampleModalCenter").modal();
                },
                eventClick: function(info) {
                    // var fecha = info.event.dateStr;

                    console.log(info);
                    // var arrFecha = fecha.split("-");
                    // var fecha2 = arrFecha[2] + "/" + arrFecha[1] + "/" + arrFecha[0];
                    $('#BotonModificar').show();
                    $('#BotonBorrar').show();
                    $('#BtnGuardaMenu').hide();
                    $('#UI').val(info.event.id);
                    $('#comida').val(info.event.title);
                    $('#postre').val(info.event.title);
                    $('#kt_datepicker_2').val(moment(info.event.start).format("DD/MM/YYYY"));
                    $("#exampleModalCenter").modal();
                }
            });

            calendar.render();
        }
    };
}();

// funciones que interactuan con el formulario de entrada de datos
function limpiarFormulario() {
    $('#fecha_menu').val('');
    $('#comida').val('');
    $('#postre').val('');
}

jQuery(document).ready(function() {
    KTCalendarBasic.init();
});
