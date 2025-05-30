<?php 
	include 'header.php';
?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 col-md-2 sidebar">
	<form role="search">
		<div class="form-group">
			<!-- <input type="text" class="form-control" placeholder="Buscar"> -->
		</div>
	</form>
	<ul class="nav menu">
		<li class="">
			<a href="dashboard">
				<svg class="glyph stroked dashboard-dial">
					<use xlink:href="#stroked-dashboard-dial"></use>
				</svg>
				Panel de Control
			</a>
		</li>
		<li class="parent">
			<a href="#sub-item-1" data-toggle="collapse">
				<span data-toggle="collapse" href="#sub-item-1">
					<svg class="glyph stroked chevron-down">
						<use xlink:href="#stroked-chevron-down"></use>
					</svg>
				</span>
				Transacciones
			</a>
			<ul class="children collapse" id="sub-item-1">
				<li>
					<a class="" href="reservation">
						<svg class="glyph stroked eye">
							<use xlink:href="#stroked-eye"/>
						</svg>
						Reservas
					</a>
				</li>
				<li>
					<a class="" href="new">
						<svg class="glyph stroked plus sign">
							<use xlink:href="#stroked-plus-sign"/>
						</svg>
						Nuevo
					</a>
				</li>
				<li>
					<a class="" href="borrow">
						<svg class="glyph stroked download">
							<use xlink:href="#stroked-download"/>
						</svg>
						Artículos Prestados
					</a>
				</li>
				<li>
					<a class="" href="return">
						<svg class="glyph stroked checkmark">
							<use xlink:href="#stroked-checkmark"/>
						</svg>
						Artículos Devueltos
					</a>
				</li>
			</ul>
		</li>
		<?php if($_SESSION['admin_type'] == 1){ ?>
		<li class="active">
			<a href="#">
				<svg class="glyph stroked desktop">
					<use xlink:href="#stroked-desktop"/>
				</svg>
				Artículo
			</a>
		</li>
		<li>
			<a href="members">
				<svg class="glyph stroked male user ">
					<use xlink:href="#stroked-male-user"/>
				</svg>
				Solicitantes
			</a>
		</li>
		<li>
			<a href="room">
				<svg class="glyph stroked app-window">
					<use xlink:href="#stroked-app-window"></use>
				</svg>
				Ambientes
			</a>
		</li>
		<li>
			<a href="inventory">
				<svg class="glyph stroked clipboard with paper">
					<use xlink:href="#stroked-clipboard-with-paper"/>
				</svg>
				Inventario
			</a>
		</li>
		<li>
			<a href="report">
				<svg class="glyph stroked line-graph">
					<use xlink:href="#stroked-line-graph"/>
				</svg>
				Gráficas
			</a>
		</li>
		<li>
			<a href="user">
				<svg class="glyph stroked female user">
					<use xlink:href="#stroked-female-user"/>
				</svg>
				Usuarios
			</a>
		</li>
		<?php 
			}
			($_SESSION['admin_type'] == 1) ? include('include_history.php') : false;
		?>
	</ul>
</div><!--/.sidebar-->

<div class="col-sm-9 col-lg-10 col-md-10 col-lg-offset-2 col-md-offset-2 col-sm-offset-3 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active">Artículo</li>
		</ol>
		<div class="breadcrumb">
			<button class="btn btn-primary col-sm-offset-10 add_equipment">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg> &nbsp;
				Agregar Artículo
			</button>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered table_equipment">
						<thead>
							<tr>

							<th>Imagen</th>
<th>Modelo</th>
<th>Categoría</th>
<th>Marca</th>
<th>Descripción</th>
<th>Cantidad</th>
<th>Cantidad Disponible</th>
<th>Estado</th>
<th>Acción</th>
</tr>
</thead>
</table>
</div>
</div><!-- panel -->
</div><!-- panel -->
</div>
</div>

<div class="right-sidebar equipment-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<h4 class="alert bg-success">
				<svg class="glyph stroked plus sign">
					<use xlink:href="#stroked-plus-sign"/>
				</svg>
				Agregar Artículo
			</h4>
			<form class="frm_addequipment" enctype="multipart/form-data">
				<input type="hidden" name="key" value="add_equipment" />
				
				<div class="form-group">
					<label>ID del Dispositivo</label>
					<input type="text" name="e_number" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Modelo</label>
					<input type="text" name="e_model" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Categoría</label>
					<select name="e_category" class="form-control" required>
						<option selected disabled>Seleccione una categoría</option>
						<option>Mouse</option>
						<option>Teclado</option>
						<option>Monitor</option>
						<option>Proyector</option>
						<option>Control Remoto</option>
						<option>Pantalla DLP</option>
						<option>Aire Acondicionado</option>
						<option>Televisor</option>
						<option>AVR</option>
						<option>Extensión</option>
						<option>UPS</option>
						<option>Router</option>
						<option>Mesa</option>
						<option>Silla</option>
						<option>Switch Hub</option>
					</select> 
				</div>
				
				<div class="form-group">
					<label>Marca</label>
					<input type="text" name="e_brand" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Descripción</label>
					<textarea name="e_description" class="form-control" required></textarea>
				</div>
				
				<div class="form-group">
					<label>Cantidad</label>
					<input type="number" name="e_stock" class="form-control" min="1" required>
				</div>
				
				<div class="form-group hide">
					<label>Asignar Ambiente</label>
					<select name="e_assigned" class="form-control" required>
					</select>
				</div>
				
				<div class="form-group">
					<label>Tipo</label>
					<select type="text" name="e_type" class="form-control" required>
						<option disabled selected>Seleccione un tipo</option>
						<option>Consumible</option>
						<option>No consumible</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>Estado</label>
					<select name="e_status" class="form-control" required>
						<option disabled selected>Seleccione estado</option>
						<option value="1">Nuevo</option>
						<option value="2">Usado</option>
					</select>
				</div>
				
				<div class="form-group">
					<label>MR</label>
					<input type="text" name="e_mr" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Precio</label>
					<input type="text" name="e_price" class="form-control" required>
				</div>
				
				<div class="form-group">
					<label>Foto</label>
					<input type="file" name="e_photo" class="form-control" required />
				</div>
				
				<div class="form-group">
					<div class="row">
						<div class="col-md-6 col-sm-12 col-xs-12">
							<button class="btn btn-danger btn-block cancel-equipment" type="button">
								<i class="fa fa-remove"></i>
								CANCELAR
							</button>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12">
							<button class="btn btn-primary btn-block" type="submit">
								AGREGAR
								<i class="fa fa-check"></i>
							</button>
						</div>
					</div>
				</div>
				
				<br><br><br>
			</form>
		</div>
	</div>
</div>

<div class="right-sidebar equipment-view">
	<div class="sidebar-form equipment-form">
	</div>
</div>

<?php include 'footer.php'; ?>
