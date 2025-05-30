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
					Tablero
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
							Préstamos
						</a>
					</li>
					<li>
						<a class="" href="return">
							<svg class="glyph stroked checkmark">
								<use xlink:href="#stroked-checkmark"/>
							</svg>
							Devoluciones
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
			<li>
				<a href="members">
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
					Sala
				</a>
			</li>
			<li class="active">
				<a href="#">
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
				<li class="active">Inventario</li>
			</ol>
			<div class="breadcrumb">
				<div class="row">
					<div class="col-md-12">
						<ul class="nav nav-pills">
							<li class="active"><a href="#new" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Nuevo</a></li>
							<li><a href="#old" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Usado</a></li>
							<li><a href="#lost" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Perdido</a></li>
							<li><a href="#damaged" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Dañado</a></li>
							<li><a href="#pulledout" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Total de Artículos</a></li>
							<li><a href="#transferred" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Transferidos</a></li>
							<li><a href="#report2" data-toggle="tab"><i class=""></i>&nbsp;&nbsp;Prestados</a></li>
						</ul>
					</div>
					<!-- <div class="col-md-2">
						<button class="btn btn-primary add_equipment ">
							<svg class="glyph stroked plus sign">
								<use xlink:href="#stroked-plus-sign"/>
							</svg> &nbsp;
							Agregar Equipo
						</button>
					</div> -->
				</div>
			</div>
		</div><!--/.row-->


		<div class="row">
			<div class="col-lg-12">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="tab-content">
							<div class="tab-pane fade in active" id="new">
								<table class="table table_inventory_new">
									<thead>
										<tr>
											<th>Modelo</th>
											<th>Categoría</th>
											<th>Marca</th>
											<th>Cantidad</th>
											<th>Cantidad Disponible</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tab-pane fade" id="old">
								<table class="table table_inventory_old">
									<thead>
										<tr>
											<th>Modelo</th>
											<th>Categoría</th>
											<th>Marca</th>
											<th>Cantidad</th>
											<th>Cantidad Disponible</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tab-pane fade" id="lost">
								<table class="table table_inventory_lost">
									<thead>
										<tr>
											<th>Modelo</th>
											<th>Categoría</th>
											<th>Marca</th>
											<th>No. de artículos</th>
											<th>Observaciones</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tab-pane fade" id="damaged">
								<table class="table table_inventory_damaged">
									<thead>
										<tr>
											<th>Modelo</th>
											<th>Categoría</th>
											<th>Marca</th>
											<th>No. de artículos</th>
											<th>Observaciones</th>
										</tr>
									</thead>
								</table>
							</div>
							<div class="tab-pane fade" id="pulledout">
								<table class="table table_inventory_all">
									<thead>
										<tr>
											<th>Categoría</th>
											<th>Nuevo</th>
											<th>(Usado / Dañado / Perdido / Prestado / Transferido)</th>
											<th>Total</th>
										</tr>
									</thead>
								</table>
							</div>
							
							<div class="tab-pane fade" id="transferred">
								<div class="row">
									<div class="col-sm-1 pull-right">
										<div class="form-group text-right">
											<button type="button" class="btn btn-primary" id="btnReloadTransferredList">Recargar Lista</button>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectYearTransferred" class="form-control">
												<option value="">Mostrar Todo</option>
												<?php
												$currentYear = date('Y');
												for($i = $currentYear; $i >= ($currentYear - 15); $i--): 
												?>
													<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
									<div class="col-sm-3 pull-right">
										<div class="form-group">
											<select id="selectMonthTransferred" class="form-control">
												<option value="">Mostrar Todo</option>
												<?php 
												$monthArr = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
												for($i = 0; $i < 12; $i++): 
													$month = ($i + 1);
												?>
													<option value="<?php echo $month; ?>"><?php echo $monthArr[$i]; ?></option>
												<?php endfor; ?>
											</select>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<table class="table table_inventory_transfer">

										<thead>
	<tr>
		<th>Modelo</th>
		<th>Categoría</th>
		<th>Marca</th>
		<th>No. de artículos</th>
		<th>Salón</th>
		<th>Encargado</th>
		<th>Usuario</th>
		<th>Fecha de Transferencia</th>
	</tr>
</thead>
</table>
</div>
</div>
</div>

<div class="tab-pane fade" id="report2">
	<div class="row">
		<div class="col-sm-1 pull-right">
			<div class="form-group text-right">
				<button type="button" class="btn btn-primary" id="btnReloadList">Recargar Lista</button>
			</div>
		</div>
		<div class="col-sm-3 pull-right">
			<div class="form-group">
				<select id="selectYear" class="form-control">
					<option value="">Mostrar Todo</option>
					<?php
					$currentYear = date('Y');
					for($i = $currentYear; $i >= ($currentYear - 15); $i--): 
					?>
						<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>
		<div class="col-sm-3 pull-right">
			<div class="form-group">
				<select id="selectMonth" class="form-control">
					<option value="">Mostrar Todo</option>
					<?php 
					$monthArr = array("Ene","Feb","Mar","Abr","May","Jun","Jul","Ago","Sep","Oct","Nov","Dic");
					for($i = 0; $i < 12; $i++): 
						$month = ($i + 1);
					?>
						<option value="<?php echo $month; ?>"><?php echo $monthArr[$i]; ?></option>
					<?php endfor; ?>
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<table class="table tbl_return">
				<thead>										
					<tr>										 
						<th>Prestatario</th>
						<th>Artículos</th>
						<th>Fecha de Préstamo</th>
						<th>Fecha de Devolución</th>
					</tr>
				</thead>
			</table>
		</div>
	</div>
</div>
</div>
</div>
</div><!-- panel -->
</div><!-- panel -->
</div><!-- row -->


</div>

<?php include 'footer.php'; ?>
