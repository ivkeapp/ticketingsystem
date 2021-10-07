<?php
    $this->extend('layout');
    $this->section('content');
?>

<main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Kontrolna tabla</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kontrolna tabla</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Logistika</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?=anchor("logistika/index", "Više detalja", ['class' => 'small text-white stretched-link'])?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">IT servis</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <?=anchor("itservis/index", "Više detalja", ['class' => 'small text-white stretched-link'])?>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area me-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Pregled tiketa
                            </div>
                            <div class="card-body">
                            <?php 
                  $template = [
                     'table_open'         => '<table id="datatablesSimple">'
                  ];
                  $table = new \CodeIgniter\View\Table();
                  $table->setTemplate($template);
                  if(has_permission('ticket_delete')){
                     $table->setHeading('Broj tiketa', 'Naslov', 'Datum otvaranja', 'Tip', 'Model', 'Serijski broj', 'Opis kvara', 'Owner', 'Status', 'Akcija');
                  } else {
                     $table->setHeading('Broj tiketa', 'Naslov', 'Datum otvaranja', 'Tip', 'Model', 'Serijski broj', 'Opis kvara', 'Owner', 'Status');
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
                     $helpArr[] = $row->serial_number;
                     $helpArr[] = $row->description;
                     $helpArr[] = $row->staff_owner;
                     $helpArr[] = $row->is_resolved;
                     if(has_permission('ticket_delete')){
                        $helpArr[] = anchor("tiketi/delete/".$row->id, "<i class='fas fa-trash'></i>", ['class' => 'btn btn-danger']);
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
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<?php 
    helper('html');
    echo script_tag('assets/demo/chart-area-demo.js');
    echo script_tag('assets/demo/chart-bar-demo.js');

    $this->endSection();
?>