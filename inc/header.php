<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-menu-trigger d-xl-none ms-n1">
                <a href="#" class="nk-nav-toggle nk-quick-nav-icon" data-target="sidebarMenu"><em
                        class="icon ni ni-menu"></em></a>
            </div>
            <div class="nk-header-brand d-xl-none">
                <a href="html/index.html" class="logo-link">
                    <img class="logo-light logo-img" src="assets/img/logo.png" alt="logo">
                </a>
            </div><!-- .nk-header-brand -->
            <div class="nk-header-news d-none d-xl-block">
                <div class="nk-news-list">
                    <a class="nk-news-item" href="#">
                    </a>
                </div>
            </div>
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">
                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-avatar sm">
                                    <img src="<?php Users::showInfoUserBySession('avatar') ?>">
                                </div>
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status"><?php Users::showInfoUserBySession('level') ?></div>
                                    <div class="user-name dropdown-indicator">
                                        <?php Users::showInfoUserBySession('name') ?></div>
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-avatar">
                                        <img src="<?php Users::showInfoUserBySession('avatar') ?>">
                                    </div>
                                    <div class="user-info">
                                        <span class="lead-text"><?php Users::showInfoUserBySession('name') ?></span>
                                        <span class="sub-text"><?php Users::showInfoUserBySession('email') ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a id="show_arqueo" class="pointer-on"><em class="icon fa-solid fa-wallet"></em><span>Arqueo</span></a></li>
                                    <li><a class="pointer-on change-password"><em class="icon fas fa-key"></em><span>Cambiar contraseña</span></a></li>
                                    <li><a href="singout.php"><em class="icon ni ni-signout"></em><span>Salir</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>