@layout('template/estructura')

@section('contenido')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Notice-->
			<div class="alert alert-custom alert-white alert-shadow gutter-b" role="alert">
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
				<div class="alert-text">
				<p>The Metronic Datatable component supports initialization from HTML table. It also defines the schema model of the data source. In addition to the visualization, the Datatable provides built-in support for operations over data such as sorting, filtering and paging performed in user browser (frontend).</p>For more information visit
				<a class="font-weight-bold" href="https://keenthemes.com/metronic/?page=docs&amp;section=html/components/datatable" target="_blank">Metronic KTDatatable Documentation</a>.</div>
			</div>
			<!--end::Notice-->
			<!--begin::Card-->
			<div class="card card-custom">
				<div class="card-header flex-wrap border-0 pt-6 pb-0">
					<div class="card-title">
						<!-- <h3 class="card-label">HTML Table
						<span class="d-block text-muted pt-2 font-size-sm">Datatable initialized from HTML table</span></h3> -->
					</div>
					<div class="card-toolbar">
						<!--begin::Dropdown-->
						<div class="dropdown dropdown-inline mr-2">
							<button type="button" class="btn btn-light-primary font-weight-bolder dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<span class="svg-icon svg-icon-md">
								<!--begin::Svg Icon | path:assets/media/svg/icons/Design/PenAndRuller.svg-->
								<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
									<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
										<rect x="0" y="0" width="24" height="24" />
										<path d="M3,16 L5,16 C5.55228475,16 6,15.5522847 6,15 C6,14.4477153 5.55228475,14 5,14 L3,14 L3,12 L5,12 C5.55228475,12 6,11.5522847 6,11 C6,10.4477153 5.55228475,10 5,10 L3,10 L3,8 L5,8 C5.55228475,8 6,7.55228475 6,7 C6,6.44771525 5.55228475,6 5,6 L3,6 L3,4 C3,3.44771525 3.44771525,3 4,3 L10,3 C10.5522847,3 11,3.44771525 11,4 L11,19 C11,19.5522847 10.5522847,20 10,20 L4,20 C3.44771525,20 3,19.5522847 3,19 L3,16 Z" fill="#000000" opacity="0.3" />
										<path d="M16,3 L19,3 C20.1045695,3 21,3.8954305 21,5 L21,15.2485298 C21,15.7329761 20.8241635,16.200956 20.5051534,16.565539 L17.8762883,19.5699562 C17.6944473,19.7777745 17.378566,19.7988332 17.1707477,19.6169922 C17.1540423,19.602375 17.1383289,19.5866616 17.1237117,19.5699562 L14.4948466,16.565539 C14.1758365,16.200956 14,15.7329761 14,15.2485298 L14,5 C14,3.8954305 14.8954305,3 16,3 Z" fill="#000000" />
									</g>
								</svg>
								<!--end::Svg Icon-->
							</span>Exportar</button>
							<!--begin::Dropdown Menu-->
							<div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
								<!--begin::Navigation-->
								<ul class="navi flex-column navi-hover py-2">
									<li class="navi-header font-weight-bolder text-uppercase font-size-sm text-primary pb-2">Elige una opción:</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-print"></i>
											</span>
											<span class="navi-text">Imprimir</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-copy"></i>
											</span>
											<span class="navi-text">Copy</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-excel-o"></i>
											</span>
											<span class="navi-text">Excel</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-text-o"></i>
											</span>
											<span class="navi-text">CSV</span>
										</a>
									</li>
									<li class="navi-item">
										<a href="#" class="navi-link">
											<span class="navi-icon">
												<i class="la la-file-pdf-o"></i>
											</span>
											<span class="navi-text">PDF</span>
										</a>
									</li>
								</ul>
								<!--end::Navigation-->
							</div>
							<!--end::Dropdown Menu-->
						</div>
						<!--end::Dropdown-->
						
					</div>
				</div>
				<div class="card-body">
					<!--begin: Search Form-->
					<!--begin::Search Form-->
					<div class="mb-7">
						<div class="row align-items-center">
							<div class="col-lg-9 col-xl-8">
								<div class="row align-items-center">
									<div class="col-md-4 my-2 my-md-0">
										<div class="input-icon">
											<input type="text" class="form-control" placeholder="Buscar..." id="kt_datatable_search_query" />
											<span>
												<i class="flaticon2-search-1 text-muted"></i>
											</span>
										</div>
									</div>
									<div class="col-md-4 my-2 my-md-0">
										<div class="d-flex align-items-center">
											<label class="mr-3 mb-0 d-none d-md-block">Menu:</label>
											<select class="form-control" id="kt_datatable_search_menu">
												<option value="">Todos</option>
												<?php 
												foreach ($lstMenu as $key => $menu) {
													?>
													<option value="<?php echo isset($menu->fecha_menu) ? utils::fecha($menu->fecha_menu) : "";?>"><?php echo isset($menu->fecha_menu) ?  utils::fecha($menu->fecha_menu) : "S/D";?></option>
													<?php
												}
												?>
												
												
											</select>
										</div>
									</div>
									<div class="col-md-4 my-2 my-md-0">
										<div class="d-flex align-items-center">
											<label class="mr-3 mb-0 d-none d-md-block">Tipo:</label>
											<select class="form-control" id="kt_datatable_search_type">
												<option value="">Todos</option>
												<?php 
												foreach ($tipo_platillo as $key => $row) {
													?>
													<option value="<?php echo isset($row->id) ? $row->id : 0;?>"><?php echo isset($row->descripcion) ? strtoupper($row->descripcion) : "S/D";?></option>
													<?php
												}
												?>
												
											</select>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
								<a href="#" class="btn btn-light-primary px-6 font-weight-bold">Buscar</a>
							</div> -->
						</div>
					</div>
					<!--end::Search Form-->
					<!--end: Search Form-->
					<!--begin: Datatable-->
					<table class="datatable table-bordered datatable-head-custom table-striped" id="kt_datatable2">
						<thead>
							<tr>
								<th title="Menu">Menu</th>
								<th title="Comensal">Comensal</th>
								<th title="Platillo">Platillo</th>
								<th title="Tipo de platillo">Tipo</th>
								<th title="Fecha de pedido">Fecha de pedido</th>
								<th title="Detalle">Detalle</th>
							</tr>
						</thead>
						<tbody>
						<?php 
							foreach ($pedidos as $key => $pedido) {
								
								// echo "<pre>";
								// print_r ($pedido);
								// echo "</pre>";
								
								?>
								<tr>
									<td><?php echo isset($pedido->fecha_menu)? utils::fecha($pedido->fecha_menu): "S/D";?></td>
									<td><?php echo isset($pedido->Comensal)? strtoupper(trim($pedido->Comensal)): "S/D";?></td>
									<td><?php echo isset($pedido->platillo)? strtoupper(trim($pedido->platillo)): "S/D";?></td>
									<td><?php echo isset($pedido->TipoPlatilloId)? strtoupper($pedido->TipoPlatilloId): "S/D";?></td>
									<td><?php echo isset($pedido->FPedido)? utils::fechalarga($pedido->FPedido) : "S/D"; ?></td>
									<td class="text-right"> <a name="" id="" class="btn btn-primary" href="#" role="button">No. platillos</a></td>
								</tr>
								<?php
							}
						?>
							
						</tbody>
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
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo site_url('assets/Theme/assets/js/pages/crud/ktdatatable/base/html-table.js')?>"></script>
<!--end::Page Scripts-->
@endsection
