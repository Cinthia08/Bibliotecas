@extends('layout.administrador')
@section('titulo','Libros')
@section('contenido')

<div id="libros">
	<div class="row">
	<div class="col-xs-">
	<font face="Georgia">
		<h3><b>BUSCAR A:</b></h3>
	</font>
		<input type="text" placeholder="ESCRIBA EL TITULO DEL LIBRO" class="form-control"
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
					<input type="text" name="" placeholder="Ingrese el Titulo" class="form-control" v-model="titulo">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese el Numero de Paginas" class="form-control" v-model="no_pagina">
				</div>
				<div>
					<input type="text" name="" placeholder="Escriba el Año de Edicion" class="form-control" v-model="anio_edicion">
				</div>
				</form>

				<br>
		          <button class="btn btn-success" v-on:click="updateLibro(id_libro)">Guardar</button>
		          <button class="btn btn-warning" v-on:click="editando=false">Cancelar</button>
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>ID LIBRO</th>
						<th>TITULO</th>
						<th>NUMERO DE PAGINAS</th>
						<th>AÑO DE EDICION</th>
						<th>OPCIONES</th>
					</thead>
					<tbody>
							<tr v-for="libro in filtroLibro">
								<td>@{{libro.id_libro}}</td>
								<td>@{{libro.titulo}}</td>
								<td>@{{libro.no_pagina}}</td>
								<td>@{{libro.anio_edicion}}</td>
								<td>
				                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary"
				                  v-on:click="showLibro(libro.id_libro)"></span>
				                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger"
				                  v-on:click="eliminarLibro(libro.id_libro)"></span>
				                </td>
							</tr>
					</tbody>
				</table>

	<div class="modal fade" tabindex="-1" role="dialog" id="add_libros">
	     <div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria.label="close"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title">Nuevo Libro</h4>
		  	</div>
			<div class="modal-body">
				<input type="text" name="" placeholder="Ingrese la id del libro" class="form-control" v-model="id_libro">
				<input type="text" name="" placeholder="Ingrese el titulo" class="form-control" v-model="titulo">
				<input type="text" name="" placeholder="Ingrese numero de paginas" class="form-control" v-model="no_pagina">
				<input type="text" name="" placeholder="Escriba el año de edicion" class="form-control" v-model="anio_edicion">
			</div>
			<div class="modal-footer">
				<!-- comprobar que funcione en la caja de texto -->
				<h6>Id Libro : @{{ id_libro }}</h6>
				<h6>Titulo : @{{ titulo }}</h6>
				<h6>Numero De Paginas : @{{ no_pagina }}</h6>
				<h6>Anio De Edicion : @{{ anio_edicion }}</h6>
				<!-- fin -->

			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary" v-on:click="agregarLibro()">Guardar</button>
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
	<script src="js/libro.js"></script>
@endpush