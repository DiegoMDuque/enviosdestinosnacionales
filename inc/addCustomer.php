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
                                                    <form id="addCustomer" class="row gy-4" enctype="multipart/form-data">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="fname">Nombre Completo <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="name" id="name" placeholder="Nombre" >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="dni">Cédula <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="dni" id="dni" placeholder="Cédula">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="email">Correo</label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="email" id="email" placeholder="Correo">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label class="form-label" for="phone">Teléfono <span class="text-danger" >*</span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control phone-select" name="phone" id="phone" placeholder="Teléfono">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-12">
                                                            <div class="form-group">
                                                                <label class="form-label" for="address">Dirección<span class="text-danger" ></span></label>
                                                                <div class="form-control-wrap">
                                                                    <input type="text" class="form-control" name="address" id="address" placeholder="Dirección">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="text-end">
                                                            <button type="submit" class="btn btn-primary">Agregar Cliente</button>
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