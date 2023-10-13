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
                                <div class="components-preview wide-md mx-auto">
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div class="card-inner">
                                                <div class="preview-block">
                                                    <form id="editCustomer" class="row gy-4" enctype="multipart/form-data">
                                                        <div class="col-sm-6 d-none">
                                                            <input type="text" class="form-control" name="id" id="id" placeholder="Nombre" value="<?php echo $customer->id?>">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fname">Nombre <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" value="<?php echo $customer->name?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="dni">Cédula <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Cédula" value="<?php echo $customer->dni?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Correo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Correo" value="<?php echo $customer->email?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Teléfono <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control phone-select" name="phone" id="phone" placeholder="Teléfono" value="<?php echo $customer->phone?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="address">Dirección<span class="text-danger" ></span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Dirección" value="<?php echo $customer->address?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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