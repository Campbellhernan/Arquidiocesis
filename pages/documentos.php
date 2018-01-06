<?php
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
?>

<div class="row" style="margin-top:20px">
	<div class='col-lg-12'>
		<div class="panel panel-success" style="border-left:none; border-right:none;">
			<div class="panel-heading" style="border-left:1px #DDD solid; border-right:1px #DDD solid;">
				<?php if($_SESSION['rol']=='Administrador'){//tiene permiso para agregar documento
				?>
				<button id='create-doc' style='color:black' class='btn btn-primary'>Crear Nuevo</button>
				<?php } ?>
				<select name="filasPP" id="filasPPDoc" style="width:80px">
					<option value="5">5</option>
					<option value="10">10</option>
					<option value="20">20</option>
					<option value="50">50</option>
					<option value="100">100</option>
					<!--<option value="0">Todos</option>-->
				</select>
			</div>
			<div class="panel-body">
				<div class="row" id="busquedaDocumento" style="/*display: none*/">
					<div class="col-lg-12">
						<div class="panel panel-default">
							<div class="panel-heading">
								Busqueda
							</div>
							<div class="panel-body">
								<form role="form" id="form1" name="form1">
									<div id="camposDoc" style="margin-bottom:10px;">
										<p id="errorBusqDoc" style="color:red"></p>
										<div style="display: inline-block; width:32%;">
											<p><label>Tipo</label></p>
											<select name="tipo_documento" id="tipo_documento" class="form-control">
												<option value="ningun" size="10">Todos</option>
												<?php
													obtTiposDocs();
												?>
											</select>
										</div>
										<div style="display: inline-block; width:32%;">
											<div class="form-group">
												<label>Desde</label>
												<input class="form-control" readonly="true" id="desdePicker" name="desdePicker" type="text" placeholder="Desde">
											</div>
											<input type="hidden" id="desde" name="desde">
										</div>
										<div style="display: inline-block; width:32%;">
											<div class="form-group">
												<label>Hasta</label>
												<input class="form-control" readonly="true" id="hastaPicker" name="hastaPicker" type="text" placeholder="Hasta">
											</div>
											<input type="hidden" id="hasta" name="hasta">
										</div>
									</div>
									<!-- / camposDoc -->
									<!--<p style="color:red;" id="errorFecha"></p>
									<div id="ubicacion" style="margin-bottom:30px;">
										<div style="display: inline-block; width:49%; ">
											<p><label>Archiprestazgo</label></p>
											<select name="archiprestazgo" id="archiprestazgo" class="form-control">
												<option value="ningun">Seleccionar</option>
												<?php include 'selectArchiprestazgos.php'; ?>
											</select>
										</div>
										<div style="display: inline-block; width:49%;">
											<p><label>Parroquia</label></p>
											<select name="parroquia" id="parroquia" class="form-control">
												<option value="ningun">Seleccionar...</option>
											</select>
										</div>
									</div>-->
									<!-- / ubiacion -->
									<!--<div class="form-group">
										<label>Direccion</label>
										<input class="form-control" id="direccion" name="direccion" type="text" placeholder="Direccion">
									</div>-->
									<button id="buscarDoc" type="button" class="btn btn-primary">Buscar</button>
									<button type="reset" class="btn btn-default">Reset</button>
									<button style="margin-left:80px" id="ver_todos_doc" type="button" class="btn btn-success">Ver Todos</button>
								</form>
							</div>
						</div>
					</div>
					<!-- /.col-lg-6 (nested) -->
				</div>
				<!-- /.row (nested) -->
				<div class="row">
					<div class="col-lg-12" id="mostrarDocumentos">
						<?php require_once('listarDocumentos.php'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- /.row mostrar -->
