
<form id="guardarDatos" >
<div class="modal fade " id="dataRegister" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Ítem</h4>
      </div>
      <div class="modal-body">
			<div id="datos_ajax_register"></div>
          <div class="form-group">

            <input type="text" class="form-control"  placeholder="Titulo*" id="nombre" name="nombre" required >
		  </div>
		
		  <div class="form-group">
            <input type="text" class="form-control" id="moneda" name="moneda" required placeholder="Código*">
          </div>
		  <div class="form-group">
            <input type="number" class="form-control" id="capital" name="capital" required maxlength="30" placeholder="Cantidad Inicial" >
          </div>
		  <div class="form-group">
            <input type="number" class="form-control" id="continente" name="continente" required maxlength="60" placeholder="Precio de Compra*" >
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="codigo" name="codigo" placeholder="Precio de Venta*" required maxlength="20">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="impuesto" name="impuesto" placeholder="Impuesto %" required maxlength="20">
          </div>

      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Grabar</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
</form>