<div class="col-12 mb-md-2">
    <div class="row">
        <div class="mb-2 mb-md-0 col-12 col-md-6">
            <div class="card card-bordered p-2">
                <div class="preview-block">
                    <div class="my-2 preview-title-lg  overline-title d-flex">
                        <em class="text-success fa-solid fa-truck  mx-1"></em>
                        Servicios de Recogida
                        <div class="custom-control custom-control-sm custom-switch mx-2">
                            <input <?php checkedGet('pick_up_service', 'calculadora')  ?> name="pick_up_service" id="pick_up_service" type="checkbox" class="custom-control-input active-serives" data=".pick_up_service">
                            <label class="custom-control-label" for="pick_up_service"></label>
                        </div>
                    </div>
                    <div class="row gy-4 <?php noShowClassGet('pick_up_service', 'no-show', 'calculadora') ?> pick_up_service">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="pick_up_service">Recogida</label>
                                <div class="form-control-wrap">
                                    <select name="select_pick_up_service[]" id="select_pick_up_service" class="form-select js-select2" data-search="on" multiple placeholder="Recojida">
                                        <?php foreach (Service::GetBySelec("pickup") as $pickUp) { ?>
                                            <option <?php selectedGetValue('pick_up_service_select', $pickUp->id, 'calculadora') ?> cost="<?php echo $pickUp->cost ?>" value="<?php echo $pickUp->value ?>"><?php echo $pickUp->text ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-2 mb-md-0 col-12 col-md-6">
            <div class="card card-bordered p-2">
                <div class="preview-block">
                    <div class="my-2 preview-title-lg  overline-title d-flex">
                        <em class="text-success fa-solid fa-basket-shopping  mx-1"></em>
                        Servicios de compras
                        <div class="custom-control custom-control-sm custom-switch mx-2">
                            <input <?php checkedGet('shop_service', 'calculadora') ?> name="shop_service" id="shop_service" type="checkbox" class="custom-control-input active-serives" data=".shop_service">
                            <label class="custom-control-label" for="shop_service"></label>
                        </div>
                    </div>
                    <div class="row  gy-4 <?php noShowClassGet('shop_service', 'no-show', 'calculadora') ?> shop_service">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label class="form-label" for="shop_service">Compras</label>
                                <div class="form-control-wrap">
                                    <select name="select_shopping_service[]" id="select_shopping_service" data-search="on" multiple class="form-select js-select2" placeholder="Compras">
                                        <?php foreach (Service::GetBySelec("shop") as $shop) { ?>
                                            <option <?php selectedGetValue('shop_service_select', $shop->id, 'calculadora') ?> cost="<?php echo $shop->cost ?>" value="<?php echo $shop->value ?>"><?php echo $shop->text ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>