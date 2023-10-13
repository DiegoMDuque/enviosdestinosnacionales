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
                                <div class="nk-block">
                                    <div class="card card-bordered">
                                        <div class="card-aside-wrap">
                                            <div class="card-inner card-inner-lg">
                                                <div class="nk-block-head nk-block-head-lg">
                                                    <div class="nk-block-between">
                                                        <div class="nk-block-head-content align-self-start d-lg-none">
                                                            <a href="#" class="toggle btn btn-icon btn-trigger mt-n1"
                                                                data-target="userAside"><em
                                                                    class="icon ni ni-menu-alt-r"></em></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nk-block">
                                                    <div class="nk-data data-list">
                                                        <?php if(isset($_GET['edit_user']) or isset($_GET['edit_permisos'])){
                                                            require 'inc/setting/user/edit.php';
                                                        }
                                                        ?>

                                                        <?php if(isset($_GET['user'])) : ?>
                                                        <div class="data-item" data-bs-toggle="modal"
                                                            data-bs-target="#profile-username">
                                                            <div class="data-col">
                                                                <span class="data-label">Usuario</span>
                                                                <span
                                                                    class="data-value"><?php echo  $user->username?></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal"
                                                            data-bs-target="#profile-fname">
                                                            <div class="data-col">
                                                                <span class="data-label">Nombre</span>
                                                                <span
                                                                    class="data-value"><?php echo  $user->fname?></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal"
                                                            data-bs-target="#profile-lname">
                                                            <div class="data-col">
                                                                <span class="data-label">Apellido</span>
                                                                <span
                                                                    class="data-value"><?php echo  $user->lname?></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal"
                                                            data-bs-target="#profile-sede">
                                                            <div class="data-col">
                                                                <span class="data-label">Sede</span>
                                                                <span
                                                                    class="data-value"><?php echo  SedeName($user->sede)?></span>
                                                            </div>
                                                        </div>
                                                        <div class="data-item" data-bs-toggle="modal"
                                                            data-bs-target="#profile-estatus">
                                                            <div class="data-col">
                                                                <span class="data-label">Estatus</span>
                                                                <span
                                                                    class="data-value"><?php echo  $user->status?></span>
                                                            </div>
                                                        </div>
                                                        <?php endif ;?>
                                                        <?php if(isset($_GET['permisos'])) :?>
                                                        <div class="data-head">
                                                            <h6 class="overline-title">Editar Permisos</h6>
                                                        </div>
                                                        <div class="card card-bordered card-preview">
                                                            <div class="card-inner">
                                                                <div class="row gy-4">
                                                                    <input type="hidden" name="permisos[id]"
                                                                        value="<?php echo $user->id?>">
                                                                    <?php foreach(Users::GetListPermisos() as $perm){ ?>
                                                                    <div class="col-md-4 col-sm-6">
                                                                        <div class="preview-block">
                                                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo $perm->tooltips ?>"><i class="fa-solid fa-circle-info"></i></span>
                                                                            <div class="custom-control custom-checkbox checked">
                                                                                <input type="checkbox"  disabled name="permisos[<?php echo $perm->permiso?>]" <?php Users::CheckPermisosUser($perm->permiso, 'checked',$user->permisos)?> class="custom-control-input" id="permiso-<?php echo $perm->permiso?>">
                                                                                <label style="cursor: auto" class="custom-control-label" for="permiso-<?php echo $perm->permiso?>"><?php echo $perm->label?></label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <?php }?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php endif;?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-aside card-aside-left user-aside toggle-slide toggle-slide-left toggle-break-lg"
                                                data-toggle-body="true" data-content="userAside" data-toggle-screen="lg"
                                                data-toggle-overlay="true">
                                                <div class="card-inner-group" data-simplebar>
                                                    <div class="card-inner">
                                                        <div class="user-card">
                                                            <div class="user-avatar bg-primary">
                                                                <img src="<?php echo  $user->avatar?>">
                                                            </div>
                                                            <div class="user-info">
                                                                <span class="lead-text"><?php echo  $user->name?></span>
                                                                <span
                                                                    class="sub-text"><?php echo  $user->username?></span>
                                                            </div>
                                                            <div class="user-action">
                                                                <div class="dropdown">
                                                                    <a class="btn btn-icon btn-trigger me-n2"
                                                                        data-bs-toggle="dropdown" href="#"><em
                                                                            class="icon ni ni-more-v"></em></a>
                                                                    <div class="dropdown-menu dropdown-menu-end">
                                                                        <ul class="link-list-opt no-bdr">
                                                                            <li><a href="edit-user/<?php echo $user->id?>"><em class="icon ni ni-edit-fill"></em><span>Editar</span></a></li>
                                                                            <?php if(!$user->id == 1) : ?>
                                                                            <li><a class="pointer-on change-password-admin"><em class="icon fas fa-key"></em><span>Cambiar contraseña </span></a></li>
                                                                            <?php endif; ?>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-inner p-0">
                                                        <?php if(isset($_GET['user']) or isset($_GET['permisos'])) :?>
                                                        <ul class="link-list-menu">
                                                            <li><a class="<?php Template::ShowClassJudgmentGet('active', 'user')?>"
                                                                    href="user/<?php echo  $user->id?>"><em
                                                                        class="icon ni ni-user-fill-c"></em><span>Personal
                                                                        Infomation</span></a></li>
                                                            <li><a class="<?php Template::ShowClassJudgmentGet('active', 'permisos')?>"
                                                                    href="permisos/<?php echo  $user->id?>"><em
                                                                        class="icon ni ni-lock-alt-fill"></em><span>Permisos</span></a>
                                                            </li>
                                                        </ul>
                                                        <?php endif;?>
                                                        <?php if(isset($_GET['edit_user']) or isset($_GET['edit_permisos'])) :?>
                                                        <ul class="link-list-menu">
                                                            <li>
                                                                <a class="<?php Template::ShowClassJudgmentGet('active', 'edit_user')?>" href="edit-user/<?php echo  $user->id?>">
                                                                    <em class="icon ni ni-user-fill-c"></em>
                                                                    <span>Personal Infomation</span>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a class="<?php Template::ShowClassJudgmentGet('active', 'edit_permisos')?>" href="edit-permisos/<?php echo  $user->id?>">
                                                                    <em class="icon ni ni-lock-alt-fill"></em>
                                                                    <span>Permisos</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <?php endif;?>
                                                    </div>
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