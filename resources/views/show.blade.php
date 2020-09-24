<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Venta</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" href="vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/admin/style.css">
	<script src="vendor/js/axios.min.js"></script>
</head>
<body>
	<div id="root">
		<div v-if="showAdmin">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<img src="" alt="">
			<a href="{{ route('home') }}"><h1 class="text-light">Style</h1></a>
			@if (Route::has('login'))
				<ul class="navbar-nav ml-auto">
					
						@auth
						<li class="nav-item active">
							<a href="{{ url('/home') }}">Home</a>
						</li>
						@else
						<li class="nav-item active">
							<a class="nav-link" href="{{ route('login') }}">Login<span class="sr-only">(actual)</span></a>
						</li>
							@if (Route::has('register'))

							<li class="nav-item active">
								<a class="nav-link" href="{{ route('register') }}">Register<span class="sr-only"></span></a>
							</li>
							@endif
						@endif	
				</ul>
			@endif
		</nav>
	</div>

			<!-- Categorias -->
			<div class="container lista-categorias text-center p-2 col-md-8">
                <a class="categoria-item btn btn-success p-2" href="{{ url('/show') }}" >Todo</a>
               <a class="categoria-item btn btn-success p-2 ml-2" href="/" >
                   Categorias
                </a>
            </div>

            <!-- Categorias -->



            <!-- Buscar -->
		
            <!-- Buscar fin -->

			<div class="container p-1">
				<div class="row">

					<div class="alert alert-danger col-md-6" id="alertMessage" role="alert" v-if="errorMessage">
						 errorMessage 
					</div>

					<div class="alert alert-success col-md-6" id="alertMessage" role="alert" v-if="successMessage">
						 successMessage 
					</div>
					<h3>Todo</h3>
					<table class="table table-striped">
						<thead class="thead-dark">
							<tr>
								<th>S/N</th>
								<th>Imagen</th>
								<th>Producto</th>
								<th>Precio</th>
								<th>Descripción</th>
								<th>Comprar</th>
							</tr>
						</thead>
						<tbody class="tbody-custom">
							@forelse ($productos as $product)
							<tr v-for="producto in filtrados">  <!-- importante de donde saca -->
								<td>{{$product->id}}</td>
								<td><img src="" alt="" height="60"></td>
								<td>{{$product->nombre}}</td>
								<td>{{$product->precioUnitario}}</td>
								<td>{{$product->descripcion}}</td>
								<td><button @click="addCarProd(producto);" class="btn btn-info">Vender</button></td>
							</tr>

						    @empty
						      <p> No hay productos </p>
						    @endforelse
						</tbody>
					</table>
				</div>
			</div>

			<!-- add modal -->
			<div class="modal col-md-6" id="addmodal" v-if="showingaddModal">
					<div class="modal-head">
						<p class="p-left p-2">Agregar Producto</p>
						<hr/>

						<div class="modal-body">
							<div class="col-md-12">
								<label for="nombre">Producto</label>
								<input type="text" id="nombre" class="form-control" v-model="newProd.nombre">

								<label for="precio">Precio</label>
								<input type="text" id="precio" class="form-control" v-model="newProd.precio">

								<label for="categoria">Categoría</label>
								<input type="text" id="categoria" class="form-control" v-model="newProd.categoria">

								<label for="descripcion">Descripción</label>
								<input type="text" id="descripcion" class="form-control" v-model="newProd.descripcion">
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
					<p class="p-left p-2">Editar producto</p>
					<hr/>

					<div class="modal-body">
						<div class="col-md-12">
							<label for="nombre">Producto</label>
							<input type="text" id="nombre" class="form-control" v-model="clickedProd.nombre">

							<label for="precio">Precio</label>
							<input type="text" id="precio" class="form-control" v-model="clickedProd.precio">

							<label for="categoria">Categoría</label>
							<input type="text" id="categoria" class="form-control" v-model="clickedProd.categoria">

							<label for="descripcion">Descripción</label>
							<input type="text" id="descripcion" class="form-control" v-model="clickedProd.descripcion">
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
		</div>

	<!-- Venta -->
	<div class="container">
		<div class="row">
			<div class="col-md-8 bg-secondary">
				<div class="p-4 text-center">
					<p class="display-4">
					Lista de compras	
					</p>
				</div>
				<div>
					<table class="table table-striped">
						<thead class="thead-dark">
							<tr>
								<th>S/N</th>
								<th>Nombre</th>
								<th>Cantidad</th>
								<th>Precio</th>
							</tr>
						</thead>
						<tbody class="tbody-custom">
							<tr v-for="producto in carrito">
								<td>producto.id</td>
								<td>producto.nombre</td>
								<td>producto.cant</td>
								<td>producto.precioUnitario</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="col-md-4 p-4 br">
				<div class="bg-light p-2">
					<div class="text-right">
						Cantidad de productos: getTotalProductos<br>
						Total a pagar: getTotalCarrito
						<p class="mb-1 border-bottom">
						<select name="select">
						  <option value="value1">Juan</option> 
						  <option value="value2" selected>Marina</option>
						  <option value="value3">Euge</option>
						</select>	
						</p class=""><a class="btn btn-warning" href="">Vender</a>
					</div>
				</div>
			</div>
		</div>
	</div>

	

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>