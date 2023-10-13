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
                                <div class="row gy-4 justify-content-center ">
                                    <div class="col-10">
                                        <div class=" card-bordered shadow-sm p-4">
                                            <div class="between-start my-1">
                                                <div class="card-tools shrink-0">
                                                    <div class="dropdown mx-1">
                                                        <a href="#" class="dropdown-toggle btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Sede</a>
                                                        <div class="dropdown-menu" style="">
                                                            <ul class="link-list-plain no-bdr">
                                                                <?php foreach(Sedes::getBySelect() as $sede){?>
                                                                <li><a class="pointer-on reportes-sedes" data-report="#guias" data="<?php echo $sede->value ?>"><span><?php echo $sede->text ?></span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown mx-1">
                                                        <a href="#" class="dropdown-toggle btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Asesor</a>
                                                        <div class="dropdown-menu" style="">
                                                            <ul class="link-list-plain no-bdr">
                                                                <?php foreach(Users::getAsesorActive() as $user){?>
                                                                <li><a class="pointer-on reportes-asesor" data-report="#guias" data="<?php echo $user->user_id ?>"><span><?php echo $user->user_fname . ' ' . $user->user_lname ?></span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-tools shrink-0">
                                                    <ul class="nav nav-switch-s2 nav-tabs bg-white nav-date">
                                                        <li class="nav-item"><a data-day="6 days"   data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '6 days') ?> ">7 D</a></li>
                                                        <li class="nav-item"><a data-day="14 days"  data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '14 days') ?> ">15 D</a></li>
                                                        <li class="nav-item"><a data-day="30 days"  data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '30 days') ?> ">30 D</a></li>
                                                        <li class="nav-item"><a data-day="60 days"  data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '60 days') ?> ">60 D</a></li>
                                                        <li class="nav-item"><a data-day="90 days"  data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '90 days') ?> ">90 D</a></li>
                                                        <li class="nav-item"><a data-day="365 days" data-report="#guias" class="nav-link nav-item-date pointer-on <?php rAcBtn('guias_date', '365 days') ?> ">1 A</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <canvas class="reportes" id="guias"  chart-type="line" data-url="guias" data-day="<?php reportesGraficas('guias_date', '6 days') ?>" data-type="all" data-sede="<?php reportesGraficas('guias_sede', '%') ?>" data-asesor="<?php reportesGraficas('guias_asesor', '%') ?>" ></canvas>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gy-4 justify-content-center mt-3 ">
                                    <div class="col-10">
                                        <div class=" card-bordered shadow-sm p-4">
                                            <div class="between-start my-1">
                                                <div class="card-tools shrink-0">
                                                    <div class="dropdown mx-1">
                                                        <a href="#" class="dropdown-toggle btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Sede</a>
                                                        <div class="dropdown-menu" style="">
                                                            <ul class="link-list-plain no-bdr">
                                                                <?php foreach(Sedes::getBySelect() as $sede){?>
                                                                <li><a class="pointer-on reportes-sedes" data-report="#recaudo" data="<?php echo $sede->value ?>"><span><?php echo $sede->text ?></span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="dropdown mx-1">
                                                        <a href="#" class="dropdown-toggle btn btn-light" data-bs-toggle="dropdown" aria-expanded="false">Asesor</a>
                                                        <div class="dropdown-menu" style="">
                                                            <ul class="link-list-plain no-bdr">
                                                                <?php foreach(Users::getAsesorActive() as $user){?>
                                                                <li><a class="pointer-on reportes-asesor" data-report="#recaudo" data="<?php echo $user->user_id ?>"><span><?php echo $user->user_fname . ' ' . $user->user_lname ?></span></a></li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-tools shrink-0">
                                                    <ul class="nav nav-switch-s2 nav-tabs bg-white nav-date">
                                                        <li class="nav-item"><a data-day="6 days"   data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '6 days') ?>">7 D</a></li>
                                                        <li class="nav-item"><a data-day="14 days"  data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '14 days') ?>">15 D</a></li>
                                                        <li class="nav-item"><a data-day="30 days"  data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '30 days') ?>">30 D</a></li>
                                                        <li class="nav-item"><a data-day="60 days"  data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '60 days') ?>">60 D</a></li>
                                                        <li class="nav-item"><a data-day="90 days"  data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '90 days') ?>">90 D</a></li>
                                                        <li class="nav-item"><a data-day="365 days" data-report="#recaudo" class="nav-link nav-item-date pointer-on <?php rAcBtn('recaudo_date', '365 days') ?>">1 A</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <canvas class="reportes" id="recaudo"  chart-type="line" data-url="recaudo" data-day="<?php reportesGraficas('recaudo_date', '6 days') ?>" data-type="all" data-sede="<?php reportesGraficas('recaudo_sede', '%') ?>" data-asesor="<?php reportesGraficas('recaudo_asesor', '%') ?>" ></canvas>
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