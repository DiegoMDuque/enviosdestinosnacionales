<div class="card-inner pt-0">
    <?php $core = new Core ?>
    <h4 class="title nk-block-title">Configuración General</h4>
    <form id="generalConfig" class="gy-3 form-settings">
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">Costo Kilo adicional</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control formato-peso" name="extra_kilo_cost" id="extra_kilo_cost" value="<?php echo currency($core->extra_kilo_cost) ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">Costo primer kilo</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control formato-peso" name="first_kilo_cost" id="first_kilo_cost" value="<?php echo currency($core->first_kilo_cost) ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">Maximo Valor declarado</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control formato-peso" name="maximo_asegurado" id="maximo_asegurado" value="<?php echo currency($core->maximo_asegurado) ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">Manejo Fijo</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <input type="text" class="form-control formato-peso" name="manejo_fijo" id="manejo_fijo" value="<?php echo currency($core->manejo_fijo) ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">Manejo</label>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-text-hint">
                            <span class="overline-title">%</span>
                        </div>
                        <input type="number" class="form-control" name="seguro" id="seguro" value="<?php echo $core->seguro ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3 align-center">
            <div class="col-lg-5">
                <div class="form-group">
                    <label class="form-label" for="comp-name">IVA</label>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="form-group">
                    <div class="form-control-wrap">
                        <div class="form-text-hint">
                            <span class="overline-title">%</span>
                        </div>
                        <input type="number" class="form-control" name="iva" id="iva" value="<?php echo $core->iva ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-3">
            <div class="col-lg-7">
                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-lg btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </form>
</div>