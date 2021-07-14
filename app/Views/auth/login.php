<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Ivan Zarkovic" />
        <title>Login - Nepo</title>
        <?php 
            helper('html');
            echo link_tag('css/styles.css');
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-secondary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?=lang('Auth.loginTitle')?></h3></div>
                                    <div class="card-body">
                                    <?= view('Myth\Auth\Views\_message_block') ?>
                                    <form action="<?= route_to('login') ?>" method="post">
                                    <?= csrf_field() ?>

                    <?php if ($config->validFields === ['email']): ?>
                                            <div class="form-floating mb-3">
                                                <input type="email" id="inputEmail" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                    name="login" placeholder="<?=lang('Auth.email')?>">
                                                <label for="inputEmail"><?=lang('Auth.email')?></label>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                    <?php else: ?>
                                            <div class="form-floating mb-3">
                                                <input type="text" id="inputEmail" class="form-control  <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>"
                                                    name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
                                                <label for="inputEmail"><?=lang('Auth.emailOrUsername')?></label>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                    <?php endif; ?>
                                            <div class="form-floating mb-3">
                                                <input type="password" name="password" class="form-control  <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
                                                <label for="password"><?=lang('Auth.password')?></label>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.password') ?>
                                                </div>
                                            </div>
                    <?php if ($config->allowRemembering): ?>
                                            <div class="form-check mb-3">
                                                <label class="form-check-label">
                                                    <input type="checkbox" name="remember" class="form-check-input" <?php if(old('remember')) : ?> checked <?php endif ?>>
                                                    <?=lang('Auth.rememberMe')?>
                                                </label>
                                            </div>
                    <?php endif; ?>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                    <?php if ($config->activeResetter): ?>
					                            <p><a class="small" href="<?= route_to('forgot') ?>"><?=lang('Auth.forgotYourPassword')?></a></p>
                    <?php endif; ?>
                                                <button type="submit" class="btn btn-primary"><?=lang('Auth.loginAction')?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                    <?php if ($config->allowRegistration) : ?>
					                    <p><a class="small" href="<?= route_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
                    <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php 
            //helper('html');
            echo script_tag('js/scripts.js');
        ?>
    </body>
</html>
