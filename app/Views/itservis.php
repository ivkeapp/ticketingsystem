<?php
    $this->extend('layout');
    $this->section('content');
?>
<main>
   <div class="container-fluid px-4">
      <h1 class="mt-4">Statistika sektora IT servis</h1>
      <ol class="breadcrumb mb-4">
         <li class="breadcrumb-item"><a href="/">Kontrolna tabla</a></li>
         <li class="breadcrumb-item active">Logistika</li>
      </ol>
      <div class="card mb-4">
         <div class="card-body">
            DataTables je dodatak treće strane koji se koristi za generisanje demo tabele u nastavku. Za više informacija o DataTables dodatku, posetite
            <a target="_blank" href="https://datatables.net/">oficijalnu DataTable dokumentaciju</a>
            .
         </div>
      </div>
         <div class="row">
            <div class="col-xl-6">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-chart-area me-1"></i>
                     Poslednjih 30 dana
                  </div>
                  <div class="card-body">
                     <?php
                        $template = [
                        'table_open'         => '<table id="datatablesSimple">'
                        ];
                        
                        $table = new \CodeIgniter\View\Table();
                        $table->setTemplate($template);
                        if(has_permission('itservis_view')){
                           $table->setHeading('Korisničko ime', 'Broj rešenih tiketa');
                        } else {
                           $table->setHeading('Korisničko ime');
                        }

                         $counterArray = array();
                         foreach($tCounters as $c){
                           $helpArray = array();
                           $helpArray[] = $c[0]->username;
                           if(has_permission('itservis_view')){
                              $helpArray[] = $c[0]->count;
                           }
                           $counterArray[] = $helpArray;
                           
                         } 

                        foreach($counterArray as $u){
                           $table->addRow($u);
                        }
                        echo $table->generate();
                     ?>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
            <div class="card mb-4">
               <div class="card-header">
                  <i class="fas fa-chart-bar me-1"></i>
                  Danas
               </div>
               <div class="card-body">
                     <?php
                        $template = [
                        'table_open'         => '<table id="tableSimple">'
                        ];
                        
                        $table = new \CodeIgniter\View\Table();
                        $table->setTemplate($template);
                        if(has_permission('itservis_view')){
                           $table->setHeading('Korisničko ime', 'Broj rešenih tiketa');
                        } else {
                           $table->setHeading('Korisničko ime');
                        }

                        $counterArrayToday = array();
                        foreach($tCountersToday as $c){
                          $helpArray = array();
                          $helpArray[] = $c[0]->username;
                          if(has_permission('itservis_view')){
                             $helpArray[] = $c[0]->count;
                          }
                          $counterArrayToday[] = $helpArray;
                          
                        } 

                        foreach($counterArrayToday as $u){
                           $table->addRow($u);
                        }
                        echo $table->generate();
                     ?>
                  </div>
            </div>
         </div>
      </div>

   </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script>
//    // Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#292b2c';
// var obj = <?php //echo json_encode($usersArray); ?>;
// console.log(obj);
// var dayLabels = [];
// for(var i=1; i<=30; i++){
//    dayLabels.push(i);
// }

// var data = [];
// for(var prop in obj){
//    console.log(obj[prop]);
// }
// console.log(dayLabels);
// // Area Chart Example
// var ctx = document.getElementById("myAreaChart");
// var myLineChart = new Chart(ctx, {
//   type: 'line',
//   data: {
//     labels: dayLabels,
//     datasets: [{
//       label: "Sessions",
//       lineTension: 0.3,
//       backgroundColor: "rgba(2,117,216,0.2)",
//       borderColor: "rgba(2,117,216,1)",
//       pointRadius: 5,
//       pointBackgroundColor: "rgba(2,117,216,1)",
//       pointBorderColor: "rgba(255,255,255,0.8)",
//       pointHoverRadius: 5,
//       pointHoverBackgroundColor: "rgba(2,117,216,1)",
//       pointHitRadius: 50,
//       pointBorderWidth: 2,
//       data: [10000, 30162, 26263, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
//     },
//   {
//     label: "Session",
//       lineTension: 0.3,
//       backgroundColor: "rgba(2,0,216,0.2)",
//       borderColor: "rgba(2,0,216,1)",
//       pointRadius: 5,
//       pointBackgroundColor: "rgba(2,216,216,1)",
//       pointBorderColor: "rgba(171,161,255,0.8)",
//       pointHoverRadius: 5,
//       pointHoverBackgroundColor: "rgba(2,117,216,1)",
//       pointHitRadius: 50,
//       pointBorderWidth: 2,
//       data: [9000, 15000, 9000, 18394, 18287, 28682, 31274, 33259, 25849, 24159, 32651, 31984, 38451],
//   }],
//   },
//   options: {
//     scales: {
//       xAxes: [{
//         time: {
//           unit: 'date'
//         },
//         gridLines: {
//           display: false
//         },
//         ticks: {
//           maxTicksLimit: 7
//         }
//       }],
//       yAxes: [{
//         ticks: {
//           min: 0,
//           max: 40000,
//           maxTicksLimit: 5
//         },
//         gridLines: {
//           color: "rgba(0, 0, 0, .125)",
//         }
//       }],
//     },
//     legend: {
//       display: false
//     }
//   }
// });

</script>
<?php
    $this->endSection();
?>