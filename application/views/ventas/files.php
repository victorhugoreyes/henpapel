
    <div class="separator" id="messages">
   
<?php 
if (isset($_SESSION['messages'])) {
 echo $_SESSION['messages'];
} ?>
</div>

    <div class="container">
        <div class="login-box2">
        <div class="form-inner">
          <form id="datos" action="<?=URL ?>/ventas/uploadFiles/" method="post"  enctype="multipart/form-data">
        
        
        <?php 
 if (isset($_SESSION['log_incorrect'])) { ?>
      <p>Usuario o contraseña incorrectos</p>
    <?php }
       ?>
            
            <h1 style="text-align:center;color:#999999;margin-top:20px;font-weight:normal;font-size:18px;">ARCHIVOS DE DISEÑO</h1>
              <input type="hidden" name="form" value="archivo">
            <input id="odt" name="odt" type="text" placeholder="Numero de Orden" class="login-input" required="" style="" />
            <textarea id="comments" name="comments" placeholder="comentarios.." style="text-align: left; padding: 5px;"></textarea>
            <div class="inputfile">
              
              
            </div>
         <div class="morefiles">+ Agregar un archivo</div>
           <br>  
          <p>Archivos permitidos: jpg, png, jpeg y pdf</p>   
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

<div class="box">
  <div class="saveloader">
    <div class="closer" onclick="close_box();">X</div>
    <img src="../images/recibo.jpg">
    <p style="text-align: center; font-weight: bold;"><a href="#">Click aqui si no tienes recibo</a></p>
  </div>
  <div class="savesucces" style="display: none;">
  
    <img src="images/success.png">
    <p style="text-align: center; font-weight: bold;">Listo!</p>
  </div>
  </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
   

<script>
var i=1;
var list = [];
var total=0;
var j=i;
$(document).ready(function() {
  quitSessionMessages();
});

function quitSessionMessages(){
  setTimeout(function(){ $('.notification').remove(); }, 60000);
  
  
}
  $(document).on('click', '.filebutton', function () {
    $('#the-file').click();
 
});

$(document).on('click', '.morefiles', function () {
  
  var newinput='<div class="filename" style="margin-top:15px;">Ningun archivo seleccionado'+
 '<input style="display: none;" type="file"  name="up-file[]"></div>'+
              '<div class="filebutton">Seleccionar</div>';


var newfile='<input style="display: none;" id="'+j+'" type="file" class="up-file" onchange="getFileName('+j+');checkFileSize('+j+');" >';
            
    $('.inputfile').append(newfile);
    $('#'+j).click();

 j++;
});


function checkFileSize(id){
    var size=$('#'+id)[0].files[0].size;

    
    if (size>2097152) {
      
      alert('Este archivo pesa mas de 2MB, perdon pero no podemos aceptarlo.');
      removeFile(id);
      
    }else{
      total+=size;
      var sum_total=total/1048576;
      
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

$('#odt').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9-]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
        return true;
    }

    e.preventDefault();
    return false;
});
$('#comments').keypress(function (e) {
var regex = new RegExp("^[0-9a-zA-Z \b]+$");
var key = String.fromCharCode(!event.charCode ? event.which: event.charCode);
if (!regex.test(key)) 
{
    event.preventDefault();
    return false;
} 
 });
</script>

<?php
unset($_SESSION['messages']);
unset($_SESSION['notification']);
unset($_SESSION['result']);



?>