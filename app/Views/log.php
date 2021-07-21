<?php
    $this->extend('layout');
    $this->section('content');
?>
   <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Aktivnost</h1>
            <ol class="breadcrumb mb-4">
               <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
               <li class="breadcrumb-item active">Aktivnost</li>
            </ol>
            <div class="card mb-4">
               <div class="card-body">
               <?php
                  foreach($login as $l){
                     echo '<h5>Last login: '.$l->date.'</h5>';
                     echo '<p>IP Adresa: '.$l->ip_address.'</p>';
                     echo '<p>Email: '.$l->email.'</p>';
                  }
               ?>
               </div>
            </div>
            <div class="card mb-4">
            
            <div class="card-header">
               <i class="fas fa-table me-1"></i>
               Aktivnost
            </div>
            <div class="card-body">
               <?php 
                  $template = [
                     'table_open'         => '<table id="datatablesSimple">'
                  ];
                  $table = new \CodeIgniter\View\Table();
                  $table->setTemplate($template);
                  
                  $table->setHeading('Datum', 'Aktivnost');

                  // prebacivanje objekta u array
                  // $ticketsArray = json_decode(json_encode($tickets), true);
                  
                  $logsArray = array();
                  foreach($logs as $row){
                     $helpArr = array();
                     $helpArr[] = $row->date_added;
                     $helpArr[] = $row->action;
                    //  if(has_permission('ticket_delete')){
                    //     $helpArr[] = anchor("tiketi/delete/".$row->id, "<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger']);
                    //  }
                     $logsArray[] = $helpArr;
                  }
                  foreach($logsArray as $l){
                     $table->addRow($l);
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