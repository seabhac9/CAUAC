<h2 class="orange">Crear Foro</h2>
<ul class="nav nav-pills ">
<li role="presentation"><a onclick="redirectCreaforo()">Crear Foro</a></li>
</ul>

<form class="form-horizontal">
  <div class="form-group">
    <label for="titleForo" class="col-sm-2 control-label">Titulo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="titleForo" placeholder="Titulo">
    </div>
  </div>
  <div class="form-group">
    <label for="textForo">Contenido</label>
    <textarea class="form-control" name="contentForo" id="textForo" rows="15" placeholder="Contenido"></textarea>
    <ul class="nav nav-pills ">
	<li role="presentation"><a onclick="adjuntarArchivo()">Adjuntar Archivo</a></li>	
	</ul>
	<div class="col-sm-2">
		<h3 class="text-primary">Agregar a:</h3>
	</div>
	<div id="users" class="col-sm-2">
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 1">User 1
	  </label>
	</div>	
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 2">User 2
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 1">User 3
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 1">User 4
	  </label>
	</div>
	</div>
	<div id="users" class="col-sm-2">
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 1">User 5
	  </label>
	</div>	
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 6">User 6
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 7">User 7
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 8">User 8
	  </label>
	</div>
	</div>
	<div id="users" class="col-sm-2">
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 9">User 9
	  </label>
	</div>	
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 10">User 10
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 11">User 11
	  </label>
	</div>
	<div class="checkbox">
	  <label>
	    <input type="checkbox" value="User 12">User 12
	  </label>
	</div>
	</div>	
  </div>
<button type="submit" class="btn btn-primary">Publicar</button>

<button type="button" class="btn btn-warning">Limpiar</button>

</form> 
