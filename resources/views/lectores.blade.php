@extends('layout.administrador')
@section('titulo','Bibliotecas')
@section('contenido')

<div id="lectores">
<div class="row">
	<div class="col-xs-3">
	<font face="Georgia">
		<h3><b>BUSCAR A:</b></h3>
	</font>
		<input type="text" placeholder="ESCRIBA EL NOMBRE DEL LECTOR" class="form-control"
		 v-model="buscar">
		</div>
	</div>
	<br>
	<br>
		<button class="btn btn-success" v-on:click="showModal()">Agregar</button>
		<br><br>

		<div class="row" v-if="editando==true">
			<div class="col-md-3">
				<form>
				<div>
					<input type="text" name="" placeholder="Ingrese el nombre" class="form-control" v-model="nombre">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese los apellidos" class="form-control" v-model="apellidos">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese su telefono" class="form-control" v-model="telefono">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese su domicilio" class="form-control" v-model="direccion">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese su codigo postal" class="form-control" v-model="codigo_postal">
				</div>
				</form>

				<br>
		          <button class="btn btn-success" v-on:click="updateLector(id_lector)">Guardar</button>
		          <button class="btn btn-warning" v-on:click="editando=false">Cancelar</button>
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>ID DEL LECTOR</th>
						<th>NOMBRE</th>
						<th>APELLIDOS</th>
						<th>TELEFONO</th>
						<th>DIRECCION</th>
						<th>CODIGO POSTAL</th>
						<th>OPCIONES</th>
					</thead>
					<tbody>
							<tr v-for="lector in filtroLector">
								<td>@{{lector.id_lector}}</td>
								<td>@{{lector.nombre}}</td>
								<td>@{{lector.apellidos}}</td>
								<td>@{{lector.telefono}}</td>
								<td>@{{lector.direccion}}</td>
								<td>@{{lector.codigo_postal}}</td>
								<td>
				                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary"
				                  v-on:click="showLector(lector.id_lector)"></span>
				                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger"
				                  v-on:click="eliminarLector(lector.id_lector)"></span>
				                </td>
							</tr>
					</tbody>
				</table>

	<div class="modal fade" tabindex="-1" role="dialog" id="add_lectores">
	     <div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria.label="close"><span
                                        aria-hidden="true">x</span></button>
				<h4 class="modal-title">Nuevo Lector</h4>
		  	</div>
			<div class="modal-body">
				<input type="text" name="" placeholder="Ingrese la id del lector" class="form-control" v-model="id_lector">
				<input type="text" name="" placeholder="Ingrese el nombre" class="form-control" v-model="nombre">
				<input type="text" name="" placeholder="Ingrese los apellidos" class="form-control" v-model="apellidos">
				<input type="text" name="" placeholder="Ingrese el telefono" class="form-control" v-model="telefono">
				<input type="text" name="" placeholder="Ingrese la direccion" class="form-control" v-model="direccion">
				<input type="text" name="" placeholder="Ingrese el codigo postal" class="form-control" v-model="codigo_postal">

			</div>
			<div class="modal-footer">
				<!-- comprobar que funcione en la caja de texto -->
				<h6>Id Biblioteca : @{{ id_lector }}</h6>
				<h6>Nombre : @{{ nombre }}</h6>
				<h6>Domicilio : @{{ apellidos }}</h6>
				<h6>Dias Abierto : @{{ telefono }}</h6>
				<h6>Hora Abierto : @{{ direccion }}</h6>
				<h6>Hora Cerrado: @{{ codigo_postal }}</h6>
				<!-- fin -->

			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary" v-on:click="agregarLector()">Guardar</button>
			</div>
		  </div><!-- /.modal-content -->
	     </div><!-- /.modal-dialog -->
	</div><!-- /-modal -->
  </div>
@endsection

@push('scripts')

	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script src="js/vue-resource.js"></script>
	<script src="js/lector.js"></script>
@endpush