            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require Core::RequiereInc('header'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <div class="d-flex justify-content-center mb-5">
                                                        <div class="user-avatar  sq lg" id="user-avatar-form" data="#avatar">
                                                            <em class="fa-regular fa-user-avatar"></em>
                                                        </div>
                                                    </div>
                                                    <form id="addNewUser" class="row gy-4" enctype="multipart/form-data">
                                                        <div  class="d-none">
                                                            <input type="file" accept="image/*"  name="avatar" id="avatar" data="#user-avatar-form">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fname">Nombre</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="fname" id="fname" placeholder="Nombre">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="default-01">Apellido</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="lname" id="lname" placeholder="Apellido">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="username">Nombre de usuario</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="username" id="username" placeholder="Nombre de usuario">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="username">Cedula</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Cedula">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="sede">Sede</label>
                                                                <div class="form-control-wrap">
                                                                    <select name="sede" id="sede" class="form-select js-select2" data-search="on" >
                                                                        <option selected disabled value="0" >--SEDE--</option>
                                                                        <?php foreach(Sedes::GetBySelect() as $sede )  { ?>
                                                                            <option value="<?php echo $sede->value  ?>" ><?php echo $sede->text ?></option>
                                                                        <?php }?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="password">Contraseña</label>
                                                                <div class="d-flex">
                                                                    <div class="form-control-wrap">
                                                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                                                        </a>
                                                                        <input type="password" class="form-control" name="password" id="password" placeholder="Contraseña">
                                                                    </div>
                                                                    <a data="#password" class="mx-2 btn btn-sm btn-info gen-pass">generar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Agregar Usuario</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->
                <!-- footer @s -->
                <?php require Core::RequiereInc('footer'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->