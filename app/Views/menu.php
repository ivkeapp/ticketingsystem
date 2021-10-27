<?php 

    $links = [

        'Podešavanja' => '/settings',
        'Aktivnosti' => '/activity',
        'Odjava' => '/logout'

    ];

    if(logged_in()){
        $counter = 0;
        foreach($links as $text => $url):
        $counter++;
        if($counter<3){?>
            <li>
                <?=anchor($url, $text, ['class' => 'dropdown-item'])?>
            </li>
        <?php }
        else{
            echo "<li><hr class='dropdown-divider' /></li>";
            ?>
            <li>
                <?=anchor($url, $text, ['class' => 'dropdown-item'])?>
            </li>
            <?php
        }
        endforeach; ?>

        <script>
            let seconds = 1800;
            //alert("Bicete automatski izlogovani za " + seconds + " sekundi");
            setTimeout(function(){
                window.location = "<?=base_url('logout')?>";
            }, seconds * 1000);
        </script>

        <?php
    } else {?>
        <li>
        <?=anchor("login", "Prijavite se", ['class' => 'dropdown-item'])?>
        </li>
        <?php 
    }
    ?>
    




