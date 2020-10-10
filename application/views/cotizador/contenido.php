<?php

$cotiza = json_decode($cotizacion['detalles'], true);

foreach ($cotiza as $key=> $row) {

    $model = $options_model->getModelInfo($row['id_modelo']);
    
    ?>
    <div class="added">
    
        <table class="quotadd" id="quot-<?=$key ?>">
            
            <tbody>

                <tr>
                    <td>
                        <div class="extra-cover"></div>
                        <div class="thumbnail" data-sku="<?=$row['modelo'] ?>" data-image="2" style="background-image:url(photos/2)"></div>
                    </td>
                    <td><?=$row['modelo'] ?></td>
                    <td>
                        <div class="qty-cover"></div>
                        <div>Cantidad:</div>
                        
                        <input id="<?=$key ?>" type="number" data-quote="<?=$key ?>" name="quotes[<?=$key ?>]" class="quotes" value="<?=$row['cantidad'] ?>">
                        
                        <input type="hidden" id="price-<?=$key ?>" name="prices[<?=$key ?>]" value="<?=$row['monto'] ?>">
                        
                        <input type="hidden" id="ciento-<?=$key ?>" value="<?=$model['ciento'] ?>">

                        <input type="hidden" id="amount-<?=$key ?>" name="total[<?=$key ?>]" value="<?=$row['monto'] ?>">
                        
                        <input type="hidden" id="p_listas-<?=$key ?>" name="p_listas[<?=$key ?>]" value="<?=$model['p100'] ?>">
                        
                        <input type="hidden" id="unico-<?=$key ?>" value="<?=$model['unico'] ?>">
                        
                        <input type="hidden" id="unitario-<?=$key ?>" value="<?=$model['unidad'] ?>">
                        
                        <input type="hidden" id="ajuste-<?=$key ?>" value="<?=$model['cajuste'] ?>">
                        
                        <input type="hidden" id="papel-<?=$key ?>" value="<?=$model['papel'] ?>">
                        
                        <input type="hidden" id="millar-<?=$key ?>" value="<?=$model['millar'] ?>">
                        <input type="hidden" id="qty-p-<?=$key ?>" name="qty[<?=$key ?>]" value="<?=$row['cantidad'] ?>">
                        
                        <input type="hidden" name="models[<?=$key ?>]" value="<?=$row['modelo'] ?>">
                        
                        <input type="hidden" name="id_prods[<?=$key ?>]" value="<?=$row['id_modelo'] ?>">
                        
                        <input type="hidden" name="ids[]" value="<?=$key ?>">
                    </td>
                    <td>
                        <div class="extra-cover"></div>
                        <div class="quot-user extra" data-quote="<?=$key ?>">
                            
                            <div class="aument">+ Agregar aumentos</div>
                        </div>
                    </td>
                    <td id="total-<?=$key ?>">Total: $<?=$row['monto'] ?></td>
                    <td style="width:55px">
                        <div class="extra-cover"></div>
                        <div class="remove"> 

                            <img src="<?=URL ?>/public/img/remove.png">
                        </div>
                    </td>
                </tr>
                <?php
                if (isset($row['aumentos'])) {
                
                    foreach ($row['aumentos'] as $key2 => $aumento) {
        
                        $info = $options_model->getAumentoInfo($aumento['id_aumento']);

                        ?>
                        <tr class="extra-tr extra-<?=$key ?>">
                            
                            <td colspan="4"><?=$info['clave'] ?></td>
                            <td class="each-extra">$<?=$aumento['costo'] ?></td>
                            
                            <input type="hidden" class="ex-price" name="price-<?=$key ?>[<?=$aumento['id_aumento'] ?>]" value="<?=$info['costo_unico'] ?>">
                            
                            <input type="hidden" class="ex-unico" value="<?=$info['costo_unico'] ?>">
                            
                            <input type="hidden" class="ex-unidad" value="<?=$info['costo_u'] ?>">
                            
                            <input type="hidden" class="ex-ciento" value="<?=$info['costo_c'] ?>">
                            
                            <input type="hidden" class="ex-millar" value="<?=$info['costo_m'] ?>">
                            
                            <input type="hidden" class="ex-increment" name="ex-increment[<?=$aumento['id_aumento'] ?>]" value="<?=$aumento['costo'] ?>">
                            
                            <td class="quit_add" data-increase="<?=$aumento['costo'] ?>" data-id="<?=$key ?>">Quitar</td>
                    
                            <input type="hidden" name="extra-<?=$key ?>[<?=$aumento['id_aumento'] ?>]" value="<?=$aumento['id_aumento'] ?>">
                        </tr>
                    <?php } 
                }  ?>
                <tr></tr>
            </tbody>
        </table>
    </div>

    <script>
        i++;
    </script>
<?php } 
?>
