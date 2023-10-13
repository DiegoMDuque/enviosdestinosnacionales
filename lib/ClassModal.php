
<?php

    class Modal{

        public static function EditSedeModal(){
            $optionCity = '';
            foreach (query("SELECT * FROM `ciudades` WHERE 1", 'ALL') as $value) {
                $optionCity .= '<option value="'.$value->ciudad_id .'">'.$value->ciudad_name.'</option>';
            }
            $select = '<select class="form-control" name="city" id="city" placeholder="Ciudad">'.$optionCity .'</select>';
            $Modal = '<!-- Modal -->
            
            <div class="modal fade" tabindex="-1" id="editSede">
                <div class="modal-dialog" role="document">
                    <form id="FormEditSedeModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Editar sede<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div id="EditSedeModalBody" class="modal-body modal-body-edit-sede row">
                            <input type="hidden" name="code" id="code"  >
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de sede">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="address">Dirrección</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Dirrecón">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="city">Ciudad</label>
                                    <div class="form-control-wrap">
                                        '.$select.'
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="departamento">Departamento</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Telefono</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control phone-select" name="phone" id="phone" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Estado</label>
                                    <div>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" name="status" id="status">
                                            <label class="custom-control-label" for="status"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';

            echo $Modal;
        }
        public static function addSedeModal(){
            $options = '';
            foreach(Sedes::codeFreeSede() as $code){
                $options .= '<option value="'.$code.'" >'.$code.'</option>';
            }
            $optionCity = '';
            foreach (query("SELECT * FROM `ciudades` WHERE 1", 'ALL') as $value) {
                $optionCity .= '<option value="'.$value->ciudad_id .'">'.$value->ciudad_name.'</option>';
            }
            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="addSede">
                <div class="modal-dialog" role="document">
                    <form id="FormAddSedeModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Sede<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="name">Codigo</label>
                                    <div class="form-control-wrap">
                                        <select name="code_new" id="code_new" class="form-select js-select2" data-search="on">
                                        <option selected disabled value="0" >--Codigo--</option>
                                        '.$options.'
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="name">Nombre</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de sede">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="address">Dirrección</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="address" id="address" placeholder="Dirrecón">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="city">Ciudad</label>
                                    <div class="form-control-wrap">
                                        <select class="form-control" name="city" id="city" placeholder="Ciudad">
                                            '.$optionCity .'
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="departamento">Departamento</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="departamento" id="departamento" placeholder="Departamento">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Teléfono</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
        
        public static function FiltershippingModal(){
            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="filterShippingModal">
                <div class="modal-dialog modal-dialog-top modal-xl" role="document">
                    <form id="formFilterShippingModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Filtrar envios<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body modal-body-edit-sede row">
                            <div class="col-sm-6 my-3">
                                <div class="form-group">
                                    <label class="form-label" for="fname">Fecha</label>
                                    <div class="form-control-wrap">
                                        <div class="d-flex">
                                            <input type="text" class="form-control dateTimer-filt" name="date_start" id="date_start" placeholder="Fecha desde">
                                            <div class="input-group-addon">TO</div>
                                            <input type="text" class="form-control dateTimer-filt" name="date_end" id="date_end" placeholder="Fecha hasta">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-3">
                                <div class="form-group">
                                    <label class="form-label">Asesor</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select filt-select2-asesor" name="filt_asesor" id="filt_asesor" data-search="on">
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 my-3">
                                <div class="form-group">
                                    <label class="form-label">Sedes</label>
                                    <div class="form-control-wrap">
                                        <select class="form-select filt-select2-sedes" name="filt_sede" id="filt_sede"  data-search="on">
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary" data-bs-dismiss="modal">
                            <em class="mx-2 icon fa-solid fa-filter"></em>Filtrar
                        </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';

            echo $Modal;
        }
        public static function AddCityModal(){

            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="addCityModal">
                <div class="modal-dialog" role="document">
                    <form id="FormAddCityModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Ciudad<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Nombre de la ciudad</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="city_name" id="city_name" placeholder="Nombre de la ciudad">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
        public static function AddTypePackModal(){

            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="addTypePackModal">
                <div class="modal-dialog" role="document">
                    <form id="FormAddTypePackModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Tipo de embalaje<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Nombre de tipo de embalaje</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="type_pack_name" id="city_name" placeholder="Nombre del tipo de embalaje">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary" data-bs-dismiss="modal">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
        public static function AddDescuentoModal(){

            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="addDescuentoModal">
                <div class="modal-dialog" role="document">
                    <form id="FormAddDescuentoModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Descuento<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Nombre</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="descuento_name" id="descuento_name" required placeholder="Nombre del descuento">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Cantidad</label>
                                    <div class="form-control-wrap">
                                        <input type="number" class="form-control" name="descuento_descuento" id="descuento_descuento" required placeholder="0%">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
        public static function AddConvenioModal(){

            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="addConvenioModal">
                <div class="modal-dialog" role="document">
                    <form id="FormAddConvenioModal" class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Convenio<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Nombre</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="convenio_name" id="convenio_name" required placeholder="Nombre del convenio">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light">
                            <button moda class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
        public static function AddServiceModal($services){

            $Modal = '<!-- Modal -->
            <div class="modal fade" tabindex="-1" id="add'.$services.'Modal">
                <div class="modal-dialog" role="document">
                    <form class="modal-content FormAdd-service-Modal">
                        <div class="modal-header">
                            <h5 class="modal-title">Agregar Sevicios<span id="modalTitle"></span></h5>
                            <a href="#" class="close" data-bs-dismiss="modal" aria-label="Close">
                                <em class="icon ni ni-cross"></em>
                            </a>
                        </div>
                        <div class="modal-body row">
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Nombre</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control" name="service_name" id="service_name" required placeholder="Nombre Servicio">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 my-1">
                                <div class="form-group">
                                    <label class="form-label" for="phone">Costo</label>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control formato-peso" name="service_costo" id="service_costo" required placeholder="Cotos del Serivio">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="service_type" value="'.$services.'">
                        </div>
                        <div class="modal-footer bg-light">
                            <button class="btn btn-primary">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Modal-->';


            echo $Modal;
        }
    }