@extends('layout.administrador')
@section('titulo','Bibliotecas')
@section('contenido')

<div id="bibliotecas">
<div class="row">
	<div class="col-xs-">
	<font face="Georgia">
		<h3><b>BUSCAR A:</b></h3>
	</font>
		<input type="text" placeholder="ESCRIBA EL NOMBRE DE LA BIBLIOTECA" class="form-control"
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
					<input type="text" name="" placeholder="Ingrese su Domicilio" class="form-control" v-model="domicilio">
				</div>
				<div>
					<input type="text" name="" placeholder="Escriba los dias abierto" class="form-control" v-model="dias_abierto">
				</div>
				<div>
					<input type="text" name="" placeholder="horario abierto" class="form-control" v-model="horario_abierto">
				</div>
				<div>
					<input type="text" name="" placeholder="horario cerrado" class="form-control" v-model="horario_cerrado">
				</div>
				</form>

				<br>
		          <button class="btn btn-success" v-on:click="updateBiblioteca(id_biblioteca)">Guardar</button>
		          <button class="btn btn-warning" v-on:click="editando=false">Cancelar</button>
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>ID BIBLIOTECA</th>
						<th>NOMBRE</th>
						<th>DOMICILIO</th>
						<th>DIAS ABIERTO</th>
						<th>HORA ABIERTO</th>
						<th>HORA CERRADO</th>
						<th>OPCIONES</th>
					</thead>
					<tbody>
							<tr v-for="biblioteca in filtroBiblio">
								<td>@{{biblioteca.id_biblioteca}}</td>
								<td>@{{biblioteca.nombre}}</td>
								<td>@{{biblioteca.domicilio}}</td>
								<td>@{{biblioteca.dias_abierto}}</td>
								<td>@{{biblioteca.horario_abierto}}</td>
								<td>@{{biblioteca.horario_cerrado}}</td>
								<td>
				                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary"
				                  v-on:click="showBiblioteca(biblioteca.id_biblioteca)"></span>
				                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger"
				                  v-on:click="eliminarBiblioteca(biblioteca.id_biblioteca)"></span>
				                </td>
							</tr>
					</tbody>
				</table>

	<div class="modal fade" tabindex="-1" role="dialog" id="add_bibliotecas">
	     <div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria.label="close"><span
                                        aria-hidden="true">x</span></button>
				<h4 class="modal-title">Nueva Biblioteca</h4>
		  	</div>
			<div class="modal-body">
				<input type="text" name="" placeholder="Ingrese la id de la Biblioteca" class="form-control" v-model="id_biblioteca">
				<input type="text" name="" placeholder="Ingrese el nombre" class="form-control" v-model="nombre">
				<input type="text" name="" placeholder="Ingrese su Domicilio" class="form-control" v-model="domicilio">
				<input type="text" name="" placeholder="Escriba los dias abierto" class="form-control" v-model="dias_abierto">
				<input type="text" name="" placeholder="horario abierto" class="form-control" v-model="horario_abierto">
				<input type="text" name="" placeholder="horario cerrado" class="form-control" v-model="horario_cerrado">

			</div>
			<div class="modal-footer">
				<!-- comprobar que funcione en la caja de texto -->
				<h6>Id Biblioteca : @{{ id_biblioteca }}</h6>
				<h6>Nombre : @{{ nombre }}</h6>
				<h6>Domicilio : @{{ domicilio }}</h6>
				<h6>Dias Abierto : @{{ dias_abierto }}</h6>
				<h6>Hora Abierto : @{{ horario_abierto }}</h6>
				<h6>Hora Cerrado: @{{ horario_cerrado }}</h6>
				<!-- fin -->

			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary" v-on:click="agregarBiblioteca()">Guardar</button>
			</div>
		  </div><!-- /.modal-content -->
	     </div><!-- /.modal-dialog -->
	</div><!-- /-modal -->
  </div>
@endsection

@push('scripts')
	<script src="js/vue-resource.js"></script>

	<script src="js/biblioteca.js"></script>
	<script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
@endpush