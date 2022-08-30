<!DOCTYPE html>
<html>
<?php require_once('app/partials/head.php') ?>


<body class="with-side-menu control-panel control-panel-compact">
	<?php require_once('app/partials/header.php') ?>


	<?php require_once('app/partials/nav.php') ?>

	<div class="page-content">
		<div class="container-fluid">
			<div class="row">

				<div class="col-xl-12">
					<div class="row">
						<div class="col-sm-6">
							<article class="statistic-box red">
								<div>
									<div class="number"><?= count($Articles->getArticles(1)) ?></div>
									<div class="caption">
										<div>Aktif Makale</div>
									</div>
								</div>
							</article>
						</div>
						<!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box purple">
								<div>
									<div class="number"><?= count($Articles->getArticles(0)) ?></div>
									<div class="caption">
										<div>Silinen Makale</div>
									</div>
								</div>
							</article>
						</div>
						<!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box yellow">
								<div>
									<div class="number"><?= count($Categories->getCategories(1)) ?></div>
									<div class="caption">
										<div>Aktif Kategori</div>
									</div>
								</div>
							</article>
						</div>
						<!--.col-->
						<div class="col-sm-6">
							<article class="statistic-box green">
								<div>
									<div class="number"><?= count($Users->getUsers(1)) ?></div>
									<div class="caption">
										<div>Kayıtlı Kullanıcı</div>
									</div>
								</div>
							</article>
						</div>
						<!--.col-->
					</div>
					<!--.row-->
				</div>
				<!--.col-->
			</div>
			<!--.row-->

			<div class="row">
				<div class="col-xl-6 dahsboard-column">
					<section class="box-typical box-typical-dashboard panel panel-default scrollable">
						<header class="box-typical-header panel-heading">
							<h3 class="panel-title">Son Yazılar</h3>
						</header>
						<div class="box-typical-body panel-body">
							<table class="tbl-typical">
								<tr>
									<th>
										<div>Durum</div>
									</th>
									<th>
										<div>Makale Başlığı</div>
									</th>
									<th align="center">
										<div>Eklenme Tarihi</div>
									</th>
								</tr>


								<?php
								$getCategories = $Articles->getArticles(1);
								foreach ($getCategories as $dataArticle) :
								?>

									<tr>
										<td>
											<span class="label label-success">Aktif</span>
										</td>
										<td><?= $dataArticle['title'] ?></td>
										<td class="color-blue-grey" nowrap align="center"><span class="semibold"><?= $dataArticle['date_added'] ?></span></td>
									</tr>
								<?php endforeach; ?>
							</table>
						</div>
						<!--.box-typical-body-->
					</section>
					<!--.box-typical-dashboard-->

				</div>

				<div class="col-xl-6 dashboard-column">
					<section class="box-typical box-typical-dashboard panel panel-default scrollable">
						<header class="box-typical-header panel-heading">
							<h3 class="panel-title">Son Kayıt Olan Kullanıcılar</h3>
						</header>
						<div class="box-typical-body panel-body">
							<table class="tbl-typical">
								<tr>
									<th>
										<div>Durum</div>
									</th>
									<th>
										<div>Ad Soyad</div>
									</th>

									<th align="center">
										<div>Eklenme Tarihi</div>
									</th>
								</tr>

								<?php
								foreach ($Users->getUsers(1) as $dataUser) :
								?>

									<tr>
										<td>
											<span class="label label-success">Aktif</span>
										</td>
										<td><?= $dataUser['name_surname'] ?></td>
										<td class="color-blue-grey" nowrap align="center"><span class="semibold"><?= $dataUser['date_added'] ?></span></td>
									</tr>

								<?php endforeach; ?>

							</table>
						</div>
						<!--.box-typical-body-->
					</section>
				</div>
				<!--.col-->
			</div>
		</div>
		<!--.container-fluid-->
	</div>
	<!--.page-content-->


	<script src="js/lib/jquery/jquery-3.2.1.min.js"></script>
	<script src="js/lib/popper/popper.min.js"></script>
	<script src="js/lib/tether/tether.min.js"></script>
	<script src="js/lib/bootstrap/bootstrap.min.js"></script>
	<script src="js/plugins.js"></script>

	<script type="text/javascript" src="js/lib/jqueryui/jquery-ui.min.js"></script>
	<script type="text/javascript" src="js/lib/lobipanel/lobipanel.min.js"></script>
	<script type="text/javascript" src="js/lib/match-height/jquery.matchHeight.min.js"></script>
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script>
		$(document).ready(function() {
			$('.panel').each(function() {
				try {
					$(this).lobiPanel({
						sortable: true
					}).on('dragged.lobiPanel', function(ev, lobiPanel) {
						$('.dahsboard-column').matchHeight();
					});
				} catch (err) {}
			});

			google.charts.load('current', {
				'packages': ['corechart']
			});
			google.charts.setOnLoadCallback(drawChart);

			function drawChart() {
				var dataTable = new google.visualization.DataTable();
				dataTable.addColumn('string', 'Day');
				dataTable.addColumn('number', 'Values');
				// A column for custom tooltip content
				dataTable.addColumn({
					type: 'string',
					role: 'tooltip',
					'p': {
						'html': true
					}
				});
				dataTable.addRows([
					['MON', 130, ' '],
					['TUE', 130, '130'],
					['WED', 180, '180'],
					['THU', 175, '175'],
					['FRI', 200, '200'],
					['SAT', 170, '170'],
					['SUN', 250, '250'],
					['MON', 220, '220'],
					['TUE', 220, ' ']
				]);

				var options = {
					height: 314,
					legend: 'none',
					areaOpacity: 0.18,
					axisTitlesPosition: 'out',
					hAxis: {
						title: '',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						textPosition: 'out'
					},
					vAxis: {
						minValue: 0,
						textPosition: 'out',
						textStyle: {
							color: '#fff',
							fontName: 'Proxima Nova',
							fontSize: 11,
							bold: true,
							italic: false
						},
						baselineColor: '#16b4fc',
						ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
						gridlines: {
							color: '#1ba0fc',
							count: 15
						}
					},
					lineWidth: 2,
					colors: ['#fff'],
					curveType: 'function',
					pointSize: 5,
					pointShapeType: 'circle',
					pointFillColor: '#f00',
					backgroundColor: {
						fill: '#008ffb',
						strokeWidth: 0,
					},
					chartArea: {
						left: 0,
						top: 0,
						width: '100%',
						height: '100%'
					},
					fontSize: 11,
					fontName: 'Proxima Nova',
					tooltip: {
						trigger: 'selection',
						isHtml: true
					}
				};

				var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
				chart.draw(dataTable, options);
			}
			$(window).resize(function() {
				drawChart();
				setTimeout(function() {}, 1000);
			});
		});
	</script>
	<script src="js/app.js"></script>
</body>

</html>