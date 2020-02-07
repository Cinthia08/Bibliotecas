@extends('layout.administrador')
@section('contenido')
	<div class="row text-center">
		<div class="col-xs-8">
			<table class="table table-bordered" style="background: pink">
				<thead>
					<th>
					<h2>
					<font face="forte" color="blue">
					<center>
						Bibliotecas
					</center>
					</font>
					</h2>
					</th>

					<th>
					<h2>
					<font face="forte" color="blue">
					<center>
						Libros
					</center>
					</font>
					</h2>
					</th>

					<th>
					<h2>
					<font face="forte" color="blue">
					<center>
						Lectores
					</center>
					</font>
					</h2>
					</th>


					<th>
					<h2>
					<font face="forte" color="blue">
					<center>
						Lectores
					</center>
					</font>
					</h2>
					</th>

				</thead>
				<tbody>
						<tr>
							<td>
							<center>
								<img src="imagenes/biblioteca.jpg" width="150" height="150">
								<br>
								<br>
									<a href="{{url('biblio')}}">
									<button class="btn btn-success btn-block">ver</button>
									</a>
							</center>
							</td>

							<td>
							<center>
								<img src="imagenes/libro.jpg" width="150" height="150">
								<br>
								<br>
									<a href="{{url('libro')}}">
									<button class="btn btn-success btn-block">ver</button>
									</a>
							</center>
							</td>

							<td>
							<center>
								<img src="imagenes/lectores.jpg" width="150" height="150">
								<br>
								<br>
									<a href="{{url('lector')}}">
									<button class="btn btn-success btn-block">ver</button>
									</a>
							</center>
							</td>

							<td>
							<center>
								<img src="imagenes/prestamo.jpg" width="150" height="150">
								<br>
								<br>
									<a href="{{url('prestamo')}}">
									<button class="btn btn-success btn-block">ver</button>
									</a>
							</center>
							</td>
						</tr>
				</tbody>
			</table>

			<a href="{{url('salir')}}">
			<button class="btn btn-primary btn-sm">Cerrar</button>
			</a>

		</div>
		
	</div>
@endsection