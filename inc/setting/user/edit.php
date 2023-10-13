<form id="editUser">
    <?php if(isset($_GET['edit_user'])) :?>
        <div class="data-head">
            <h6 class="overline-title">Editar Infoimacion</h6>
        </div>
        <input type="hidden"name="infouser[id]" value="<?php echo $user->id?>">
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Usuario</span>
                <input type="text" class="form-control input-profile-user" name="infouser[username]" id="username" value="<?php echo $user->username ?>" readonly>
                <div>
                    <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                </div>
            </div>
        </div>
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Cedula (DNI)</span>
                <input type="text" class="form-control input-profile-user" name="infouser[dni]" id="dni" value="<?php echo $user->dni ?>" readonly>
                <div>
                    <span class="data-more disable"><em class="icon ni ni-lock-alt"></em></span>
                </div>
            </div>
        </div>
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Nombre</span>
                <input type="text" class="form-control input-profile-user" name="infouser[fname]" id="fname" value="<?php echo $user->fname ?>">
                <div><span class="data-more disable"><em class="icon"></em></span></div>
            </div>
        </div>
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Apellido</span>
                <input type="text" class="form-control input-profile-user" name="infouser[lname]" id="lname" value="<?php echo $user->lname ?>">
                <div><span class="data-more disable"><em class="icon"></em></span></div>
            </div>
        </div>
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Sede</span>
                <select name="infouser[sede]" class="form-select" required>
                    <?php foreach(Sedes::getSedesAll($user->sede) as $sede) { ?>
                        <option <?php echo selectedValue($user->sede, $sede->sede_code) ?> value="<?php echo $sede->sede_code?>"><?php echo $sede->sede_name?></option>
                    <?php } ?>
                </select>
                <div><span class="data-more disable"><em class="icon"></em></span></div>
            </div>
        </div>
        <div class="data-item">
            <div class="data-col">
                <span class="data-label">Estatus</span>
                <select name="infouser[status]" class="form-select">
                    <?php if($user->status == ''):?>
                        <option selected disabled value="">--SELECCIONE--</option>
                    <?php else:?>
                        <option value="<?php echo $user->status_val?>"><?php echo $user->status?></option>
                    <?php endif;?>
                    <?php foreach(Users::getUserStatus($user->status) as $val => $status) { ?>
                        <option value="<?php echo $val?>"><?php echo $status?></option>
                    <?php } ?>
                </select>
                <div><span class="data-more disable"><em class="icon"></em></span></div>
            </div>
        </div>
    <?php endif ;?>
    <?php if(isset($_GET['edit_permisos'])) :?>
        <div class="data-head">
            <h6 class="overline-title">Editar Permisos</h6>
        </div>
        <div class="card card-bordered card-preview">
            <div class="card-inner">
                <div class="row gy-4">
                    <input type="hidden" name="permisos[id]" value="<?php echo $user->id?>" >
                    <?php foreach(Users::GetListPermisos() as $perm){ ?>
                    <div class="col-md-4 col-sm-6">
                        <div class="preview-block">
                            <span data-bs-toggle="tooltip" data-bs-placement="top" class="cursor-help" title="<?php echo $perm->tooltips ?>"><i class="fa-solid fa-circle-info"></i></span>
                            <div class="custom-control custom-checkbox checked">
                                <input   type="checkbox" <?php if($user->id == 1){echo 'disabled'; }?> name="permisos[<?php echo $perm->permiso?>]" <?php Users::CheckPermisosUser($perm->permiso, 'checked', $user->permisos)?> class="custom-control-input" id="permiso-<?php echo $perm->permiso?>">
                                <label class="custom-control-label" for="permiso-<?php echo $perm->permiso?>"><?php echo $perm->label?></label>
                            </div>
                         </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    <?php endif;?>
    <div><button type="submit" disabled class="my-5 btn btn-primary">Guardar</button></div>
</form>