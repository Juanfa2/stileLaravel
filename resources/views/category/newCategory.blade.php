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

