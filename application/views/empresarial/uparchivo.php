<div class="separator" id="messages">
   
<?php if (isset($_SESSION['notification'])) {
 echo $_SESSION['messages'];
} ?>
</div>

    <div class="container">
        <div class="login-box2">
        <div class="form-inner">
          <form id="datos" action="<?=URL ?>/empresarial/uploadFiles/" method="post"  enctype="multipart/form-data">
        <?php 
 if (isset($_SESSION['log_incorrect'])) { ?>
      <p>Usuario o contraseña incorrectos</p>
    <?php }
       ?>
            
            <h1 style="text-align:center;color:#999999;margin-top:20px;font-weight:normal;font-size:18px;">ARCHIVOS DE LOURDES</h1>
              <input type="hidden" name="form" value="archivo">
            <input name="odt" type="text" placeholder="Numero de Orden" class="login-input" required="" style="" />
            <select class="login-input" name="catego">
              <option disabled selected>Categoria</option>
              <option value="Calculo">Calculo</option>
              <option value="Cotizacion">Cotizacion</option>
              <option value="ODC">ODC</option>
              <option value="ODT">ODT</option>
              <option value="Otro">Otro</option>
            </select>
            <div class="inputfile">
              
              
            </div>
         <div class="morefiles">+ Agregar un archivo</div>
           <br>  
          <p>Tamaño maximo permitido: 2MB</p>   
              <br>
             
            
                
            <input type="submit" id="singlebutton" value="ENVIAR" name="singlebutton" class="login-button" style="margin-bottom: 40px;">
            </form>
        </div>
            
        </div>

    </div> 
   <div class="backdrop"></div>

<div class="loader">
  <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   

<script>
var i=1;
var list = [];
var total=0;
  $(document).on('click', '.filebutton', function () {
    $('#the-file').click();
 
});
$(document).on('click', '.morefiles', function () {
  
  var newinput='<div class="filename" style="margin-top:15px;">Ningun archivo seleccionado'+
 '<input style="display: none;" type="file"  name="up-file[]"></div>'+
              '<div class="filebutton">Seleccionar</div>';


var newfile='<input style="display: none;" id="'+i+'" type="file" class="up-file" onchange="getFileName('+i+');checkFileSize('+i+');" >';
            
    $('.inputfile').append(newfile);
    $('#'+i).click(); 
 i++;
});

function checkFileSize(id){
    var size=$('#'+id)[0].files[0].size;

    
    if (size>2097152) {
      
      alert('Este archivo pesa mas de 2MB, perdon pero no podemos aceptarlo.');
      removeFile(id);
      
    }else{
      total+=size;
      var sum_total=total/1048576;
      $('.morefiles').hide();
      console.log('total: '+sum_total.toFixed(2)+'MB');
    }
    
      
}

$(document).on('change', '.up-file', function () {
 $(this).attr('name', 'up-file[]');
 


});

$(document).on('submit', '#datos', function () {
  $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
    $('.backdrop').css('display', 'block');
    $('.loader').show();

});




function closeModal(){

   $('.backdrop, .box, .loader').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box, .loader').css('display', 'none');
        });  
    
}

$(document).ready(function() {
  quitSessionMessages();
});

function quitSessionMessages(){
  setTimeout(function(){ $('.notification').remove(); }, 5000);
  
  
}

function getFileName(id){
  if (i>0) {$('.morefiles').html('+ Agregar otro archivo')}
   var name = document.getElementById(id); 
    //list.push(name.files.item(0).name);  
   var find = function(input, target){
    console.log(target);
    var found;
    for (var prop in input) {
    if(input[prop] == target){
        found = prop;
    }
    };

    return found;
};

var found = find(list, name.files.item(0).name);
console.log(found);
  if (found){

    console.log(list);
    alert('Este archivo ya esta agregado en la lista, por favor elige otro');
  }else{
list['item-'+id] = name.files.item(0).name;
var indicator='<div class="filediv" id="ind-'+id+'">&nbsp&nbsp '+name.files.item(0).name+ 
            '<div class="removefile" onclick="removeFile('+id+')"></div></div>';
            
            $('.inputfile').append(indicator);
            console.log(list);
  }
 
 
}
function removeFile(id){
    var size=Object.keys(list).length;
    console.log('el size: '+size);
    $('.morefiles').show();

    if (size==1) {$('.morefiles').html('+ Agregar un archivo')}
  var input = document.getElementById(id);
  var indicator = document.getElementById('ind-'+id);
  input.remove();
  indicator.remove();
  console.log(id);
  
  var key= 'item-'+id;
  delete list[key]; 
  //list.splice(key,1);
console.log(list);

}
 
</script>

<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);

?>