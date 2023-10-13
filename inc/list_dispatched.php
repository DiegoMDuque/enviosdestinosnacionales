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
                                                <h4 class="nk-block-title">Lista de Despachos</h4>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="false">
                                                    <thead>
                                                        <!--cabezeza-->
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col"><span class="sub-text">ID</span></th>
                                                            <th class="nk-tb-col tb-col-md"><span class="sub-text">Fecha</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Asesor</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Sede</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Cantidad</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Estado</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                                        </tr>
                                                        <!--cabezera-->
                                                    </thead>
                                                    <!--body-->
                                                    <tbody>
                                                        <?php foreach(Dispatched::GetAll() as $dispatched ){ ?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <span><a href="PrintDispatched/<?php echo $dispatched->id ?>"><?php echo $dispatched->id ?></a></span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <span><?php echo $dispatched->fecha ?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $dispatched ->asesor ?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $dispatched->sede?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $dispatched->quanty?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span class="badge rounded-pill badge-dim bg-primary"><?php echo statusDispatchedName($dispatched->status)?></span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li class="pointer-on"><a href="PrintDispatched/<?php echo $dispatched->id ?>"><em class="icon far fa-eye"></em><span>Ver</span></a></li>
                                                                                <?php if($dispatched->status == 1){ ?>
                                                                                <li class="pointer-on icon-danger"><a class="cancel-dispatched" data-dispatched="<?php echo $dispatched->id ?>"><em class="icon fas fa-ban"></em><span>Cancelar</span></a></li>
                                                                                <?php }?>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </ul>
                                                            </td>
                                                        </tr>
                                                        <?php }?>
                                                    </tbody>
                                                    <!--body-->
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
                <?php Modal::FiltershippingModal() ?>
                <?php require Core::RequiereInc('footer'); ?>
                <!-- footer @e -->
            </div>
            <!-- wrap @e -->