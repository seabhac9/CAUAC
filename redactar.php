<h2 class="orange">Redactar</h2>
<ul class="redactMenu nav nav-pills ">  
  <li role="presentation"><a href="#">Enviar</a></li>
  <li role="presentation"><a href="#">Limpiar</a></li>
  <li role="presentation">
  <label for="selectUser">Enviar a:</label>
  <select class="form-control" id="selectUser" required="required">
  <optgroup label="Usuarios Registrados">
  <option value="User 1">User 1</option>
  <option value="User 2">User 2</option>
  <option value="User 3">User 3</option>
  <option value="User 4">User 4</option>
  <option value="all">Todos</option>
  
</select></li>   
</ul>

<form>
	<input type="text" name="titleRedact" class="form-control" placeholder="Titulo"><br/>
	<textarea class="form-control" name="messageRedact" rows="15" placeholder="Mensaje"></textarea>
</form>