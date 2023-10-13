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
                                                <h4 class="nk-block-title">Lista de Envíos</h4>
                                            </div>
                                            <a class="pointer-on btn btn-primary text-white buscador-envios" data-bs-toggle="modal" data-bs-target="#filterShippingModal" >
                                                <em class="icon fa-solid fa-magnifying-glass"></em>&nbsp;Buscar
                                            </a>
                                            <a href="addEnvio" class="btn btn-primary text-white "><em class="icon fas fa-box"></em>&nbsp;Agregar Guía</a>
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
                                                            <th class="nk-tb-col"><span class="sub-text">Origen / Destino</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Remitente / Destinatario</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Sede</span></th>
                                                            <th class="nk-tb-col tb-col-lg"><span class="sub-text">Estado</span></th>
                                                            <th class="nk-tb-col nk-tb-col-tools text-end"></th>
                                                        </tr>
                                                        <!--cabezera-->
                                                    </thead>
                                                    <!--body-->
                                                    <tbody>
                                                        <?php foreach(Envios::GetShipments()['data'] as $envio ){ ?>
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col">
                                                                <span><a href="ver_guia/<?php echo $envio->guia ?>"><?php echo $envio->guia ?></a></span>
                                                            </td>
                                                            <td class="nk-tb-col">
                                                                <span><?php echo $envio->fecha ?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $envio->asesor ?></span>
                                                            </td>
                                                             <td class="nk-tb-col tb-col-mb">
                                                                <div class="badge rounded-pill bg-outline-success"><?php echo $envio->origen?></div>
                                                                <div class="badge rounded-pill bg-outline-info"><?php echo $envio->destino?></div>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span class="badge rounded-pill bg-outline-success"><?php echo $envio->sender ?></span>
                                                                <span class="badge rounded-pill bg-outline-info"><?php echo $envio->receiver ?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span><?php echo $envio->sede?></span>
                                                            </td>
                                                            <td class="nk-tb-col tb-col-mb">
                                                                <span class="badge rounded-pill badge-dim bg-primary"><?php echo $envio->status?></span>
                                                            </td>
                                                            <td class="nk-tb-col nk-tb-col-tools">
                                                                <ul class="nk-tb-actions gx-1">
                                                                    <div class="drodown">
                                                                        <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                        <div class="dropdown-menu dropdown-menu-end">
                                                                            <ul class="link-list-opt no-bdr">
                                                                                <li class="pointer-on"><a href="ver_guia/<?php echo $envio->guia ?>"><em class="icon far fa-eye"></em><span>Ver</span></a></li>
                                                                                <li class="pointer-on icon-info"><a href="guia/<?php echo $envio->guia ?>" target="_blanck"  ><em class="icon fas fa-barcode"></em><span>Guia</span></a></li>
                                                                                <li class="pointer-on icon-info"><a href="factura/<?php echo $envio->id ?>" target="_blanck"  ><em class="icon fa-solid fa-file-invoice"></em><span>Factura</span></a></li>
                                                                                <?php if(Users::CheckPermisosUser('cancel_shipping', '', '', '', true)) : ?>
                                                                                <li class="pointer-on icon-danger"><a class="cancel-shipments" data-guia="<?php echo $envio->guia ?>"><em class="icon fas fa-ban"></em><span>Cancelar</span></a></li>
                                                                                <?php endif;?>
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