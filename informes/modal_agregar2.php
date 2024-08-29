<form  method="POST" target="_self" action="consulta.php" >
<div class="modal fade" id="dataRegister2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nueva Consulta</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>

<form  action="consulta.php" method="POST" >


<div class="form-group">
          Tipo Informe
            <label for="favorito" class="control-label"  >  </label>
            <select  class="form-group"id="favorito" name="favorito"  >
           
            <option value="1" >Ventas</option>
            <option value="0" >Inventario</option>
            
          </select>

          </div>
        
		  <div class="form-group">
      Fecha inicio informe:
        <input  class="form-control input-sm" type="text" id="fecha" for="fecha" name="fecha" value="" required />
         </div>

         <div class="form-group">
      Fecha fin informe:
        <input  class="form-control input-sm" type="text" id="fecha2" for="fecha2" name="fecha2" value="" required />
         </div>

      </div>
      <div class="modal-footer">
        
        <button type="submit" class="btn btn-primary">Consultar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    
      </form>
    </div>
  </div>
</div>
</form>