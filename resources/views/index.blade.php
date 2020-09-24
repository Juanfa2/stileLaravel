@extends("layouts/layout")

@section("contenido")
<div class="container p-4">
	<div class="row bg-dark">
		<div class="col-md-2 p-4 mb-2">
			<div class="float-left mr-4 mb-2">
				<a href="{{ url('/show') }}" class="btn btn-info"><p>Venta</p></a>
			</div>
			<div class="float-left mr-4 mb-2">
				<a href="" class="btn btn-secondary"><p>Notas</p></a>
			</div>
			<div class="float-left mr-4 mb-2">
				<a href="" class="btn btn-success"><p>Venta Diaria</p></a>
			</div>
			<div class="float-left mr-4 mb-2">
				<a href="/admin" class="btn btn-danger"><p>Admin</p></a>
			</div>
			<div class="float-left mr-4 mb-2">
				<a href="admin.php" class="btn btn-danger"><p>Compras del negocio</p></a>
			</div>
		</div>
		@forelse($categorias as $category)
		<div class="col-md-2">
			@if($category->visible == 1)
			<div id="root" class="p-4">
				<div class="row">
					<div v-for="cat in categorias" class="card text-center ml-2">
						<div class="card-title">
							<p class="">{{ $category->nombre }}</p>
						</div>
						<div class="card-body">
							<a href="venta.php">
								<img src="/storage/img/categorias/{{$category->id}}.jpg" width="120px" height="200px" class="img-responsive">
							</a>
						</div>
						<div class="footer">
							<a href="/category/{{$category->id}}" class="btn btn-warning">Ver {{$category->nombre}}</a>
						</div>
					</div>
				</div>
			</div>
			@endif
			
		</div>
		@empty
		<p>No hay categorias</p>
		@endforelse	
	</div>
	
</div>
@endsection
