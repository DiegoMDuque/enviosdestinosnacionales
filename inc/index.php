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
                                <?php $core = new Core;  ?>

                                <script>
                                const extra_kilo_cost = "<?php echo $core->extra_kilo_cost?>";
                                const first_kilo_cost = "<?php echo $core->first_kilo_cost?>"
                                const seguro = "<?php echo $core->seguro?>"
                                const maximo_asegurado = "<?php echo $core->maximo_asegurado?>"
                                const manejo_fijo = "<?php echo $core->manejo_fijo?>"
                                const iva = "<?php echo $core->iva?>"
                                </script>
                                <div class="d-md-flex justify-content-center">
                                    <div class="col-12 col-md-6 card-bordered shadow-sm mx-1">
                                        <div class="border-bottom p-3 mb-1">
                                            <h6 class="title"><em class="icon fas fa-calculator mx-2"></em>Calculadora</h6>
                                        </div>
                                        <form id="calculadora">

                                            <div class="p-2">
                                                <div class="row" >
                                                    <!--Peso -->
                                                    <div class="form-group col-6">
                                                        <label class="form-label" for="default-03">Peso Kg.</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas fa-weight"></em>
                                                            </div>
                                                            <input type="text" class="form-control input-type-peso" name=="weight" id="weight" value="0" placeholder="Peso Kg.">
                                                        </div>
                                                    </div>
                                                    <!--Peso -->
                                                    <div class="form-group col-6">
                                                        <label class="form-label" for="default-03">Valor declarado</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas fa-dollar-sign"></em>
                                                            </div>
                                                            <input type="text" class="form-control formato-peso" name="valor_declarado" id="valor_declarado" placeholder="Valor declarado">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Volumen-->
                                                <div class="row pack-volumen-element" data-volumen-element="1">
                                                    <label class="form-label" for="default-03">Volumen</label>
                                                    <!--Alto-->
                                                    <div class="form-group col-4">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas fa-ruler-vertical"></em>
                                                            </div>
                                                            <input type="text" class="form-control valumen-high volumen-input-type" name="high" id="high-1" placeholder="Alto" value="0">
                                                        </div>
                                                    </div>
                                                    <!--Alto-->
                                                    <div class="form-group col-4">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas fa-ruler-horizontal"></em>
                                                            </div>
                                                            <input type="text" class="form-control valumen-width volumen-input-type" name="width" id="width-1" placeholder="Ancho" value="0">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-4">
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas fa-ruler-combined"></em>
                                                            </div>
                                                            <input type="text" class="form-control valumen-length volumen-input-type" name="length" id="length-1" placeholder="Largo" value="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Volumen-->
                                                <div class="row mb-2">
                                                    <div class="form-group col-6">
                                                        <label class="form-label" for="default-03">RT Fuente</label>
                                                        <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                <em class="icon fas-solid fa-percent"></em>
                                                            </div>
                                                            <input type="number" class="form-control" name=="rtfuente" id="rtfuente" value="0" placeholder="RT Fuente">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-6">
                                                        <label class="form-label" for="default-03">Descuento</label>
                                                        <div class="form-control-wrap">
                                                            <select name="descuento" id="descuento" class="form-select js-select2" data-search="on" placeholder="Recojida">
                                                                <?php foreach(Descuento::GetSelect() as $descuento) {?>
                                                                    <option cost="<?php echo $descuento->val ?>" value="<?php echo $descuento->val ?>"><?php echo $descuento->text ?>
                                                                </option>
                                                                <?php }?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="preview-block">
                                                            <div class="my-2 overline-title d-flex">
                                                                <em
                                                                    class="text-success fa-solid fa-truck  mx-1"></em>Recogida
                                                                <div
                                                                    class="custom-control custom-control-sm custom-switch mx-2">
                                                                    <input name="pick_up_service" id="pick_up_service"
                                                                        type="checkbox"
                                                                        class="custom-control-input active-serives"
                                                                        data=".pick_up_service">
                                                                    <label class="custom-control-label"
                                                                        for="pick_up_service"></label>
                                                                </div>
                                                            </div>
                                                            <div class="row gy-4 no-show pick_up_service">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="select_pick_up_service[]"
                                                                                id="select_pick_up_service"
                                                                                class="form-select js-select2"
                                                                                data-search="on" multiple
                                                                                placeholder="Recojida">
                                                                                <?php foreach(Service::GetBySelec("pickup") as $pickUp) {?>
                                                                                <option cost="<?php echo $pickUp->cost ?>" value="<?php echo $pickUp->id ?>"> <?php echo $pickUp->text ?></option>
                                                                                <?php }?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="preview-block">
                                                            <div class="my-2 overline-title d-flex">
                                                                <em
                                                                    class="text-success fa-solid fa-truck  mx-1"></em>Compras
                                                                <div
                                                                    class="custom-control custom-control-sm custom-switch mx-2">
                                                                    <input name="shop_service" id="shop_service"
                                                                        type="checkbox"
                                                                        class="custom-control-input active-serives"
                                                                        data=".shop_service">
                                                                    <label class="custom-control-label"
                                                                        for="shop_service"></label>
                                                                </div>
                                                            </div>
                                                            <div class="row gy-4 no-show shop_service">
                                                                <div class="col-sm-12">
                                                                    <div class="form-group">
                                                                        <div class="form-control-wrap">
                                                                            <select name="select_shopping_service[]"
                                                                                id="select_shopping_service"
                                                                                data-search="on" multiple
                                                                                class="form-select js-select2"
                                                                                placeholder="Compras">
                                                                                <?php foreach(Service::GetBySelec("shop") as $shop) {?>
                                                                                <option cost="<?php echo $shop->cost ?>"
                                                                                    value="<?php echo $shop->id ?>">
                                                                                    <?php echo $shop->text ?>
                                                                                </option>
                                                                                <?php }?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="invoice-bills">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped col-12">
                                                            <thead>
                                                                <tr>
                                                                    <th class="w-100"></th>
                                                                </tr>
                                                            </thead>
                                                            <tfoot class="input-totali">
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Manejo</td>
                                                                    <td><input type="text" name="total_manejo"
                                                                            id="total_manejo" value="$00.0" readonly>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Servicios</td>
                                                                    <td><input type="text" name="total_servicios"
                                                                            id="total_servicios" value="$00.0" readonly>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Costo Envío</td>
                                                                    <td><input type="text" name="total_costo_envio"
                                                                            id="total_costo_envio" value="$00.0"
                                                                            readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Descuento</td>
                                                                    <td><input type="text" name="total_descuento"
                                                                            id="total_descuento" value="$00.0" readonly>
                                                                    </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2" style="border-top: 1px solid #dbdfea" >Subtotal</td>
                                                                    <td style="border-top: 1px solid #dbdfea"><input type="text" name="total_subtotal" id="total_subtotal" value="$00.0" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">RT Fuente</td>
                                                                    <td><input type="text" name="total_rtfuente"id="total_rtfuente" value="$00.0" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">IVA</td>
                                                                    <td><input type="text" name="total_iva" id="total_iva" value="$00.0" readonly></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="2"></td>
                                                                    <td colspan="2">Total</td>
                                                                    <td><input type="text" name="total_total" id="total_total" value="$00.0" readonly>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-end bg-light p-3">
                                                <button type="submit" class="btn btn-primary">Procesar</button>
                                            </div>
                                        </form>
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