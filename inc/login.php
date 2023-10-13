        <!-- wrap @s -->
        <div class="nk-wrap nk-wrap-nosidebar">
            <!--<script src="https://www.google.com/recaptcha/api.js" async defer></script>-->
            <!-- content @s -->
            <div class="nk-content ">
                <div class="nk-split nk-split-page nk-split-md">
                    <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container">
                        <div class="nk-block nk-block-middle nk-auth-body">
                            <div class="brand-logo text-center">
                                <a href="<?php echo COMPANY_PAGE_URL?>" class="logo-link">
                                    <img src="assets/img/logo-3.png" class="logo-dark logo-img logo-img-lg"  alt="logo-dark">
                                </a>
                            </div>
                            <div class="nk-block-head">
                            </div>
                            <form id="formLogin">
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="username">Usuario</label>
                                    </div>
                                    <div class="form-control-wrap">
                                        <input type="text" class="form-control form-control-lg" name="username" id="username" placeholder="Coloque su usuario">
                                    </div>
                                </div><!-- .form-group -->
                                <div class="form-group">
                                    <div class="form-label-group">
                                        <label class="form-label" for="password">Contraseña</label>
                                        
                                    </div>
                                    <div class="form-control-wrap">
                                        <a tabindex="-1" href="#" class="form-icon form-icon-right passcode-switch lg" data-target="password">
                                            <em class="passcode-icon icon-show icon ni ni-eye"></em>
                                            <em class="passcode-icon icon-hide icon ni ni-eye-off"></em>
                                        </a>
                                        <input type="password" class="form-control form-control-lg" name="password" id="password" autocomplete="off"  placeholder="Contraseña">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-lg btn-primary btn-block">Entrar</button>
                                </div>
                            </form>
                        </div>
                        <div class="nk-block nk-auth-footer">
                            <div class="mt-3">
                                <p>&copy; <?php echo date('Y') . ' ' . COMPANY_NAME .'.' ?>  Todos reservados los derechos</p>
                            </div>
                        </div>
                    </div>
                    <div class="nk-split-content nk-split-stretch login-bg-img"></div>
                </div>
            </div>
        </div>