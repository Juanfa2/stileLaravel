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
					<div class="alert alert-danger col-md-6" id="alertMessage" role="alert" v-if="errorMessage">
						 errorMessage 
					</div>

					<div class="alert alert-success col-md-6" id="alertMessage" role="alert" v-if="successMessage">
						 successMessage 
					</div>
					<div>
						<a href="/new"class="btn btn-secondary" @click="showingaddModal = true">Agregar Producto</a>
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
							<tr v-for="">
								<td> {{$producto->id }} </td>
								<td><img :src="" alt="" height="60"></td>
								<td>{{$producto->nombre}}</td>
								<td>{{$producto->precioUnitario}}</td>
								<td>{{$producto->descripcion}}</td>
								<td><button @click="showingeditModal = true; selectProducto(producto);" class="btn btn-warning">Edit</button></td>
								<td><button @click="showingdeleteModal = true; selectProducto(producto);" class="btn btn-danger">Delete</button></td>
							</tr>
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
							<p class="btn btn-secondary" @click="showingaddModal = true">Agregar Categorias</p>
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
									<td><button @click="showingeditModal = true; selectProducto(producto);" class="btn btn-warning">Edit</button></td>
									<td><button @click="showingdeleteModal = true; selectProducto(producto);" class="btn btn-danger">Delete</button></td>
								</tr>
								@empty
									<p>No hay categorias</p>
								@endforelse	
							</tbody>
						</table>
					</div>
				</div>

				<!-- add modal -->
				<div class="modal col-md-6" id="addmodal" v-if="showingaddModal">
						<div class="modal-head">
							<p class="p-left p-2">Agregar Categoria</p>
							<hr/>

							<div class="modal-body">
								<div class="col-md-12">
									<label for="nombre">Categoria</label>
									<input type="text" id="nombre" class="form-control" v-model="newProd.nombre">

									<label for="precio">id</label>
									<input type="text" id="id" class="form-control" v-model="newProd.precio">
								</div>

								<hr/>
								<button type="button" class="btn btn-success"  @click="showingaddModal = false; addProducto();">Guardar cambios</button>
								<button type="button" class="btn btn-danger"   @click="showingaddModal = false;">Cerrar</button>
							</div>
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
							<button type="button" class="btn btn-success"  @click="showingeditModal = false; updateProducto();">Guardar cambios</button>
							<button type="button" class="btn btn-danger"   @click="showingeditModal = false;">Cerrar</button>
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
							<button type="button" class="btn btn-danger"  @click="showingdeleteModal = false; deleteProducto();">Sí</button>
							<button type="button" class="btn btn-warning"   @click="showingdeleteModal = false;">No</button>
						</div>
					</div>
				</div>
					
			</section>
		</div>
	</div>
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
</body>
</html>