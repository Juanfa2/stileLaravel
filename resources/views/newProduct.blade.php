<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	
	<div class="container">
		<form id="formAddProduct" class="form-signin" action="{{url('new')}}" method="POST" enctype="multipart/form-data">
		@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Nombre</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" name="nombre" aria-describedby="emailHelp">
		    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
		  </div>
		  @if ($errors->has("nombre"))
       		<small  class="text-danger"> {{ $errors->first("precio") }}</small>
       		@endif
		  <div class="form-group">
		    <label for="exampleFormControlTextarea1">Descripcion</label>
		    <textarea class="form-control" name="descripcion" id="exampleFormControlTextarea1" rows="3"></textarea>
		  </div>
		  @if ($errors->has("descripcion"))
       <small  class="text-danger"> {{ $errors->first("precio") }}</small>
       @endif
		  <div class="form-group">
		    <label for="exampleInputPassword1">Precio Unitario</label>
		    <input type="text" name="precio" class="form-control" id="exampleInputPassword1">
		  </div>
		  @if ($errors->has("precio"))
       <small  class="text-danger"> {{ $errors->first("precio") }}</small>
       @endif
		  <select id="categoria" name="categoria" class="custom-select">
	        <option value="" selected>Open this select menu</option>
	        @foreach($categorias as $categoria)
	            <option value="{{$categoria->id}}"> {{$categoria->nombre}}</option>
	        @endforeach
	      </select>
	        @if ($errors->has("categoria"))
	            <small  class="text-danger"> {{ $errors->first("categoria") }}</small>
	        @endif
		  <button type="submit" class="btn btn-primary">Submit</button>
		</form>
		<a href="{{ URL::previous() }}">Volver</a>
	</div>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>