<div class="nk-block-head between-start mx-3 mb-4">
    <div class="nk-block-head-content align-self-center ">
        <h4 class="nk-block-title">Convenios</h4>
    </div>
    <a class=" pointer-on btn btn-primary" data-bs-toggle="modal" data-bs-target="#addConvenioModal"><em class="icon fa-solid fa-map-location"></em>&nbsp; Agregar Convenios</a>
</div>
<div class="card card-bordered card-preview mx-3 mb-3">
    <table class="table table-ulogs">
        <thead class="table-light">
            <tr>
                <th class="tb-col-ip"><span class="overline-title">Empresa</span></th>
                <th class="tb-col-ip"><span class="overline-title">Status</span></th>
                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(Convenios::getAll() as $convenio) { ?>
            <tr id="tr-convenio-<?php echo $convenio->id ?>">
                <td class="tb-col-os"><?php echo $convenio->name?></td>
                <td class="tb-col-ip">
                    <div class="g">
                        <div class="custom-control custom-control-sm custom-switch">
                            <input type="checkbox" data="<?php echo $convenio->id ?>" class="custom-control-input switch-status-convenio" <?php echo Core::checked($convenio->status)?> id="customConvenio<?php echo $convenio->id?>">
                            <label class="custom-control-label" for="customConvenio<?php echo $convenio->id?>"></label>
                        </div>
                    </div>
                </td>
                <td class="tb-col-action">
                    <a data="<?php echo $convenio->id?>" class="pointer-on link-cross me-sm-n1 btn-delete-convenio">
                        <em class="icon fa-regular fa-trash-can"></em>
                    </a>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>
<?php Modal::AddConvenioModal() ?>