@section('css')
<!--begin::Page Vendors Styles(used by this page)-->
<link href="<?php echo site_url('assets/Theme/assets/plugins/custom/datatables/datatables.bundle.css');?>" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles-->
@endsection
@layout('template/estructura')
@section('contenido')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			
			<!--begin::Card-->
			<div class="card card-custom">
				<div class="card-header flex-wrap border-0 pt-3 pb-0">
					<div class="card-title">
						<!-- <h3 class="card-label">HTML Table
						<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3> -->
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						
						<!--end::Dropdown-->
						
					</div>
				</div>
				<div class="card-body">
					
					<!--begin: Datatable-->
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable_entregados">
						
					</table>
					<!--end: Datatable-->
				</div>
			</div>
			<!--end::Card-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!--end::Content-->
@endsection

@section('js')

<script>
	var PATH  = "<?php echo site_url();?>";
</script>
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo site_url('assets/Theme/assets/plugins/custom/datatables/datatables.bundle.js');?>"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo site_url('assets/Theme/assets/js/pages/crud/datatables/extensions/buttons.js');?>"></script>
<!--end::Page Scripts-->

<script>
	$( document ).ready(function() {

		var URL  = "<?php echo site_url();?>";

		// $('#btn_entregado').on('click', function(e) 
		
		
	});

	function Pendiente(_this){
		

		var idDet = atob($(_this).data('id'));
		console.log(idDet);
		var URL  = "<?php echo site_url();?>";

		$.ajax({
			type: 'POST',
			url: URL+'Pedido/pendientes',
			data: {id_detalle: idDet},
			dataType: "json",
			success: function(result) {
				console.log(result);
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
						
						// table_entregas.reload();
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
						// CierraPopup();
						$('#kt_datatable_entregados').DataTable().ajax.reload();
						
					});

				}
			},
			error: function(result) {
				swal.fire({
					text: "Surgio un error al ingresar tu pedido, favor de volver a intentar",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok, vamos!",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
					 KTUtil.scrollTop();
				});
			}
		});

	}
</script>
@endsection
