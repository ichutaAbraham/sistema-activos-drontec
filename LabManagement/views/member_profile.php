<?php 
include 'header.php';
?>

<!-- Barra lateral -->
<div id="sidebar-collapse" class="col-sm-2 col-md-2 col-lg-2 sidebar">
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
				<span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked chevron-down"><use xlink:href="#stroked-chevron-down"></use></svg></span>
				Transacción
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
		<li>
			<a href="items">
				<svg class="glyph stroked desktop">
					<use xlink:href="#stroked-desktop"/>
				</svg>
				Artículo
			</a>
		</li>
		<li class="active">
			<a href="#">
				<svg class="glyph stroked male user ">
					<use xlink:href="#stroked-male-user"/>
				</svg>
				Prestatario
			</a>
		</li>
		<li>
			<a href="room">
				<svg class="glyph stroked app-window">
					<use xlink:href="#stroked-app-window"></use>
				</svg>
				Aula
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
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-line-graph"/>
				</svg>
				Gráfico
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

<!-- Contenido principal -->
<div class="col-sm-10 col-sm-offset-2 col-md-10 col-md-offset-2 col-lg-10 col-lg-offset-2 main">	
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="dashboard"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
			<li class="active"><a href="members">Prestatario</a></li>
			<li class="active"><?php echo $_GET['name'];?> - Perfil</li>
		</ol>
	</div><!--/.row-->

	<!-- Tabla de historial de préstamos -->
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered tbl_member_profile">
						<thead>
							<tr>
								<th>Fecha del Préstamo</th>
								<th>Artículos Prestados</th>
								<th>Aula</th>
								<th>Estado</th>
							</tr>
						</thead>
					</table>
				</div>
			</div><!-- panel -->
		</div><!-- panel -->
	</div><!-- row -->
</div>

<!-- Barra lateral derecha - Agregar miembro -->
<div class="right-sidebar member-side">
	<div class="sidebar-form">
		<div class="container-fluid">
			<h4 class="alert bg-success">Agregar Miembro</h4>
			<div class="form-group">
				<a class="btn btn-primary btn-block" target="_blank" download="member_format.csv" href="../assets/downloadables/member_format.csv">
					<i class="fa fa-download"></i>
					Descargar Formato
				</a>
			</div>
			<form class="frm_addmember" enctype="multipart/form-data">
				<div class="form-group">
					<label>Subir Archivo</label>
					<input type="file" name="file" class="form-control" required>
					<input type="hidden" name="key" value="add_member">
				</div>
				<div class="form-group">
					<button class="btn btn-danger cancel_member" type="button">Cancelar</button>
					<button class="btn btn-success" type="submit">Subir</button>
				</div>
			</form>	
		</div>
	</div>
</div>

<!-- Panel de edición de miembro -->
<div class="right-sidebar divedit-member">
	<div class="container-fluid">
		<br>
		<br>
		<div class="member-form"></div>
	</div>
</div>

<?php include 'footer.php'; ?>

<!-- Script para cargar perfil del miembro -->
<script type="text/javascript">
	var id = '<?php echo $_GET['id']; ?>';
	console.log(id);
	member_profile(id);
</script>
