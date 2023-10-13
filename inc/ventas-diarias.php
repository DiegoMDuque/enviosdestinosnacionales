<!-- wrap @s -->
<div class="nk-wrap ">
    <!-- main header @s -->
    <?php require Core::RequiereInc('header'); ?>
    <!-- main header @e -->
    <!-- content @s -->
    </script>
    <div class="nk-content bg-gray-100 ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview mx-auto">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title">Ventas diarias</h4>
                                </div>
                            </div>
                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div class="preview-block">
                                        <div class="row gy-4">
                                        <div class="between-start" >
                                        <?php
                                            input(array(
                                                'label'       => 'Desde',
                                                'type'        => 'text',
                                                'name'        => 'sale-date',
                                                'id'          => 'sale-date-desde',
                                                'classInput'  => 'class-sale-date',
                                                'col'         => '3',
                                                'icon'        => array('icon' => 'fa-solid fa-calendar-days'),
                                                'value'       => date('d/m/Y')

                                            ));
                                            input(array(
                                                'label'       => 'Hasta',
                                                'type'        => 'text',
                                                'name'        => '#sale-date',
                                                'id'          => 'sale-date-hasta',
                                                'classInput'  => 'class-sale-date',
                                                'col'         => '3',
                                                'icon'        => array('icon' => 'fa-solid fa-calendar-days'),
                                                'value'       => date('d/m/Y')

                                            ));
                                            input(array(
                                                'label'       => 'Sede',
                                                'type'        => 'select',
                                                'name'        => '#sede',
                                                'id'          => 'sede',
                                                'classSelect' => 'class-sale-date',
                                                'col'         => '3',
                                                'option'       => Sedes::getBySelectOption()

                                            ));
                                        ?>
                                        <div class=" d-grid align-self-center  " >
                                            <?php $arr = array('desde' => date('d-m-Y'), 'hasta' => date('d-m-Y'), 'sede' => '%') ?>
                                            <a id="btn-export-report-excel" class="btn btn-success " href="<?php showUrlQuery('reporte-excel', $arr, 1)?>" target="_blank" ><em class="icon fa-solid fa-file-excel" ></em> Exportar</a>
                                        </div>
                                        </div>
                                        <div class="card card-bordered card-preview px-0">
                                            <table class="table table-orders">
                                                <thead class="tb-odr-head">
                                                    <tr class="tb-odr-item">
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">GUIA</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">FECHA</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">SEDE</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Cantidad</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Embalaje</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Compras</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Recogidas</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Descripcion</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Remitente</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Destinatario</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Destino</span>
                                                        </th>
                                                        <th class="tb-odr-info">
                                                            <span class="tb-odr-date d-none d-md-inline-block">Banco &nbsp; &nbsp;</span>
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody class="tb-odr-body" id="ventasdiarias-items">
                                                    <?php ventasDiariasLoader(5)?>
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
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