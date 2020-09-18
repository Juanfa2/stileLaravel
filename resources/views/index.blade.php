<!DOCTYPE html>
<html>
	<meta charset="UTF-8">
	<title>Venta</title>
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="vendor/js/axios.min.js"></script>
<head>
	<title></title>
</head>
<body>
	<!-- Navbar -->
	<div v-if="showAdmin">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<img src="" alt="">
			<h1 class="text-light">Style</h1>
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
	<!-- Navbar fin -->
	<!-- Slider -->	
	<!-- Slider fin-->	
	
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
				
				<div id="root" class="p-4">
					<div class="row">
						<div v-for="cat in categorias" class="card text-center ml-2">
							<div class="card-title">
								<p class="">{{ $category->nombre }}</p>
							</div>
							<div class="card-body">
								<a href="venta.php">
									<img :src="" class="img-responsive">
								</a>
							</div>
							<div class="footer">
								<a href="/category/{{$category->id}}" class="btn btn-warning">Ver {{$category->nombre}}</a>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			@empty
				<p>No hay categorias</p>
			@endforelse	
		</div>
		
	</div>
	<!-- Mi Presentacion -->
	<!-- Mi Presentacion fin-->

	<!-- Show Productos -->
	<!-- Show Productos End-->


	<!-- Redes -->
	<!-- Redes End-->	
<footer class="text-light">
	<div class="text-center bg-dark">
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae dolorum quo assumenda totam, id aperiam, voluptatem beatae ipsum non, velit, delectus accusamus. Voluptas a at, ad tempore repellendus? Officia, voluptas!</p>
	</div>
	<div class="text-center text-dark">
		<p class="display-6">Copy Cop 2020 Dert Desing</p>
	</div>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>