@extends("layouts/layout")
@section("contenido")
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
							<td><img src="/storage/img/{{$producto->id}}.jpg" alt="" height="60"></td>
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
								<th>Imagen</th>
								<th>Edit</th>
								<th>Delete</th>
							</tr>
						</thead>
						<tbody class="tbody-custom">
							@forelse($categorias as $cat)
							
							<tr v-for="cat in categorias">
								<td>{{$cat->id}}</td>
								<td>{{$cat->nombre}}</td>
								<td><img src="/storage/img/categorias/{{$cat->id}}.jpg" alt="" height="60"></td>
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
@endsection	
<!--
https://www.youtube.com/watch?v=DAitIOhxOOA
-->

<!-- VENTANA EMERGENTE, CREAR PRODUCTO -->
@include('product/newProduct')

<!-- ELIMINAR PRODUCTO-->
@include('product/deleteProduct')		

<!--EDITAR PRODUCTO-->
@include('product/editProduct')		

<!--AGREGAR CATEGORIA-->
@include('category/newCategory')

<!--EDITAR CATEGORIA-->
@include('category/editCategory')

<!--ELIMINAR CATEGORIA-->
@include('category/deleteCategory')
