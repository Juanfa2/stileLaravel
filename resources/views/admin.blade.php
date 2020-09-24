<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHP Vue.js Mysqli CRUD</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/admin/style.css">
	<script src="vendor/js/axios.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="text-center">
			<h1>Administrador</h1>
			<a class="btn btn-primary" href="">Productos</a>
			<a class="btn btn-secondary" href="#sect-categorias">Caterorias</a>
		</div>
		<div class="text-center"><a href="{{ URL::previous() }}">Volver</a></div>
		
	</div>
	<div id="root">
		<div class="p-4">
			<div class="container p-5">
				<div class="row">
						<div class="alert alert-danger alert-dismissible fade show col-md-6" id="alertMessage" role="alert" v-if="errorMessage">
							Error de carga
						</div>

						<div class="alert alert-success alert-dismissible fade show col-md-6" id="alertMessage" role="alert" v-if="successMessage">
							Operacion Exitosa
						</div>

					<div>
						<a href="#productModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Agregar producto</a>
					</div>
					<table class="table table-striped">
						<thead class="thead-dark">
							<tr>
								<th>S/N</th>
								<th>Imagen</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Descripción</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody class="tbody-custom">
							@forelse($productos as $producto)
								@if($producto->visible == 1)
								<tr v-for="">
									<td> {{$producto->id }} </td>
									<td><img :src="" alt="" height="60"></td>
									<td>{{$producto->nombre}}</td>
									<td>{{$producto->precioUnitario}}</td>
									<td>{{$producto->descripcion}}</td>
									<td>
										<button  class="btn btn-warning"  data-toggle="modal" data-target="#edit" data-name="{{$producto->nombre}}" data-descripcion="{{$producto->descripcion}}" data-precio="{{$producto->precioUnitario}}" data-prodid="{{$producto->id}}"> Edit</button>
									</td>
									<td><button  class="btn btn-danger" data-nombre="{{$producto->nombre}}" data-prodid="{{$producto->id}}" data-toggle="modal" data-target="#delete">Eliminar</button></td>

								</tr>
								@endif
							@empty
							<p>No hay productos</p>

							@endforelse
						</tbody>
					</table>

					




				</div>
			</div>
			<section id="sect-categorias">
				<div class="container">
					<div class="text-center">
						<h3 class="border-bottom">Categoria</h3>
					</div>
				</div>
				<div class="container p-5">
					<div class="row">
						<div class="alert alert-danger col-md-6" id="alertMessage" role="alert" v-if="errorMessage">
							errorMessage 
						</div>

						<div class="alert alert-success col-md-6" id="alertMessage" role="alert" v-if="successMessage">
							successMessage 
						</div>
						<div>
							<a href="#categoryModal" role="button" class="btn btn-large btn-primary" data-toggle="modal">Agregar categoria</a>
						</div>
						<table class="table table-striped">
							<thead class="thead-dark">
								<tr>
									<th>S/N</th>
									<th>Nombre</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>
							</thead>
							<tbody class="tbody-custom">
								@forelse($categorias as $cat)
								
								<tr v-for="cat in categorias">
									<td>{{$cat->id}}</td>
									<td>{{$cat->nombre}}</td>

									<td><button class="btn btn-warning" data-toggle="modal" data-target="#editCat" data-name="{{$cat->nombre}}" data-catid="{{$cat->id}}">Edit</button></td>
									@if($cat->visible == 1)
									<td><button  class="btn btn-danger" data-nombre="{{$cat->nombre}}" data-catid="{{$cat->id}}" data-toggle="modal" data-target="#deleteCat">Delete</button></td>
									@endif
								</tr>
								
								@empty
								<p>No hay categorias</p>
								@endforelse	
							</tbody>
						</table>

						<!--AGREGAR CATEGORIA-->
							@include('newCategory')
							@include('editCategory')
							@include('deleteCategory')
						<!---->	

					</div>
				</div>

				
				<!-- edit modal -->
				<div class="modal col-md-6" id="editmodal" v-if="showingeditModal">
					<div class="modal-head">
						<p class="p-left p-2">Editar Categoria</p>
						<hr/>

						<div class="modal-body">
							<div class="col-md-12">
								<label for="nombre">Categoria</label>
								<input type="text" id="nombre" class="form-control" v-model="clickedProd.nombre">

								<label for="precio">Id</label>
								<input type="text" id="id" class="form-control" v-model="clickedProd.precio">
							</div>

							<hr/>
							<button type="button" class="btn btn-success" >Guardar cambios</button>
							<button type="button" class="btn btn-danger"  >Cerrar</button>
						</div>
					</div>
				</div>


				<!-- delete data -->
				<div class="modal col-md-6" id="deletemodal" v-if="showingdeleteModal">
					<div class="modal-head">
						<p class="p-left p-2">Eliminar producto</p>
						<hr/>
						<div class="modal-body">
							<center>
								<p>¿Seguro que desea eliminarlo?</p>
								<h3>clickedProd.nombre</h3>
							</center>
							<hr/>
							<button type="button" class="btn btn-danger" >Sí</button>
							<button type="button" class="btn btn-warning" >No</button>
						</div>
					</div>
				</div>

			</section>
		</div>
	</div>
<!--
https://www.youtube.com/watch?v=DAitIOhxOOA
-->

<!-- VENTANA EMERGENTE, CREAR PRODUCTO -->

@include('newProduct')

<!-- ElIMINAR PRODUCTO-->

@include('deleteProduct')		

@include('editProduct')			
					
<!-- FIN VENTANA EMERGENTE -->


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="vendor/js/jquery.js"></script>
	<script src="vendor/js/bootstrap.min.js"></script>
	<script src="vendor/js/vue.min.js"></script>
	<script src="js/app.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

	<script>
		$('#edit').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var cat_id = button.data('prodid')
			var name = button.data('name')
			var descripcion = button.data('descripcion')
			var precio = button.data('precio')
			var modal = $(this)

			modal.find('.modal-body #name').val(name)
			modal.find('.modal-body #descripcion').val(descripcion)
			modal.find('.modal-body #precio').val(precio)
			modal.find('.form-signin #prod_id').val(cat_id)
		})
	</script>
		
	<script >
		$('#delete').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var cat_id = button.data('prodid')
			var nombre = button.data('nombre')
			var modal = $(this)

			modal.find('.modal-body #prod_id').val(cat_id)
			modal.find('.modal-body #nombre_id').text(nombre)
		})
	</script>

	<script>
		$('#editCat').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var cat_id = button.data('catid')
			var name = button.data('name')

			var modal = $(this)

			modal.find('.modal-body #name').val(name)
			modal.find('.form-signin #cat_id').val(cat_id)
		})
	</script>
	<script >
		$('#deleteCat').on('show.bs.modal', function(event){
			var button = $(event.relatedTarget)
			var cat_id = button.data('catid')
			var nombre = button.data('nombre')
			var modal = $(this)

			modal.find('.modal-body #cat_id').val(cat_id)
			modal.find('.modal-body #nombre_id').text(nombre)
		})
	</script>
</body>
</html>