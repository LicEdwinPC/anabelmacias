
@layout('template/estructura')
@section('contenido')
<div class="row">
    <div class="col-xl-3"></div>
    <div class="col-xl-7">
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">

            <h3 class="card-label text-center">
                
            </h3>
        </div>
        <div class="card-toolbar">
        </div>
    </div>
    <?php 
    $attributes = array('class' => 'form', 'id' => 'formUser');
    echo form_open(uri_string(),$attributes);?>
    <div class="card-body">
		<?php 
		if ($message) {
			?>
			<div class="alert alert-custom alert-light-info fade show mb-5" role="alert">
				<div class="alert-icon"><i class="flaticon-warning"></i></div>
				<div class="alert-text"><?php echo $message;?></div>
				<div class="alert-close">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true"><i class="ki ki-close"></i></span>
					</button>
				</div>
			</div>
			<?php
			# code...
		}
		?>

		<div class="form-group">
            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
            <?php echo form_input($first_name,'Nombre','class="form-control form-control-solid form-control-lg"');?>
		</div>

		<div class="form-group">
			<?php echo lang('create_user_lname_label', 'ap1');?> <br />
			<?php echo form_input($ap1,"Primer Apellido",'class="form-control form-control-solid form-control-lg"');?>
	</div>
      
      <!-- <?php
    //   if($identity_column!=='email') {
    //       echo '<p>';
    //       echo lang('create_user_identity_label', 'identity');
    //       echo '<br />';
    //       echo form_error('identity');
    //       echo form_input($identity);
    //       echo '</p>';
    //   }
      ?> -->

	<div class="form-group">
		<?php echo lang('edit_user_company_label', 'company');?> <br />
		<?php echo form_input($company,"Departamento",'class="form-control form-control-solid form-control-lg"');?>
	</div>

    

	<div class="form-group">
		<?php echo lang('create_user_phone_label', 'phone');?> <br />
		<?php echo form_input($phone,"Teléfono",'class="form-control form-control-solid form-control-lg"');?>
	</div>

	<div class="form-group">
		<?php echo lang('create_user_password_label', 'password');?> <br />
		<?php echo form_input($password,"Contraseña",'class="form-control form-control-solid form-control-lg"');?>
	</div>

	<div class="form-group">
		<?php echo lang('create_user_password_confirm_label', 'password_confirm');?><br />
		<?php echo form_input($password_confirm,"Confirmar contraseña",'class="form-control form-control-solid"');?>
	</div>
	<?php if ($this->ion_auth->is_admin()): ?>

            <h3><?php echo lang('edit_user_groups_heading');?></h3>
            <div class="form-group row">
                <div class="checkbox-inline">
                    <?php foreach ($groups as $group):?>
                
                            <label class="checkbox">
                                <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>">
                                <span></span>
                                <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>
                            </label>
                    <?php endforeach?>
                </div>
            </div>

        <?php endif ?>
	</div>


	<div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary mr-2"><?php echo lang('create_user_submit_btn');?></button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
<?php echo form_close();?>
</div>
</div>
@endsection
