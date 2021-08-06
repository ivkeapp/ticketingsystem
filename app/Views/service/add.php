<?php
    $this->extend('layout');
    $this->section('content');
?>
<main>
   <div class="container-fluid px-4">
      <h1 class="mt-4">Dodavanje servisa</h1>
      <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
         <li class="breadcrumb-item active">Dodavanje servisa</li>
         <?php
         helper('form');
         ?>
      </ol>
      <div class="card mb-4">
         <div class="card-body">
            DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
            <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
            .
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-5 col-xs-12">
               <?= view('auth\_message_block') ?>
               <form action="<?=route_to('service/savenew')?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                           <input type="text" id="name" class="form-control <?php if(session('errors.name')) : ?>is-invalid<?php endif ?>"
                              name="name" aria-describedby="nameHelp" placeholder="Unesite ime servisa" value="<?= old('name') ?>">
                           <label for="name">Ime servisa</label>
                        </div>

                        <div class="mt-4 mb-0">
                           <div class="d-grid"><button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Dodaj servis</button></div>
                        </div>
               </form>
               <?php


               ?>
               </div>
            </div>
  
         </div>
      </div>
   </div>
</main>

<?php
    $this->endSection();
?>