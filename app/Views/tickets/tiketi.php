<?php
    $this->extend('layout');
    $this->section('content');
?>
   <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4"><?=$headline?></h1>
            <ol class="breadcrumb mb-4">
               <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
               <li class="breadcrumb-item active"><?=$headline?></li>
            </ol>
            <div class="card mb-4">
               <div class="card-body">
                  DataTables je dodatak treće strane koji se koristi za generisanje demo tabele u nastavku. Za više informacija o DataTables dodatku, posetite
                  <a target="_blank" href="https://datatables.net/">oficijalnu DataTable dokumentaciju</a>
                  .
               </div>
            </div>
            <div class="container-fluid px-4">
               <div class="d-flex align-items-center justify-content-between small">
                     <div class="text-muted"></div>
                     <div>
                     <?php
                        if(has_permission('ticket_create')){
                           echo anchor('tiketi/add', "<i class='fas fa-plus fa-fw'></i> Novi tiket", ['class' => 'btn btn-success btn-block']);
                        }
                     ?>
                  </div>
               </div>
            </div>
            <br>
            <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table me-1"></i>
               <?=$headline?>
            </div>
            <div class="card-body">
               <?php 
                  $template = [
                     'table_open'         => '<table id="datatablesSimple">'
                  ];
                  $table = new \CodeIgniter\View\Table();
                  $table->setTemplate($template);
                  if(has_permission('ticket_delete')){
                     $table->setHeading('Broj tiketa', 'Naslov', 'Datum otvaranja', 'Tip', 'Model', 'Proizvođač', 'Serijski broj', 'Opis kvara', 'Owner', 'Status', 'Rešen', 'Akcija');
                  } else {
                     $table->setHeading('Broj tiketa', 'Naslov', 'Datum otvaranja', 'Tip', 'Model', 'Proizvođač', 'Serijski broj', 'Opis kvara', 'Owner', 'Status', 'Rešen');
                  }

                  // prebacivanje objekta u array
                  // $ticketsArray = json_decode(json_encode($tickets), true);
                  
                  $ticketsArray = array();
                  foreach($tickets as $row){
                     $helpArr = array();
                     $helpArr[] = $row->id;
                     $helpArr[] = $row->title;
                     $helpArr[] = $row->date_added;
                     $helpArr[] = $row->type;
                     $helpArr[] = $row->model;
                     $helpArr[] = $row->brand;
                     $helpArr[] = $row->serial_number;
                     $helpArr[] = $row->description;
                     $helpArr[] = $row->staff_owner;

                     if($row->is_resolved == 1){
                        $helpArr[] = '<p style="color: green">Rešen</p>';
                     } else {
                        $helpArr[] = '<p style="color: red">Nerešen</p>';
                     }
                     
                     if($row->is_resolved == '0' && has_permission('ticket_mark_resolved')){$helpArr[] = anchor("tiketi/solved/".$row->id, "<i class='fas fa-check'></i>  Označi kao rešen ", ['class' => 'btn btn-sm btn-success']);}
                        //$helpArr[] = anchor("tiketi/solved/".$row->id, "<i class='fas fa-check'></i>  Označi kao rešen ", ['class' => 'btn btn-sm btn-success']);
                     elseif($row->is_resolved == '0' && $row->staff_id == user_id()){$helpArr[] = anchor("tiketi/solved/".$row->id, "<i class='fas fa-check'></i>  Označi kao rešen ", ['class' => 'btn btn-sm btn-success']);}
                     else {$helpArr[] = anchor("tiketi/solved/".$row->id, "<i class='fas fa-check'></i>  Označi kao rešen ", ['class' => 'btn btn-sm btn-success disabled']);}
                        
                     if(has_permission('ticket_delete')){
                        $helpArr[] = anchor("tiketi/delete/".$row->id, "<i class='fas fa-trash'></i> Obriši tiket", ['class' => 'btn btn-sm btn-danger']);
                     }
                     $ticketsArray[] = $helpArr;
                  }
                  foreach($ticketsArray as $t){
                     $table->addRow($t);
                  }
                  echo $table->generate();
               ?>
               
            </div>
         </div>
         <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted"></div>
                            <div>
                              <?php
                                 if(has_permission('ticket_create')){
                                    echo anchor('tiketi/add', "<i class='fas fa-plus fa-fw'></i> Novi tiket", ['class' => 'btn btn-success btn-block']);
                                 }
                              ?>
                            </div>
                        </div>
                    </div>
   </main>

<?php
    $this->endSection();
?>