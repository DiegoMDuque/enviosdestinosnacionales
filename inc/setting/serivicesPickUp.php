<div class="nk-block-head between-start mx-3 mb-4">
    <div class="nk-block-head-content align-self-center ">
        <h4 class="nk-block-title">Servicios de recogida</h4>
    </div>
    <a class=" pointer-on btn btn-primary" data-bs-toggle="modal" data-bs-target="#addpickupModal"><em class="icon fa-solid fa-plus"></em>&nbsp; Agregar</a>
</div>
<div class="card card-bordered card-preview mx-3 mb-3">
    <table class="table table-ulogs">
        <thead class="table-light">
            <tr>
                <th class="tb-col-ip"><span class="overline-title">Nombre</span></th>
                <th class="tb-col-ip"><span class="overline-title">Costo</span></th>
                <th class="tb-col-ip"><span class="overline-title">Status</span></th>
                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(Service::getAll('pickup') as $pickUp) { ?>
            <tr id="tr-pick_up_service-<?php echo $pickUp->id ?>">
                <td class="tb-col-os"><?php echo $pickUp->name?></td>
                <td class="tb-col-os"><?php echo currency($pickUp->cost)?></td>
                <td class="tb-col-ip">
                    <div class="g">
                        <div class="custom-control custom-control-sm custom-switch">
                            <input type="checkbox" data="<?php echo $pickUp->id ?>" class="custom-control-input switch-status-service" type_services="pickup" <?php echo Core::checked($pickUp->status)?> id="customSericePickUp<?php echo $pickUp->id?>">
                            <label class="custom-control-label" for="customSericePickUp<?php echo $pickUp->id?>"></label>
                        </div>
                    </div>
                </td>
                <td class="tb-col-action">
                    <a data="<?php echo $pickUp->id?>" type-services="pick_up_service" class="pointer-on link-cross me-sm-n1 btn-delete-services">
                        <em class="icon fa-regular fa-trash-can"></em>
                    </a>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>
<?php Modal::AddServiceModal('pickup') ?>