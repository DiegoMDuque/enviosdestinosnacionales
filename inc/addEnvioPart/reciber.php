<div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-regular fa-circle-question mx-1"></em>Información del destinatario</span>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label class="form-label" id="dni_receiver_label" for="dni_receiver">Cédula</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="input" name="dni_receiver" id="dni_receiver" inset-name="#name_receiver" inset-phone="#phone_receiver" class="form-control dniGetInfomation" placeholder="Cédula" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Nombre',
                                                            'placeholder' => 'Nombre',
                                                            'name'        => 'name_receiver',
                                                            'id'          => 'name_receiver',
                                                        ));

                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Teléfono',
                                                            'placeholder' => 'Teléfono',
                                                            'name'        => 'phone_receiver',
                                                            'id'          => 'phone_receiver',
                                                            'classInput'  => 'phone-select'
                                                        ));
                                                        input(array(
                                                            'type'        => 'select',
                                                            'label'       => 'Destino',
                                                            'name'        => 'destino',
                                                            'id'          => 'destino',
                                                            'classSelect' => 'select2-city',
                                                            'placeholder' => 'Destino',
                                                        ));

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>