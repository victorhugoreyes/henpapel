
<div class="left-col">
	
</div>

<div class="right-col">
	
    <div class="cajas-form">

        <form method="POST" action="<?php echo URL; ?>cajas/newOption/">
            <h1>Agregar Opcion</h1>
            <div class="cajas-input-group">

                <div class="cajas-col-input left">
    
                	<span>Tipo de caja:</span>
                </div>
                <div class="cajas-col-input right">
	
                    <select class="cajas-input" name="modelo-caja">
                        <?php foreach ($models as $model) { ?>
                            
                            <option value="<?= $model['id_modelo'] ?>"><?= $model['nombre'] ?></option>
                        <?php  } ?>
                    </select>
                </div>	
            </div>
            
            <div class="cajas-input-group even">

                <div class="cajas-col-input left">
	               
                   <span>Titulo:</span>
                </div>
                <div class="cajas-col-input right">

                    <input type="text"  required placeholder="Titulo de la opcion" class="cajas-input" name="titulo">
                </div>	
            </div>

            <div class="cajas-input-group ">
                <div class="cajas-col-input left">
                
                    <span>Name:</span>
                </div>
                <div class="cajas-col-input right">
                
                    <input type="text"  required placeholder="Name de html" class="cajas-input" name="name">
                </div>	
            </div>

            <div class="cajas-input-group even">

                <div class="cajas-col-input left">
	
                    <span>Tipo de opcion:</span>
                </div>
                <div class="cajas-col-input right">
	
                    <select class="cajas-input" id="tipo-opcion" name="tipo-opcion">
                        <option data-type="number" disabled selected>Elige una opcion --</option>
                        <option data-type="number" value="number">Numerica</option>
                        <option data-type="text" value="text">Texto</option>
                        <option data-type="radio" value="radio">Radiogroup</option>
                        <option data-type="select" value="select">Lista desplegable</option>
                    </select>
                </div>	
            </div>

            <div class="cajas-input-group ">
            
                <div class="cajas-col-input left">
                    
                    <span>Valores:</span>
                </div>
                <div class="cajas-col-input right" id="values">
	
                </div>	
            </div>

            <input class="cajas-form-submitter" type="submit" value="GUARDAR">
        </form>
    </div>
</div>

<script>
	var i=1;
	
    jQuery214(document).on("change", "#tipo-opcion", function () {

    	var type=jQuery214(this).val();
    	var options;
    	  
    	jQuery214("#values").empty();
    	  	
    	switch(type) {
        
            case 'text':
            
                options='<div id="option-container"><input type="text" name="options[]" class="cajas-input"></div>';
                
                break;
        
            case 'number':
            
                options='<div id="option-container"><input type="number" name="options[]" class="cajas-input"></div>';
                
                break;
        
            case 'radio':
            
                options='<table id="option-container"><tbody id="options-tbody"><tr><td><input type="text" name="options[]" class="cajas-input" placeholder="Opcion '+i+'"></td><td><div class="quit"></div></td></tr></tbody><tbody id="button-tbody"><tr><td colspan="2"><div id="add-option">+ Agregar opcion</div></td></tr></tbody></table>';
            
                break;
        
            case 'select':
                
                options='<table id="option-container"><tbody id="options-tbody"><tr><td><input type="text" name="options[]" class="cajas-input" placeholder="Opcion '+i+'"></td><td><div class="quit"></div></td></tr></tbody><tbody id="button-tbody"><tr><td colspan="2"><div id="add-option">+ Agregar opcion</div></td></tr></tbody></table>';
            
                break;
        
            default:
            
                options='<div id="option-container"><input type="number" name="options[]" class="cajas-input"></div>';
        }

        jQuery214("#values").html(options);
    });


    jQuery214(document).on("click", "#add-option", function () {
	
        i++;
	   
       jQuery214("#options-tbody").append('<tr><td><input type="text" name="options[]" class="cajas-input" placeholder="Opcion '+i+'"></td><td><div class="quit"></div></td><tr>');
    });


    jQuery214(document).on("click", ".quit", function () {
	
	   jQuery214(this).closest('tr').remove();
	   i--;
    });

</script>
