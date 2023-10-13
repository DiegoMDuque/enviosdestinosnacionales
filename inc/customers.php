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
                                <div class="components-preview mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head between-start">
                                            <div class="nk-block-head-content">
                                                <h4 class="nk-block-title">Lista de clientes</h4>
                                            </div>
                                            <a href="addCustomer" class="btn btn-primary text-white "><em class="icon fa-solid fa-user-plus"></em>&nbsp;Agregar Cliente</a>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col"><span class="sub-text">Nombre</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Cédula</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Teléfono</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Correo</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Ultimo Envío</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end">
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php foreach(Customer::GetCustomerAll() as $customer ){ ?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-info">
                                                                        <span class="tb-lead"><?php echo $customer->name?><span class="dot dot-success d-md-none ms-1"></span></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-info">
                                                                        <span><?php echo $customer->dni ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $customer->phone?></span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <div class="user-card">
                                                                    <div class="user-info">
                                                                        <span><?php echo $customer->email ?></span>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-lg">
                                                                <span><?php echo $customer->last_envio?></span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li><a href="edit-customer/<?php echo $customer->id ?>"><em class="icon fa-solid fa-user-pen"></em><span>Editar</span></a></li>
                                                                                <li data="<?php echo $customer->id?>" class="pointer-on delete-customer-tabla icon-danger"><a><em class="icon fa-regular fa-trash-can"></em><span>Eliminar</span></a></li>
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