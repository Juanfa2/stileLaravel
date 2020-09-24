<div id="edit" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">

			<form id="formAddProduct" class="form-signin" action="{{url('product/edit')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<input type="hidden" name="product_id" id="prod_id" value="">
				<div class="modal-header">
					<h4 class="modal-title">Añadir producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="name">Nombre</label>
						<input type="text" id="name" class="form-control" name="nombre" aria-describedby="emailHelp" >
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					@if ($errors->has("nombre"))
					<small  class="text-danger"> {{ $errors->first("precio") }}</small>
					@endif
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<textarea class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
					</div>
					@if ($errors->has("descripcion"))
					<small  class="text-danger"> {{ $errors->first("precio") }}</small>
					@endif
					<div class="form-group">
						<label for="precio">Precio Unitario</label>
						<input type="text" name="precio" class="form-control" id="precio">
						<small id="emailHelp" class="form-text text-muted">El precio deber ser numerico.</small>
					</div>
					@if ($errors->has("precio"))
					<small  class="text-danger"> {{ $errors->first("precio") }}</small>
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