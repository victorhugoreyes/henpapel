

<div class="right-col">
    
<div class="calculator-container">

    <div class="calculator-content">

        <div class="instructions">

            <!-- Caja almeja3 value = "1" -->
            <div class="caja-section" id="almeja3">views/cajasedit/index.php
            <br />
            ODT: <?php $_SESSION['calculo']['odt']; ?>

            </div>

            <div class="caja-section" id="almeja3">
            
                <div class="viewer-section">
            
                    <img src="<?=URL ?>public/img/cierre.png">
                </div>
            </div>      <!-- termina caja almeja3 -->

        </div>
    </div>
</div>

<div class="backdrop"></div>

<script>

    jQuery214(document).on("click", ".link", function () {

        var model = jQuery214(this).data('model');

        $('.active').removeClass('active');
        $(this).addClass('active');
        $('.instructions').hide();
        $('.caja-section').hide();
        $('#' + model).show();
    });


    function closeModal(){

       $('.backdrop, .box, .loader').animate({'opacity':'0'}, 300, 'linear', function() {

            $('.backdrop, .box, .loader').css('display', 'none');
        });  
    }
  
</script>

<script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-36251023-1']);
    _gaq.push(['_setDomainName', 'jqueryscript.net']);
    _gaq.push(['_trackPageview']);

    (function() {
        
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

</script>
