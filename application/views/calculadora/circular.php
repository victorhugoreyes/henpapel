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

@media print {
    
    .page-break { 
        display: block; 
        page-break-before: always;
    }

    .resume div {
        width: 100%;
        margin: 0 auto!important;
        padding: 5px 3px!important;
/* 
        border-bottom: solid 1px #546371;
        
        
        border-right: none!important;
*/
    }

    .part-container{
        margin-left: 0%;
    }
}

</style>

<div class="page-break">
    
    <div class="resume">

        <div>ODT: <span><?=$odt ?></span></div>
        <div>Diametro: <span><?=$d ?></span> cm</div>
        <div>Profundidad: <span><?=$p ?></span> cm</div>
        <div>Grosor de Carton: <span><?=$g ?></span></div>
        <div>Altura Tapa: <span><?=$P ?></span></div>
    </div>

    <div class="part-container">
        
        <div class="illustration">

            <img class="img-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-11.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/diametro_imprimir.png">
        </div>
        <table class="t-results">   <!-- Diametro del cajon -->
            <tr>

                <th colspan="3">Diametro del cajon</th>  
            </tr>
            <tr>

              <td>Diametro del suaje del cajon:</td>
              <td class="nomenclatura">d</td>
              <td><?=round($d,2) ?> cm</td>
            </tr>
            <tr>
              <td>Diametro exterior del cajon:</td>
              <td class="nomenclatura">d'</td>
              <td><?=round($d_1,2) ?> cm</td>
            </tr>
<!--
            <tr>
              <td>Diametro del forro del Cajon:</td>
              <td class="nomenclatura">d''</td>
              <td><?=round($d_1_1,2) ?> cm</td>
            </tr>
-->
            <tr>
              <td>Diametro de la pompa de cajon:</td>
              <td class="nomenclatura">d</td>
              <td><?=round($d,2) ?> cm</td>
            </tr>
            <tr>
              <td>Carton para empalme de cajon:</td>
              <td class="nomenclatura">z</td>
              <td><?=round($z,2) ?> cm</td>
            </tr>
            <tr>
              <td>Papel para empalme de cajon:</td>
              <td class="nomenclatura">z'</td>
              <td><?=round($z_1,2) ?> cm</td>
            </tr>
            <tr>
              <td>Papel rebasado para pompa de cajon:</td>
              <td class="nomenclatura">r</td>
              <td><?=round($r,2) ?> cm</td>
            </tr>    
        </table>  

    </div>

    <div class="part-container">

        <div class="illustration">

            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-12.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/carton_print.png">
        </div>
        <table class="t-results">   <!-- Carton -->

            <tr>
                
                <th colspan="3">Carton</th>  
            </tr>

            <tr>
                <td>Profundidad Exterior del Cajon:</td>
                <td class="nomenclatura">p'</td>
                <td><?=round($p_1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Circunferencia Exterior del carton del cajon:</td>
                <td class="nomenclatura">c</td>
                <td><?=round($c,2) ?> cm</td>
            </tr>
       
        </table>  
    </div>
</div>

<div class="page-break">
    
    <div class="resume">

        <div>ODT: <span><?=$odt ?></span></div>
        <div>Diametro: <span><?=$d ?></span> cm</div>
        <div>Profundidad: <span><?=$p ?></span> cm</div>
        <div>Grosor de Carton: <span><?=$g ?></span></div>
        <div>Altura Tapa: <span><?=$P ?></span></div>
    </div>
    <div class="part-container">
        
        <div class="illustration">
            
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-13.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_exterior_print.png">
        </div>
        <table class="t-results">       <!-- Forro exterior -->

            <tr>

                <th colspan="3">Forro exterior</th>  
            </tr>

            <tr>
                <td>Profundidad del forro Exterior del Cajon:</td>
                <td class="nomenclatura">p''</td>
                <td><?=round($p_1_1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Circunferencia del forro exterior del Cajon:</td>
                <td class="nomenclatura">c'</td>
                <td><?=round($c_1,2) ?> cm</td>
            </tr>
        </table>  
    </div>
    <div class="part-container">
        
        <div class="illustration">
            
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-14.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_interior_print.png">
        </div>
        <table class="t-results">   <!-- Forro interior -->

            <tr>

                <th colspan="3">Forro interior</th>  
            </tr>

            <tr>
                <td>Profundidad del forro Interior del Cajon:</td>
                <td class="nomenclatura">i</td>
                <td><?=round($i,2) ?> cm</td>
            </tr>
            <tr>
                <td>Circunferencia del forro Interior (Cartulina):</td>
                <td class="nomenclatura">c''</td>
                <td><?=round($c_1_1,2) ?> cm</td>
            </tr>
        </table>
    </div> 
</div>

<div class="page-break">
    
    <div class="resume">

      <div>ODT: <span><?=$odt ?></span></div>
      <div>Diametro: <span><?=$d ?></span> cm</div>
      <div>Profundidad: <span><?=$p ?></span> cm</div>
      <div>Grosor de Carton: <span><?=$g ?></span></div>
      <div>Altura Tapa: <span><?=$P ?></span></div>
    </div>

    <div class="part-container">
        
        <div class="illustration">

            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-16.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/diametro_tapa_print1.png">
        </div>
        
        <table class="t-results">   <!-- Tapa de la caja -->
            <tr>

                <th colspan="3">Tapa de la caja</th>  
            </tr>
            <tr>
                <td>Diametro Interior de la Tapa:</td>
                <td class="nomenclatura">D</td>
                <td><?=round($D,2) ?> cm</td>
            </tr>
            <tr>
                <td>Diametro Exterior de la Tapa:</td>
                <td class="nomenclatura">D'</td>
                <td><?=round($D_1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Cartón para Empalme Tapa:</td>
                <td class="nomenclatura">Z</td>
                <td><?=round($Z,2) ?> cm</td>
            </tr>
            <tr>
                <td>Papel para Empalme Tapa:</td>
                <td class="nomenclatura">Z'</td>
                <td><?=round($Z_1,2) ?> cm</td>
            </tr>
        </table>
    </div>

    <div class="part-container">
        
        <div class="illustration">

            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-17.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/diametro_tapa_print1.png">
        </div>
        
        <table class="t-results">   <!-- Tapa de la caja -->
            <tr>

                <th colspan="3">Tapa de la caja</th>  
            </tr>
            <tr>
                <td>Forro de la Tapa:</td>
                <td class="nomenclatura">D''</td>
                <td><?=round($D_1_1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Papel Rebasado para forro de la tapa:</td>
                <td class="nomenclatura">R</td>
                <td><?=round($R,2) ?> cm</td>
            </tr>
        </table>
    </div>
</div>

<div class="page-break">
    
    <div class="resume">

      <div>ODT: <span><?=$odt ?></span></div>
      <div>Diametro: <span><?=$d ?></span> cm</div>
      <div>Profundidad: <span><?=$p ?></span> cm</div>
      <div>Grosor de Carton: <span><?=$g ?></span></div>
      <div>Altura Tapa: <span><?=$P ?></span></div>
    </div>

    <div class="part-container">
        
        <div class="illustration">
    
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-18.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/carton_print-2.png">
        </div>

        <table class="t-results">   <!-- Carton Tapa -->

            <tr>

                <th colspan="3">Carton Tapa</th>  
            <tr>
                <td>Profundidad Exterior de la Tapa:</td>
                <td class="nomenclatura">P</td>
                <td><?=round($P,2) ?> cm</td>
            </tr>
            <tr>
                <td>Circunferencia del Carton de la Tapa:</td>
                <td class="nomenclatura">C</td>
                <td><?=round($C,2) ?> cm</td>
            </tr>
        </table>
    </div>

    <div class="part-container">
        
        <div class="illustration">
            
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-19.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/carton_print-2.png">
        </div>

        <table class="t-results">  <!-- Forro Exterior tapa -->
            
            <tr>
            
                <th colspan="3">Forro Exterior tapa</th>  
            </tr>  
            <tr>
                <td>Profundidad de Forro Exterior de la Tapa:</td>
                <td class="nomenclatura">P'</td>
                <td><?=round($P_1,2) ?> cm</td>
            </tr>

            <tr>
                <td>Circunferencia del Forro Exterior de la Tapa:</td>
                <td class="nomenclatura">C'</td>
                <td><?=round($C_1,2) ?> cm</td>
            </tr>
        </table>
    </div>
</div>

<div class="page-break">
    
    <div class="resume">

      <div>ODT: <span><?=$odt ?></span></div>
      <div>Diametro: <span><?=$d ?></span> cm</div>
      <div>Profundidad: <span><?=$p ?></span> cm</div>
      <div>Grosor de Carton: <span><?=$g ?></span></div>
      <div>Altura Tapa: <span><?=$P ?></span></div>
    </div>

    <div class="part-container">
        
        <div class="illustration">
            
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/redonda/Desarrollo Caja Redonda-20.png">
            <img class="to-print" src="<?php echo URL; ?>public/img/carton_print.png">
        </div>
        <table class="t-results">  <!-- Forro Interior tapa -->

            <tr>

                <th colspan="3">Forro Interior tapa</th>  
            </tr>
            <tr>
                <td>Profundidad del Forro Interior de la Tapa(Cartulina):</td>
                <td class="nomenclatura">P''</td>
                <td><?=round($P_1_1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Circunferencia del Forro Interior de la Tapa:</td>
                <td class="nomenclatura">C''</td>
                <td><?=round($C_1_1,2) ?> cm</td>
            </tr>
        </table>
    </div>
</div>
