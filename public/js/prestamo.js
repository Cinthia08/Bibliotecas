var urlPrestamo = 'http://localhost/Biblioteca/public/apiprestamo';

new Vue({
	el:'#prestamos',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		prueba:'HOLA MUNDO',
		prestamos:[],
		id_prestamo: '',
		fecha_salida: '',
		fecha_entrada: '',
		editando: false,
	},

		created:function(){
		this.getPrestamos();
	},

	methods:{
		getPrestamos:function(){
			this.$http.get(urlPrestamo)
			.then(function(json){
				this.prestamos=json.data
			});
		},


		showModal:function(){
			$('#add_prestamos').modal('show');
			this.limpiar
		},
		// fin de show modal
		// inicio de agregar alumno
		agregarPrestamo:function()
		{
			// construir un objeto que necesitamos por el api
			var prestamo={id_prestamo:this.id_prestamo,
							fecha_salida: this.fecha_salida,
							fecha_entrada: this.fecha_entrada}
				// limpiar campos
				this.id_prestamo='';
				this.fecha_salida='';
				this.fecha_entrada='';
				// para un metodo store se necesita un post
				this.$http.post(urlPrestamo,prestamo)
				.then(function(response){
					this.getPrestamos();
					$('#add_prestamos').modal('hide');
				});
		},

		showPrestamo:function(id){
			// crear un json 
			this.$http.get(urlPrestamo + '/' + id)
			.then(function(json){
				this.id_prestamo=json.data.id_prestamo;
				this.fecha_salida=json.data.fecha_salida;
				this.fecha_entrada=json.data.fecha_entrada;
				this.editando=true;
			
			});
		},

		updatePrestamo:function(id)
		{
			// construir un objeto que necesitamos por el api
			var prestamo={id_prestamo:this.id_prestamo,
							fecha_salida: this.fecha_salida,
							fecha_entrada: this.fecha_entrada}

						console.log();
				
				// para un metodo store se necesita un post
				this.$http.patch(urlPrestamo+'/'+ id,prestamo)
				.then(function(json){
					this.getPrestamos();
					this.limpiar();
				})
					
		},

		limpiar:function(){

				this.id_prestamo='';
				this.fecha_salida='';
				this.fecha_entrada='';
				this.editando=false;
	  	},


		eliminarPrestamo:function(id){
			var resp=confirm("¿esta seguro de eliminar este prestamo?")
			if(resp==true)
			{
				this.$http.delete(urlPrestamo + '/' + id)
				.then(function(json){
				this.getPrestamos();
				});
			}
			
		}

    }
});