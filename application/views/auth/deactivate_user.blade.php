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
    echo form_open("auth/deactivate/".$user->id,$attributes);?>
    <div class="card-body">
            <div class="form-group row">
                    
            <label class="col-3 col-form-label">¿Confirmar acción?</label>
            <div class="col-9 col-form-label">
                <div class="radio-inline">
                    <label class="radio">
                        <input type="radio" name="confirm" value="yes" checked="checked">
                        <span></span>
                        Si
                    </label>
                    <label class="radio">
                        <input type="radio" name="confirm" value="no">
                        <span></span>
                        No
                    </label>
                </div>
            </div>
        </div>
          <?php echo form_hidden($csrf); ?>
          <?php echo form_hidden(['id' => $user->id]); ?>

    </div>
    <div class="card-footer">
        <button type="submit" name="submit" class="btn btn-primary mr-2"><?php echo lang('edit_user_submit_btn');?></button>
        <button type="reset" class="btn btn-secondary">Cancel</button>
    </div>
</div>
<!--end::Card-->
<?php echo form_close();?>
</div>
</div>
@endsection