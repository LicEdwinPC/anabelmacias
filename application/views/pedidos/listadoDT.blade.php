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
					<table class="table table-separate table-head-custom table-checkable" id="kt_datatable1">
						<thead>
							<tr>
								<th title="Menu">Menu</th>
								<th title="Comensal">Comensal</th>
								<th title="Comensal">Teléfono</th>
								<th title="Tipo de platillo">Tipo</th>
								<th title="Platillo">Platillo</th>
								<th title="Fecha de pedido">Fecha de pedido</th>
								<!-- <th title="Detalle">Detalle</th> -->
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
									<td><?php echo isset($pedido->Comensal)? strtoupper(trim($pedido->telefono)): "S/D";?></td>
									<td><?php echo isset($pedido->TipoPlatilloId)? strtoupper($pedido->TipoPlatilloId): "S/D";?></td>
									<td><?php echo isset($pedido->platillo)? strtoupper(trim($pedido->platillo)): "S/D";?></td>
									<td><?php echo isset($pedido->FPedido)? utils::fechalarga($pedido->FPedido) : "S/D"; ?></td>
									<!-- <td class="text-right"> <a name="" id="" class="btn btn-primary" href="#" role="button">No. platillos</a></td> -->
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
<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo site_url('assets/Theme/assets/plugins/custom/datatables/datatables.bundle.js');?>"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo site_url('assets/Theme/assets/js/pages/crud/datatables/extensions/buttons.js');?>"></script>
<!--end::Page Scripts-->
@endsection
