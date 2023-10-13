<div class="nk-block-head between-start  mx-3">
    <div class="nk-block-head-content">
        <h4 class="nk-block-title">Listado de sedes</h4>
    </div>
    <div><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addSede"><a class="text-white">Agregar
                Sede</a></button></div>
</div>
<div class="card card-bordered card-preview mx-3">
    <table class="table table-orders">
        <thead class="tb-odr-head">
            <tr class="tb-odr-item">
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Nombre</span>
                </th>
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Dirección</span>
                </th>
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Ciudad</span>
                </th>
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Departamento</span>
                </th>
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Teléfono</span>
                </th>
                <th class="tb-odr-info">
                    <span class="tb-odr-id">Estado</span>
                </th>


                <th class="tb-odr-info"></th>
            </tr>
        </thead>
        <tbody class="tb-odr-body">
            <?php foreach(Sedes::getSedesAllTabled() as $sede) {?>
            <tr id="data-sede-<?php echo $sede->sede_code?>" class="tb-odr-item">
                <td class="tb-odr-amount" key="name" data="<?php echo $sede->sede_name?>">
                    <span class="tb-odr-total">
                        <span class="amount"><?php echo $sede->sede_name?></span>
                        <span class="sub-text">CODIGO: <?php echo $sede->sede_code?></span>
                    </span>
                </td>
                <td class="tb-odr-amount" key="address" data="<?php echo $sede->sede_address?>">
                    <span class="tb-odr-total">
                        <span class="amount"><?php echo $sede->sede_address?></span>
                    </span>
                </td>
                <td class="tb-odr-amount" key="city" data="<?php echo $sede->sede_city?>">
                    <span class="tb-odr-total">
                        <span class="amount"><?php echo showNameCity($sede->sede_city)?></span>
                    </span>
                </td>
                <td class="tb-odr-amount" key="departamento" data="<?php echo $sede->sede_departamento?>">
                    <span class="tb-odr-total">
                        <span class="amount"><?php echo $sede->sede_departamento?></span>
                    </span>
                </td>
                <td class="tb-odr-amount" key="phone" data="<?php echo $sede->sede_phone?>">
                    <span class="tb-odr-total">
                        <span class="amount"><?php echo $sede->sede_phone?></span>
                    </span>
                </td>
                <td class="tb-odr-amount" key="status" type-inp="checkbox" data="<?php echo $sede->sede_status?>">
                    <span class="tb-odr-status">
                        <?php if($sede->sede_status) :?>
                        <span class="badge badge-dot bg-success">Activa</span>
                        <?php else:?>
                        <span class="badge badge-dot bg-danger">Inactiva</span>
                        <?php endif;?>
                    </span>
                </td>
                <td class="tb-odr-action">
                    <div class="dropdown">
                        <a class="text-soft dropdown-toggle btn btn-icon btn-trigger" data-bs-toggle="dropdown"
                            data-offset="-8,0"><em class="icon ni ni-more-h"></em></a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs">
                            <ul class="link-list-plain">
                                <li><a sede="<?php echo $sede->sede_code?>"
                                        class=" pointer-on text-primary btn-dropdown-edit-sede">Editar</a>
                                </li>
                                <li><a data="<?php echo $sede->sede_code ?>"
                                        class="text-danger pointer-on btn-delete-sede-tabla">Eliminar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>

<!-- content @e -->
<?php Modal::EditSedeModal() ?>
<?php Modal::addSedeModal() ?>