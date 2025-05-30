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
				Panel Principal
			</a>
		</li>
		<li class="parent ">
			<a href="#sub-item-1" data-toggle="collapse">
				<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span> Transacciones
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
				Usuario/Prestatario
			</a>
		</li>
		<li>
			<a href="room">
				<svg class="glyph stroked app-window">
					<use xlink:href="#stroked-app-window"></use>
				</svg>
				Sala
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
				Gráfica
			</a>
		</li>
		<li>
			<a href="user">
				<svg class="glyph stroked female user">
					<use xlink:href="#stroked-female-user"/>
				</svg>
				Usuario
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
			<li class=""><a href="items">Artículos</a></li>
			<li class="active">Información del Artículo</li>
		</ol>
		<div class="breadcrumb">
			<button class="btn btn-primary item-add" type="button">
				<i class="fa fa-plus"></i>
				Agregar Cantidad
			</button>
			<button class="btn btn-primary item-edit" type="button">
				<i class="fa fa-edit"></i>
				Editar Artículo
			</button>
			<button class="btn btn-primary item-change" type="button">
				<i class="fa fa-arrows-alt"></i>
				Cambiar Estado
			</button>
		</div>
	</div><!--/.row-->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table ">
						<thead>
						
						</thead>
						<tbody>
							<tr>
								<td style="text-align:center;" class="e_photo" ></td>
							</tr>
							<tr>
								<td class="success col-sm-6">ID de Serie / ID del Dispositivo</td>
								<td class="e_id"></td>
							</tr>
							<tr>
								<td class="col-sm-6">Modelo</td>
								<td class="e_model"></td>
							</tr>
							<tr>
								<td class="success col-sm-6">Categoría</td>
								<td class="e_category"></td>
							</tr>
							<tr>
								<td class="col-sm-6">Marca</td>
								<td class="e_brand"></td>
							</tr>
							<tr>
								<td class="success col-sm-6">Descripción</td>
								<td class="e_description"></td>
							</tr>
							<tr>
								<td class="col-sm-6">Cantidad</td>
								<td class="e_stock"></td>
							</tr>
							<tr>
								<td class="success col-sm-6">Cantidad Disponible</td>
								<td class="e_stockleft"></td>
							</tr>
							<!-- <tr>
								<td class="col-sm-6">Asignar Sala</td>
								<td class="e_assign"></td>
							</tr> -->
							<tr>
								<td class="col-sm-6">Tipo</td>
								<td class="e_type"></td>
							</tr>
							<tr>
								<td class="success col-sm-6">Estado</td>
								<td class="e_status"></td>
							</tr>
							<tr>
								<td class="col-sm-6">MR</td>
								<td class="e_mr"></td>
							</tr>
							<tr>
								<td class="success col-sm-6">Precio por Artículo</td>
								<td class="e_price"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->
	</div>
</div>

<div class="right-sidebar equipment-info">
	<div class="sidebar-form">
		<div class="container-fluid equipment-forminfo"></div>
	</div>
</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
	var id = '<?php echo $_GET["item"]; ?>';
	equipment_info(id);
	function getequipmentid(){
		return id;
	}
</script>
