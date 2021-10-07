<?php
    $this->extend('layout');
    $this->section('content');
?>
   <main>
         <div class="container-fluid px-4">
            <h1 class="mt-4">Radnici</h1>
            <ol class="breadcrumb mb-4">
               <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
               <li class="breadcrumb-item active">Radnici</li>
            </ol>
            <div class="card mb-4">
               <div class="card-body">
                  DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the
                  <a target="_blank" href="https://datatables.net/">official DataTables documentation</a>
                  .
               </div>
            </div>
            <div class="card mb-4">
            <div class="card-header">
               <i class="fas fa-table me-1"></i>
               DataTable Example
            </div>
            <div class="card-body">
               <?php
                  $template = [
                     'table_open'         => '<table id="datatablesSimple">'
                  ];
                  $table = new \CodeIgniter\View\Table();
                  $table->setTemplate($template);
                  if(has_permission('staff_delete')){
                     $table->setHeading('ID', 'Email', 'Korisnicko ime', 'Ime', 'Prezime', 'Department', 'Aktivan', 'Akcija');
                  } else {
                     $table->setHeading('ID', 'Email', 'Korisnicko ime', 'Ime', 'Prezime', 'Department');
                  }

                  $staffArray = array();
                  foreach($users as $row){
                     $helpArr = array();
                     $helpArr[] = $row->id;
                     $helpArr[] = $row->email;
                     $helpArr[] = $row->username;
                     $helpArr[] = $row->firstname;
                     $helpArr[] = $row->lastname;
                     $helpArr[] = $row->department;
                     if(has_permission('staff_delete')){
                        $helpArr[] = $row->active;
                        $helpArr[] = anchor("staff/delete/".$row->id, "<i class='fas fa-ban'></i>", ['class' => 'btn btn-danger']);
                     }
                     $staffArray[] = $helpArr;
                  }
                  foreach($staffArray as $s){
                     $table->addRow($s);
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
                                    echo anchor('staff/add', "<i class='fas fa-plus fa-fw'></i> Novi radnik", ['class' => 'btn btn-success btn-block']);
                                 }
                              ?>
                            </div>
                        </div>
                    </div>

   </main>

<?php
    $this->endSection();
?>