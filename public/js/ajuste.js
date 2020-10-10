/******************** index2.php ********************/
var list = [];
var sec  = localStorage.getItem('segundosincio');
var b    = false;


function isMobileDevice() {

    return (typeof window.orientation !== "undefined") || (navigator.userAgent.indexOf('IEMobile') !== -1);
}


function checkTime(i) {

    if (i < 10) {
        i = "0" + i;
    }
    return i;
}


function GetstartTime() {

    var today = new Date();
    var h     = today.getHours();
    var m     = today.getMinutes();
    var s     = today.getSeconds();

    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);

    hour = h + ":" + m + ":" + s;

    return hour;
}


function startTime() {

    var today = new Date();
    var h     = today.getHours();
    var m     = today.getMinutes();
    var s     = today.getSeconds();

    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);

    document.getElementById('inicioAlerta').value = h + ":" + m + ":" + s;
}


function currentSeconds() {

    var today = new Date();
    var h     = today.getHours()*3600;
    var m     = today.getMinutes()*60;
    var s     = today.getSeconds();

    seconds = h + m + s;

    return Math.round(seconds);
}


var r = false;

function startEat(){

    if (r == false) {

        $("#comida2").animate({ right: '+=40%' }, 200);
        $("#comida").animate({ left: '+=60%' }, 200);
        
        r = true;
    } else {
        
        $("#comida2").animate({ right: '-=40%' }, 200);
        $("#comida").animate({ left: '-=60%' }, 200);
        r = false;
    } 
    
    var today = new Date();
    var h = today.getHours();
    var m = today.getMinutes();
    var s = today.getSeconds();
    // add a zero in front of numbers<10
    m = checkTime(m);
    s = checkTime(s);
    console.log('cambiando hora');
    document.getElementById('inicioAlertaEat').value = h + ":" + m + ":" + s;

    
}
  
   

var jQuery214=$.noConflict(true);
desk_alert=false;
var kb=false;
$(document).ready(function(event) {
 $(document).on("click", "#virtualodt", function () {
    getKeys('virtualodt','cosa');
});
 
 $(document).on("click", "#saving", function () {
  var elem=$('#virtualelem').val();
   var vodt=$('#virtualodt').val();
   if (elem!=''&&vodt!='') {
     createVirtualOdt();
    $('#close-down').click();
   }
   else{
    if (vodt=='') {
      $('#podt').show();
    }
    else{
      $('#podt').hide();
    }
    if (elem=='') {
      $('#pelem').show();
    }
    else{
      $('#pelem').hide();
    }
    
   }
   
});

$(document).on("click", ".radio-menu-small", function () {
  var p_elem=$(this).data('element');
  console.log(p_elem);
var name=$(this).data("name");
if (p_elem==17) {
  selectElement();
    var planillas='<br><br><br><br><br><br><p style="font-size:25px;font-weight: bold;">PLANILLAS DE:</p>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="2"><p>2</p></div>'+
   '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="3"><p>3</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="4"><p>4</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="5"><p>5</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="6"><p>6</p></div>'+
  '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="7"><p>7</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="8"><p>8</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="9"><p>9</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="10"><p>10</p></div>'+
 '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="11"><p>11</p></div>'+
    '<div class="real-qty-button" data-id="17" data-name="Boleto" data-plans="12"><p>12</p></div>';
    $('#elems-container').html(planillas);
  $('.face-osc').find('input').prop('checked', false);
                                              $('.face-osc').removeClass('face-osc');
                                              $(this).addClass('face-osc').find('input').prop('checked', true);
   
  }
  else if (p_elem==84) {
    selectElement();
    var planillas='<br><br><br><br><br><br><p style="font-size:25px;font-weight: bold;">PLANILLAS DE:</p>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="1"><p>1</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="2"><p>2</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="3"><p>3</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="4"><p>4</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="5"><p>5</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="6"><p>6</p></div>'+
   '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="7"><p>7</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="8"><p>8</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="9"><p>9</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="10"><p>10</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="11"><p>11</p></div>'+
    '<div class="real-qty-button" data-id="84" data-name="Mapa" data-plans="12"><p>12</p></div>';
    $('#elems-container').html(planillas);
      $('.face-osc').find('input').prop('checked', false);
                                              $('.face-osc').removeClass('face-osc');
                                              $(this).addClass('face-osc').find('input').prop('checked', true);
   
  }else if (p_elem==123||p_elem==124||p_elem==125||p_elem==136||p_elem==25) {
    selectElement();
    var planillas='<br><br><br><br><br><br><p style="font-size:25px;font-weight: bold;">PLANILLAS DE:</p>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="1"><p>1</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="2"><p>2</p></div>'+
   '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="3"><p>3</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="4"><p>4</p></div>'+
   '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="5"><p>5</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="6"><p>6</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="7"><p>7</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="8"><p>8</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="9"><p>9</p></div>'+

    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="10"><p>10</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="11"><p>11</p></div>'+
    '<div class="real-qty-button" data-id="'+p_elem+'" data-name="'+name+'" data-plans="12"><p>12</p></div>';
    $('#elems-container').html(planillas);
      $('.face-osc').find('input').prop('checked', false);
                                              $('.face-osc').removeClass('face-osc');
                                              $(this).addClass('face-osc').find('input').prop('checked', true);
   
  }else{
    $('.face-osc').find('input').prop('checked', false);
                                              $('.face-osc').removeClass('face-osc');
                                              $(this).addClass('face-osc').find('input').prop('checked', true);

                                              sendOrder();
                                              $('#close-down').click(); 
  }



   
});

   // Esta primera parte crea un loader no es necesaria
    $().ajaxStart(function() {
        $('#loading').show();
        $('#resultaado').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#resultaado').fadeIn('slow');
    });
   // Interceptamos el evento submit
    
    $('#form, #fat').submit(function() {
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                //$('#currentOrder').html('ORDEN ACTUAL: '+data);
               
               
                $('.saveloader').hide();
                $('.savesucces').show();
                 setTimeout(function() {   
                   close_box();
                }, 1000);
                
            }
        })        
        return false;
    }); 
/*
    $( "#stop" ).click(function(e) {
      var orderexist=$('#orderID').val();
      if (orderexist!=='') {
        $( "#nuevo_registro" ).submit();
        e.preventDefault();

      } else{
        alert('Debes seleccionar una orden');
      }
                                        

                                            }); */
                                            saveOperstatus();
});




                                             $( "#save-ajuste").click(function() {
                                              
                                                var leng=$("input:radio[name='radios']").is(":checked");
                                               
                                              var expl=$('#observaciones').val();
                                            
                                              
                                               var tiro=$('#actual_tiro').val();
                                               if (leng==false&&expl=='') {
                                                $('#explain-error').show();
                                                console.log('explicacion: '+expl);
                                               }else{
                                               
                                                if (isMobileDevice()==false&&kb==true&&desk_alert==true) {
                                                 $('#panelder').animate({ top: '0' }, 200);
                                                 console.log('se bajo');
                                                 $("#panelkeyboard2").animate({ bottom: '-=60%' }, 200);     
                                                kb=false;
                                                desk_alert=false;
                                              }

                                                console.log(list[0]);
                                                list= [];
                                                showLoad();
                                                 derecha();
                                                 $('#explain-error').hide();
                                                 $.ajax({
                                                  type: 'POST',
                                                  url: 'init_tiro.php',
                                                  data: {tiraje:tiro,init:'reinit'},
                                                  // Mostramos un mensaje con la respuesta de PHP
                                                  success: function(data) {
                                                    console.log(data);
                                                      $('#horadeldia').val(data.hora);
                                                     $( "#fo4" ).submit();
                                                  }
                                              })
                                               
                                                
                                               }
                                             
                                                      
                                                     
                                             
                                            });

                                             $('.radio-menu').click(function() {
                                              $('.face-osc').removeClass('face-osc');
                                              $(this).addClass('face-osc').find('input').prop('checked', true)    
                                            });

                                            

                                              $( document ).ajaxStop(function() {

                                             

                                               

                                              });

                                             
                                             
                                            

                                            $( document ).ajaxStop(function() {

                                              

                                                 

                                              });
                                          

 $('.backdrop').click(function(){
          close_box();
        });

  function submitEat(suceso){
    
    var actiro=$('#actual_tiro').val();
    $('#act_tiro').val(actiro);
    $('#s-radios').val(suceso);
    if ($('#ontime').val()=='true') {
      timer.start();
    }else{
      deadTimer.start();
    }
    $( "#fo3" ).submit();
  }
  function close_box()
      {
        $('.backdrop, .box, .boxorder').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.backdrop, .box, .boxorder').css('display', 'none');
        });
      }
  function showLoad(){
        $('.backdrop, .box').animate({'opacity':'.50'}, 300, 'linear');
          $('.box').animate({'opacity':'1.00'}, 300, 'linear');
          $('.backdrop, .box').css('display', 'block');
      }
      function selectElement(){
        
          $('.setElement').animate({'opacity':'1.00'}, 300, 'linear');
          $('.setElement').css('display', 'block');
      }
      function close_Elements()
      {
        $('.setElement').animate({'opacity':'0'}, 300, 'linear', function(){
          $('.setElement').css('display', 'none');
        });
        
        getKeys('virtualelem','cosa');

      }
      function sendOrder(){
        
       $.ajax({
            type: 'POST',
            url: 'opp.php',
            data: $('#tareas').serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {

                $('#tareas').html(data);
               var curorder= $('#returning').val();
               var curid= $('#returning2').val();
               var orid= $('#returning3').val();
               $('#orderID').val(orid);
              $('#order').val(orid);
               
              $('#is_virtual').val(orid);
               
               $('#currentOrder').html('EN PROCESO: '+curorder+" "+curid);
                $('.saveloader').hide();
                $('.savesucces').show();
                 setTimeout(function() {   
                   close_box();
                }, 500); 
            }
        })
       
      }

      var timer = new Timer();
 var timerEat = new Timer();
 var timerAlert = new Timer();
 var deadTimer= new Timer();
   
$(document).ready(function(){
  var inicio=$('#timer').data('inicio');
 var estandar=$('#timer').data('estandar');


      if (localStorage.getItem('alertTime')) {
         console.log('existia una alerta: '+localStorage.getItem('alertTime'));
         $('#fo4').append('<input type="hidden" name="actual_tiro" id="actual_tiro_alert" value="'+localStorage.getItem('tiroactual')+'">');
        $("#panelder2").animate({ left: '+=26%' }, 200);
        $("#panelder").animate({ right: '+=75%' }, 200);
        b = true;
        alertsecs=currentSeconds()-localStorage.getItem('alertTime');
           timerAlert.start({startValues: {seconds: alertsecs}});
           timerAlert.addEventListener('secondsUpdated', function (e) {
        $('#alertajuste .valuesAlert').html(timerAlert.getTimeValues().toString());
        });
        timerAlert.addEventListener('started', function (e) {
        $('#alertajuste .valuesAlert').html(timerAlert.getTimeValues().toString());
        });
        $('#inicioAlerta').val(localStorage.getItem('inicioAlert'));
        console.log('horaalerta: '+alertsecs);
        console.log('alertie: '+localStorage.getItem('inicioAlert'));


      }else{
      
      if (parseInt(inicio)>parseInt(estandar)) {
        
        //timer.stop();
        var deathTime=parseInt(inicio)-parseInt(estandar)
        deadTimer.start({startValues: {seconds: deathTime}});
        alerttime();
        $('#ontime').val('false');
        $.ajax({      
                  type:"POST",
                  url:"operstatus.php",   
                  data:{section:'outtime'}, 
                  success:function(data){
                  console.log(data);
                  }  
                });
      }else{
        starting=estandar-inicio;
        timer.start({countdown: true, startValues: {seconds: starting}});
      }
    }



$('#chronoExample2').hide();
});
       

$('#nuevo_registro').submit(function () {
    if (ontime=='true') {
        timer.pause();
    $('#timee').val(timer.getTimeValues().toString());
  }else{
    deadTimer.pause();
    $('#timee').val(deadTimer.getTimeValues().toString());
  }
    //$('#timee').val(timer.getTimeValues().toString());
});
/*$('#chronoExample .stopButton').click(function () {
    timer.stop();

});*/
timer.addEventListener('secondsUpdated', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString());
});
timer.addEventListener('started', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString());
});
timer.addEventListener('reset', function (e) {
    $('#chronoExample .values').html(timer.getTimeValues().toString());
});
     
  deadTimer.addEventListener('secondsUpdated', function (e) {
    $('#chronoExample .values').html(deadTimer.getTimeValues().toString());
});
  deadTimer.addEventListener('started', function (e) {
      $('#chronoExample .values').html(deadTimer.getTimeValues().toString());
  });    

   $('.goeat').click(function () {
    if ($('#ontime').val()=='true') {
      timer.pause();
    }else{
      deadTimer.pause();
    }
    
    timerEat.start();
    //$('#timee').val(timerEat.getTimeValues().toString());
    timerEat.addEventListener('secondsUpdated', function (e) {
    $('#horacomida .valuesEat').html(timerEat.getTimeValues().toString());
    });
    timerEat.addEventListener('started', function (e) {
    $('#horacomida .valuesEat').html(timerEat.getTimeValues().toString());
});
});  

   $('#fo3').submit(function () {
     timerEat.pause();
    $('#timeeat').val(timerEat.getTimeValues().toString());
    timerEat.stop();
   });

   $('.stopeat').click(function () {
    if ($('#ontime').val()=='true') {
      timer.start();
    }else{
      deadTimer.start();
    }
    timerEat.stop();
   });
    $('#chronoExample2 .startButton').click(function () {
    deadTimer.start();
    console.log('le picaron');
});

   $('.goalert').click(function () {
   startTime(); 
    if ($('#ontime').val()=='true') {
      timer.pause();
    }else{
      deadTimer.pause();
    }
    timerAlert.start();
    //$('#timee').val(timerAlert.getTimeValues().toString());
    timerAlert.addEventListener('secondsUpdated', function (e) {
    $('#alertajuste .valuesAlert').html(timerAlert.getTimeValues().toString());
    });
    timerAlert.addEventListener('started', function (e) {
    $('#alertajuste .valuesAlert').html(timerAlert.getTimeValues().toString());
});
});  

   $('#fo4').submit(function () {

     timerAlert.pause();
    $('#tiempoalertamaquina').val(timerAlert.getTimeValues().toString());
    timerAlert.stop();
    if ($('#ontime').val()=='true') {
      if (localStorage.getItem('alertTime')) {
    var lastsecs=currentSeconds()-sec;
    var t_alert=currentSeconds()-localStorage.getItem('alertTime');
    var continueTimer=1200-(lastsecs-t_alert);
    console.log('estorage: '+localStorage.getItem('alertTime'));
    console.log('lastsecs: '+lastsecs);
    console.log('t_alert: '+t_alert);
    console.log('Tiempo-alerta: '+(lastsecs-t_alert));
    console.log('negat-posit: '+continueTimer);
     timer.start({countdown: true, startValues: {seconds: continueTimer}});
     /*
    if (continueTimer>0) {
      timer.start({countdown: true, startValues: {seconds: continueTimer}});
    }else{
      console.log('a positivo: '+Math.abs(continueTimer));
      deadTimer.start({startValues: {seconds: Math.abs(continueTimer)}});
    } */
    
    localStorage.removeItem('alertTime');
  }else{
    timer.start();
  }

    }else{
      if (localStorage.getItem('alertTime')) {
    var lastsecs=currentSeconds()-sec;
    var t_alert=currentSeconds()-localStorage.getItem('alertTime');
    var continueTimer=lastsecs-t_alert;
    console.log('Tiempo-alerta: '+continueTimer);

    deadTimer.start({startValues: {seconds: continueTimer}});
    localStorage.removeItem('alertTime');
  }else{
    deadTimer.start();
  }


      
    }
   });

   $('.stopalert').click(function () {
    
    if ($('#ontime').val()=='true') {
      timer.start();
    }else{
      deadTimer.start();
    }
    timerAlert.stop();
   });
timer.addEventListener('targetAchieved', function (e) {
    timer.stop();
    deadTimer.start();
    alerttime();
    $('#ontime').val('false');
   $.ajax({      
                     type:"POST",
                     url:"operstatus.php",   
                     data:{section:'outtime'},  
                       
                     success:function(data){ 

                          console.log(data);
                     }  
                });
    
    
    
});  
function alerttime(){
  
  animacion = function(){
  
  document.getElementById('formulario').classList.toggle('fade');
}
setInterval(animacion, 550);

} 
   $(document).ready(function() {

    $("#close-down").click(function () {
      if (kb==true) {
        $("#panelkeyboard2").animate({ bottom: '-=60%' }, 200);     
  kb=false;
  
      }
 if (isMobileDevice()==false&&desk_alert==true) {
    $('#panelder').animate({ top: '0' }, 200);
    console.log('se bajo');
    desk_alert=false;
  }  

    });
    
   // Esta primera parte crea un loader no es necesaria
    $().ajaxStart(function() {
        $('#loading').show();
        $('#result').hide();
    }).ajaxStop(function() {
        $('#loading').hide();
        $('#result').fadeIn('slow');
    });
   // Interceptamos el evento submit
    $('#form, #fat, #fo3, #fo4').submit(function() {
      
  // Enviamos el formulario usando AJAX
        $.ajax({
            type: 'POST',
            url: $(this).attr('action'),
            data: $(this).serialize(),
            // Mostramos un mensaje con la respuesta de PHP
            success: function(data) {
                $('#result').html(data);
                $('.saveloader').hide();
                $('.savesucces').show();
                 setTimeout(function() {   
                   close_box();
                }, 1000);
                 $('#fo4')[0].reset();
                        $('.face-osc').removeClass('face-osc');
                        $('#actual_tiro_alert').remove(); 
                console.log(data);

            }
        })        
        
    }); 
})

   function limpiar() {
           setTimeout('document.fo3.reset()',2);
      return false;
}
 

 function saveAjusteSerigrafia(){
   localStorage.removeItem('horaincio');
  localStorage.removeItem('tiroactual');
  localStorage.removeItem('segundosincio');
  
  var mac=$('#mac').val();
  var ontime=$('#ontime').val();
  console.log(ontime);
    var order=$('#order').val();
    if($('#orderID').val()==''){
      $('#parts').click();
      $('#elementerror').show();
      setTimeout(function() {   
                   $('#elementerror').hide();
                }, 3000);
    }else{
      if (ontime=='true') {
        timer.pause();
    $('#timee').val(timer.getTimeValues().toString());
  }else{
    deadTimer.pause();
    $('#timee').val(deadTimer.getTimeValues().toString());
  }var elem=$('#returning2').val();

     $.ajax({  
                      
                     type:"POST",
                     url:"saving/ajuste",   
                     data:$('#nuevo_registro').serialize(),  
                       
                     success:function(data){ 
                       
                          //$('#update-form')[0].reset();  
                          //$('.close').click();
                          /*
                          var mesa='<br><br><br><br><br><br><p style="font-size:25px;font-weight: bold;">REALIZAR TIRO EN:</p>'+
                          '<div class="maquinamesa" data-maq="1"><img src="images/maquina.png"><p>MAQUINA</p></div>'+
                          '<div class="maquinamesa" data-maq="2"><img src="images/mesa.png"><p>MESA</p></div>';

                          $('#elems-container').html(mesa);
                         
                          selectElement(); 
                          $(document).on("click", ".maquinamesa", function () {
                             var maquinamesa=$(this).data('maq');
                            
                               window.location.replace("index3.php?mac="+mac+"&order="+order+"&mm="+maquinamesa);
                            
});*/
                          
                         window.location.replace("tiro/");
                          console.log(data);
                     }  
                }); 
    }

     
 }
 
function saveAjuste(){
  localStorage.removeItem('horaincio');
  localStorage.removeItem('tiroactual');
  localStorage.removeItem('segundosincio');
  var mac=$('#mac').val();
  var ontime=$('#ontime').val();
  console.log(ontime);
    var order=$('#order').val();
    if($('#orderID').val()==''){
      $('#parts').click();
      $('#elementerror').show();
      setTimeout(function() {   
                   $('#elementerror').hide();
                }, 3000);
    }else{
      if (ontime=='true') {
        timer.pause();
    $('#timee').val(timer.getTimeValues().toString());
  }else{
    deadTimer.pause();
    $('#timee').val(deadTimer.getTimeValues().toString());
  }var elem=$('#returning2').val();
       
     $.ajax({  
                      
                     type:"POST",
                     url:"saves.php",   
                     data:$('#nuevo_registro').serialize(),  
                       
                     success:function(data){ 
                       
                          //$('#update-form')[0].reset();  
                          //$('.close').click(); 
                          
                               window.location.replace("index3.php?mac="+mac+"&order="+order);
                            
                         
                          console.log(data);
                     }  
                }); 
    }

     
 }


 function gatODT(){
    var odt=$('#getodt').val();
     $.ajax({  
                      
                     type:"POST",
                     url:"getODTS.php",   
                     data:{numodt:odt},  
                       
                     success:function(data){ 
                          
                          $('#odtresult').html(data);
                          
                     }  
                });
  }
function sendODT(odt,machine){
  $('#getodt').val(odt);
   $("#panelkeyboard2").animate({ bottom: '-=60%' }, 200);     
  kb=false;
    $.ajax({  
                      
                     type:"POST",
                     url:"opp.php",   
                     data:{entorno:'general',odt:odt,machine:machine},  
                       
                     success:function(data){ 
                       $('#odtresult').html(data);   
                         
                     }  
                });
    
  }  

function getKeys(id,name) {
      $('#'+id).select();
      
      jQuery214('#softk').attr('data-target', 'input[name="'+name+'"]');
        if (kb == false) {
            $("#panelkeyboard2").animate({ bottom: '+=60%' }, 200);
            kb = true;
            if (isMobileDevice()==false&&desk_alert==false) {
               $('#panelder').animate({ top: '-=200px' }, 200);
               console.log('se subio');
               desk_alert=true;
                           }
        }
        var bguardar;
        
        $('#softk').empty();     
         jQuery214('.softkeys').softkeys({
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
                            
                            'z','x','c','v','b','n','m','←'],
                            ['__','GUARDAR']
                            ],

                    id:'softkeys'
                });
              
                jQuery214('#hidekey').parent('.softkeys__btn').addClass('hidder'); 
    jQuery214('#savekey').parent('.softkeys__btn').addClass('saver').attr('id', 'saver');;            
jQuery214('#borrar-letras').parent('.softkeys__btn').addClass('large');
            jQuery214('#borrar-softkeys').parent('.softkeys__btn').addClass('large');
            if (id=='virtualodt'||id=='virtualelem') { jQuery214('.savebutton').show();}else{$('.savebutton').hide();}
    }

function createVirtualOdt(){

  if ($('#virtualodt').val()=='') {
    $('#podt').show();
  }
  else if ($('#virtualelem').val()=='') {
    $('#pelem').show();
  }
  else{
     $("#panelkeyboard2").animate({ bottom: '-=60%' }, 200);     
  
    if (isMobileDevice()==false&&kb==true&&desk_alert==true) {
                                                 $('#panelder').animate({ top: '0' }, 200);
                                                 console.log('se bajo');
 desk_alert=false;
 }
 kb=false;
    $.ajax({  
                      
                     type:"POST",
                     url:"opp.php",   
                     data:$('#virtualform').serialize(),  
                       
                     success:function(data){ 
                       $('#odtresult').html(data);
                        var curorder= $('#returning').val();
               var curid= $('#returning2').val();
               var orid= $('#returning3').val();
               var elemid=$('#returning4').val();
               $('#orderID').val(orid);
              $('#order').val(orid);
              $('#is_virtual').val(orid);
              $('#elemvirtual').val(curid);
              $('#idelemvirtual').val(elemid);
              $('#odtvirtual').val(curorder);
               $('#orderODT').val(curorder);

               $('#currentOrder').html('EN PROCESO: '+curorder+" "+curid);  
                     }  
                });
  }
}

 function saveOperstatus(){
  /*
        
      var horadeldia=$('#horadeldia').val();
         $.ajax({  
                      
                     type:"POST",
                     url:"operstatus.php",   
                     data:{section:'ajuste',hour:horadeldia},  
                       
                     success:function(data){ 
                          console.log(data);
                     }  
                }); */
    } 

     function saveoperAlert(){
      /*
      var ini_alert=GetstartTime();
        localStorage.setItem('alertTime', currentSeconds());
        localStorage.setItem('inicioAlert', GetstartTime());
        console.log('alerta iniciada: '+GetstartTime());
      $('#fo4').append('<input type="hidden" name="actual_tiro" id="actual_tiro_alert" value="'+localStorage.getItem('tiroactual')+'">');
         $.ajax({  
                      
                     type:"POST",
                     url:"operstatus.php",   
                     data:{section:'alerta',hour:ini_alert},  
                       
                     success:function(data){ 
                          console.log(data);
                     }  
                });*/
    }
     function saveoperComida(){
        startEat();
    /*
         $.ajax({  
                      
                     type:"POST",
                     url:"operstatus.php",   
                     data:{section:'comida'},  
                       
                     success:function(data){ 
                          console.log(data);
                     }  
                });
         */
    }

   
    function derecha(){
     
      if (b == false) {

            $("#alerta2").animate({ left: '0%' }, 200);
            $("#alerta").animate({ right: '0%' }, 200);
            b = true;
        }
        else {
            $("#alerta2").animate({ left: '0%' }, 200);
            $("#alerta").animate({ right: '0%' }, 200);
            b = false;
        }  
    }

    var p = false;
    $(document).on("click", ".abajo", function () {
    
      console.log('hola perro');
        if (p == false) {

            $("#buscador2").animate({ top: '+=3%' }, 200);
            $("#buscador").animate({ bottom: '+=97%' }, 200);
            p = true;
        }
        else {
            $("#buscador2").animate({ top: '-=3%' }, 200);
            $("#buscador").animate({ bottom: '-=97%' }, 200);
            p = false;
        }



    });


 /*   
$("#observaciones").on('change keyup paste', function() {
    list.push("explain");
    console.log('pushed: '+list)
});
$("#observaciones").keyup(function() {
    list.push("explain");
    console.log('repushed: '+list)
});
$(document).on("click", ".no-explain", function () {
  list=[];
    list.push("no-explain");
    console.log('pushed: '+list);
});
*/