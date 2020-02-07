var urlBiblioteca = 'http://localhost/Biblioteca/public/apibiblioteca';

new Vue({
	el:'#bibliotecas',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		prueba:'HOLA MUNDO',
		bibliotecas:[],
		id_biblioteca: '',
		nombre: '',
		domicilio: '',
		dias_abierto: '',
		horario_abierto: '',
		horario_cerrado: '',
		buscar:'',
		editando: false,
	},

		created:function(){
		this.getBibliotecas();
	},

	methods:{
		getBibliotecas:function(){
			this.$http.get(urlBiblioteca)
			.then(function(json){
				this.bibliotecas=json.data
			});
		},


		showModal:function(){
			$('#add_bibliotecas').modal('show');
			this.limpiar
		},
		// fin de show modal
		// inicio de agregar alumno
		agregarBiblioteca:function()
		{
			// construir un objeto que necesitamos por el api
			var biblioteca={id_biblioteca:this.id_biblioteca,
							nombre: this.nombre,
							domicilio: this.domicilio,
							dias_abierto: this.dias_abierto,
							horario_abierto: this.horario_abierto,
							horario_cerrado: this.horario_cerrado}
				// limpiar campos
				this.id_biblioteca='';
				this.nombre='';
				this.domicilio='';
				this.dias_abierto='';
				this.horario_abierto='';
				this.horario_cerrado='';
				// para un metodo store se necesita un post
				this.$http.post(urlBiblioteca,biblioteca)
				.then(function(response){
					this.getBibliotecas();
					$('#add_bibliotecas').modal('hide');
				});
		},

		showBiblioteca:function(id){
			// crear un json 
			this.$http.get(urlBiblioteca + '/' + id)
			.then(function(json){
				this.id_biblioteca=json.data.id_biblioteca;
				this.nombre=json.data.nombre;
				this.domicilio=json.data.domicilio;
				this.dias_abierto=json.data.dias_abierto;
				this.horario_abierto=json.data.horario_abierto;
				this.horario_cerrado=json.data.horario_cerrado;
				this.editando=true;
			});
		},

		updateBiblioteca:function(id)
		{
			// construir un objeto que necesitamos por el api
			var biblioteca={id_biblioteca:this.id_biblioteca,
							nombre: this.nombre,
							domicilio: this.domicilio,
							dias_abierto: this.dias_abierto,
							horario_abierto: this.horario_abierto,
							horario_cerrado: this.horario_cerrado}

						console.log();
				
				// para un metodo store se necesita un post
				this.$http.patch(urlBiblioteca + '/' + id,biblioteca)
				.then(function(json){
					this.getBibliotecas();
					this.limpiar();
				})
					
		},

		limpiar:function(){

				this.id_biblioteca='';
				this.nombre='';
				this.domicilio='';
				this.dias_abierto='';
				this.horario_abierto='';
				this.horario_cerrado='';
				this.editando=false;
	  	},


		eliminarBiblioteca:function(id){
			var resp=confirm("¿estas seguro de eliminar la biblioteca?")
			if(resp==true)
			{
				this.$http.delete(urlBiblioteca + '/' + id)
				.then(function(json){
				this.getBibliotecas();
				});
			}
			
		}

    },
    computed:{

		filtroBiblio:function(){
			return this.bibliotecas.filter((bibliotecas)=>{
				return bibliotecas.nombre.match(this.buscar.trim()) ||
				bibliotecas.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});