<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recka | Aktivitas</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/jquery.fancybox.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/pace-theme-loading-bar.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/daterangepicker.css'); ?>">


</head>

<body>
	<div class="page-wrapper">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; z-index:10000; width:100%; box-shadow: 0 5px 10px 0 rgba(0,0,0,.1);">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNavDropdown"
			aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="#">
				<img src="<?php echo base_url('assets/img/logo1.png') ?>" alt="logo">
			</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="<?php echo base_url('dashboard');?>" class="nav-link" id="dashboard">
							<i class="icon icon-home"></i> Beranda
						</a>
					</li>
					<li class="nav-item active">
						<a href="<?php echo base_url('user');?>" class="nav-link" id="user">
							<i class="icon icon-user"></i> Pengguna
						</a>
					</li>
					<li class="nav-item">
						<a href="<?php echo base_url('profil');?>" class="nav-link" id="profil">
							<i class="icon icon-settings"></i> Profil
						</a>
					</li>
				</ul>
			</div>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle mini-profile" href="#" role="button" data-toggle="dropdown">
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<a href="<?php echo base_url('profil');?>" class="dropdown-item">
							<i class="icon icon-settings"></i> Profil
						</a>
						<a href="<?php echo base_url('admin/logout'); ?>" class="dropdown-item">
							<i class="icon icon-logout"></i> Logout
						</a>
					</div>
				</li>
			</ul>
		</nav>
		<div class="main-container">
			<div class="content" style="position: relative; top: 4rem;">
				<div class="container-fluid" id="info_client"></div>
				<div class="row">
					<div class="col-md-12" id="buttons">
						<button class="btn btn-outline-primary" id="refresh" style="margin-right: 15px;">
							<i class="fa fa-refresh" id="spin"></i> Segarkan
						</button>
						<a href="<?php echo base_url('user');?>" class="btn btn-outline-danger">
							<i class="fa fa-arrow-left"></i> Kembali
						</a>
					</div>
				</div>
				<div class="row" id="navtab">
					<div class="col-md-12">
						<ul class="nav nav-tabs" id="pills-tab" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" id="activities-tab" data-toggle="tab" href="#activities" role="tab">
									<i class="fa fa-mouse-pointer" aria-hidden="true"></i> Aktivitas</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="task-tab" data-toggle="tab" href="#task" role="tab">
									<i class="fa fa-tasks" aria-hidden="true"></i> Tugas
									<span class="badge badge-pill badge-danger" id="count_status"></span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="ss-tab" data-toggle="tab" href="#screenshot" role="tab">
									<i class="fa fa-picture-o" aria-hidden="true"></i> Tangkapan Layar</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" id="" data-toggle="tab" href="#stats" role="tab">
									<i class="fa fa-pie-chart" aria-hidden="true"></i> Statistik</a>
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane fade show active" id="activities" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="d-flex justify-content-center">
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="pill" href="#act_today" role="tab" aria-controls="pills-home" aria-selected="true">Hari ini</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="pill" href="#act_yesterday" role="tab" aria-controls="pills-profile" aria-selected="false">Kemarin</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" data-toggle="pill" href="#act_everytime" role="tab" aria-controls="pills-contact" aria-selected="false">Selamanya</a>
										</li>
									</ul>
								</div>
								<div class="row">
									<div class="col-md-12">
										<div class="tab-content" id="pills-tabContent">
											<div class="tab-pane fade show active" id="act_today" role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="table-responsive">
													<table cellpadding="1" cellspacing="1" id="tab_act_today" class="display table table-bordered table-hover table-striped"
													width="100%">
														<thead>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="act_yesterday" role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="table-responsive">
													<table cellpadding="1" cellspacing="1" id="tab_act_yesterday" class="display table table-bordered table-hover table-striped"
													width="100%">
														<thead>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
											<div class="tab-pane fade" id="act_everytime" role="tabpanel" aria-labelledby="pills-home-tab">
												<div class="table-responsive">
													<table cellpadding="1" cellspacing="1" id="tab_act_everytime" class="display table table-bordered table-hover table-striped"
													width="100%">
														<thead>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</thead>
														<tfoot>
															<tr>
																<th>ID</th>
																<th>Aplikasi</th>
																<th>Judul</th>
																<th>Tanggal</th>
																<th>Waktu</th>
															</tr>
														</tfoot>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="task" role="tabpanel" aria-labelledby="pills-profile-tab">
								<p id="table-filter">
									Search:
									<select class="form-control" id="project"></select>
								</p>
								<div class="table-responsive">
									<table cellpadding="1" cellspacing="1" id="tab_task" class="display table table-bordered table-hover table-striped " width="100%">
										<thead>
											<tr>
												<th>ID</th>
												<th>Project</th>
												<th>Tugas</th>
												<th>Waiting</th>
												<th>Progress</th>
												<th>Done</th>
											</tr>
										</thead>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>Project</th>
												<th>Tugas</th>
												<th>Waiting</th>
												<th>Progress</th>
												<th>Done</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
							<div class="tab-pane fade" id="screenshot" role="tabpanel" aria-labelledby="pills-contact-tab">
								<div class="row" id="days">
									<div class="col-md-12 d-flex justify-content-center">
										<ul class="nav nav-pills float-right" role="tablist">
											<li class="nav-item">
												<a class="nav-link active molla" data-toggle="pill" href="#today" role="tab">Hari ini</a>
											</li>
											<li class="nav-item">
												<a class="nav-link molla" data-toggle="pill" href="#yesterday" role="tab">Kemarin</a>
											</li>
											<li class="nav-item">
												<a class="nav-link molla" data-toggle="pill" href="#week" role="tab">Minggu ini</a>
											</li>
											<li class="nav-item">
												<a class="nav-link molla" data-toggle="pill" href="#everytimes" role="tab">Selamanya</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="tab-content" style="border: none;">
									<div class="tab-pane fade show active" id="today" role="tabpanel">
										<div class="alert alert-danger" id="alert_today">Tidak ada tangkapan layar untuk hari ini!</div>
										<div class="container">
											<div id="ss_today" class="row" style="overflow: hidden;"></div>
										</div>
									</div>
									<div class="tab-pane fade" id="yesterday" role="tabpanel">
										<div class="alert alert-danger" id="alert_yesterday">Tidak ada tangkapan layar untuk kemarin!</div>
										<div class="container">
											<div id="ss_yesterday" class="row" style="overflow: hidden;"></div>
										</div>
									</div>
									<div class="tab-pane fade" id="week" role="tabpanel">
										<div class="alert alert-danger" id="alert_week">Tidak ada tangkapan layar untuk minggu ini!</div>
										<div class="container">
											<div id="ss_week" class="row" style="overflow: hidden;"></div>
										</div>
									</div>
									<div class="tab-pane fade" id="everytimes" role="tabpanel">
										<div class="row">
											<div class="col-md-12 d-flex justify-content-center">
												<div class="demo mb-3">
													<h4 class="text-center">Pilih tanggal</h4>
													<input type="text" id="config-demo" class="form-control placeholded">
												</div>
											</div>
										</div>
										<div id="ss_everytime" class="row"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade" id="stats" role="tabpanel" aria-labelledby="pills-home-tab">
								<div class="row">
									<div class="col-md-6">
										<div class="card">
											<div class="card-header bg-light">
												Lama Pengerjaan Tugas
											</div>
											<div class="card-body" id="tes1">
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="card">
											<div class="card-header bg-light">
												Pemakaian Aplikasi
											</div>
											<div class="card-body" id="tes">
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="change_photo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document" style="position: relative; top: 6rem;">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ganti Foto</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" class="d-flex justify-content-center">
					<form action="" method="post" id="form_photo">
						<div class="form-group">
							<label for="">Impor foto</label>
							<input type="file" name="photo_profile" id="img_profile" class="form-control" required>
							<small class="form-text text-muted">Lebar maksimal adalah 1200px.</small>
						</div>
						<img src="" id="img_preview" width="150" style="position: relative; left: 10rem;">
						<div class="form-group" id="btn">
							<input type="submit" value="Save Change" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/functions.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/carbon.js') ?>"></script>
<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/jquery.fancybox.js')?>"></script>
<script src="<?php echo base_url('assets/js/pace.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/chart.min.js')?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/js/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/daterangepicker.js') ?>"></script>

<?php
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login"));
		}else{
	?>
	<script>
		paceOptions = {
			elements: true,
			restartOnRequestAfter: true
		};

		var id = window.location.href.split('/')[6]; //Mengambil ID user hasil dari split url
		var base_url = '<?php echo base_url()?>';
		var id_admin = '<?php echo $this->session->id;?>';
		var nama_admin = '<?php echo $this->session->nama;?>';

		// REFRESH BUTTON
		$("#refresh").click(function () {
			$(".fa-refresh").addClass("fa-spin");
			activities_today.ajax.reload(null, false);
			activities_yesterday.ajax.reload(null, false);
			activities_everytime.ajax.reload(null, false);
			tasks.ajax.reload(null, false);
			$(
					"#ss_today, #ss_yesterday, #ss_week, #ss_everytime, #count_status, #filter-date, #ss_everytime, #tes, #tes1, #info_client, #table-filter select"
				)
				.empty();
			get_client();
			get_ss_today();
			get_ss_week();
			get_ss_yesterday();
			get_all_ss();
			count_status();
			get_stats_app();
			get_stats_tasks();
			get_mini_profile();
			get_project();
			setTimeout(function () {
				$(".fa-refresh").removeClass("fa-spin");
			}, 2000);
		});

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img_preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		$("#img_profile").change(function () {
			readURL(this);
		});

		$("#form_photo").submit(function (event) {
			event.preventDefault();
			var form = $('#form_photo')[0];
			var data = new FormData(form);

			$.ajax({
				type: "POST",
				enctype: 'multipart/form-data',
				url: base_url + "user/change_photo_profile/" + id,
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
				beforeSend: function () {
					$("#info_client").empty();
				},
				success: function (data, msg) {
					$("#change_photo").modal('hide');
					$("#form_photo").val("");
					get_client();
				}
			});
		});

		// Load data aktivitas hari ini
		var activities_today = $('#tab_act_today').DataTable({
			select: true,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			order: [
				[0, 'desc']
			],
			ajax: {
				url: base_url + "activities/activities_today/" + id,
				type: 'POST'

			},
			columns: [{
					'data': 'id'
				},
				{
					'data': 'app'
				},
				{
					'data': 'title'
				},
				{
					'data': 'date'
				},
				{
					'data': 'time'
				}
			],
			columnDefs: [{
					"targets": [0],
					"visible": false
				},
				{
					"width": "20%",
					"targets": [3, 4]
				}
			]
		});

		// Load data aktivitas hari kemarin
		var activities_yesterday = $('#tab_act_yesterday').DataTable({
			select: true,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			order: [
				[0, 'desc']
			],
			ajax: {
				url: base_url + "activities/activities_yesterday/" + id,
				type: 'POST'
			},
			columns: [{
					'data': 'id'
				},
				{
					'data': 'app'
				},
				{
					'data': 'title'
				},
				{
					'data': 'date'
				},
				{
					'data': 'time'
				}
			],
			columnDefs: [{
					"targets": [0],
					"visible": false
				},
				{
					"width": "20%",
					"targets": [3, 4]
				}
			]
		});

		// Load data selama ada aktivitas
		var activities_everytime = $('#tab_act_everytime').DataTable({
			select: true,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			order: [
				[0, 'desc']
			],
			ajax: {
				url: base_url + "activities/activities_everytime/" + id,
				type: 'POST'
			},
			columns: [{
					'data': 'id'
				},
				{
					'data': 'app'
				},
				{
					'data': 'title'
				},
				{
					'data': 'date'
				},
				{
					'data': 'time'
				}
			],
			columnDefs: [{
					"targets": [0],
					"visible": false
				},
				{
					"width": "20%",
					"targets": [3, 4]
				}
			]
		});

		// Load data task
		var tasks = $('#tab_task').DataTable({
			select: true,
			lengthChange: true,
			searching: true,
			processing: true,
			responsive: true,
			serverSide: true,
			order: [
				[0, 'desc']
			],
			ajax: {
				url: base_url + "tasks/get_tasks/" + id,
				type: 'POST'
			},
			columns: [{
					'data': 'id'
				},
				{
					'data': 'project'
				},
				{
					'data': 'task'
				},
				{
					'data': 'waiting'
				},
				{
					'data': 'progress'
				},
				{
					'data': 'done'
				}
			],
			columnDefs: [
				{
				"targets": [0],
				"visible": false
				}
			]
		});

		$('#table-filter select').on('change', function () {
			tasks.search(this.value).draw(true);
		});

		var daterangepicker = $('#config-demo').daterangepicker({
			"showDropdowns": true,
			"showWeekNumbers": true,
			"autoApply": true,
			"opens": "center",
			"locale": {
				"weekLabel": "Minggu",
				"daysOfWeek": [
					"Ming",
					"Sen",
					"Sel",
					"Rab",
					"Kam",
					"Jum",
					"Sab"
				],
				"monthNames": [
					"Januari",
					"Februari",
					"Maret",
					"April",
					"Mei",
					"Juni",
					"Juli",
					"Agustus",
					"September",
					"Oktober",
					"November",
					"December"
				],
				"firstDay": 1
			}
		}, function (start, end, label) {
			get_screenshot_everytime_by_date(start.format('YYYY-MM-DD'), end.format('YYYY-MM-DD'));
		});

		// Call function
		get_client();
		get_ss_today();
		get_ss_week();
		get_ss_yesterday();
		get_all_ss();
		count_status();
		get_stats_app();
		get_stats_tasks();
		get_mini_profile();
		get_project();

	</script>
	<?php
}
?>
	</body>

</html>
