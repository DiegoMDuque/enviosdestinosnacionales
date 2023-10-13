            <!-- sidebar @s -->
            <div class="nk-sidebar nk-sidebar-fixed is-dark " data-content="sidebarMenu">
                <div class="nk-sidebar-element nk-sidebar-head">
                    <div class="nk-menu-trigger">
                        <a href="#" class="nk-nav-toggle nk-quick-nav-icon d-xl-none" data-target="sidebarMenu"><em class="icon ni ni-arrow-left"></em></a>
                        <a href="#" class="nk-nav-compact nk-quick-nav-icon d-none d-xl-inline-flex" data-target="sidebarMenu"><em class="icon ni ni-menu"></em></a>
                    </div>
                    <div class="nk-sidebar-brand">
                        <a href="<?php echo URL ?>" class="logo-link nk-sidebar-logo">
                            <img class="logo-light logo-img" src="assets/img/logo.png" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="nk-sidebar-element nk-sidebar-body">
                    <div class="nk-sidebar-content">
                        <div class="nk-sidebar-menu" data-simplebar>
                            <ul class="nk-menu">
                                <?php foreach(Core::SidebarMenuElementItem() as $sidebar) { ?>
                                    <?php if(Users::CheckPermisosUser($sidebar->element_access_name, '', '', '', true) == true) :?>
                                        <?php if(!$sidebar->inc_sub) : ?>
                                        <li class="nk-menu-item">
                                            <a href="<?php echo $sidebar->url?>" class="nk-menu-link">
                                                <span class="nk-menu-icon"><em class="icon <?php echo $sidebar->element_icon?>"></em></span>
                                                <span class="nk-menu-text"><?php echo $sidebar->element_name?></span>
                                            </a>
                                        </li>
                                        <?php else: ?>
                                        <li class="nk-menu-item has-sub">
                                            <a href="#" class="nk-menu-link nk-menu-toggle" data-bs-original-title="" title="">
                                                <span class="nk-menu-icon"><em class="icon <?php echo $sidebar->element_icon?>"></em></span>
                                                <span class="nk-menu-text"><?php echo $sidebar->element_name?></span>
                                            </a>
                                            <ul class="nk-menu-sub">
                                                <?php foreach(Core::SidebarMenuElementItem('sub', $sidebar->id) as $sub) { ?>
                                                <li class="nk-menu-item">
                                                    <a href="<?php echo $sub->url ?>" class="nk-menu-link" data-bs-original-title="" title=""><span class="nk-menu-text"><?php echo $sub->element_name?></span></a>
                                                </li>
                                                <?php } ?>
                                            </ul>
                                        </li>
                                        <?php endif; ?>
                                    <?php endif;?>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sidebar @e -->