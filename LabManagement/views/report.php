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
		<li>
			<a href="items">
				<svg class="glyph stroked desktop">
					<use xlink:href="#stroked-desktop"/>
				</svg>
				Artículos
			</a>
		</li>
		<li>
			<a href="members">
				<svg class="glyph stroked male user">
					<use xlink:href="#stroked-male-user"/>
				</svg>
				Prestatarios
			</a>
		</li>
		<li>
			<a href="room">
				<svg class="glyph stroked app-window">
					<use xlink:href="#stroked-app-window"></use>
				</svg>
				Aulas
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
		<li class="active">
			<a href="#">
				<svg class="glyph stroked line-graph">
					<use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#stroked-line-graph"/>
				</svg>
				Gráfica
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
			<li class="active">Gráfica</li>
		</ol>
	</div><!--/.row-->

	<div class="row">
		<br/>
		<br/>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Artículos Prestados</h4>
				</div>
				<div class="panel-body">
					<div class="col-md-12" id="chartdiv" style="height: 500px;"></div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">Artículos Devueltos</h4>
				</div>
				<div class="panel-body">
					<div class="col-md-12" id="returndiv" style="height: 500px;"></div>
				</div>
			</div>
		</div>


			

    <div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Frecuencia de Uso</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="frequency" style="height: 500px;"></div>
        </div>
    </div>
</div>

<div class="col-md-12">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h4 class="panel-title">Inventario de Artículos</h4>
        </div>
        <div class="panel-body">
            <div class="col-md-12" id="inventory" style="height: 500px;"></div>
        </div>
    </div>
</div>

</div>

</div>

<?php include 'footer.php'; ?>

<script type="text/javascript">
	// Solicita datos para la gráfica de artículos prestados
	$.ajax({
		type: "POST",
		url: "../class/display/display",
		data: {
			key: "chart_borrow"
		}
	})
	.done(function(data){
		console.log(data);
		var provider = JSON.parse(data);
		var chart = AmCharts.makeChart("chartdiv", {
			"type": "serial",
			"theme": "light",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled": true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth": true
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
				"balloon": {
					"drop": true,
					"adjustBorderColor": false,
					"color": "#ffffff"
				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 5,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "línea roja",
				"useLineColorForBulletBorder": true,
				"valueField": "value",
				"balloonText": "<span style='font-size:18px;'>[[value]]</span>"
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis": false,
				"offset": 30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount": true,
				"color": "#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha": 1,
				"cursorColor": "#258cbb",
				"limitToGraph": "g1",
				"valueLineAlpha": 0.2,
				"valueZoomable": true
			},
			"valueScrollbar": {
				"oppositeAxis": false,
				"offset": 50,
				"scrollbarHeight": 10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": true
			},
			"export": {
				"enabled": true
			},
			"dataProvider": provider
		});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
	});
</script>

<!-- Script para mostrar el gráfico de devoluciones -->
<script type="text/javascript">
	$.ajax({
		type: "POST",
		url: "../class/display/display",
		data: {
			key: "chart_return" // clave que indica que se trata del gráfico de devoluciones
		}
	})
	.done(function(data){
		console.log(data);
		var provider = JSON.parse(data);
		var chart = AmCharts.makeChart("returndiv", {
			"type": "serial",
			"theme": "light",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled": true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth": true
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
				"balloon": {
					"drop": true,
					"adjustBorderColor": false,
					"color": "#ffffff"
				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 5,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "línea roja",
				"useLineColorForBulletBorder": true,
				"valueField": "value",
				"balloonText": "<span style='font-size:18px;'>[[value]]</span>"
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis": false,
				"offset": 30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount": true,
				"color": "#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha": 1,
				"cursorColor": "#258cbb",
				"limitToGraph": "g1",
				"valueLineAlpha": 0.2,
				"valueZoomable": true
			},
			"valueScrollbar": {
				"oppositeAxis": false,
				"offset": 50,
				"scrollbarHeight": 10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": true
			},
			"export": {
				"enabled": true
			},
			"dataProvider": provider
		});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
	});
</script>

<!-- Script para gráfico de inventario de artículos -->
<script>
$.ajax({
	type: "POST",
	url: "../class/display/display",
	data: {
		key: "chart_inventory" // clave para inventario
	}
})
.done(function(data){
	console.log(data);
	var provider = JSON.parse(data);
	var chart = AmCharts.makeChart("inventory", {
		"type": "pie",
		"startDuration": 0,
		"theme": "light",
		"addClassNames": true,
		"legend": {
			"position": "right",
			"marginRight": 100,
			"autoMargins": false
		},
		"innerRadius": "30%",
		"defs": {
			"filter": [{
				"id": "shadow",
				"width": "200%",
				"height": "200%",
				"feOffset": {
					"result": "offOut",
					"in": "SourceAlpha",
					"dx": 0,
					"dy": 0
				},
				"feGaussianBlur": {
					"result": "blurOut",
					"in": "offOut",
					"stdDeviation": 5
				},
				"feBlend": {
					"in": "SourceGraphic",
					"in2": "blurOut",
					"mode": "normal"
				}
			}]
		},
		"dataProvider": provider,
		"valueField": "litres",   // campo numérico
		"titleField": "country",  // campo para mostrar el nombre
		"export": {
			"enabled": true
		}
	});

	chart.addListener("init", handleInit);
	chart.addListener("rollOverSlice", function(e) {
		handleRollOver(e);
	});

	function handleInit(){
		chart.legend.addListener("rollOverItem", handleRollOver);
	}

	// Si deseas que el segmento se eleve al pasar el mouse, descomenta:
	/*
	function handleRollOver(e){
		var wedge = e.dataItem.wedge.node;
		wedge.parentNode.appendChild(wedge);
	}
	*/
});
</script>

<!-- Script para gráfico de frecuencia de uso -->
<script>
$.ajax({
	type: "POST",
	url: "../class/display/display",
	data: {
		key: "chart_frequency" // clave para frecuencia
	}
})
.done(function(data){
	console.log(data);
	var provider = JSON.parse(data);
	var chart = AmCharts.makeChart("frequency", {
		"type": "pie",
		"startDuration": 0,
		"theme": "light",
		"addClassNames": true,
		"legend": {
			"position": "right",
			"marginRight": 100,
			"autoMargins": false
		},
		"innerRadius": "30%",
		"defs": {
			"filter": [{
				"id": "shadow",
				"width": "200%",
				"height": "200%",
				"feOffset": {
					"result": "offOut",
					"in": "SourceAlpha",
					"dx": 0,
					"dy": 0
				},
				"feGaussianBlur": {
					"result": "blurOut",
					"in": "offOut",
					"stdDeviation": 5
				},
				"feBlend": {
					"in": "SourceGraphic",
					"in2": "blurOut",
					"mode": "normal"
				}
			}]
		},
		"dataProvider": provider,
		"valueField": "litres",
		"titleField": "country",
		"export": {
			"enabled": true
		}
	});

	chart.addListener("init", handleInit);
	chart.addListener("rollOverSlice", function(e) {
		handleRollOver(e);
	});

	function handleInit(){
		chart.legend.addListener("rollOverItem", handleRollOver);
	}

	// Descomentar si se quiere efecto de resalte:
	/*
	function handleRollOver(e){
		var wedge = e.dataItem.wedge.node;
		wedge.parentNode.appendChild(wedge);
	}
	*/
});
</script>
