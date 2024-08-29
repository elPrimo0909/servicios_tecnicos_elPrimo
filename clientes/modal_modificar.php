<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="" id="exampleModalLabel">Información General</h4>
        <h6 class="" id="exampleModalLabel">Puedes cambiar datos en los campos</h6>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
          <div class="form-group">
            <label for="nombre" class="control-label">Nombres</label>
            <input type="text" class="form-control" id="nombre" name="nombre"  value="<?echo $row['empresa'];?>" required maxlength="50">
			<input type="hidden" class="form-control" id="id" name="id">
          </div>
		  <div class="form-group">
            <label for="codigo" class="control-label">Identificación</label>
            <input type="text" class="form-control" id="codigo" name="codigo"  value="<?echo $row['identificacion']?>" required maxlength="45">
          </div>
		  <div class="form-group">
            <label for="moneda" class="control-label">Dirección</label>
            <input type="text" class="form-control" id="moneda" name="moneda" value="<?echo $row['actividad']?>" <>
          </div>
		  <div class="form-group">
            <label for="capital" class="control-label">Telefóno</label>
            <input type="text" class="form-control" id="capital" name="capital" value="<?echo $row['tel1']?>" maxlength="30">
          </div>
		  <div class="form-group">
            <label for="continente" class="control-label">Email</label>
            <input type="text" class="form-control" id="continente" name="continente" value="<?echo $row['email']?>">
          </div>


      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Actualizar Datos</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

      </div>
    </div>
  </div>
</div>
</form>