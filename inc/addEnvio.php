            <!-- wrap @s -->
            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require Core::RequiereInc('header'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <?php $core = new Core ?>
                <script>
                    const extra_kilo_cost = "<?php echo $core->extra_kilo_cost ?>";
                    const first_kilo_cost = "<?php echo $core->first_kilo_cost ?>"
                    const seguro = "<?php echo $core->seguro ?>"
                    const maximo_asegurado = "<?php echo $core->maximo_asegurado ?>"
                    const manejo_fijo = "<?php echo $core->manejo_fijo ?>"
                    const iva = "<?php echo $core->iva ?>"
                </script>
                <div class="nk-content bg-gray-100 ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <form id="formAddNewPackaging" class="components-preview mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="nk-block-head">
                                            <div class="nk-block-head-content">
                                                <h4 class="title nk-block-title"><em class=" icon-lg fa-solid fa-box mx-3"></em>Agrega Envió</h4>
                                            </div>
                                        </div>
                                        <!--Servicios-->
                                        <?php require 'inc/addEnvioPart/servicios.php' ?>
                                        <!--Servicios-->
                                        <!--sender-->
                                        <?php require 'inc/addEnvioPart/senderInfo.php' ?>
                                        <!--sender-->
                                        <!--reciber-->
                                        <?php require 'inc/addEnvioPart/reciber.php' ?>
                                        <!--reciber-->

                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-solid fa-box  mx-1"></em>Información de envío</span>
                                                    <div class="row gy-4">
                                                        <?php
                                                        input(array(
                                                            'type'        => 'number',
                                                            'label'       => 'Cantidad',
                                                            'placeholder' => 'Cantidad',
                                                            'name'        => 'quanty',
                                                            'id'          => 'quanty',
                                                            'col'         => '4',
                                                            'value'       => 1,
                                                        ));
                                                        input(array(
                                                            'type'        => 'select',
                                                            'label'       => 'Tipo Embalaje',
                                                            'placeholder' => 'Tipo Embalaje',
                                                            'name'        => 'embalaje',
                                                            'id'          => 'embalaje',
                                                            'classSelect' => 'select2-embalaje',
                                                            'col'         => '4'
                                                        ));
                                                        input(array(
                                                            'type'        => 'select',
                                                            'label'       => 'Empresa de mensajería',
                                                            'placeholder' => 'Empresa de mensajería',
                                                            'name'        => 'courier',
                                                            'id'          => 'courier',
                                                            'classSelect' => 'select2EmpresaDeMensajería',
                                                            'col'         => '4'
                                                        ));
                                                        input(array(
                                                            'type'        => 'text',
                                                            'label'       => 'Valor declarado',
                                                            'placeholder' => '00',
                                                            'name'        => 'valor_declarado',
                                                            'id'          => 'valor_declarado',
                                                            'col'         => '4',
                                                            'value'       => '0',
                                                            'classInput'  => 'formato-peso',
                                                            'value'       => usGET('calculadora', 'valorDeclarado', 0)
                                                        ));
                                                        
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'RT Fuente',
                                                            'placeholder' => 'rtfuente',
                                                            'name'        => 'rtfuente',
                                                            'id'          => 'rtfuente',
                                                            'col'         => '4',
                                                            'value'       => 0,
                                                            'icon'        => array('icon' => 'fa-solid fa-percent', 'aling' => 'right')
                                                        ));
                                                        input(array(
                                                            'type'        => 'select',
                                                            'label'       => 'Descuento',
                                                            'placeholder' => 'Descuento',
                                                            'name'        => 'descuento',
                                                            'id'          => 'descuento',
                                                            'col'         => '4',
                                                            'value'       => 0,
                                                            'icon'        => array('icon' => 'ni ni-offer', 'aling' => 'right'),
                                                            'option'     => Descuento::GetSelect(),
                                                            'classSelect' => 'js-select2',
                                                        ));
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Peso (Kg.)',
                                                            'placeholder' => 'Peso (Kg)',
                                                            'name'        => 'weight',
                                                            'id'          => 'weight',
                                                            'classInput'  => 'input-type-peso',
                                                            'col'         => '4',
                                                            'value'       => usGET('calculadora', 'weight', 0),
                                                        ));
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Descripción',
                                                            'placeholder' => 'Descripción',
                                                            'name'        => 'description',
                                                            'id'          => 'description',
                                                            'col'         => '4'
                                                        ));
                                                        ?>
                                                        <div><button id="addSectionPack" type="button" class="btn btn-primary">Adicionar Caja o Paquetes</button></div>
                                                        <table class="mt-1">
                                                            <thead>
                                                                <tr class="bg-primary-edn text-white text-center">
                                                                    <th class="py-2" >Alto (cm)</th>
                                                                    <th class="py-2" >Ancho (cm)</th>
                                                                    <th class="py-2" >Largo (cm)</th>
                                                                    <th class="py-2" ></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="areas_pack">
                                                                <?php $idArea = rand(100, 400) ?>
                                                                <tr id="areapack_<?php echo $idArea ?>" class="pack-volumen-element" data-volumen-element="<?php echo $idArea?>">
                                                                    <td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type valumen-high"   name="high[]"   id="high-<?php echo $idArea ?>" value="<?php usCal('high',   0)?>" ></div></td>
                                                                    <td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type volumen-width"  name="width[]"  id="width-<?php echo $idArea ?>" value="<?php usCal('width',  0)?>" ></div></td>
                                                                    <td class="col-4" ><div class="m-2 p-1 bg-gray-100"><input class="form-control volumen-input-type volumen-length" name="length[]" id="length-<?php echo $idArea ?>" value="<?php usCal('length', 0)?>" ></div></td>
                                                                    <td><em onclick="deletePackByAdd(<?php echo $idArea ?>)" class=""></em> </td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner pt-0">
                                                <div class="preview-block">
                                                    <div class="invoice-bills">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="w-100"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tfoot class="input-totali">
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Manejo</td>
                                                                        <td><input type="text" name="total_manejo" id="total_manejo" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Servicios</td>
                                                                        <td><input type="text" name="total_servicios" id="total_servicios" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Costo Envío</td>
                                                                        <td><input type="text" name="total_costo_envio" id="total_costo_envio" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Descuento</td>
                                                                        <td><input type="text" name="total_descuento" id="total_descuento" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2" style="border-top: 1px solid #dbdfea">Subtotal</td>
                                                                        <td style="border-top: 1px solid #dbdfea"><input type="text" name="total_subtotal" id="total_subtotal" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">RT Fuente</td>
                                                                        <td><input type="text" name="total_rtfuente" id="total_rtfuente" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">IVA</td>
                                                                        <td><input type="text" name="total_iva" id="total_iva" value="$00.0" readonly></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"></td>
                                                                        <td colspan="2">Total</td>
                                                                        <td><input type="text" name="total_total" id="total_total" value="$00.0" readonly></td>
                                                                    </tr>
                                                                </tfoot>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-end mt-3">
                                            <button class="btn btn-primary"><em class="fa-regular fa-floppy-disk me-1 "></em>Crear</button>
                                        </div>
                                    </div>
                                </form>
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