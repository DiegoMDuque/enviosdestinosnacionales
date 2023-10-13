<div class="nk-block-head between-start mx-3 mb-4">
    <div class="nk-block-head-content align-self-center ">
        <h4 class="nk-block-title">Descuentos</h4>
    </div>
    <a class=" pointer-on btn btn-primary" data-bs-toggle="modal" data-bs-target="#addDescuentoModal"><em class="icon fa-solid fa-tag  me-2"></em>Agregar Descuentos</a>
</div>
<div class="card card-bordered card-preview mx-3 mb-3">
    <table class="table table-ulogs">
        <thead class="table-light">
            <tr>
                <th class="tb-col-ip"><span class="overline-title">Nombre</span></th>
                <th class="tb-col-ip"><span class="overline-title">Descuento</span></th>
                <th class="tb-col-ip"><span class="overline-title">Status</span></th>
                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(Descuento::GetDescuentoAll() as $Descuento) { ?>
            <tr id="tr-descuento-<?php echo $Descuento->id ?>">
                <td class="tb-col-os"><?php echo $Descuento->name?></td>
                <td class="tb-col-ip"><?php echo $Descuento->quant?>%</td>
                <td class="tb-col-ip">
                    <div class="g">
                        <div class="custom-control custom-control-sm custom-switch">
                            <input type="checkbox" data="<?php echo $Descuento->id ?>" class="custom-control-input switch-admin-descuento" <?php echo Core::checked($Descuento->status)?> id="descuento<?php echo $Descuento->id?>">
                            <label class="custom-control-label" for="descuento<?php echo $Descuento->id?>"></label>
                        </div>
                    </div>
                </td>
                <td class="tb-col-action">
                    <a data="<?php echo $Descuento->id?>" class="pointer-on link-cross me-sm-n1 btn-delete-descuento">
                        <em class="icon fa-regular fa-trash-can"></em>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php Modal::AddDescuentoModal()?>