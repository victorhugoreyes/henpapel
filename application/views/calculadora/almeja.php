<style>
  
body{
    
    background-image: url(<?=URL; ?>/public/img/white_carbonfiber.png)!important;
}

.part-container{
    width: 25%;
    margin-left: 15%;
}

.illustration img {
    width: 100%!important;
    height: 100%;
}

table tr td {
    text-align: justify;
}

</style>

<div class="resume">

    <div>ODT: <span><?=$odt ?></span></div>
    <div>Base: <span><?=$b ?></span> cm</div>
    <div>Alto: <span><?=$h ?></span> cm</div>
    <div>Profundidad: <span><?=$p ?></span> cm</div>
    <div>Grosor de Cajon: <span><?=$g ?></span></div>
    <div>Grosor de Cartera: <span><?=$G ?></span></div>
</div>

<!-- Cajon -->
<div class="part-container">
    
    <div class="illustration">
        <!--
        <img class="to-view" src="<?php echo URL; ?>public/img/cajon.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/cajon_print.png">
        -->
        <img class="to-view" src="<?php echo URL; ?>public/img/cajas/almeja/01_carton_cajon_16.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/cajas/almeja/01_carton_cajon_16.jpg">

    </div>

    <table class="t-results">
        <tr>

            <th colspan="3">Cajon</th>  
        </tr>
        <tr>
            <td>Base del cajon:</td>
            <td class="nomenclatura">b'</td>
            <td><?=round($b1,2) ?> cm</td>
        </tr>
        <!--
        <tr>
            <td>Largo Extendido:</td>
            <td class="nomenclatura">l</td>
            <td><?=round($l,2) ?> cm</td>
        </tr>
        !-->
        <tr>
            <td>Altura del Cajon:</td>
            <td class="nomenclatura">h'</td>
            <td><?=round($h1,2) ?> cm</td>
        </tr>
        <tr>
            <td>Profundidad Cajon:</td>
            <td class="nomenclatura">p'</td>
            <td><?=round($p1,2) ?> cm</td>
        </tr>
        <tr>
            <td>Base extendida del Cajon:</td>
            <td class="nomenclatura">x</td>
            <td><?=round($x,2) ?> cm</td>
        </tr>
        <tr>
            <td>Altura extendida del Cajon:</td>
            <td class="nomenclatura">y</td>
            <td><?=round($y,2) ?> cm</td>
        </tr>
        <tr>
            <td>Base del carton para empalme:</td>
            <td class="nomenclatura">x'</td>
            <td><?=round($x1,2) ?> cm</td>
        </tr>
        <tr>
            <td>Alto del carton para empalme:</td>
            <td class="nomenclatura">y'</td>
            <td><?=round($y1,2) ?> cm</td>
        </tr>
        <tr>
            <td>Base empalme papel:</td>
            <td class="nomenclatura">x''</td>
            <td><?=round($x11,2) ?> cm</td>
        </tr>
        <tr>
            <td>Alto empalme papel:</td>
            <td class="nomenclatura">y''</td>
            <td><?=round($y11,2) ?> cm</td>
        </tr>
    </table>  
</div>

<!-- Forro -->
<div class="part-container">
    
    <div class="illustration">
        <!--
        <img class="to-view" src="<?php echo URL; ?>public/img/forro.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_print.png">
        -->
        <img class="to-view" src="<?php echo URL; ?>public/img/02_forro_cajon_17.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_print.png">
    </div>

    <table class="t-results">
        <tr>
            
            <th colspan="3">Forro</th>  
        </tr>
        <tr>
          <td>Base Forro Cajon:</td>
          <td class="nomenclatura">b''</td>
          <td><?=round($b11,2) ?> cm</td>
        </tr>
        <tr>
          <td>Alto Forro Cajon:</td>
          <td class="nomenclatura">h''</td>
          <td><?=round($h11,2) ?> cm</td>
        </tr>
        <tr>
          <td>Base Material rebasado para suaje Forro:</td>
          <td class="nomenclatura">f</td>
          <td><?=round($f,2) ?> cm</td>
        </tr>
        <tr>
          <td>Altura Material rebasado pra suaje Forro:</td>
          <td class="nomenclatura">k</td>
          <td><?=round($k,2) ?> cm</td>
        </tr>   
    </table>
</div>

<!-- Cartera -->
<div class="part-container">
    
    <div class="illustration">
        <!--
        <img class="to-view" src="<?php echo URL; ?>public/img/cartera.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/cartera_print.png">
        -->
        <img class="to-view" src="<?php echo URL; ?>public/img/03_carton_cartera_18.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/cartera_print.png">
    </div>
    
    <table class="t-results">
        <tr>
        
            <th colspan="3">Cartera</th>  
        </tr>
        <tr>
          <td>Altura Cartera:</td>
          <td class="nomenclatura">H</td>
          <td><?=round($H,2) ?> cm</td>
        </tr>
        <tr>
          <td>Profundidad Cartera Lomos:</td>
          <td class="nomenclatura">P</td>
          <td><?=round($P,2) ?> cm</td>
        </tr>
        <tr>
          <td>Base Cartera:</td>
          <td class="nomenclatura">B</td>
          <td><?=round($B,2) ?> cm</td>
        </tr>
        <tr>
          <td>Altura Total de Cartera:</td>
          <td class="nomenclatura">Y</td>
          <td><?=round($Y,2) ?> cm</td>
        </tr>
    </table>
</div>

<!-- Forro Cartera -->
<div class="part-container">
    
    <div class="illustration">
        <!--
        <img class="to-view" src="<?php echo URL; ?>public/img/forro_cartera_1.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_1_print.png">
        -->
        <img class="to-view" src="<?php echo URL; ?>public/img/04_forro_cartera_19.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_1_print.png">
    </div>
    
    <table class="t-results">
        <tr>
        
            <th colspan="3">Forro Cartera</th>  
        </tr>
        <tr>
          <td>Base de Forro:</td>
          <td class="nomenclatura">B'</td>
          <td><?=round($B1,2) ?> cm</td>
        </tr>
        <tr>
          <td>Altura Total de Forro Cartera:</td>
          <td class="nomenclatura">Y'</td>
          <td><?=round($Y1,2) ?> cm</td>
        </tr>
    </table>
</div>

<div class="part-container">
    
    <div class="illustration">
        <!--
        <img class="to-view" src="<?php echo URL; ?>public/img/forro_cartera.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_print.png">
        -->
        <img class="to-view" src="<?php echo URL; ?>public/img/05_guarda_20.png">
        <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_print.png">

    </div>

    <table class="t-results">
        <tr>
        
            <th colspan="3">Guarda Cartera</th>  
        </tr>
        <tr>
          <td>Base de Guarda Cartera:</td>
          <td class="nomenclatura">B''</td>
          <td><?=round($B11,2) ?> cm</td>
        </tr>
        <tr>
          <td>Altura de Guarda Cartera:</td>
          <td class="nomenclatura">Y''</td>
          <td><?=round($Y11,2) ?> cm</td>
        </tr>
    </table>
</div>
