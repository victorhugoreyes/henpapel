<div class="table-section">
<div class="table-controls"><input type="text" id="searcher" name="" placeholder="Buscar..."></div>
<div class="table-container">

<h1 class="page-header">Registros de Gastos Especiales</h1>
  
<body>
<button>
<a style="background:#04EDF0" href="<?php echo URL?>gastosespeciales/index">Regresar</a>
</button>
</body> 


    <thead>
    <form  id="gastoss"  action="<?php echo URL?>gastosespeciales/registrar" method="post">

    

    <div class="form-content">
         <select  name="nombre" class="cajas-input" style="background:gold">
          <option selected disabled>Elige un proceso:</option>
           <option value="Corte">Corte</option>
           <option value="Suaje">Suaje</option>
           <option value="Offset">OffSet</option>
           <option value="Prensa">Prensa</option>
           <option value="Acabado">Acabado</option>
           <option value="Cartera">Cartera</option>
           <option value="Digital">Digital</option>
           <option value="Grabado">Grabado</option>
           <option value="Calandra">Calandra</option>
           <option value="Costuras">Costuras</option>
           <option value="Laminado">Laminado</option>
           <option value="Engumadura">Engumadura</option>
           <option value="Ranuradora">Ranuradora</option>
           <option value="Serigrafia">Serigrafia</option>
           <option value="Sacabocado">Sacabocado</option>
           <option value="Timbradora">Timbradora</option>
           <option value="Hot Stamping">Hotstamping</option>
           <option value="Medio Suaje">Medio Suaje</option>
           <option value="Despuntadora">Despuntadora</option>
           <option value="Retractilado">Retractilado</option>
           <option value="Pegado Esquina">Pegado Esquina</option>
         </select>
       </div>
     
    <div class="form-group" class="text-center">
      <label>Cantidad que entra al proceso</label>
      <input type="text"  name="cantidad_entrada_proceso"  class="form-control"/>
    </div>

     <div class="form-group">
        <label>Cantidad que sale del proceso correcta</label>
        <input type="text" step="any" name="cantidad_salida_proceso_correcta" value="" class="form-control" />
    </div>

    <div class="form-group">
        <label>Cantidad que sale del proceso merma</label>
        <input type="text"step="any" name="cantidad_proceso_merma" value="" class="form-control" />
    </div>

    <div class="form-group">
        <label>Total</label>
        <input type="text"step="any" name="total" value="" class="form-control"/>
    </div>

    <div class="form-group">
        <label>Proveedor</label>
        <input type="text"step="any" name="proveedor" value="" class="form-control"/>
    </div>    

    <div class="form-group">
        <label>Firma</label>
        <input type="text"step="any" name="firma" value="" class="form-control"/>
    </div> 


    <hr />

    <div class="text-right">
         <center><button class="btn btn-success">Registrar datos</button> <center/>
    </div>

    
</form>
   </thead>
  </div>
   </div>
   </div>
    </div>
     </div>