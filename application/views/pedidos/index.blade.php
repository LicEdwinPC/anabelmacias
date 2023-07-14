@layout('template/estructura')
@section('contenido')

<div class="card card-custom">
	<div class="card-header">
		<div class="card-title">
			<span class="card-icon">
				<i class="flaticon-event-calendar-symbol text-info icon-xl"></i>
			</span>
			<h2>Menu del <?php echo isset($SemanaInicio) ? $SemanaInicio :  "S/D";?> - <?php echo isset($SemanaFin) ? $SemanaFin :  "S/D";?></h2>
		</div>
	</div>
	<div class="card-body">
		
		<div class="row my-10">

			<?php 
			if (isset($Menus) && count($Menus) > 0) {
				$id_ma_menu = 0;
				foreach ($Menus as $key => $row) 
				{
				?>
				<!--begin: item-->
				<div class="col-md-6 col-xxl-3 border-right-0 border-right-md border-bottom border-bottom-xxl-0  text-center">
					<div class="pt-30 pt-md-25 pb-15 px-5 ">
						<div class="d-flex flex-center position-relative mb-25 ">
							<span class="svg svg-fill-primary opacity-4 position-absolute">
								<svg width="175" height="200">
									<polyline points="87,0 174,50 174,150 87,200 0,150 0,50 87,0" />
								</svg>
							</span>
							<span class="svg-icon svg-icon-info svg-icon-5x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M3.98842709,3.05999994 L11.0594949,10.1310678 L8.23106778,12.9594949 L3.98842709,8.71685419 C2.42632992,7.15475703 2.42632992,4.62209711 3.98842709,3.05999994 Z" fill="#000000"/>
									<path d="M17.7539614,3.90710683 L14.8885998,7.40921548 C14.7088587,7.62889898 14.7248259,7.94903916 14.9255342,8.14974752 C15.1262426,8.35045587 15.4463828,8.36642306 15.6660663,8.18668201 L19.1681749,5.32132039 L19.8752817,6.02842717 L17.0099201,9.53053582 C16.830179,9.75021933 16.8461462,10.0703595 17.0468546,10.2710679 C17.2475629,10.4717762 17.5677031,10.4877434 17.7873866,10.3080024 L21.2894953,7.44264073 L21.9966021,8.14974752 L18.8146215,11.331728 C17.4477865,12.6985631 15.2317091,12.6985631 13.8648741,11.331728 C12.4980391,9.96489301 12.4980391,7.74881558 13.8648741,6.38198056 L17.0468546,3.20000005 L17.7539614,3.90710683 Z" fill="#000000"/>
									<path d="M11.0753788,13.9246212 C11.4715437,14.3207861 11.4876245,14.9579589 11.1119478,15.3736034 L6.14184561,20.8724683 C5.61370242,21.4567999 4.71186338,21.5023497 4.12753173,20.9742065 C4.10973311,20.9581194 4.09234327,20.9415857 4.0753788,20.9246212 C3.51843234,20.3676747 3.51843234,19.4646861 4.0753788,18.9077397 C4.09234327,18.8907752 4.10973311,18.8742415 4.12753173,18.8581544 L9.62639662,13.8880522 C10.0420411,13.5123755 10.6792139,13.5284563 11.0753788,13.9246212 Z" fill="#000000" opacity="0.3"/>
									<path d="M13.0754022,13.9246212 C13.4715671,13.5284563 14.1087399,13.5123755 14.5243844,13.8880522 L20.0232493,18.8581544 C20.0410479,18.8742415 20.0584377,18.8907752 20.0754022,18.9077397 C20.6323487,19.4646861 20.6323487,20.3676747 20.0754022,20.9246212 C20.0584377,20.9415857 20.0410479,20.9581194 20.0232493,20.9742065 C19.4389176,21.5023497 18.5370786,21.4567999 18.0089354,20.8724683 L13.0388332,15.3736034 C12.6631565,14.9579589 12.6792373,14.3207861 13.0754022,13.9246212 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg><!--end::Svg Icon--></span>
						</div>
						<span id="TituloMenu" class="font-size-h1 d-block font-weight-boldest text-dark-75 py-2">
						<?php
							$Dia = explode(' ', $row->str_fecha);
							// echo $row->str_fecha;
							echo $Dia[0]." ".$Dia[1];	
						?>
						</span><hr>
						<p class="mb-5 d-flex flex-column">
							<div class="checkbox-list">
								<input type="hidden" id="Codigo" name="Codigo" value="<?php echo isset($row->id)? base64_encode($row->id): 0;?>">
									<?php 
									foreach ($row->detalle as $key => $detalle) {
										$ban = "";
										$key = array_search($detalle->id, array_column($row->pedidos, 'id_detalle_menu'));

										if ($key !== false) {
											// Se encontró el valor buscado
											$ban = "checked";
											// echo "El valor $detalle->id se encontró en el array.";
										}

										
										if ($detalle->id_tipo == 1) {
											# code...
											?>
											
												<label class="checkbox checkbox-lg">
													<input data-descripcion="<?php echo isset($detalle-> descripcion) ? trim($detalle->descripcion): "";?>" type="checkbox" <?php echo $ban;?> value="<?php echo isset($detalle-> id) ? $detalle->id: 0;?>" name="chk_comida-<?php echo $row->id?>" id="chk_comida-<?php echo $row->id?>">
													<span></span>
													<?php echo isset($detalle-> descripcion) ? trim($detalle->descripcion): "";?>	
													&nbsp;
													
												</label>
												
												
												
											<?php
										}else{
											?>
											<label class="checkbox checkbox-lg">
												<input data-descripcion="<?php echo isset($detalle-> descripcion) ? trim($detalle->descripcion): "";?>" type="checkbox" <?php echo $ban;?> value="<?php echo isset($detalle-> id) ? $detalle->id: 0;?>" name="chk_postre-<?php echo $row->id?>" id="chk_postre-<?php echo $row->id?>">
												<span></span>
												<?php echo isset($detalle-> descripcion) ? trim($detalle->descripcion): "";?>
											</label>
											<?php
										}
										
									}
									?>
							</div>

						</p>
						
						<div class="d-flex justify-content-center pt-5">
							<button type="button" name="btnGuardaPedido" data-id="<?php echo isset($row->id)? base64_encode($row->id): 0;?>" id="btnGuardaPedido" class="btnGuardaPedido btn btn-info text-uppercase font-weight-bolder px-15 py-3">Guardar</button>
						</div>
					</div>
				</div>
				<!--end: item-->
				<?php
				
			}
		}	
			?>
		<div class="modal fade" tabindex="-1"  data-backdrop="static" role="dialog"  id="agregar_pedido" name="agregar_pedido" aria-labelledby="staticBackdrop" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4  class="modal-title">
							<span class="svg-icon svg-icon-info svg-icon-5x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-05-14-112058/theme/html/demo8/dist/../src/media/svg/icons/Cooking/KnifeAndFork2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24"/>
									<path d="M3.98842709,3.05999994 L11.0594949,10.1310678 L8.23106778,12.9594949 L3.98842709,8.71685419 C2.42632992,7.15475703 2.42632992,4.62209711 3.98842709,3.05999994 Z" fill="#000000"/>
									<path d="M17.7539614,3.90710683 L14.8885998,7.40921548 C14.7088587,7.62889898 14.7248259,7.94903916 14.9255342,8.14974752 C15.1262426,8.35045587 15.4463828,8.36642306 15.6660663,8.18668201 L19.1681749,5.32132039 L19.8752817,6.02842717 L17.0099201,9.53053582 C16.830179,9.75021933 16.8461462,10.0703595 17.0468546,10.2710679 C17.2475629,10.4717762 17.5677031,10.4877434 17.7873866,10.3080024 L21.2894953,7.44264073 L21.9966021,8.14974752 L18.8146215,11.331728 C17.4477865,12.6985631 15.2317091,12.6985631 13.8648741,11.331728 C12.4980391,9.96489301 12.4980391,7.74881558 13.8648741,6.38198056 L17.0468546,3.20000005 L17.7539614,3.90710683 Z" fill="#000000"/>
									<path d="M11.0753788,13.9246212 C11.4715437,14.3207861 11.4876245,14.9579589 11.1119478,15.3736034 L6.14184561,20.8724683 C5.61370242,21.4567999 4.71186338,21.5023497 4.12753173,20.9742065 C4.10973311,20.9581194 4.09234327,20.9415857 4.0753788,20.9246212 C3.51843234,20.3676747 3.51843234,19.4646861 4.0753788,18.9077397 C4.09234327,18.8907752 4.10973311,18.8742415 4.12753173,18.8581544 L9.62639662,13.8880522 C10.0420411,13.5123755 10.6792139,13.5284563 11.0753788,13.9246212 Z" fill="#000000" opacity="0.3"/>
									<path d="M13.0754022,13.9246212 C13.4715671,13.5284563 14.1087399,13.5123755 14.5243844,13.8880522 L20.0232493,18.8581544 C20.0410479,18.8742415 20.0584377,18.8907752 20.0754022,18.9077397 C20.6323487,19.4646861 20.6323487,20.3676747 20.0754022,20.9246212 C20.0584377,20.9415857 20.0410479,20.9581194 20.0232493,20.9742065 C19.4389176,21.5023497 18.5370786,21.4567999 18.0089354,20.8724683 L13.0388332,15.3736034 C12.6631565,14.9579589 12.6792373,14.3207861 13.0754022,13.9246212 Z" fill="#000000" opacity="0.3"/>
								</g>
							</svg><!--end::Svg Icon--></span>
							Agregar Pedido del <span id="modalTituloMenu"></span> </h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i aria-hidden="true" class="ki ki-close"></i>
						</button>
					</div>
					<div class="modal-body">
						<form class="form" id="frmAddMorePedido">
							
							<div class="form-group">
								<label id="LblComida">Comida ()  <span class="text-danger">*</span></label>
								<input type="number" min="1" max="10" value="1" name="cantidad_comida" id="cantidad_comida" data-tipo="1" class="form-control form-control-solid h-auto py-5 px-6"  placeholder="Cantidad de comida" autocomplete="off"/>
								<span class="form-text text-muted">Ingresa el numero de comidas para tu pedido</span>
							</div>
							<div class="form-group">
								<label id="LblPostre">Postre <span class="text-danger">*</span></label>
								<input type="number" min="1" max="10" value="1" name="cantidad_postre" id="cantidad_postre" data-tipo="2" class="form-control form-control-solid h-auto py-5 px-6"  placeholder="Cantidad de postre" autocomplete="off"/>
								<span class="form-text text-muted">Ingresa el numero de postres para tu pedido.</span>
							</div>
							<input type="hidden" id="Codigo" name="Codigo" value="0">
						</form>
					</div>
					<div class="modal-footer">
						
						<button type="button" class="btn btn-info text-uppercase font-weight-bolder px-15 py-3">Guardar</button>
						<button type="button" class="btn btn-danger text-uppercase font-weight-bolder" data-dismiss="modal">Cancelar</button>
						
					</div>
				</div>
			</div>
		</div>		
			
		</div>
	</div>
</div>



@endsection

@section('js')

<script>
	var PATH = "<?php echo site_url();?>";

	jQuery(document).ready(function() {

		$('.btnGuardaPedido').click(function() 
		{
			let id_menu = atob($(this).data('id'));
			// console.log(id_menu);
            let registro = recuperarDatosFormulario(id_menu);

			// console.log(registro);

			// return false;

			if ($('#chk_comida-'+id_menu).prop("checked") === false && $('#chk_postre-'+id_menu).prop("checked") === false) {
				swal.fire({
					text: "Es necesario seleccionar por una opción del menu",
					icon: "error",
					buttonsStyling: false,
					confirmButtonText: "Ok",
					customClass: {
						confirmButton: "btn font-weight-bold btn-light-primary"
					}
				}).then(function() {
				// KTUtil.scrollTop();
					$('#chk_comida-'+id_menu).focus();
				});

				return false;
			}else{

				//Pregunto si quieren agregar mas platillos al pedido
				swal.fire({
				title: '¿Quiéres agregar mas platillos a tu pedido?',
				icon: "question",
				showCancelButton: true,
				confirmButtonText: 'Si',
				cancelButtonText: 'No',
				}).then((result) => {

				if (result.isConfirmed) {
					//Mando el modal para agregar más.
					MuestraModal(id_menu);
					// Swal.fire('Saved!', '', 'success')
				} 
				});
				
				// guardaRegistro(registro);
			}

            
        });

		function MuestraModal(id_menu){
			// console.log(id_menu);
			$("#Codigo").val(id_menu);
			$("#LblComida").text($('#chk_comida-'+id_menu).data('descripcion'));
			$("#LblPostre").text($('#chk_postre-'+id_menu).data('descripcion'));
			$("#modalTituloMenu").text($("#TituloMenu").text());

			

			$("#agregar_pedido").modal('show');

		}

	
        function recuperarDatosFormulario(id_menu) {

			let comida = 0;
			let postre = 0;

			// console.log($('#chk_comida-'+id_menu).val());

			if ($('#chk_comida-'+id_menu).prop("checked") === true) {
				comida = $('#chk_comida-'+id_menu).val();
			}

			if ($('#chk_postre-'+id_menu).prop("checked") === true) {
				postre = $('#chk_postre-'+id_menu).val();
			}


            let registro = {
            id: id_menu,
            comida: comida,
            postre: postre
            };

            return registro;
        }

		function guardaRegistro(registro){
			$.ajax({
				type: 'POST',
				url: PATH+'Pedido/guardar',
				data: registro,
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
							 KTUtil.scrollTop();
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
    });
</script>


@endsection
