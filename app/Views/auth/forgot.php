<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="Ivan Zarkovic" />
        <title>Password Reset - Nepo</title>
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
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Password Recovery</h3></div>
                                    <div class="card-body">
                                        <?= view('Myth\Auth\Views\_message_block') ?>
                                        <div class="small mb-3 text-muted"><?=lang('Auth.enterEmailForInstructions')?></div>
                                        <form action="<?= route_to('forgot') ?>" method="post">
                                            <?= csrf_field() ?>
                                            <div class="form-floating mb-3">
                                                <input type="email" id="inputEmail" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                                                    name="email" aria-describedby="emailHelp" placeholder="<?=lang('Auth.email')?>">
                                                <label for="inputEmail"><?=lang('Auth.emailAddress')?></label>
                                                <div class="invalid-feedback">
                                                    <?= session('errors.email') ?>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <?=anchor("login", "Return to login", ['class' => 'small'])?>
                                                <button type="submit" class="btn btn-primary"><?=lang('Auth.sendInstructions')?></button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><?=anchor("register", "Need an account?")?></div>
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
