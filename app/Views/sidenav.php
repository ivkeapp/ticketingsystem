<div id="layoutSidenav_nav">
   <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
      <div class="sb-sidenav-menu">
         <div class="nav">
            
            <div class="sb-sidenav-menu-heading">Opšte</div>
            <a class="nav-link" href="/">
               <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
               Kontrolna tabla
            </a>
            <div class="sb-sidenav-menu-heading">Izveštaji i alati</div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
               <div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
               Izveštaji
               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
               <nav class="sb-sidenav-menu-nested nav">
                  <?=anchor("logistika/index", "Logistika", ['class' => 'nav-link'])?>
                  <?=anchor("itservis/index", "IT servis", ['class' => 'nav-link'])?>
               </nav>
            </div>
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages">
               <div class="sb-nav-link-icon"><i class="fas fa-tools"></i></div>
               Alati
               <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
               <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth">
                        Tiketi
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                           <?=anchor("tiketi/index", "Pregled rešenih tiketa", ['class' => 'nav-link'])?>
                           <?=anchor("tiketi/unresolved", "Pregled nerešenih tiketa", ['class' => 'nav-link'])?>
                           <?php
                              if(has_permission('ticket_create')){
                                 echo anchor("tiketi/add", "Dodavanje tiketa", ['class' => 'nav-link']);
                              }
                           ?>
                        </nav>
                  </div>
                  <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError">
                        Ostalo
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                  </a>
                  <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordionPages">
                        <nav class="sb-sidenav-menu-nested nav">
                           <a class="nav-link" href="#">Pregled eksternih servisa</a>
                           <a class="nav-link" href="#">Statistika</a>
                           <?php
                              if(has_permission('ticket_create')){
                                 echo anchor("staff/index", "Pregled radnika", ['class' => 'nav-link']);
                              }
                           ?>
                        </nav>
                  </div>
                  
               </nav>
            </div>

            <div class="sb-sidenav-menu-heading">Nalog</div>
            <?php
               if(!logged_in()):
            ?>
            <a class="nav-link" href="login">
               <div class="sb-nav-link-icon"><i class="fas fa-sign-in-alt"></i></div>
               Prijava
            </a>
            <?php endif ?>
            <?=anchor("forgot", "<div class='sb-nav-link-icon'><i class='fas fa-unlock'></i></div>
               Zaboravljena lozinka", ['class' => 'nav-link'])?>
               <div class="sb-sidenav-menu-heading">Opcije</div>
               <?=anchor("tiketi/mytickets", '<div class="sb-nav-link-icon"><i class="fas fa-clipboard-list"></i></div>
                        Moji tiketi', ['class' => 'nav-link']);?>
         </div>
      </div>
      <div class="sb-sidenav-footer">
         <?php
            if(logged_in()):?>
            <div class="small">Ulogovan kao:</div>
               <?=user()->firstname . ' ' . user()->lastname?>
            <?php else: ?>
               <div class="small">Niste prijavljeni</div>
               <?=anchor("login", "Prijavite se")?>
            <?php endif;
         ?>
      </div>
   </nav>
</div>