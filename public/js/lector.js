var urlLector = 'http://localhost/Biblioteca/public/apilector';

new Vue({
	el:'#lectores',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		prueba:'HOLA MUNDO',
		lectores:[],
		id_lector: '',
		nombre: '',
		apellidos: '',
		telefono: '',
		direccion: '',
		codigo_postal: '',
		buscar:'',
		editando: false,
	},

		created:function(){
		this.getLectores();
	},

	methods:{
		getLectores:function(){
			this.$http.get(urlLector)
			.then(function(json){
				this.lectores=json.data
			});
		},


		showModal:function(){
			$('#add_lectores').modal('show');
			this.limpiar
		},
		// fin de show modal
		// inicio de agregar alumno
		agregarLector:function()
		{
			// construir un objeto que necesitamos por el api
			var lector={id_lector:this.id_lector,
							nombre: this.nombre,
							apellidos: this.apellidos,
							telefono: this.telefono,
							direccion: this.direccion,
							codigo_postal: this.codigo_postal}
				// limpiar campos
				this.id_lector='';
				this.nombre='';
				this.apellidos='';
				this.telefono='';
				this.direccion='';
				this.codigo_postal='';
				// para un metodo store se necesita un post
				this.$http.post(urlLector,lector)
				.then(function(response){
					this.getLectores();
					$('#add_lectores').modal('hide');
				});
		},

		showLector:function(id){
			// crear un json 
			this.$http.get(urlLector + '/' + id)
			.then(function(json){
				this.id_lector=json.data.id_lector;
				this.nombre=json.data.nombre;
				this.apellidos=json.data.apellidos;
				this.telefono=json.data.telefono;
				this.direccion=json.data.direccion;
				this.codigo_postal=json.data.codigo_postal;
				this.editando=true;
			});
		},

		updateLector:function(id)
		{
			// construir un objeto que necesitamos por el api
			var lector={id_lector:this.id_lector,
							nombre: this.nombre,
							apellidos: this.apellidos,
							telefono: this.telefono,
							direccion: this.direccion,
							codigo_postal: this.codigo_postal}

						console.log();
				
				// para un metodo store se necesita un post
				this.$http.patch(urlLector + '/' + id,lector)
				.then(function(json){
					this.getLectores();
					this.limpiar();
				})
					
		},

		limpiar:function(){

				this.id_lector='';
				this.nombre='';
				this.apellidos='';
				this.telefono='';
				this.direccion='';
				this.codigo_postal='';
				this.editando=false;
	  	},


		eliminarLector:function(id){
			var resp=confirm("¿esta seguro de eliminar este lector?")
			if(resp==true)
			{
				this.$http.delete(urlLector + '/' + id)
				.then(function(json){
				this.getLectores();
				});
			}
			
		}

    },

    computed:{

		filtroLector:function(){
			return this.lectores.filter((lectores)=>{
				return lectores.nombre.match(this.buscar.trim()) ||
				lectores.nombre.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});
