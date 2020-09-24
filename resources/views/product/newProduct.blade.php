
<div id="productModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="formAddProduct" class="form-signin" action="{{url('new')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Añadir producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">
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

				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>
			</form>

		</div>
	</div>
</div>
