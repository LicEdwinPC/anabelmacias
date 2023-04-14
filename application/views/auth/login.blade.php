@layout('template/estructuralogin')
@section('contenido')

<!--begin::Login-->
<div class="login login-1 login-signin-on d-flex flex-column flex-lg-row flex-column-fluid bg-white" id="kt_login">
	<!--begin::Aside-->
	<div class="login-aside d-flex flex-row-auto bgi-size-cover bgi-no-repeat p-10 p-lg-10" style="background-image: url(<?php echo THEME_URL . 'assets/media/bg/bg-6.jpg' ?>);">
		<!--begin: Aside Container-->
		<div class="d-flex flex-row-fluid flex-column justify-content-between">
			<!--begin: Aside header-->
			<a href="#" class="flex-column-auto mt-5 pb-lg-0 pb-10">
				<img src="<?php echo THEME_URL . 'assets/media/logos/logo-letter-1.png'; ?>" class="max-h-150px" alt="" />
			</a>
			<!--end: Aside header-->
			<!--begin: Aside content-->
			<div class="flex-column-fluid d-flex flex-column justify-content-center">
				<h3 class="font-size-h1 mb-5 text-white">Bienvenidos!</h3>
				<p class="font-weight-lighter text-white opacity-80">En esta app podrás hacer tus pedidos de comidas y postres semanalmente.</p>
			</div>
			<!--end: Aside content-->
			<!--begin: Aside footer for desktop-->
			<div class="d-none flex-column-auto d-lg-flex justify-content-between mt-10">
				<div class="opacity-70 font-weight-bold text-white">© <?php echo date('Y'); ?> EPC</div>
				<div class="d-flex">
					<a href="#" class="text-white">Privacidad</a>
					<a href="#" class="text-white ml-10">Legal</a>
					<a href="#" class="text-white ml-10">Contacto</a>
				</div>
			</div>
			<!--end: Aside footer for desktop-->
		</div>
		<!--end: Aside Container-->
	</div>
	<!--begin::Aside-->
	<!--begin::Content-->
	<div class="d-flex flex-column flex-row-fluid position-relative p-7 overflow-hidden">
		<!--begin::Content header-->
		<div class="position-absolute top-0 right-0 text-right mt-5 mb-15 mb-lg-0 flex-column-auto justify-content-center py-5 px-10">
			<span class="font-weight-bold text-dark-50">No tienes cuenta todavía?</span>
			<a href="javascript:;" class="font-weight-bold ml-2" id="kt_login_signup">Registrate!</a>
		</div>
		<!--end::Content header-->
		<!--begin::Content body-->
		<div class="d-flex flex-column-fluid flex-center mt-30 mt-lg-0">
			<!--begin::Signin-->
			<div class="login-form login-signin">
				<div class="text-center mb-10 mb-lg-20">
					<h3 class="font-size-h1">Entrar</h3>
					<p class="text-muted font-weight-bold">Introduce tu usuario y nip</p>
				</div>
				<!--begin::Form-->
				<form class="form" novalidate="novalidate" id="kt_login_signin_form">
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Usuario" name="identity" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="NIP" name="password" autocomplete="off" />
					</div>
					<!--begin::Action-->
					<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
						<a href="javascript:;" class="text-dark-50 text-hover-primary my-3 mr-2" id="kt_login_forgot">Olvidaste tu nip ?</a>
						<button type="button" id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3">Entrar</button>
					</div>
					<!--end::Action-->
				</form>
				<!--end::Form-->
			</div>
			<!--end::Signin-->
			<!--begin::Signup-->
			<div class="login-form login-signup">
				<div class="text-center mb-10 mb-lg-20">
					<h3 class="font-size-h1">Registrate</h3>
					<p class="text-muted font-weight-bold">Introduce los diguientes datos para crear tu cuenta</p>
				</div>
				<!--begin::Form-->
				<form class="form" novalidate="novalidate" id="kt_login_signup_form">
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Nombre(s)" name="first_name" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Primer Apellido" name="ap1" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Segundo Apellido" name="ap2" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Telefono" name="phone" autocomplete="off" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Correo electrónico" name="email" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Departamento" name="company" autocomplete="off" />
					</div>
					
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="text" placeholder="Usuario" name="identity" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="NIP" name="password" autocomplete="off" />
					</div>
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="password" placeholder="Confirm NIP" name="password_confirm" autocomplete="off" />
					</div>
					<div class="form-group">
						<label class="checkbox mb-0">
							<input type="checkbox" name="agree" />
							<span></span> Acepto los &nbsp;
							<a href="#"> terminos y condiciones</a></label>
					</div>
					<div class="form-group d-flex flex-wrap flex-center">
						<button type="button" id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Enviar</button>
						<button type="button" id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancelar</button>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Signup-->
			<!--begin::Forgot-->
			<div class="login-form login-forgot">
				<div class="text-center mb-10 mb-lg-20">
					<h3 class="font-size-h1">Olvidaste tu NIP ?</h3>
					<p class="text-muted font-weight-bold">Introduce tu correo para cambiar tu NIP</p>
				</div>
				<!--begin::Form-->
				<form class="form" novalidate="novalidate" id="kt_login_forgot_form">
					<div class="form-group">
						<input class="form-control form-control-solid h-auto py-5 px-6" type="email" placeholder="Correo electrónico" name="email" autocomplete="off" />
					</div>
					<div class="form-group d-flex flex-wrap flex-center">
						<button type="button" id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Enviar</button>
						<button type="button" id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-4">Cancelar</button>
					</div>
				</form>
				<!--end::Form-->
			</div>
			<!--end::Forgot-->
		</div>
		<!--end::Content body-->
		<!--begin::Content footer for mobile-->
		<div class="d-flex d-lg-none flex-column-auto flex-column flex-sm-row justify-content-between align-items-center mt-5 p-5">
			<div class="text-dark-50 font-weight-bold order-2 order-sm-1 my-2"><?php echo date('Y'); ?> EPC</div>
			<div class="d-flex order-1 order-sm-2 my-2">
				<a href="#" class="text-dark-75 text-hover-primary">Privacidad</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Terninos Legales</a>
				<a href="#" class="text-dark-75 text-hover-primary ml-4">Contacto</a>
			</div>
		</div>
		<!--end::Content footer for mobile-->
	</div>
	<!--end::Content-->
</div>
<script>
	let PATH = '<?php echo  site_url(); ?>';
</script>
<!--end::Login-->
@endsection