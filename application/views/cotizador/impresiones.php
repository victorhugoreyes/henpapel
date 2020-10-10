
<!-- modal popup de Impresiones -->
<div class="cotizador_box" id="impresiones" >

    <div class="modal-close"></div>
    
    <div>

        <h2 style="font-size: 15px;padding: 10px;">¿Llevara impresiones?</h2>

        <?php foreach ($partes_impresiones as $key => $parte) { ?>

            <div class="input-group " style="padding: 8px;border-top: solid 1px #ccc;">
            
                <div class="switcher">
                
                    <div class="onoffswitch">
                    
                        <input class="onoffswitch-checkbox" name="onoffswitch" id="myonoffswitch-<?=$key ?>" type="checkbox" data-target="<?=$parte['parte'] ?>">
                        
                        <label class="onoffswitch-label" for="myonoffswitch-<?=$key ?>">
                            <span class="onoffswitch-inner"></span>
                            <span class="onoffswitch-switch"></span>
                       </label>
                    </div>
                </div>
                
                <div class="cajas-col-input t-left">
                    
                    <span><?=$parte['titulo'] ?> </span>
                </div>
            </div>

            <div class="print-drop" id="<?=$parte['parte'] ?>">
          
                <table>
                    
                    <tr>
            
                        <td>

                            <div class="vertical-watcher <?=$parte['parte'] ?>-line" id="">
                            </div>Offset
                            <div class="check-tab">

                                <input type="checkbox" class="print-check <?=$parte['parte'] ?>-check" data-family="<?=$parte['parte'] ?>-check" data-linefamily="<?=$parte['parte'] ?>-line">
                            </div>
                            <div class="watcher-tab"></div>
                        </td>
                        <td data-posicion="<?=$parte['parte'] ?>_cajon" data-tipo="offset" data-descript="Impresion Offset" data-lugar="<?=$parte['lugar'] ?>" data-costociento="3" data-costomillar="4" data-costounico="5" data-papel="6" data-costounitario="7" id="offset-<?=$parte['parte'] ?>">

                            <div class="vertical-watcher <?=$parte['parte'] ?>-line" id=""></div>
                            Numero de tintas:  
                            <input type="number" min="1" value="1" name="">
                        </td>
                    </tr>
                    <tr>
              
                        <td>Digital 

                            <div class="check-tab">

                                <input type="checkbox" class="print-check <?=$parte['parte'] ?>-check" data-family="<?=$parte['parte'] ?>-check" data-linefamily="<?=$parte['parte'] ?>-line">
                            </div>
                        </td>
                        <td data-posicion="<?=$parte['parte'] ?>_cajon" data-tipo="digital" data-descript="Impresion Digital" data-lugar="<?=$parte['lugar'] ?>" data-costociento="3" data-costomillar="4" data-costounico="5" data-papel="6" data-costounitario="7" id="digital-excajon">Se agregara una impresion digital
                        </td>
                    </tr>
                    <tr>
              
                        <td>Serigrafia

                            <div class="check-tab">

                                <input type="checkbox" class="print-check" data-family="none" data-linefamily="none">
                            </div>
                        </td>
                        <td data-posicion="<?=$parte['parte'] ?>_cajon" data-tipo="serigrafia" data-descript="Impresion Serigrafia" data-lugar="<?=$parte['lugar'] ?>" data-costociento="3" data-costomillar="4" data-costounico="5" data-papel="6" data-costounitario="7" id="serigra-<?=$parte['parte'] ?>">Numero de tintas: 
                            
                            <input type="number" min="1" value="1" name="">
                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>

        <div style="position: relative;background: rgb(0, 45, 98);">

            <button type="button" class="tab-btn-sumbit" id="print_submit">Listo</button>
        </div>
    </div>
</div>
