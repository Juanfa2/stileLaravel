<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<title>Venta</title>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
<script src="vendor/js/axios.min.js"></script>
@yield("links")
<head>
	<title></title>
</head>
<body>
	<!-- Navbar -->
	<div v-if="showAdmin">
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<img src="" alt="">
			<a href="{{ route('home') }}"><h1 class="text-light">Style</h1></a>
			@if (Route::has('login'))
			<ul class="navbar-nav ml-auto">

				@auth
				<li class="nav-item active">
					<a href="{{ route('home') }}">Home</a>
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

	<!-- COTENIDO -->
	@yield("contenido")


	<!-- FOOTER -->
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