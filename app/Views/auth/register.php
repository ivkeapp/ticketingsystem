<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Ivan Zarkovic" />
        <title>Register - Nepo</title>
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
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4"><?=lang('Auth.register')?></h3></div>
                                    <div class="card-body">
                                    <?= view('auth\_message_block') ?>

                                    <form action="<?= route_to('register') ?>" method="post">
                                        <?= csrf_field() ?>
                                            <div class="form-floating mb-3">
                                                <input type="email" id="inputEmail" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                    name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                                                <label for="inputEmail"><?=lang('Auth.email')?></label>
                                                <small id="emailHelp" class="form-text text-muted"><?=lang('Auth.weNeverShare')?></small>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" id="inputUsername" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?=lang('Auth.username')?>" value="<?= old('username') ?>">
                                                <label for="inputUsername"><?=lang('Auth.username')?></label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" id="inputFirstname" class="form-control <?php if(session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" placeholder="First name" value="<?= old('firstname') ?>">
                                                <label for="inputFirstname">First name</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input type="text" id="inputLastname" class="form-control <?php if(session('errors.lastname')) : ?>is-invalid<?php endif ?>" name="lastname" placeholder="Last name" value="<?= old('lastname') ?>">
                                                <label for="inputLastname">Last name</label>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" id="inputPassword" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>" autocomplete="off">
                                                        <label for="inputPassword"><?=lang('Auth.password')?></label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input type="password" id="inputPasswordConfirm" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.repeatPassword')?>" autocomplete="off">
                                                        <label for="inputPasswordConfirm"><?=lang('Auth.repeatPassword')?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.register')?></button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><?=lang('Auth.alreadyRegistered')?> <a href="<?= route_to('login') ?>"><?=lang('Auth.signIn')?></a></div>
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
                            <div class="text-muted">Copyright &copy; Ivan Zarkovic 2021</div>
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
