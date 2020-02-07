var urlLibro = 'http://localhost/Biblioteca/public/apilibro';

new Vue({
	el:'#libros',

	http:{
		headers:{
			'X-CSRF-TOKEN': document.querySelector('#token').getAttribute('value')
		}
	},

	data:{
		prueba:'HOLA MUNDO',
		libros:[],
		id_libro: '',
		titulo: '',
		no_pagina: '',
		anio_edicion: '',
		buscar:'',
		editando: false,
	},

		created:function(){
		this.getLibros();
	},

	methods:{
		getLibros:function(){
			this.$http.get(urlLibro)
			.then(function(json){
				this.libros=json.data
			});
		},


		showModal:function(){
			$('#add_libros').modal('show');
			this.limpiar
		},
		// fin de show modal
		// inicio de agregar alumno
		agregarLibro:function()
		{
			// construir un objeto que necesitamos por el api
			var libro={id_libro:this.id_libro,
							titulo: this.titulo,
							no_pagina: this.no_pagina,
							anio_edicion: this.anio_edicion}
				// limpiar campos
				this.id_libro='';
				this.titulo='';
				this.no_pagina='';
				this.anio_edicion='';
				// para un metodo store se necesita un post
				this.$http.post(urlLibro,libro)
				.then(function(response){
					this.getLibros();
					$('#add_libros').modal('hide');
				});
		},

		showLibro:function(id){
			// crear un json 
			this.$http.get(urlLibro + '/' + id)
			.then(function(json){
				this.id_libro=json.data.id_libro;
				this.titulo=json.data.titulo;
				this.no_pagina=json.data.no_pagina;
				this.anio_edicion=json.data.anio_edicion;
				this.editando=true;
			
			});
		},

		updateLibro:function(id)
		{
			// construir un objeto que necesitamos por el api
			var libro={id_libro:this.id_libro,
							titulo: this.titulo,
							no_pagina: this.no_pagina,
							anio_edicion: this.anio_edicion}

						console.log();
				
				// para un metodo store se necesita un post
				this.$http.patch(urlLibro+'/'+ id,libro)
				.then(function(json){
					this.getLibros();
					this.limpiar();
				})
					
		},

		limpiar:function(){

				this.id_libro='';
				this.titulo='';
				this.no_pagina='';
				this.anio_edicion='';
				this.editando=false;
	  	},


		eliminarLibro:function(id){
			var resp=confirm("¿esta seguro de eliminar este libro?")
			if(resp==true)
			{
				this.$http.delete(urlLibro + '/' + id)
				.then(function(json){
				this.getLibros();
				});
			}
			
		}

    },

    computed:{

		filtroLibro:function(){
			return this.libros.filter((libros)=>{
				return libros.titulo.match(this.buscar.trim()) ||
				libros.titulo.toLowerCase().match(this.buscar.trim().toLowerCase());
			});
		}
	}
});
