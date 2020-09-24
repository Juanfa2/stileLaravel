<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	
	<div id="categoryModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">

				<form id="formAddCategory" class="form-signin" action="{{url('category/new')}}" method="post" enctype="multipart/form-data">
					@csrf
					<div class="modal-header">
						<h4 class="modal-title">Añadir producto</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

					</div>
					<div class="modal-body">
						<div class="form-group">
							<label for="exampleInputEmail1">Nombre</label>
							<input type="text" class="form-control" id="exampleInputEmail1" name="nombre" aria-describedby="emailHelp">
							<small id="emailHelp" class="form-text text-muted">Ingrese nombre de categoria.</small>
						</div>
						@if ($errors->has("nombre"))
						<small  class="text-danger"> {{ $errors->first("nombre") }}</small>
						@endif
					</div>
					<div class="modal-footer">

						<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</form>

			</div>
		</div>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>