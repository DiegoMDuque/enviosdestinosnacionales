            <div class="nk-wrap ">
                <!-- main header @s -->
                <?php require Core::RequiereInc('header'); ?>
                <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Configuraciones</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="nk-block nk-block-lg">
                                    <div class="card card-bordered card-stretch">
                                        <ul class="nav nav-tabs nav-tabs-mb-icon nav-tabs-card">
                                            
                                            <?php foreach(Core::settingsOptions() as $option) { ?>
                                                <?php if(Users::CheckPermisosUser($option->permiso) or $option->permiso == '') { ?>
                                                <li class="nav-item ">
                                                    <a class="nav-link <?php activeBydata($option->href, 'site') ?>" data-bs-toggle="tab" href="#<?php echo $option->href?>"><em class="icon <?php echo $option->icon?>"></em><span><?php echo $option->text?></span></a>
                                                </li>

                                            <?php }?>
                                            <?php } ?>
                                        </ul>
                                        <div class="tab-content ">
                                            <?php foreach(Core::settingsOptions() as $optionFile) { ?>
                                                <?php if(Users::CheckPermisosUser($optionFile->permiso ) or $optionFile->permiso == '') { ?>
                                                <div class="tab-pane <?php activeBydata($optionFile->href, 'site') ?>" id="<?php echo $optionFile->href?>">
                                                    <?php require $optionFile->url ?>
                                                </div>
                                                <?php } ?>
                                            <?php }?>
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