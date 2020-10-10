<style>
  body{
    background-image: url(<?=URL; ?>/public/img/white_carbonfiber.png)!important;
  }

.illustration img {
  width: 90%!important;
}

.part-container{
  width: 25%;
  margin-left: 15%;
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
    }

    .part-container{
        margin-left: 0%;
    }
}

</style>

<div class="page-break">
    
    <div class="resume">
        
        <div>ODT: <span><?=$odt ?></span></div>
        <div>Base: <span><?=$b ?></span> cm</div>
        <div>Alto: <span><?=$h ?></span> cm</div>
        <div>Profundidad: <span><?=$p ?></span> cm</div>
        <div>Grosor carton: <span><?=$g ?></span></div>
        <div>Grosor cartera: <span><?=$G ?></span></div>
    </div>

    <div class="part-container" style="margin-left: 0px;">
        
        <div class="illustration">
            
<!--
            <img class="to-view" src="<?php echo URL; ?>public/img/cajon.png">
-->
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-16.png" width="100%" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/cajon_print.png">
        </div>

        <table class="t-results">
            
            <tr>

                <th colspan="3">Cajon</th>  
            </tr>
            <!-- 
                <tr>
                  <td>Base del cajon:</td>
                  <td class="nomenclatura">b'</td>
                  <td><?=round($b1,2) ?> cm</td>
                </tr>
                <tr>
                  <td>Altura del cajon:</td>
                  <td class="nomenclatura">h'</td>
                  <td><?=round($h1,2) ?> cm</td>
                </tr>
                <tr>
                  <td>Profundidad de cajon:</td>
                  <td class="nomenclatura">p'</td>
                  <td><?=round($p1,2) ?> cm</td>
                </tr>
            !-->
            <tr>
                <td>Base del cajon:</td>
                <td class="nomenclatura">b'</td>
                <td><?=round($b1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Altura del cajon:</td>
                <td class="nomenclatura">h'</td>
                <td><?=round($h1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Profundidad del cajon:</td>
                <td class="nomenclatura">p'</td>
                <td><?=round($p1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Base extendida del cajon:</td>
                <td class="nomenclatura">x</td>
                <td><?=round($x,2) ?> cm</td>
            </tr>
            <tr>
                <td>Altura extendida del cajon:</td>
                <td class="nomenclatura">y</td>
                <td><?=round($y,2) ?> cm</td>
            </tr>
            <tr>
                <td>Base de carton para empalme:</td>
                <td class="nomenclatura">x'</td>
                <td><?=round($x1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Alto de carton para empalme:</td>
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

    <div class="part-container" style="float: right; margin-right: 0px;">
        
        <div class="illustration">

<!--
            <img class="to-view" src="<?php echo URL; ?>public/img/forro.png">
-->
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-17.png" width="100%" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_print.png">
        </div>

        <table class="t-results">
            <tr>
        
                <th colspan="3">Forro</th>  
            </tr>
            <tr>  
                <td>Base forro del cajon:</td>
                <td class="nomenclatura">b''</td>
                <td><?=round($b11,2) ?> cm</td>
            </tr>
            <tr>
                <td>Alto forro del cajon:</td>
                <td class="nomenclatura">h''</td>
                <td><?=round($h11,2) ?> cm</td>
            </tr>
            <tr>
                <td>Base del material rebasado para suajar forro:</td>
                <td class="nomenclatura">f</td>
                <td><?=round($f,2) ?> cm</td>
            </tr>
            <tr>
                <td>Altura del material rebasado para suajar forro:</td>
                <td class="nomenclatura">k</td>
                <td><?=round($k,2) ?> cm</td>
            </tr>
        </table>  
    </div>
</div>

<div class="page-break">

    <div class="resume">
        
        <div>ODT: <span><?=$odt ?></span></div>
        <div>Base: <span><?=$b ?></span> cm</div>
        <div>Alto: <span><?=$h ?></span> cm</div>
        <div>Profundidad: <span><?=$p ?></span> cm</div>
        <div>Grosor carton: <span><?=$g ?></span></div>
        <div>Grosor cartera: <span><?=$G ?></span></div>
    </div>

    <div class="part-container" style="margin-left: 0px;">
        
        <div class="illustration">
            
<!--
            <img class="to-view" src="<?php echo URL; ?>public/img/forro_cartera_1.png">
-->
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-18.png" width="1005" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_1_print.png">
        </div>
        <table class="t-results">
            <tr>

                <th colspan="3">Forro Cajon tira</th>  
            </tr>

            <tr>
                <td>Profundidad del Forro del cajon en Tira:</td>
                <td class="nomenclatura">p''</td>
                <td><?=round($p11,2) ?> cm</td>
            </tr>
            <tr>
                <td>Largo de Forro en Tira con pestañas:</td>
                <td class="nomenclatura">l</td>
                <td><?=round($l,2) ?> cm</td>
            </tr>
            <tr>
                <td>Largo de Forro en Tira:</td>
                <td class="nomenclatura">l'</td>
                <td><?=round($l1,2) ?> cm</td>
            </tr>
        </table>  
    </div>

    <div class="part-container" style="float: right; margin-right: 0px;">
        
        <div class="illustration">
            
<!--
            <img class="to-view" src="<?php echo URL; ?>public/img/cartera.png">
-->
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-19.png" width="100%" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/cartera_print.png">
        </div>

        <table class="t-results">
            <tr>

                <th colspan="3">Cartera</th>  
            </tr>
            <tr>
                <td>Base de la tapa:</td>
                <td class="nomenclatura">B</td>
                <td><?=round($B,2) ?> cm</td>
            </tr>
            <tr>
                <td>Alto de la tapa:</td>
                <td class="nomenclatura">H</td>
                <td><?=round($H,2) ?> cm</td>
            </tr>
            <tr>
                <td>Profundidad lomo de la cartera:</td>
                <td class="nomenclatura">P</td>
                <td><?=round($P,2) ?> cm</td>
            </tr>
            <tr>
                <td>Altura total de la cartera:</td>
                <td class="nomenclatura">Y</td>
                <td><?=round($Y,2) ?> cm</td>
            </tr>
        </table>  
    </div>

</div>

<div class="page-break">
    
    <div class="resume">
        <div>ODT: <span><?=$odt ?></span></div>
        <div>Base: <span><?=$b ?></span> cm</div>
        <div>Alto: <span><?=$h ?></span> cm</div>
        <div>Profundidad: <span><?=$p ?></span> cm</div>
        <div>Grosor carton: <span><?=$g ?></span></div>
        <div>Grosor cartera: <span><?=$G ?></span></div>
    </div>
    
    <div class="part-container" style="margin-left: 0px">
    
        <div class="illustration">
            
<!--
            <img class="to-view" src="<?php echo URL; ?>public/img/forro_cartera_1.png">
-->
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-20.png" width="100%" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_1_print.png">
        </div>
        <table class="t-results">
            <tr>

                <th colspan="3">Forro Cartera</th>  
            </tr>
            <tr>
                <td>Base del forro cartera:</td>
                <td class="nomenclatura">B'</td>
                <td><?=round($B1,2) ?> cm</td>
            </tr>
            <tr>
                <td>Altura total del forro de la cartera:</td>
                <td class="nomenclatura">Y'</td>
                <td><?=round($Y1,2) ?> cm</td>
            </tr>
        </table>
    </div>

    <div class="part-container" style="float: right; margin-right: 0px;">
        
        <div class="illustration">
            
            <img class="to-view" src="<?php echo URL; ?>public/img/cajas/libros/Desarrolo Caja Tipo Libro-21.png" width="1005" height="100%">
            <img class="to-print" src="<?php echo URL; ?>public/img/forro_cartera_1_print.png">
        </div>

        <table class="t-results">
            <tr>

                <th colspan="3">Forro Cartera</th>  
            </tr>
            <tr>
                <td>Base de guarda:</td>
                <td class="nomenclatura">B''</td>
                <td><?=round($B11,2) ?> cm</td>
            </tr>
            <tr>
                <td>Alto de la guarda:</td>
                <td class="nomenclatura">Y''</td>
                <td><?=round($Y11,2) ?> cm</td>
            </tr>
        </table>
    </div>

</div>
