@extends("layouts/layout")

@section("contenido")
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
				@if($product->visible == 1)
				<tr v-for="producto in filtrados">  <!-- importante de donde saca -->
					<td>{{$product->id}}</td>
					<td><img src="" alt="" height="60"></td>
					<td>{{$product->nombre}}</td>
					<td>{{$product->precioUnitario}}</td>
					<td>{{$product->descripcion}}</td>
					<td><button class="btn btn-info">Vender</button></td>
				</tr>
				@endif
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
			<button type="button" class="btn btn-success" >Guardar cambios</button>
			<button type="button" class="btn btn-danger"   >Cerrar</button>
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
			<button type="button" class="btn btn-warning"   >No</button>
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
@endsection