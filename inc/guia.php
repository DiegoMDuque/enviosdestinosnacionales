            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require Core::RequiereInc('header'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <?php $core = new Core ?>
                <div class="nk-content bg-gray-100 ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="components-preview mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block between-start ">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-solid fa-box  mx-1"></em>Guía: <?php echo $Shipments->guia ?> </span>
                                                    <div class="dropdown">
                                                        <a href="#" class="dropdown-toggle btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Acción</a>
                                                        <div class="dropdown-menu">
                                                            <ul class="link-list-plain no-bdr">
                                                                <li class="pointer-on"><a href="ver_guia/<?php echo $Shipments->guia ?>"><em class="icon far fa-eye"></em><span>Ver</span></a></li>
                                                                <li class="pointer-on icon-info"><a href="guia/<?php echo $Shipments->guia ?>" target="_blanck"  ><em class="icon fas fa-barcode"></em><span>Guía</span></a></li>
                                                                <li class="pointer-on icon-info"><a href="factura/<?php echo $Shipments->id ?>" target="_blanck"  ><em class="icon fa-solid fa-file-invoice"></em><span>Factura</span></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row mx-md-5" >
                                                    <div class="col-4 mb-2">
                                                        <h5>Sede</h5>
                                                        <span><?php echo SedeName($Shipments->sede) ?></span>
                                                    </div>
                                                    <div class="col-4 mb-4">
                                                        <h5>Asesor</h5>
                                                        <span><?php echo $Shipments->asesor ?></span>
                                                    </div>
                                                    <div class="col-4 mb-4">
                                                        <h5>Fecha</h5>
                                                        <span><?php echo $Shipments->fecha ?></span>
                                                    </div>
                                                    <div class="col-4 mb-4">
                                                        <h5>Origen</h5>
                                                        <span><?php echo $Shipments->origen ?></span>
                                                    </div>
                                                    <div class="col-4 mb-4">
                                                        <h5>Destino</h5>
                                                        <span><?php echo $Shipments->destino ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner pb-0">
                                                <div class="preview-block between-start ">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-solid fa-box  mx-1"></em>Servicios</span>
                                                </div>
                                            </div>
                                            <table class="table table-tranx">
                                                <thead>
                                                    <tr class="tb-tnx-head">
                                                        <th class="tb-tnx-id"><span class="">#</span></th>
                                                        <th class="tb-tnx-info">Servicios</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach($Shipments->servicios->items as $servicios) {?>
                                                    <tr class="tb-tnx-item">
                                                        <td class="tb-tnx-id">
                                                            <a><span><?php echo showTypeServices($servicios->type,'icon') . ' #'. $servicios->id ?></span></a>
                                                        </td>
                                                        <td class="tb-tnx-info"><?php echo $servicios->services ?></td>
                                                    </tr>
                                                    <?php }?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner pb-0">
                                                <div class="preview-block between-start ">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-solid fa-user-large mx-1 "></em>Remitente</span>
                                                </div>
                                                <div class="row mx-5 mb-2" >
                                                    <div class="col-4 mb-2">
                                                        <h5>Nombre</h5>
                                                        <span><?php echo $Shipments->sender->name ?></span>
                                                    </div>
                                                    <div class="col-4 mb-2">
                                                        <h5>Telefono</h5>
                                                        <span><?php echo $Shipments->sender->phone?></span>
                                                    </div>
                                                    <div class="col-4 mb-2">
                                                        <h5>Cédula</h5>
                                                        <span><?php echo $Shipments->sender->dni?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner pb-0">
                                                <div class="preview-block between-start ">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-solid fa-user-large mx-1 "></em>Destinatario</span>
                                                </div>
                                                <div class="row mx-5 mb-2" >
                                                    <div class="col-4 mb-2">
                                                        <h5>Nombre</h5>
                                                        <span><?php echo $Shipments->receiver->name ?></span>
                                                    </div>
                                                    <div class="col-4 mb-2">
                                                        <h5>Telefono</h5>
                                                        <span><?php echo $Shipments->receiver->phone?></span>
                                                    </div>
                                                    <div class="col-4 mb-2">
                                                        <h5>Cédula</h5>
                                                        <span><?php echo $Shipments->receiver->dni?></span>
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