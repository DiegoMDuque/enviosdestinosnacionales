<div class="nk-block-head between-start mx-3 mb-4">
    <div class="nk-block-head-content align-self-center ">
        <h4 class="nk-block-title">Lista de Ciudades</h4>
    </div>
    <a class=" pointer-on btn btn-primary" data-bs-toggle="modal" data-bs-target="#addCityModal"><em class="icon fa-solid fa-map-location"></em>&nbsp;Agregar Ciudad</a>
</div>
<div class="card card-bordered card-preview mx-3 mb-2">
    <table class="table table-ulogs ">
        <thead class="table-light">
            <tr>
                <th class="tb-col-ip"><span class="overline-title">Ciudad</span></th>
                <th class="tb-col-ip"><span class="overline-title">Envios</span></th>
                <th class="tb-col-time"><span class="overline-title">Pasajes</span></th>
                <th class="tb-col-action"><span class="overline-title">&nbsp;</span></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(City::GetAll() as $city) { ?>
            <tr id="tr-city-<?php echo $city->id ?>">
            
                <td class="tb-col-os">
                    <span class="preview-title overline-title"></span>
                    <?php echo $city->name?>
                </td>
                <td class="tb-col-ip">
                    <div class="d-flex">
                        <div class="g m-1">
                            <span class="preview-title overline-title">Origen</span>
                            <div class="custom-control custom-control-sm custom-switch">
                                <input type="checkbox" city="<?php echo $city->id ?>"  row="ciudad_status_envio_origen" class="custom-control-input switch-admin-city" <?php echo Core::checked($city->envio_origen)?> id="customCityEnvioOrigen<?php echo $city->id?>">
                                <label class="custom-control-label" for="customCityEnvioOrigen<?php echo $city->id?>"></label>
                            </div>
                        </div>
                        <div class="g m-1">
                            <span class="preview-title overline-title">Destino</span>
                            <div class="custom-control custom-control-sm custom-switch">
                                <input type="checkbox" city="<?php echo $city->id ?>"  row="ciudad_status_envio_destino" class="custom-control-input switch-admin-city" <?php echo Core::checked($city->envio_destino)?> id="customCityEnvioDestino<?php echo $city->id?>">
                                <label class="custom-control-label" for="customCityEnvioDestino<?php echo $city->id?>"></label>
                            </div>
                        </div>
                    </div>
                </td>
                <td class="tb-col-ip">
                    <span class="preview-title overline-title"> &nbsp;  </span>
                    <div class="g">
                        <div class="custom-control custom-control-sm custom-switch">
                            <input type="checkbox" city="<?php echo $city->id ?>" row="ciudad_status_pasaje" class="custom-control-input switch-admin-city" <?php echo Core::checked($city->pasaje)?> id="customCityPasajes<?php echo $city->id?>">
                            <label class="custom-control-label" for="customCityPasajes<?php echo $city->id?>"></label>
                        </div>
                    </div>
                </td>
                <td class="tb-col-action">
                    <span class="preview-title overline-title"> </span>
                    <a data="<?php echo $city->id?>" class="pointer-on link-cross me-sm-n1 btn-delete-city">
                        <em class="icon fa-regular fa-trash-can"></em>
                    </a>
                </td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>
</div>
<?php Modal::AddCityModal()?>