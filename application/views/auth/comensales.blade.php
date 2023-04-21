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

                        <h3 class="card-label">Listado de comensales</h3>
                    </div>
                    <div class="card-toolbar">
                    </div>
                </div>
                <div class="card-body">
                    
                    <table
											class="table table-separate table-head-custom table-checkable"
											id="kt_datatable"
										>
                                        <thead>
                                            <tr>
												<th>Id</th>
                                                <th>Comensal</th>
                                                <th>Teléfono</th>
                                                <th>Correo Electrónico</th>
                                                <th>Departamento</th>
                                                <th>Status</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                            foreach ($users as $key => $row) {
                                                # code...
                                                ?>
                                                <tr>
													<td><?php echo $row->id?></td>
													<td><?php echo $row->first_name." ".$row->ap1." ".$row->ap2;?></td>
													<td><?php echo $row->phone;?></td>
													<td><?php echo $row->email;?></td>
													<td><?php echo $row->company;?></td>
													<td><?php echo $row->active;?></td>
													<td>
														<a id="btnEdit" data-id="<?php echo $row->id;?>" href="<?php echo site_url('auth/edit_user/'.$row->id);?>"  name="btnEdit"  class="btn btn-sm btn-clean btn-icon mr-2 btnEditUser" title="modificar">
															<span class="svg-icon svg-icon-md">
																<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
																	<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
																		<rect x="0" y="0" width="24" height="24"/>
																		<path d="M8,17.9148182 L8,5.96685884 C8,5.56391781 8.16211443,5.17792052 8.44982609,4.89581508 L10.965708,2.42895648 C11.5426798,1.86322723 12.4640974,1.85620921 13.0496196,2.41308426 L15.5337377,4.77566479 C15.8314604,5.0588212 16,5.45170806 16,5.86258077 L16,17.9148182 C16,18.7432453 15.3284271,19.4148182 14.5,19.4148182 L9.5,19.4148182 C8.67157288,19.4148182 8,18.7432453 8,17.9148182 Z" fill="#000000" fill-rule="nonzero"\ transform="translate(12.000000, 10.707409) rotate(-135.000000) translate(-12.000000, -10.707409) "/>
																		<rect fill="#000000" opacity="0.3" x="5" y="20" width="15" height="2" rx="1"/>
																	</g>
																</svg>
															</span>
														</a>
													</td>
												</tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>

                </div>
            </div>
            <!--end::Card-->
            
            
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>



@endsection

@section('css')
<link
			href="<?php echo THEME_URL.'assets/plugins/custom/datatables/datatables.bundle.css';?>"
			rel="stylesheet"
			type="text/css"
		/>
@endsection

@section('js')

<!--begin::Page Vendors(used by this page)-->
<script src="<?php echo THEME_URL.'assets/plugins/custom/datatables/datatables.bundle.js';?>"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="<?php echo THEME_URL.'assets/js/pages/crud/datatables/basic/basic.js';?>"></script>
<!--end::Page Scripts-->


<script>
	var PATH = "<?php echo site_url();?>";
	jQuery(document).ready(function() {
		KTDatatablesBasicBasic.init();

		$('.btnEditUser').on('click', function(e) 
		{
			// alert($(this).data('id'));

			$.ajax({
				type: 'POST',
				url: PATH+'auth/edit_user',
				data: {'id':$(this).data('id')},
				success: function(msg) {
					swal.fire({
						text: msg,
						icon: "success",
						buttonsStyling: false,
						confirmButtonText: "Ok, vamos!",
						customClass: {
							confirmButton: "btn font-weight-bold btn-light-primary"
						}
					}).then(function() {
						
					});
				},
				error: function(error) {
					alert("Hay un problema:" + error);
				}
			});
		});
	});
	
</script>
@endsection
