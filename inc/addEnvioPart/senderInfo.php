<div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <span class="my-2 preview-title-lg  overline-title"><em class="text-success fa-regular fa-circle-question mx-1"></em>Información del remitente</span>
                                                    <div class="row gy-4">
                                                        <div class="col-sm-6 ">
                                                            <div class="form-group">
                                                                <label class="form-label" id="dni_sender_label" for="dni_sender">Cédula</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="input" name="dni_sender" id="dni_sender" inset-name="#name_sender" inset-phone="#phone_sender" class="form-control dniGetInfomation" placeholder="Cédula" value="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Nombre',
                                                            'placeholder' => 'Nombre',
                                                            'name'        => 'name_sender',
                                                            'id'          => 'name_sender',
                                                            'classInput'  => 'select2Customers'
                                                        ));

                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Teléfono',
                                                            'placeholder' => 'Teléfono',
                                                            'name'        => 'phone_sender',
                                                            'id'          => 'phone_sender',
                                                            'classInput'  => 'phone-select'
                                                        ));
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Sede',
                                                            'name'        => 'sede',
                                                            'placeholder' => 'sede',
                                                            'id'          => 'sede',
                                                            'argument'    => array('readonly'),
                                                            'value'       =>  SedeName(Users::getUserById(Users::getUser())->sede)
                                                        ));
                                                        input(array(
                                                            'type'        => 'input',
                                                            'label'       => 'Origen',
                                                            'name'        => 'origen',
                                                            'placeholder' => 'Origen',
                                                            'id'          => 'origen',
                                                            'argument'    => array('readonly'),
                                                            'value'       => ShowNameCiteBySede(Users::getUserById(Users::getUser())->sede), 
                                                        ));
                                                        

                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>