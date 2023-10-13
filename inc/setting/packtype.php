<div class="nk-block-head between-start mx-3 mb-4">
    <div class="nk-block-head-content align-self-center ">
        <h4 class="nk-block-title">Tipo de embalaje</h4>
    </div>
    <a class=" pointer-on btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTypePackModal"><em class="icon fa-solid fa-boxes-packing  me-2"></em>Agregar tipo de embalaje</a>
</div>
<div class="card card-bordered card-preview mx-3 mb-3">
    <table class="table table-ulogs">
        <thead class="table-light">
            <tr>
                <th class="tb-col-ip"><span class="overline-title">Tipo de embalaje</span></th>
                <th class="tb-col-ip"><span class="overline-title">Estado</span></th>
                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(Core::GetTypePackAll() as $packages) { ?>
            <tr id="tr-type-pack-<?php echo $packages->id ?>">
                <td class="tb-col-os"><?php echo $packages->name?></td>
                <td class="tb-col-ip">
                    <div class="g">
                        <div class="custom-control custom-control-sm custom-switch">
                            <input type="checkbox" data="<?php echo $packages->id ?>" class="custom-control-input switch-admin-typePack" <?php echo Core::checked($packages->status)?> id="typePack<?php echo $packages->id?>">
                            <label class="custom-control-label" for="typePack<?php echo $packages->id?>"></label>
                        </div>
                    </div>
                </td>
                <td class="tb-col-action">
                    <a data="<?php echo $packages->id?>" class="pointer-on link-cross me-sm-n1 btn-delete-typepack">
                        <em class="icon fa-regular fa-trash-can"></em>
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<?php Modal::AddTypePackModal()?>