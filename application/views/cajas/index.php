
<style>

    .flash {
        font-size: 1em;
        animation-name: flash;
        animation-duration: 1.2s;
        animation-timing-function: linear;
        animation-iteration-count: infinite;
        animation-direction: alternate;
        animation-play-state: running;
    }

    .flash span {
        font-size: 1.2em;
    }

    @keyframes flash {
        from {color: red;}
        to {color: black}
    }

</style>

<div class="left-col">

    <h1>Calculadora de Cajas</h1>

    <ul id="accordion" class="accordion">

        <li>

            <div class="link" data-model="almeja">Almeja</div>
        </li>
        <li>

            <div class="link" data-model="redonda">Circular</div>
        </li>
        <li>

           <div class="link" data-model="libro">Libro</div>
        </li>
        <li>

           <div class="link" data-model="regalo">Regalo</div>
        </li>
        <li>

           <div class="link" data-model="marco">Marco Interno</div>
        </li>
        <li>

           <div class="link" data-model="cerillera">Cerillera</div>
        </li>
        <li>

           <div class="link" data-model="vino">Vino</div>
        </li>
        <li>

           <div class="link" data-model="tubo">Tubo</div>
        </li>
        <li>
           <div class="link" data-model="especial">Especial</div>
        </li>
    </ul>
</div><div class="right-col">

    <div class="calculator-container">

        <div class="calculator-content">

            <div class="instructions">

                <span class="flash"><span>←Elije un modelo de caja para empezar</span></span>
            </div>

            <!-- Caja almeja3 value = "1" -->
            <div class="caja-section" id="almeja">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="almeja" data-odt="odt-1" action="<?=URL; ?>calculadora/almeja3/">

                                <input type="hidden" name="modelo" id="modelo" value="1">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" type="text" name="odt" id="odt-1" placeholder="A1234" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Profundidad: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cajon" id="grosor-cajon" tabindex="5" required="">

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Cartera: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cartera" id="grosor-cartera" tabindex="6" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/almeja/cierre.png">
                </div>
            </div>      <!-- termina caja almeja3 -->

            <!-- Caja circular value = "2" -->
            <div class="caja-section" id="redonda">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="circular" data-odt="odt-2" action="<?=URL; ?>calculadora/circular/">

                                <input type="hidden" name="modelo" id="modelo" value="2">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="odt" id="odt-2" type="text" placeholder="Teclee ODT" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">
                                    <div class="cajas-col-input left">

                                        <span>Diámetro: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="diametro" id ="diametro" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Profundidad: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Altura tapa: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="altura-tapa" id="altura-tapa" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Cartón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-carton" id="grosor-carton" tabindex="5" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/circular/circular.png">
                </div>
            </div>      <!-- Termina caja circular -->

            <!-- Caja libro value = "3" -->
            <div class="caja-section" id="libro">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="libro" data-odt="odt-3" action="<?=URL; ?>calculadora/libro/">

                                <input type="hidden" name="modelo" id="modelo" value="3">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="odt" id="odt-3" type="text" placeholder="Teclee ODT" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">
                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">
                                        <span>Profundidad: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad" id="profundidad" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor de cartón del cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-carton" id="grosor-carton" tabindex="5" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor de cartón de cartera: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cartera" id="grosor-cartera" tabindex="6" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/libro/libro.jpeg">
                </div>
            </div>      <!-- Termina caja libro -->

            <!-- Caja regalo value = "4" -->
            <div class="caja-section" id="regalo">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="regalo" data-odt="odt-4" action="<?=URL; ?>calculadora/regalo/">

                                <input type="hidden" name="modelo" id="modelo" value="4">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input type="text" required="" class="cajas-input" name="odt" id="odt-4" placeholder="Teclee ODT" tabindex="1"  autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Profundidad del Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-cajon" id="profundidad-cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group">

                                    <div class="cajas-col-input left">

                                        <span>Profundidad de Tapa: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-tapa" id="profundidad-tapa" type="number" step="any" min="0.1" placeholder="cm" tabindex="5" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cajon" id="grosor-cajon" tabindex="6" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Tapa: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-tapa" id="grosor-tapa" tabindex="7" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/regalo/regalo.png">
                </div>
            </div>      <!-- Termina caja regalo -->

            <!-- Caja Marco value = "5" -->
            <div class="caja-section" id="marco">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="marco" data-odt="odt-5" action="<?=URL; ?>calculadora/marco/">

                                <input type="hidden" name="modelo" id="modelo" value="5">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="odt" id="odt-5" type="text" placeholder="Teclee ODT" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">
                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">
                                        <span>Profundidad: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-cajon" id="profundidad-cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor de Cartón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-carton" id="grosor-carton" tabindex="5" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/marco/marcointerno.jpeg">
                </div>
            </div>      <!-- Termina caja marco -->

            <!-- Caja Cerillera value = "6"-->
            <div class="caja-section" id="cerillera">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="cerillera" data-odt="odt-6" action="<?=URL; ?>calculadora/cerillera/">

                                <input type="hidden" name="modelo" id="modelo" value="6">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="odt" id="odt-6" type="text" placeholder="Teclee ODT" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">
                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">
                                        <span>Profundidad Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-cajon" id="profundidad-cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">
                                        <span>Profundidad Tapa </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-tapa" id="profundidad-tapa" type="number" step="any" min="0.1" placeholder="cm" tabindex="5" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor del Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cajon" id="grosor-cajon" tabindex="6" required>

                                            <option value="" selected="">Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor Tapa: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-tapa" id="grosor-tapa" tabindex="7" required>

                                            <option value="" selected="">Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/cerillera/cerillera.jpeg">
                </div>
            </div>      <!-- Termina caja Cerillera -->

            <!-- Caja Vino value = "7" -->
            <div class="caja-section" id="vino">

                <div class="inputs-section">

                    <div class="calc-form">

                        <div class="form-content">

                            <form class="model-form" name="form2" id="form2" method="POST" data-model="vino" data-odt="odt-7" action="<?=URL; ?>calculadora/vino/">

                                <input type="hidden" name="modelo" id="modelo" value="7">

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>ODT: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="odt" id="odt-7" type="text" placeholder="Teclee ODT" tabindex="1" autofocus required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">
                                    <div class="cajas-col-input left">

                                        <span>Base: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="base" id="base" type="number" step="any" min="0.1" placeholder="cm" tabindex="2" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group ">

                                    <div class="cajas-col-input left">

                                        <span>Alto: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="alto" id="alto" type="number" step="any" min="0.1" placeholder="cm" tabindex="3" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">
                                        <span>Profundidad Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <input class="cajas-input" name="profundidad-cajon" id="profundidad-cajon" type="number" step="any" min="0.1" placeholder="cm" tabindex="4" required>
                                    </div>
                                </div>

                                <div class="cajas-input-group even">

                                    <div class="cajas-col-input left">

                                        <span>Grosor del Cajón: </span>
                                    </div>

                                    <div class="cajas-col-input right">

                                        <select class="cajas-input" name="grosor-cajon" id="grosor-cajon" tabindex="5" required>

                                            <option value="" selected>Elige opción</option>
                                            <option value="1">1</option>
                                            <option value="1.25">1.25</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2">2</option>
                                            <option value="2.25">2.25</option>
                                            <option value="2.5">2.5</option>
                                            <option value="3">3</option>
                                            <option value="3.25">3.25</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.25">4.25</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5">5</option>
                                            <option value="5.25">5.25</option>
                                            <option value="5.5">5.5</option>
                                            <option value="6">6</option>
                                        </select>
                                    </div>
                                </div>

                                <input class="cajas-form-submitter" type="submit" value="CALCULAR">
                            </form>
                            <script type="text/javascript" language="JavaScript">
                                document.forms['form2'].elements['odt'].focus();
                            </script>
                        </div>
                    </div>
                </div>

                <div class="viewer-section">

                    <img src="<?=URL ?>public/images/vino/vino.jpeg">
                </div>
            </div>      <!-- Termina caja Vino -->

            <!-- Caja Tubo -->
            <div class="caja-section" id="tubo">

                <div class="desarrollo">En desarrollo</div>
            </div>      <!-- Termina caja Tubo -->

            <!-- Caja Especial -->
            <div class="caja-section" id="especial">

                <div class="desarrollo">En desarrollo</div>
            </div>      <!-- Termina caja Especial -->
        </div>
    </div>
</div>

<!-- mensaje "Cargando..." -->
<div class="loader">

    <img src="<?php echo URL; ?>public/img/whloader.gif">
</div>

<div class="backdrop"></div>

<script>

    var open = false;
    var visual;

    jQuery214(document).on("submit", ".model-form", function (e) {

        e.preventDefault();

        var model = jQuery214(this).data('model');
        var odt   = jQuery214(this).data('odt');

        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop').css('display', 'block');
        $('.loader').show();

        $.ajax({

            type:"POST",
            url:"<?php echo URL; ?>cajas/setCalc/",
            data:jQuery214(this).serialize(),
            dataType:"json",

            success:function(data) {

                console.log(data);

                if (data.result=='correct') {

                    $(".model-form")[0].reset();
                    location.href = '<?php echo URL; ?>calculadora/' + model + '/';
                } else if(data.result=='logout') {

                    location.href = '<?php echo URL; ?>login/';
                } else {

                    closeModal();
                }
            },

            error:function(xhr, status, error) {

                $('.loader').hide();

                alert("Error. No se grabó la ODT");

                location.href = '<?php echo URL; ?>cajas/index.php';
            },
        });
    });


    $(document).ready(function(){

      adaptCols();

    });


    window.onresize = function(event) {

        adaptCols();
    }


    function adaptCols(){

        var height=$(window).height();
        $('.left-col').css('height',height-$('#navbar').height());
        $('.right-col').css('height',height-$('#navbar').height());
    }


    jQuery214(document).on("change", "#box-type", function () {

        var type = jQuery214(this).val();

        $('.backdrop').animate({'opacity':'.50'}, 300, 'linear');
        $('.backdrop').css('display', 'block');
        $('.loader').show();

        $.ajax({

            type:"POST",
            url:"<?php echo URL; ?>cajas/getForm/",
            data:{model:type},
            success:function(data){

                jQuery214('#form-content').html(data);
                closeModal();
            }
        });
    });


    jQuery214(document).on("click", "#tapa", function () {

        jQuery214('#model-visual').attr("src","<?php echo URL; ?>public/img/" + visual + "_tapa.png");
    });


    jQuery214(document).on("click", ".link", function () {

        var model = jQuery214(this).data('model');

        $('.active').removeClass('active');
        $(this).addClass('active');
        $('.instructions').hide();
        $('.caja-section').hide();
        $('#' + model).show();
        $('#' + model).forms['form2'].elements['odt'].focus();
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
