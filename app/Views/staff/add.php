<?php
    $this->extend('layout');
    $this->section('content');
?>
<main>
   <div class="container-fluid px-4">
      <h1 class="mt-4">Dodavanje radnika</h1>
      <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
         <li class="breadcrumb-item active">Dodavanje radnika</li>
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
               <form action="<?=route_to('staff/savenew')?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                           <input type="text" id="username" class="form-control <?php if(session('errors.username')) : ?>is-invalid<?php endif ?>"
                              name="username" aria-describedby="nusernameHelp" placeholder="Unesite kratak opis" value="<?= old('username') ?>">
                           <label for="username">Korisničko ime</label>
                        </div>

                        <div class="form-floating mb-3">
                           <input type="text" id="name" class="form-control <?php if(session('errors.name')) : ?>is-invalid<?php endif ?>"
                              name="name" aria-describedby="nameHelp" placeholder="Unesite kratak opis" value="<?= old('name') ?>">
                           <label for="name">Ime</label>
                        </div>

                        <div class="form-floating mb-3">
                           <input type="text" id="surname" class="form-control <?php if(session('errors.surname')) : ?>is-invalid<?php endif ?>"
                              name="surname" aria-describedby="surnameHelp" placeholder="Unesite kratak opis" value="<?= old('surname') ?>">
                           <label for="surname">Prezime</label>
                        </div>

                        <div class="form-floating mb-3">
                           <input type="email" id="inputEmail" class="form-control <?php if(session('errors.email')) : ?>is-invalid<?php endif ?>"
                              name="email" aria-describedby="emailHelp" placeholder="Email" value="<?= old('email') ?>">
                           <label for="inputEmail">Email</label>
                        </div>

                        <div class="row mb-3">
                           <div class="col-md-6">
                              <div class="form-floating mb-3 mb-md-0">
                                 <input type="password" id="inputPassword" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="Šifra" autocomplete="off">
                                 <label for="inputPassword">Šifra</label>
                              </div>
                           </div>
                           <div class="col-md-6">
                              <div class="form-floating mb-3 mb-md-0">
                                 <input type="password" id="inputPasswordConfirm" name="pass_confirm" class="form-control <?php if(session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="Ponovna šifra" autocomplete="off">
                                 <label for="inputPasswordConfirm">Potvrdite šifru</label>
                              </div>
                           </div>
                        </div>

                        <div class="form-floating mb-3">
                           <select name="department" class="form-control">
                              <?php foreach($departments as $d):?>
                                       <option value="<?=$d->id?>"><?=$d->name?></option>
                              <?php endforeach ?>
                           </select>
                           <label for="types">Department</label>
                        </div>

                        <div class="mt-4 mb-0">
                           <div class="d-grid"><button type="submit" class="btn btn-success btn-block"><i class="fas fa-save"></i> Sačuvaj</button></div>
                        </div>
               </form>
               <?php
                  
                  // helper('form');
                  // echo form_open('tiketi/savenew', ['method'=>'post']);

                  // echo form_label('Kratak opis:', 'title');
                  // echo form_input('title', '', ['class' => 'form-control']);
                  // echo "<br>";
                  
                  // echo form_label('Tip uređaja:', 'type');
                  // //echo form_dropdown('type', $types, '1', ['class' => 'form-control']);
                  // echo "<br>";

                  // echo form_label('Model:', 'model');
                  // echo form_input('model', '', ['class' => 'form-control']);
                  // echo "<br>";

                  // echo form_label('Serijski broj:', 'serial_number');
                  // echo form_input('serial_number', '', ['class' => 'form-control']);
                  // echo "<br>";

                  // echo form_label('Opis kvara:', 'description');
                  // echo form_input('description', '', ['class' => 'form-control']);
                  // echo "<br>";

                  // echo form_hidden('staff_owner', user_id());

                  // $buttonProps = array(
                  //    'name'          => 'add',
                  //    'type'          => 'submit',
                  //    'content'       => '<i class="fas fa-save"></i>  Sačuvaj',
                  //    'class'         => 'btn btn-success'
                  // );
                  // echo form_button($buttonProps);

                  // echo form_close();

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