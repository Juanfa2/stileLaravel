
<div class="modal fade modal-danger" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
				

			<form id="formAddCategory" class="form-signin" action="{{url('product/delete')}}" method="post" enctype="multipart/form-data">
				@csrf
				<div class="modal-header">
					<h4 class="modal-title">Eliminar producto</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

				</div>
				<div class="modal-body">
					<p class="text-center">¿ Seguro que desea eliminarlo ?</p>
					<p class="text-center" id="nombre_id"></p>

					<input type="hidden" name="product_id" id="prod_id" value="">

				</div>
				<div class="modal-footer">

					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</div>
			</form>

		</div>
	</div>
</div>


