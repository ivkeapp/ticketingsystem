<?php
    $this->extend('layout');
    $this->section('content');
?>
<main>
   <div class="container-fluid px-4">
      <h1 class="mt-4">Dodavanje tiketa</h1>
      <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
         <li class="breadcrumb-item active">Dodavanje tiketa</li>
         <?php
         helper('form');
         ?>
      </ol>
      <div class="card mb-4">
         <div class="card-body">
            Svi podaci uneti u tiket će se dalje koristiti za logistiku uređaja do zatvaranja tiketa.
         </div>
      </div>
      <div class="card mb-4">
         <div class="card-body">
            <div class="row">
               <div class="col-sm-5 col-xs-12">
               <?= view('auth\_message_block') ?>
               <form action="<?=route_to('tiketi/savenew')?>" method="post">
                        <?= csrf_field() ?>

                        <div class="form-floating mb-3">
                           <input type="text" id="title" class="form-control <?php if(session('errors.title')) : ?>is-invalid<?php endif ?>"
                              name="title" aria-describedby="titleHelp" placeholder="Unesite kratak opis" value="<?= old('title') ?>">
                           <label for="title">Kratak opis</label>
                           <small id="emailHelp" class="form-text text-muted">Uneti kratak opis kvara koji će se prikazivati kao naslov tiketa</small>
                        </div>

                        <div class="form-floating mb-3">
                           <select name="types" class="form-control">
                              <?php foreach($types as $t):?>
                                       <option value="<?=$t->id?>"><?=$t->name?></option>
                              <?php endforeach ?>
                           </select>
                           <label for="types">Tip uređaja</label>
                        </div>

                        <div class="form-floating mb-3">
                           <select name="brands" class="form-control">
                              <?php foreach($brands as $b):?>
                                       <option value="<?=$b->id?>"><?=$b->name?></option>
                              <?php endforeach ?>
                           </select>
                           <label for="brands">Proizvođač</label>
                        </div>

                        <div class="form-floating mb-3">
                           <input type="text" id="model" class="form-control <?php if(session('errors.model')) : ?>is-invalid<?php endif ?>" name="model" placeholder="Unesite model uređaja" value="<?= old('model') ?>">
                           <label for="model">Model uređaja</label>
                        </div>

                        <div class="form-floating mb-3">
                           <input type="text" id="serial_number" class="form-control <?php if(session('errors.serial_number')) : ?>is-invalid<?php endif ?>" name="serial_number" placeholder="Unesite serijski broj uređaja" value="<?= old('serial_number') ?>">
                           <label for="serial_number">Serijski broj</label>
                        </div>

                        <div class="form-group mb-3">
                           <textarea id="description" class="form-control <?php if(session('errors.description')) : ?>is-invalid<?php endif ?>" rows="4" name="description" placeholder="Unesite detaljan opis kvara" value="<?= old('description') ?>"></textarea>
                           <!-- <label for="description">Opis kvara</label> -->
                        </div>

                        <div class="form-floating mb-3">
                           <select name="staff_owner" class="form-control">
                              <?php foreach($users as $u):
                                 if($u->id==user_id()):?>
                                    <option value="<?=$u->id?>" selected><?=$u->firstname . ' ' . $u->lastname?></option>
                                 <?php else:?>
                                    <option value="<?=$u->id?>"><?=$u->firstname . ' ' . $u->lastname?></option>
                                 <?php endif;?>
                              <?php endforeach ?>
                           </select>
                           <label for="types">Owner</label>
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