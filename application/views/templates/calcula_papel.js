
function calculaPapel(papel_ancho, papel_largo, corte_ancho, corte_largo, parte, textura, precio, papel, data_name, data_laminado, id_papel, data_offset, data_digital) {

    id_canvas = parte;
    p_ancho   = papel_ancho;
    p_largo   = papel_largo;
    c_ancho   = corte_ancho;
    c_largo   = corte_largo;

    if(validarForma() === 1){

        var b      = Math.max(papel_ancho, papel_largo);
        var h      = Math.min(papel_ancho, papel_largo);
        var cb     = c_ancho;
        var ch     = c_largo;
        var escala = 250 / b;

        var cortes, sobrante;
        var cortes_H, sobrante_H;
        var totalCortes;
        var totalCortes_H;
        var cortesV, cortesH = 0;
        var cortesV2, cortesH2 = 0;
        var V_cortes;
        var H_cortes;
        var calcular_area_V;
        var calcular_area_H;
        var quepues;
        var costo = 0;
        var obligados;

//        cortes        = acomoda(b, h, c_ancho, c_largo, "N", "V");
        cortes        = acomoda(b, h, c_ancho, c_largo, "V", "V");
        totalCortes   = cortes.cortesT;
//        cortes_H      = acomoda(b, h, c_ancho, c_largo, "N", "H");
        cortes_H      = acomoda(b, h, c_ancho, c_largo, "H", "V");
        totalCortes_H = cortes_H.cortesT;

        if (cortes.sobranteB >= ch) {

            sobrante = acomoda(cortes.sobranteB, b, c_ancho, c_largo, "H", "H");
            totalCortes += sobrante.cortesT;

            //dibujaCuadricula(sobrante.cortesH, sobrante.cortesB, ch, cb, cortes.cortesB * cb * escala, 0, escala, "R");
        } else if (cortes.sobranteH >= cb) {

            sobrante = acomoda(cortes.sobranteH, h, c_ancho, c_largo, "H", "H");
            totalCortes += sobrante.cortesT;

            //dibujaCuadricula(sobrante.cortesB, sobrante.cortesH, ch, cb, 0, cortes.cortesH * ch * escala, escala, "R");
        } else {
            sobrante = {
                cortesT: 0,
                cortesB: 0,
                cortesH: 0,
                sobranteB: 0,
                sobranteH: 0,
                areaUtilizada: 0
            };
        }

        if (cortes_H.sobranteB >= ch) {

            sobrante_H    = acomoda(cortes_H.sobranteB, h,  c_ancho, c_largo, "H", "H");
            totalCortes_H += sobrante_H.cortesT;

            //dibujaCuadricula(sobrante.cortesH, sobrante.cortesB, ch, cb, cortes.cortesB * cb * escala, 0, escala, "R");

        } else if (cortes_H.sobranteH >= cb) {

            sobrante_H    = acomoda(cortes_H.sobranteH, b,  c_ancho, c_largo, "H", "H");
            totalCortes_H += sobrante_H.cortesT;

            //dibujaCuadricula(sobrante.cortesB, sobrante.cortesH, ch, cb, 0, cortes.cortesH * ch * escala, escala, "R");

        } else {
            sobrante_H = {
                cortesT: 0,
                cortesB: 0,
                cortesH: 0,
                sobranteB: 0,
                sobranteH: 0,
                areaUtilizada: 0
            };
        }

        if (parseInt(cb) < parseInt(ch)) {

            cortesV  = cortes.cortesT;
//            cortesH  = sobrante.cortesT;
            cortesV2  = sobrante.cortesT;
//            cortesV2 = cortes_H.cortesT;
            cortesH  = cortes_H.cortesT;
            cortesH2 = sobrante_H.cortesT;
        } else {

//            cortesV  = sobrante.cortesT;
            cortesH2  = sobrante.cortesT;
            cortesH   = cortes.cortesT;
            cortesV2  = sobrante_H.cortesT;
//            cortesH2 = cortes_H.cortesT;
            cortesV   = cortes_H.cortesT;
        }

/*
        calcular_area_V = calcularArea(b, h, cb, ch, totalCortes);
        calcular_area_H = calcularArea(b, h, cb, ch, totalCortes_H);

*/

        // cortes_deseados es merma
//        V_cortes = calcular(b, h, cortesV, cortesH, totalCortes, cortes.cortesT, cortes_deseados, "V");

//        H_cortes = calcular(b, h, cortesV2, cortesH2, totalCortes_H, cortes_H.cortesT, cortes_deseados, "H");

        var orientacion;
        var cortes_final = 0;

        V_cortes = totalCortes;
        H_cortes = totalCortes_H;

        if (V_cortes > H_cortes) {

            clearCanvas();

            $("#" + id_canvas).attr({width: h * escala, height: b * escala, style: "background-color: #272B34;"});

            dibujaCuadricula(cortes.cortesB, cortes.cortesH, cb, ch, 0, 0, escala,id_canvas);

            costo        = (precio / V_cortes);
            cortes_final = V_cortes;
            orientacion  = 'vertical';
        }else{

            clearCanvas();

            $("#" + id_canvas).attr({width: b * escala, height: h * escala, style: "background-color: #272B34;"});

            dibujaCuadricula(cortes_H.cortesB, cortes_H.cortesH, cb, ch, 0, 0, escala,id_canvas);

            orientacion  = 'horizontal';
            cortes_final = H_cortes;
            costo        = precio / H_cortes;
        }

        costos_papeles[parte] = costo.toFixed(2);

        if (aCortes && aCortes.length) {

            aCortes[0] = null;
        }

        aCortes[parte] = cortes_final.toFixed(0);

        var costo_final = costo;

        $('#calc-' + id_canvas).remove();

        if (data_laminado == 'true'){

            obligados = '<input type="hidden" name="' + data_name + '[laminado]" value="si">';
        } else {

            obligados = '<input type="hidden" name="' + data_name + '[laminado]" value="no">';
        }


        //precio_forros += costo;

        var total_Pliegos = parseInt($('#qty').val()) / cortes_final;

        var total_costo = parseInt($('#qty').val()) * costo_final.toFixed(2);

        // iguala los nombres al calculo de la caja(calculadora)
        var parte_texto;

        switch (id_canvas) {

            case 'forro_cajon':

                parte_texto = "Forro del Cajón";

                break;
            case 'guarda_cajon':

                parte_texto = "Empalme del Cajón";

                break;
            case 'forro_cartera':

                parte_texto = "Forro de la Cartera";

                break;
            case 'guarda':

                parte_texto = "Guarda";

                break;
            case 'cajon':

                parte_texto = "Cajón";

                break;
            case 'cartera':

                parte_texto = "Carton de la Cartera";

                break;
        }

        papel = papel.trim();

        if (papel != 'carton') {

            var tr = '<tr style="display:none;" id="calc-' + id_canvas + '"><td><strong> ' + id_canvas + ':</strong> ' + corte_ancho + ' cm por ' + corte_largo + 'cm <strong>Ancho Pliego: </strong>' + p_ancho + ' cm <strong>Largo Pliego: </strong>' + p_largo + ' cm <strong> Cantidad Solicitada: </strong>' + parseInt($('#qty').val()) + ' <strong> Piezas por Pliego: </strong>' + cortes_final + ' <strong>total_Pliegos: </strong>' + total_Pliegos + ' <strong>Papel: </strong>' + papel + '</td><td>$' + costo_final.toFixed(2) + '</td><td><div class=""></div></td><input type="hidden" name="' + data_name + '[costo]" value=' + costo_final.toFixed(2) + '><input type="hidden" name="' + data_name + '[cortes]" value=' + cortes_final + '><input type="hidden" name="' + data_name + '[orientacion]" value=' + orientacion + '><input type="hidden" name="' + data_name + '[corte_ancho]" value=' + corte_ancho + '><input type="hidden" name="' + data_name + '[corte_largo]" value=' + corte_largo + '><input type="hidden" name="' + data_name + '[id]" value=' + id_papel + '>' + obligados + '</tr>';

            var tr2 = '<tr id="calc-' + id_canvas + '"><td style="color: steelblue;"><strong>Material para ' + parte_texto + ': </strong>' + papel + '</td><td>$' + total_costo.toFixed(2) + '</td><td><div class="delete"></div><input type="hidden" class="prices" value="' + total_costo.toFixed(2) + '"></td></tr>';

            cantidad_print      = parseInt($('#qty').val());
            costo_final_print   = costo_final.toFixed(2);
            total_Pliegos_print = total_Pliegos.toFixed(2);
            total_costo_print   = total_costo.toFixed(2);

            parte_texto = parte_texto.trim();

            var tr3 = '<tr style="text-align: center;" id="calc-' + id_canvas + '"><td name="parte_texto" id="parte_texto">' + parte_texto + '</td><td name="cantidad_print" id="cantidad_print">' + cantidad_print + '</td><td name="papel" id="papel" style="width: 20%;">' + papel + '</td><td name="costo_final_print" id="costo_final_print">' + costo_final_print + '</td><td name="p_largo" id="p_largo">' + p_largo + ' cm</td><td name="p_ancho" id="p_ancho">' + p_ancho + ' cm</td><td name="corte_largo" id="corte_largo">' + corte_largo + 'cm</td><td name="corte_ancho" id="corte_ancho">' + corte_ancho + ' cm </td><td name="cortes_final" id="cortes_final">' + cortes_final + '</td><td name="total_Pliegos_print" id="total_Pliegos_print">' + total_Pliegos_print + '</td><td name="total_costo_print" id="total_costo_print">' + total_costo_print + '</td></tr>';

            if (papel != "Elegir tipo de papel") {

                aTr3.push([{"Parte": parte_texto, "Cantidad Solicitada": cantidad_print, "Papel": papel, "Precio": costo_final_print, "Largo": p_largo, "Ancho": p_ancho, "Corte Largo": corte_largo, "Corte Ancho": corte_ancho, "Piezas por Pliego": cortes_final, "Total Pliego": total_Pliegos_print, "Total Costo": total_costo_print}]);
            };

            var tr4 = '<tr><td>Offset</td><td>'+ cantidad_minima_offset +'</td><td>'+ merma_offset_adic +'</td><td>'+ merma_offset +'</td></tr><tr><td>Digital</td><td>'+ cantidad_minima_digital +'</td><td>'+ merma_digital_adic +'</td><td>'+ merma_digital +'</td></tr><tr><td>Serigrafia</td><td>'+ cantidad_minima_serigrafia +'</td><td>'+ merma_serigrafia_adic +'</td><td>'+ merma_serigrafia +'</td></tr><tr><td>HotStamping</td><td>'+ cantidad_minima_hotstamping +'</td><td>'+ merma_HotStamping_adic +'</td><td>'+ merma_HotStamping +'</td></tr><tr><td>Laminado</td><td>'+ cantidad_minima_laminado +'</td><td>'+ merma_Laminado_adic +'</td><td>'+ merma_Laminado +'</td></tr><tr><td>Barniz UV</td><td>'+ cantidad_minima_barniz +'</td><td>'+ merma_Barniz_adic +'</td><td>'+ merma_Barniz +'</td></tr><tr><td>Suaje</td><td>'+ cantidad_minima_suaje +'</td><td>'+ merma_Suaje_adic +'</td><td>'+ merma_Suaje +'</td></tr><tr><td>Forrado</td><td>'+ cantidad_minima_forrado +'</td><td>'+ merma_Forrado_adic +'</td><td>'+ merma_Forrado +'</td><td>Grabado</td><td>' + grabadomin + '</td><td>' + grabadoadic + '</td><td>' + grabadotot + '</td></tr>';
        } else {

            var tr = '<tr style="display:none;" id="calc-' + id_canvas + '"><td><strong>Carton base de ' + id_canvas + ':</strong> ' + corte_ancho + 'cm por ' + corte_largo + ' cm <strong>Ancho Pliego: </strong>' + p_ancho + ' cm <strong>Largo Pliego: </strong>' + p_largo + ' cm <strong>Papel: </strong>' + papel + '</td><td>$' + costo_final.toFixed(2) + '</td><td><div class=""></div></td><input type="hidden" name="' + data_name + '[costo]" value=' + costo_final.toFixed(2) + '><input type="hidden" name="' + data_name + '[cortes]" value=' + cortes_final + '><input type="hidden" name="' + data_name + '[orientacion]" value=' + orientacion + '><input type="hidden" name="' + data_name + '[corte_ancho]" value=' + corte_ancho + '><input type="hidden" name="' + data_name + '[corte_largo]" value=' + corte_largo + '><input type="hidden" name="' + data_name + '[id]" value=' + id_papel + '>' + obligados + '</tr>';

            var tr2 = '<tr id="calc-' + id_canvas + '"><td style="color: steelblue;"><strong>Material para ' + parte_texto + ': </strong>' + papel + '</td><td>$' + total_costo.toFixed(2) + '</td><td><div class="delete"><input type="hidden" class="prices" value="' + total_costo.toFixed(2) + '"></div></td></tr>';

            var cant_tmp          = parseInt($('#qty').val());
            var costo_final_tmp   = costo_final.toFixed(2);
            var total_Pliegos_tmp = total_Pliegos.toFixed(2);
            var total_costo_tmp   = total_costo.toFixed(2);

            parte_texto = parte_texto.trim();

            var tr3 = '<tr style="text-align: center;" id="calc-' + id_canvas + '"><td name="parte_texto" id="parte_texto">' + parte_texto + '</td><td name="cant_tmp" id="cant_tmp">' + cant_tmp + '</td><td name="papel" id="papel" style="width: 20%;">' + papel + '</td><td name="costo_final_tmp" id="costo_final_tmp">' + costo_final_tmp + '</td><td name="p_largo" id="p_largo">' + p_largo + ' cm</td><td name="p_ancho" id="p_ancho">' + p_ancho + ' cm</td><td name="corte_largo" id="corte_largo">' + corte_largo + 'cm</td><td name="corte_ancho" id="corte_ancho">' + corte_ancho + ' cm </td><td name="cortes_final" id="cortes_final">' + cortes_final + '</td><td name="total_Pliegos_tmp" id="total_Pliegos_tmp">' + total_Pliegos_tmp + '</td><td name="total_costo_tmp" id="total_costo_tmp">' + total_costo_tmp + '</td></tr>';

            if ( papel != "Elegir tipo de papel") {

                aTr3.push([{"Parte": parte_texto, "Cantidad Solicitada": cant_tmp, "Papel": papel, "Precio": costo_final_tmp, "Largo": p_largo, "Ancho": p_ancho, "Corte Largo": corte_largo, "Corte Ancho": corte_ancho, "Piezas por Pliego": cortes_final, "Total Pliego": total_Pliegos_tmp, "Total Costo": total_costo_tmp}]);
            };

            var tr4 = '<tr><td>Offset</td><td>'+ cantidad_minima_offset +'</td><td>'+ merma_offset_adic +'</td><td>'+ merma_offset +'</td></tr><tr><td>Digital</td><td>'+ cantidad_minima_digital +'</td><td>'+ merma_digital_adic +'</td><td>'+ merma_digital +'</td></tr><tr><td>Serigrafia</td><td>'+ cantidad_minima_serigrafia +'</td><td>'+ merma_serigrafia_adic +'</td><td>'+ merma_serigrafia +'</td></tr><tr><td>HotStamping</td><td>'+ cantidad_minima_hotstamping +'</td><td>'+ merma_HotStamping_adic +'</td><td>'+ merma_HotStamping +'</td></tr><tr><td>Laminado</td><td>'+ cantidad_minima_laminado +'</td><td>'+ merma_Laminado_adic +'</td><td>'+ merma_Laminado +'</td></tr><tr><td>Barniz UV</td><td>'+ cantidad_minima_barniz +'</td><td>'+ merma_Barniz_adic +'</td><td>'+ merma_Barniz +'</td></tr><tr><td>Suaje</td><td>'+ cantidad_minima_suaje +'</td><td>'+ merma_Suaje_adic +'</td><td>'+ merma_Suaje +'</td></tr><tr><td>Forrado</td><td>'+ cantidad_minima_forrado +'</td><td>'+ merma_Forrado_adic +'</td><td>'+ merma_Forrado +'</td><td>Grabado</td><td>' + grabadomin + '</td><td>' + grabadoadic + '</td><td>' + grabadotot + '</td></tr>';
        }


        // convierte un objeto Javascript a un string
        aTr3_tmp        = JSON.stringify(aTr3, null, 4);
        costo_papel_tmp = JSON.stringify(costos_papeles, null, 4);
        acortes_tmp     = JSON.stringify(aCortes, null, 4);

        var qty_temp;
        var num_rows;
        var k;

        num_rows = document.getElementById("table-cont").rows.length;
        num_rows = num_rows.toFixed(0);

        if (num_rows > 6) {

            for (k = 0; k < 6; k++) {

//                document.getElementById("table-general").deleteRow(0);
                document.getElementById("table-cont").deleteRow(0);
            }
        }

        qty_temp = $('#qty').val();

        if (qty_temp > 1 && (merma_offset > 0 || merma_digital > 0)) {

//            jQuery214('#table-general').append(tr1);
            jQuery214('#forros-select').append(tr2);    // tabla de mermas
            jQuery214('#table-cont').append(tr3);       // tabla de papeles
        }

        collectPrices();
    }

}
