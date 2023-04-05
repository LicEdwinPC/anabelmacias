<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
	<div class="navbar-brand">
		<button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
		{{-- <small>COLIBECAS</small> --}}
		 <a href="#"><img src="<?php echo base_url("assets/imagenes/logos/Recurso4-150x30.png"); ?>" alt="Aero"><span class="m-l-10"></span></a>
	</div>
	<div class="menu">
		
		
		<ul class="list">
			<li>
				<div class="user-info pt-2 pb-2">
					<i class="fa fa-user fa-3x color-theme"></i>
					<div class="detalle_info col-12 text-left p-2" style="font-size:12px">
						<div class="mb-2"><img src="<?php echo base_url("assets/imagenes/logos/titulo1-180x30.png"); ?>" class="img-fluid ${3|rounded-top,rounded-right,rounded-bottom,rounded-left,rounded-circle,|}" alt=""></div>
						<div class="text-uppercase"><?php echo $this->session->userdata('nombre_completo'); ?></div>
						<div class="bold">Dependencia: <br /></div>
						<div class="text-muted"><?php echo isset($this->session->userdata('dependencia')['descripcion']) ? $this->session->userdata('dependencia')['descripcion'] : ''; ?></div>
						<div class="bold">Rol: <br /></div>
						<div class="text-muted"><?php echo $this->session->userdata('nombre_perfil'); ?></div>
					</div>
				</div>
			</li>
			<?php
			$modulos = $this->session->userdata('modulos');
			
			// echo "<pre>";
			// print_r ($modulos);
			// echo "</pre>";
			
			if (is_array($modulos) && count($modulos) > 0) {
				foreach ($modulos as $modulo) {
					$icon = $modulo['icono'];
					if ($modulo['modulos'] == false) {
						$url = ($modulo['modulo'] == $modulo['controlador']) ? $modulo['controlador'] . '/' . $modulo['funcion'] : $modulo['modulo'] . '/' . $modulo['controlador'] . '/' . $modulo['funcion'];
			?>
						<li><a href="<?php echo site_url($url); ?>"><i class="<?php echo $icon; ?>"></i><span><?php echo $modulo['nombre']; ?></span></a></li>
					<?php } else {
					?>
						<li><a href="javascript:void(0);" class="menu-toggle"><i class="<?php echo $icon; ?>"></i><span><?php echo $modulo['nombre']; ?></span></a>
							<ul class="ml-menu">
								<?php if (is_array($modulo['modulos']) && count($modulo['modulos']) > 0) {
									foreach ($modulo['modulos'] as $none) {
										$urlNode = ($none['modulo'] == $none['controlador']) ? $none['controlador'] . '/' . $none['funcion'] : $none['modulo'] . '/' . $none['controlador'] . '/' . $none['funcion'];
								?>
										<li><a href="<?php echo site_url($urlNode); ?>"><?php echo $none['nombre']; ?></a></li>
								<?php }
								} ?>
							</ul>
						</li>
			<?php
					}
				}
			} ?>
			<li><a href="<?php echo site_url('inicio/logout'); ?>"><i class="zmdi zmdi-power"></i><span>Cerrar sesión</span></a></li>

		</ul>
		<center>
			<img class="mt-5 align-text-bottom" width="150px" src="<?php echo base_url("assets/imagenes/logo_armas_blanco.png"); ?>" alt="Gobierno del Estado de Colima">
		</center>
	</div>

</aside>