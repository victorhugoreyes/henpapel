<style>
  body{
    background-image: url(<?=URL; ?>/public/img/white_carbonfiber.png)!important;
  }




</style>
<div class="resume">
<div>ODT: <span><?=$odt ?></span></div>
<div>Base: <span><?=$b ?></span> cm</div>
<div>Alto: <span><?=$h ?></span> cm</div>
<div>Profundidad cajon: <span><?=$p ?></span> cm</div>
<div>Profundidad tapa exterior: <span><?=$T ?></span> cm</div>
<div>Grosor de carton del cajon: <span><?=$g ?></span></div>
<div>Grosor de carton de la tapa: <span><?=$G ?></span></div>


</div>
<div class="part-container">
<div class="illustration">
  <img class="to-view" src="<?php echo URL; ?>public/img/cajon.png">
  <img class="to-print" src="<?php echo URL; ?>public/img/cajon_print.png">
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
  
</div><div class="part-container">
<div class="illustration">
  <img class="to-view" src="<?php echo URL; ?>public/img/forro.png">
  <img class="to-print" src="<?php echo URL; ?>public/img/forro_print.png">
</div>
  <table class="t-results">
<tr>
<th colspan="3">Forro exterior Cajon</th>  
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
</div><div class="part-container">
<div class="illustration">
  <img class="to-view" src="<?php echo URL; ?>public/img/cajon.png">
  <img class="to-print" src="<?php echo URL; ?>public/img/cajon_print.png">
</div>
  <table class="t-results">


<tr>
<th colspan="3">Tapa</th>  
</tr>
<tr>
  <td>Medida base de la tapa:</td>
  <td class="nomenclatura">B</td>
  <td><?=round($B,2) ?> cm</td>
</tr>
<tr>
  <td>Medida altura de la tapa:</td>
  <td class="nomenclatura">H</td>
  <td><?=round($H,2) ?> cm</td>
</tr>
<tr>
  <td>Base de la tapa:</td>
  <td class="nomenclatura">B'</td>
  <td><?=round($B1,2) ?> cm</td>
</tr>
<tr>
  <td>Altura de la tapa:</td>
  <td class="nomenclatura">H'</td>
  <td><?=round($H1,2) ?> cm</td>
</tr>
<tr>
  <td>Profundidad exterior de la tapa:</td>
  <td class="nomenclatura">T</td>
  <td><?=round($T,2) ?> cm</td>
</tr>
<tr>
  <td>Base extendida de la tapa:</td>
  <td class="nomenclatura">X</td>
  <td><?=round($X,2) ?> cm</td>
</tr>
<tr>
  <td>Altura extendida de la tapa:</td>
  <td class="nomenclatura">Y</td>
  <td><?=round($Y,2) ?> cm</td>
</tr>

<tr>
  <td>Base de Cartón para Empalme:</td>
  <td class="nomenclatura">X'</td>
  <td><?=round($X1,2) ?> cm</td>
</tr>
<tr>
  <td>Altura de Cartón para Empalme:</td>
  <td class="nomenclatura">Y'</td>
  <td><?=round($Y1,2) ?> cm</td>
</tr>


<tr>
  <td>Base Empalme Papel:</td>
  <td class="nomenclatura">X''</td>
  <td><?=round($X11,2) ?> cm</td>
</tr>
<tr>
  <td>Altura Empalme Papel:</td>
  <td class="nomenclatura">Y''</td>
  <td><?=round($Y11,2) ?> cm</td>
</tr>
</table>  
</div><div class="part-container">
<div class="illustration">
  <img class="to-view" src="<?php echo URL; ?>public/img/forro.png">
  <img class="to-print" src="<?php echo URL; ?>public/img/forro_print.png">
</div>
  <table class="t-results">
<tr>
<th colspan="3">Forro Tapa</th>  
</tr>  
<tr>
 <td>Base forro del cajon:</td>
  <td class="nomenclatura">B''</td>
  <td><?=round($B11,2) ?> cm</td>
</tr> 
<tr>
 <td>Altura forro del cajon:</td>
  <td class="nomenclatura">H''</td>
  <td><?=round($H11,2) ?> cm</td>
</tr> 
<tr>
  <td>Base del material rebasado para suajar forro:</td>
  <td class="nomenclatura">F</td>
  <td><?=round($F,2) ?> cm</td>
</tr>
<tr>
  <td>Altura del material rebasado para suajar forro:</td>
  <td class="nomenclatura">K</td>
  <td><?=round($K,2) ?> cm</td>
</tr>


</table>  
</div>

