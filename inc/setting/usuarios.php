


                                        <div class="nk-block-head between-start mx-3">
                                            <div class="nk-block-head-content align-self-center ">
                                                <h4 class="nk-block-title">Lista de Usuarios</h4>
                                            </div>
                                            <button class="btn btn-primary">
                                                <a href="addUser" class=" text-white "><em class="icon fa-solid fa-user-plus"></em>&nbsp;Agregar Usuario</a>
                                            </button>
                                        </div>
                                        <div class="card">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col"><span class="sub-text">Usuario</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Sede</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">Rol</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Estado</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach(Users::getList() as $user ){ ?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-avatar bg-dim-primary d-none d-sm-flex">
                                                                        <img src="<?php echo $user->avatar ?>" >
                                                                    </div>
                                                                    <div class="user-info">
                                                                        <span class="tb-lead"><?php echo $user->name?><span class="dot dot-success d-md-none ms-1"></span></span>
                                                                        <span><?php echo $user->email?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-md"><?php echo SedeName($user->sede) ?></td>
                                                            <td class="nk-tb-col tb-col-md"><?php echo $user->level ?></td>
                                                            <td class="nk-tb-col tb-col-md">
                                                                <span class="tb-status text-<?php echo $user->status->color ?>"><?php echo $user->status->text ?></span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="user/<?php echo $user->id ?>"><em class="icon fa-regular fa-id-badge"></em><span>Ver</span></a></li>
                                                                                <li><a href="edit-user/<?php echo $user->id ?>"><em class="icon fa-solid fa-user-pen"></em><span>Edit</span></a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

