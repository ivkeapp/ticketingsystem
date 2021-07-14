<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>404 Error</title>
        <?php 
            helper('html');
            echo link_tag('css/styles.css');
        ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div id="layoutError">
            <div id="layoutError_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="text-center mt-4">
                                    <img class="mb-4 img-error" src="<?php echo base_url();?>/assets/img/error-404-monochrome.svg" />
                                    <p class="lead">Ovaj URL zahtev ne može biti pronađen.</p>
                                    <a href="<?php echo base_url();?>">
                                        <i class="fas fa-arrow-left me-1"></i>
                                        Nazad na kontrolnu tablu
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutError_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">&copy; Ivan Žarković 2021</div>
                            <div>
                                <a href="#">Politika privatnosti</a>
                                &middot;
                                <a href="#">Uslovi &amp; korišćenja</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <?php 
            echo script_tag('js/scripts.js');
        ?>
    </body>
</html>
