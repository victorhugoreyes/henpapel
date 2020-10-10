<?php
$workers=$login_model->getAllowedMembers();
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
<ul class="topbar">
  <li><a class="active" href="#home">Porfavor selecciona los miembros que trabajaran en este equipo:</a></li>
  
  <li style="float:right"><div id="save-team">GUARDAR</<div> </li>
</ul>

<div class="workers-container">
<form id="team">
<input type="hidden" name="sesion" value="<?=$_SESSION['sessionID'] ?>">

<?php foreach ($workers as $worker) { ?>

<div class="worker" <?=($worker['is_team']=='true')? 'style="display:none;"': '' ?>>
<div class="worker-content" >
<div class="worker-click" data-user="<?=$worker['id'] ?>">
<input type="checkbox" name="leader[<?=$worker['id'] ?>]" value="<?=($worker['id']==$_SESSION['idUser'])? 'true': 'false' ?>" <?=($worker['id']==$_SESSION['idUser'])? 'checked': '' ?>>
<input type="checkbox" name="workers[]" value="<?=$worker['id'] ?>" <?=($worker['id']==$_SESSION['idUser'])? 'checked': '' ?>>
<div class="worker-photo">
	<img src="<?= URL; ?>public/<?=((!empty($worker['foto']))? $worker['foto'] :'images/default.jpg')?>">
</div>
<p class="worker-name"><?= $worker['logged_in']; ?></p>
<p class="worker-lastname"><?= $worker['apellido']; ?></p>	
</div>
<div id="task-<?=$worker['id'] ?>" class="tasks-container"></div>
</div>
	
</div>
	
<?php } ?>
</form>	
</div>
<div class="box">
  
</div>
<div class="backdrop"></div>
<script>
	jQuery214(document).on("click", ".worker-click", function () {

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

	 $.ajax({  
                      
          type:"POST",
          url:"<?php echo URL; ?>inicio/initTeam/",   
          data:jQuery214('#team').serialize(), 
          success:function(data){
          location.href = '<?php echo URL; ?>ajuste/';

           
          }

          });
});


jQuery214(document).on("click", ".normal", function () {

         console.log('task');                         
        var option=$(this).data('option');     
         var station=$(this).data('station'); 
         var station_name=$(this).data('sname'); 
         var pro_name=$(this).data('pname');
         var user=$(this).data('user');
         var task='<div class="task"><input type="hidden" name="tasks['+user+']" value="'+option+'">'+pro_name+' </div>';
         $('#task-'+user).append(task);
         closeModal();

                                             
    });

 function closeModal(){
 
   $('.backdrop, .box').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box').css('display', 'none');
        });
}

jQuery214(document).on("click", ".close-modal", function () {

closeModal();
});
</script>
