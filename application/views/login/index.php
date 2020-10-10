<style>
    body {
        background-image: url(<?=URL ?>public/img/paper8.jpg);
        width: 100%;
        height: 100%;
        background-repeat: repeat-y repeat-x;
        top: 0%;
        left: 0px;
        position: absolute;
    }
</style>

 
    <div class="container">

        <div class="login-box">

            <div class="login-inner">

                <form id="logg" action="<?=URL ?>login/signIn" method="post">
                
                    <div class="login-logo">
                    
                        <img src="<?=URL ?>public/img/logo-hp-con-mini1.png" >
                    </div>
        
                    <?php 
        
                    if (isset($_SESSION['session_messages'])) {
                        
                        echo $_SESSION['session_messages'];
                        session_destroy();
                    } ?>

                    <input id="usuario" name="usuario" type="text" placeholder="USUARIO" class="login-input" required="" autofocus="" />
                    
                    <input id="password" name="pass" type="password" placeholder="CONTRASEÑA" class="login-input" required="" />
                    
                    <input type="submit" id="singlebutton" value="ENTRAR" name="singlebutton" class="login-button">
                </form>
            </div>
        </div>

    </div> 

    <div id="panelkeyboard2" class="keyboard">
    
        <div class="keycontainer">
        
            <div id="softk" class="softkeys" data-target="input[name='getodt']"></div>
        </div>
    
        <div id="close-down-key" class="square-button-micro red " style="display: none;">
            
            <img src="images/ex.png">
        </div>
    </div>
 
