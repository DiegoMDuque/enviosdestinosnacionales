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
                                                   <div class="col-12">
                                                      <div class="form-group">
                                                         <div class="form-control-wrap">
                                                            <div class="form-icon form-icon-left">
                                                                  <em class="icon fa-solid fa-barcode"></em>
                                                            </div>
                                                            <input type="text" class="form-control" id="InputBarcodeGuia" placeholder="Número de guía" autofocus>
                                                         </div>
                                                      </div>
                                                   </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <form id="formAddDispatched" class="components-preview wide-md mx-auto mt-3">
                                    <div class="nk-block nk-block-lg">
                                        <div class="card card-bordered card-preview">
                                            <div  class="card-inner">
                                                <div  class="preview-block">
                                                    <div class="card card-bordered card-preview">
                                                        <table class="table table-ulogs">
                                                            <thead class="table-light">
                                                                <tr>
                                                                    <th class="tb-col"><span class="overline-title"># GUÍA</span></th>
                                                                    <th class="tb-col"><span class="overline-title">Origen / Destino</span></th>
                                                                    <th class="tb-col"><span class="overline-title">Remitente / Destinatario</span></th>
                                                                    <th class="tb-col"><span class="overline-title">&nbsp;</span></th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            </tbody>
                                                        </table>
                                                        
                                                    </div>
                                                    
                                                </div>
                                                <div class="mt-5 mb-2 text-center" >
                                                    <button disabled class="btn btn-primary btn-sunmit-form-add-dispatched" >Crear Despacho</button>
                                                </div>
                                            </div>
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