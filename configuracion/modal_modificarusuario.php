<form id="actualidarDatosUsuario">
<div class="modal fade" id="dataUpdateUsuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="" id="exampleModalLabel">Editar Usuario</h4>
        <h6 class="" id="exampleModalLabel">Puedes cambiar datos en los campos</h6>
      </div>
      <div class="modal-body">
			<div id="datos_ajax1"></div>
          <div class="form-group">
            <label for="nombre" class="control-label">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario"  value="<?echo $row['empresa'];?>" required maxlength="50">
			<input type="hidden" class="form-control" id="id" name="id">
          </div>
		  
   <div class="form-group">
      <label for="codigo" class="control-label">Contraseña</label>
         
         <input type="password" class="form-control" id="passusuario" name="passusuario" value="<?echo $row['tel1']?>" maxlength="30">
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




<form id="actualidarDatos">
<div class="modal fade" id="dataUpdate2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="" id="exampleModalLabel">Informaciósssn General</h4>
        <h6 class="" id="exampleModalLabel">Puedes cambiar datos en los campos</h6>
      </div>
      <div class="modal-body">
			<div id="datos_ajax"></div>
          <div class="form-group">
          <h6>Formatos admitidos: JPG, PNG, GIF</h6>
</div>
<div id="body" >
    <form class="form-group" action="upload.php" method="post" enctype="multipart/form-data">
<br/>

    <input class="file"  type="file" name="file"    />
    <br />
    <button type="submit" class="btn btn-sample" name="btn-upload">Cargssar Logo</button>
    </form>
    <br /><br />


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