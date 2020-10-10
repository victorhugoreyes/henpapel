<?php

$workers=$login_model->getAllowedMembers();
/*
echo "<pre>";
print_r($_SESSION);
echo "</pre>"; */

?>
<style>
	.active{
		font-weight: bold;
	}
</style>

<script src="<?php echo URL; ?>public/js/libs/2.1.4.jquery.min.js"></script>
    <script>
    var jQuery214=$.noConflict(true);
  </script>
  <link rel="stylesheet" href="<?php echo URL; ?>public/js/css/softkeys-small.css">
<script src="<?php echo URL; ?>public/js/softkeys-0.0.1.js"></script>
  <form id="team">
<ul class="topbar">
  <li><a class="active" href="#home">Por favor ingresa una ODT:</a></li>
  <li><input class="odt-input" type="text" name="odt" id="odt" placeholder="ODT" onclick="getKeys(this.id,'odt')"></li>
  <li style="float:right"><div id="save-team">GUARDAR</<div> </li>
</ul>

<div class="workers-container">

<div></div>
<input type="hidden" name="sesion" value="<?=$_SESSION['sessionID'] ?>">

<?php foreach ($workers as $worker) { ?>

<div class="worker" <?=($worker['is_team']=='true')? 'style="display:none;"': '' ?>>
<div class="worker-content" id="worker-<?=$worker['id'] ?>">
<input type="checkbox" name="leader[<?=$worker['id'] ?>]" value="<?=($worker['id']==$_SESSION['idUser'])? 'true': 'false' ?>" <?=($worker['id']==$_SESSION['idUser'])? 'checked': '' ?>>
<input type="checkbox" name="workers[]" value="<?=$worker['id'] ?>" <?=($worker['id']==$_SESSION['idUser'])? 'checked': '' ?>>
<div class="worker-photo">
	<img src="<?= URL; ?>public/<?=((!empty($worker['foto']))? $worker['foto'] :'images/default.jpg')?>">
</div>
<div class="worker-info">
<div class="w-info-content">
<p class="worker-name"><?= $worker['logged_in']; ?></p>
<p class="worker-lastname"><?= $worker['apellido']; ?></p>
<div class="tasks">Tareas</div>
</div>
</div>
<div class="worker-click off" data-user="<?=$worker['id'] ?>">
<div class="worker-checkbox"></div>
</div>
</div>
	
</div>
	
<?php } ?>

</div>
</form>	
<div class="box">
  
</div>
<div class="full-box">
	
</div>
<div class="backdrop"></div>
<div id="key-operarios" class="keyboard">
<ul class="topbar">
  
  <li style="float:right"><div  class="close-bottom-key"></div></li>
</ul>
    
    <div class="keycontainer">
      <div id="softk" class="softkeys" data-target="input[name='getodt']"></div>
    </div>
    
      <div id="close-down-key" class="square-button-micro red " style="display: none;">
                          <img src="images/ex.png">
                        </div>
    
    
</div>
<script>
kb=false;
	jQuery214(document).on("click", ".off", function () {

		var $checkbox = $(this).find('input:checkbox');
		var user=jQuery214(this).data('user');
		$('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
$('.backdrop').css('display', 'block');
 $checkbox.prop('checked', !$checkbox.prop('checked'));

        if ($checkbox.prop('checked')) {
			$(this).parent( ".worker-content" ).addClass('w-selected');
		}else{
			$(this).parent( ".worker-content" ).removeClass('w-selected');
		}
		$.ajax({  
                      
          type:"POST",
          url:"<?php echo URL; ?>inicio/assignTasks/",   
          data:{user:user}, 
          success:function(data){

          $('.box').html(data);
          
          $('.box').animate({'opacity':'1.00'}, 300, 'linear');
          $('.box').css('display', 'block');
         

          }

          });
 
  

});
jQuery214(document).on("click", "#save-team", function () {
	if (jQuery214('#odt').val()=='') {
		alert('por favor ingresa una ODT');
		jQuery214('#odt').css('background','#ffff00');
	}else{
		var choosen=jQuery214('.choosen').length;
		if (choosen==0) {
			alert('Selecciona por lo menos un operario');
		}else{
			$('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
$('.backdrop').css('display', 'block');

	 $.ajax({  
                      
          type:"POST",
          url:"<?php echo URL; ?>inicio/initTeam/",   
          data:jQuery214('#team').serialize(), 
          success:function(data){
          	console.log(data);
          // $('.full-box').html(data);
          
           //$('.full-box').animate({'opacity':'1.00'}, 300, 'linear');
           //$('.full-box').css('display', 'block');	
         location.href = '<?php echo URL; ?>ajuste/';

           
          }

          });
		}
		
	}
	
});


jQuery214(document).on("click", "#assign-tasks", function () {

                                
        
         var user=$('#task-user').val();

         
          $.ajax({  
                      
          type:"POST",
          url:"<?php echo URL; ?>inicio/prepareTasks/",   
          data:jQuery214('#task-form').serialize(), 
          dataType:"json",
          success:function(data){
          	console.log(data); 
          	console.log('regreso'+data.response);
          if (data.response=='taken') {
          	alert('a este usuario lo acaban de agarrar en el otro equipo');
          	closeModal();
          	jQuery214('#worker-'+user).remove();

          }else if(data.response=='success'){
          	jQuery214('#worker-'+user).addClass('choosen');
          	jQuery214('#worker-'+user+' .worker-click').removeClass('off').addClass('on');
          	var $checkbox = jQuery214('#worker-'+user).find('input:checkbox');
		$checkbox.prop('checked', !$checkbox.prop('checked'));
          	closeModal();
          }
          //$('#task-'+user).append(task);
          }
          });
         

                                             
    });

 function closeModal(){ 
   $('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box').css('display', 'none');
        });
}

jQuery214(document).on("click", ".close-modal", function () {

closeModal();
});
jQuery214(document).on("click", ".process", function () {
	var $checkbox = $(this).find('input:checkbox');
		$checkbox.prop('checked', !$checkbox.prop('checked'));

        if ($checkbox.prop('checked')) {
			$(this).addClass('p-selected');
		}else{
			$(this).removeClass('p-selected');
		}


});
jQuery214(document).on("click", ".worker-info", function () {


});

jQuery214(document).on("click", ".on", function () {
	var user=jQuery214(this).data('user');
		jQuery214(this).removeClass('on').addClass('off');
		var $checkbox = jQuery214('#worker-'+user).find('input:checkbox');
		$checkbox.prop('checked', !$checkbox.prop('checked'));
		jQuery214('#worker-'+user).removeClass('choosen');

});

function getKeys(id,name) {
      $('#'+id).select();      
      jQuery214('#softk').attr('data-target', 'input[name="'+name+'"]');
        if (kb == false) {
            $("#key-operarios").animate({ bottom: '+=60%' }, 200);
            kb = true;
            
        }
        var bguardar;
        
        $('#softk').empty();     
         $('.softkeys').softkeys({
                    target :  $('#'+id),
                    layout : [
                        [
                            
                            ['1','!'],
                            ['2','@'],
                            ['3','#'],
                            ['4','$'],
                            ['5','%'],
                            ['6','^'],
                            ['7','&amp;'],
                            ['8','*'],
                            ['9','('],
                            ['0',')']
                        ],
                    [
                            'q','w','e','r','t','y','u','i','o','p'
                            
                        ],
                        [
                            
                            'a','s','d','f','g','h','j','k','l','ñ'
                            
                            
                            
                        ],[
                            
                            'z','x','c','v','b','n','m','←']
                            //['__','GUARDAR']
                            ],

                    id:'softkeys'
                });
              
                jQuery214('#hidekey').parent('.softkeys__btn').addClass('hidder'); 
    jQuery214('#savekey').parent('.softkeys__btn').addClass('saver').attr('id', 'saver');;            
jQuery214('#borrar-letras').parent('.softkeys__btn').addClass('large');
            jQuery214('#borrar-softkeys').parent('.softkeys__btn').addClass('large');
            
    }



  function closeKeyboard(){
    if (kb==true) {
      $("#key-operarios").animate({ bottom: '-=60%' }, 200);
     kb=false;
    }
     
  }

  jQuery214(document).on("click", ".close-bottom-key", function () {
    closeKeyboard();
});

</script>
