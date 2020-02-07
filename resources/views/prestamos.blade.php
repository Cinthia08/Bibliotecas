@extends('layout.administrador')
@section('titulo','Prestamos')
@section('contenido')

<div id="prestamos">
		<button class="btn btn-success" v-on:click="showModal()">Agregar</button>
		<br><br>

		<div class="row" v-if="editando==true">
			<div class="col-md-3">
				<form>
				<div>
					<input type="text" name="" placeholder="Ingrese la fecha_salida" class="form-control" v-model="fecha_salida">
				</div>
				<div>
					<input type="text" name="" placeholder="Ingrese la fecha_entrega" class="form-control" v-model="fecha_entrada">
				</div>
				</form>

				<br>
		          <button class="btn btn-success" v-on:click="updatePrestamo(id_prestamo)">Guardar</button>
		          <button class="btn btn-warning" v-on:click="editando=false">Cancelar</button>
			</div>
		</div>

		<table class="table table-bordered table-hover table-striped">
					<thead>
						<th>ID PRESTAMO</th>
						<th>FECHA DE SALIDA</th>
						<th>FECHA DE ENTRADA</th>
						<th>OPCIONES</th>
					</thead>
					<tbody>
							<tr v-for="prestamo in prestamos">
								<td>@{{prestamo.id_prestamo}}</td>
								<td>@{{prestamo.fecha_salida}}</td>
								<td>@{{prestamo.fecha_entrada}}</td>
								<td>
				                  <span class="glyphicon glyphicon-pencil btn btn-xs btn-primary"
				                  v-on:click="showPrestamo(prestamo.id_prestamo)"></span>
				                  <span class="glyphicon glyphicon-trash btn btn-xs btn-danger"
				                  v-on:click="eliminarPrestamo(prestamo.id_prestamo)"></span>
				                </td>
							</tr>
					</tbody>
				</table>

	<div class="modal fade" tabindex="-1" role="dialog" id="add_prestamos">
	     <div class="modal-dialog" role="document">
		  <div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria.label="close"><span aria-hidden="true">x</span></button>
				<h4 class="modal-title">Nuevo Prestamo</h4>
		  	</div>
			<div class="modal-body">
				<input type="text" name="" placeholder="Ingrese la id" class="form-control" v-model="id_prestamo">
				<input type="text" name="" placeholder="Ingrese la fecha_salida" class="form-control" v-model="fecha_salida">
				<input type="text" name="" placeholder="Ingrese la fecha_entrega" class="form-control" v-model="fecha_entrada">
			</div>
			<div class="modal-footer">
				<!-- comprobar que funcione en la caja de texto -->
				<h6>Id Prestamo : @{{ id_prestamo }}</h6>
				<h6>Fecha De Salida : @{{ fecha_salida }}</h6>
				<h6>Fecha De Entrega : @{{ fecha_entrada }}</h6>
				<!-- fin -->

			    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			    <button type="submit" class="btn btn-primary" v-on:click="agregarPrestamo()">Guardar</button>
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
	<script src="js/prestamo.js"></script>
@endpush