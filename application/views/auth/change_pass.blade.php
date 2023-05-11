@layout('template/estructura')
@section('contenido')
<!--begin::Content-->
<div class="flex-row-fluid ml-lg-12">
	<!--begin::Card-->
	<?php echo form_open("auth/change_password");?>
	<div class="card card-custom">
		
		<!--begin::Header-->
		<div class="card-header py-3">
			<div class="card-title align-items-start flex-column">
				<h3 class="card-label font-weight-bolder text-dark">Cambiar contraseña</h3>
				<span class="text-muted font-weight-bold font-size-sm mt-1">Cambiar tu contraseña actual</span>
			</div>
			<div class="card-toolbar">
				<button type="submit" class="btn btn-success mr-2">Guardar</button>
				<button type="reset" class="btn btn-secondary">Cancelar</button>
			</div>
		</div>
		<!--end::Header-->
		<!--begin::Form-->
		
			<div class="card-body">
				<!--begin::Alert-->
				<?PHP
				if (strlen($message) > 0) {
				?>
				<div class="alert alert-custom alert-light-danger fade show mb-10" role="alert">
					<div class="alert-icon">
						<span class="svg-icon svg-icon-3x svg-icon-danger">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Code/Info-circle.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<rect x="0" y="0" width="24" height="24" />
									<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
									<rect fill="#000000" x="11" y="10" width="2" height="7" rx="1" />
									<rect fill="#000000" x="11" y="7" width="2" height="2" rx="1" />
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>
					</div>
					
						<div class="alert-text font-weight-bold"><?php echo $message;?></div>
						
					
					<div class="alert-close">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">
								<i class="ki ki-close"></i>
							</span>
						</button>
					</div>
				</div>
				<!--end::Alert-->
				<?php
				}
				?>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-form-label text-alert">Contraseña actual</label>
					<div class="col-lg-9 col-xl-6">
						<?php echo form_input($old_password);?>
						<!-- <input type="password" class="form-control form-control-lg form-control-solid mb-2" value="" placeholder="Contraseña actual" /> -->
						<a href="#" class="text-sm font-weight-bold">Olvidaste tu contraseña ?</a>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-form-label text-alert">Nueva contraseña</label>
					<div class="col-lg-9 col-xl-6">
						<?php echo form_input($new_password);?>
						<!-- <input type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Nueva contraseña" /> -->
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-form-label text-alert">Verificar contraseña</label>
					<div class="col-lg-9 col-xl-6">
						<?php echo form_input($new_password_confirm);?>
						<!-- <input type="password" class="form-control form-control-lg form-control-solid" value="" placeholder="Verificar contraseña" /> -->
					</div>
				</div>
				<?php echo form_input($user_id);?>
			</div>
		<?php echo form_close();?>
		<!--end::Form-->
	</div>
	
</div>
<!--end::Content-->
@endsection
@section('js')
     <!--begin::Page Vendors(used by this page)-->
    
    <!--end::Page Scripts-->
@endsection
