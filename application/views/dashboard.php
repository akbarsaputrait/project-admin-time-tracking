<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recka | Dasbor</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/pace-theme-fill-left.css')?>">

</head>

<body>
	<div class="page-wrapper">
		<nav class="navbar navbar-expand-lg navbar-light bg-light" style="position: fixed; z-index:10000; width:100%; box-shadow: 0 5px 10px 0 rgba(0,0,0,.1);">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNavDropdown"
			aria-expanded="false" aria-label="Toggle navigation">
				<i class="fa fa-bars"></i>
			</button>
			<a class="navbar-brand" href="#">
				<span class="text-center ml-3">
					<img src="<?php echo base_url('assets/img/logo1.png') ?>" alt="logo">
				</span>
			</a>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a href="<?php echo base_url('dashboard');?>" class="nav-link" id="dashboard">
							<i class="icon icon-home"></i> Beranda
						</a>
					</li>
					<li class="nav-item">
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
					<a class="nav-link dropdown-toggle mini-profile" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
				<div class="container-fluid">
					<div class="card">
						<div class="row">
							<div class="col-md-12 d-flex justify-content-center">
								<button class="btn btn-outline-primary" id="refresh">
									<i class="fa fa-refresh"></i> Segarkan
								</button>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<table cellpadding="1" cellspacing="1" id="tab_dashboard" class="table table-bordered table-striped table-hover table-responsive"
								width="100%">
									<thead>
										<tr>
											<th>Nomor</th>
											<th>Nama</th>
											<th>Nama Pengguna</th>
											<th>Email</th>
											<th>Status</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>Nomor</th>
											<th>Nama</th>
											<th>Nama Pengguna</th>
											<th>Email</th>
											<th>Status</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/functions.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/chart.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/carbon.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap-notify.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/pace.js')?>" charset="utf-8"></script>


	<script>
		paceOptions = {
			elements: true
		};

		var base_url = '<?php echo base_url()?>';
		var id_admin = '<?php echo $this->session->id;?>';
		var nama_admin = '<?php echo $this->session->nama;?>';

		$("#refresh").click(function () {
			$(".fa-refresh").addClass("fa-spin");
			tab_dashboard.ajax.reload(null, false);
			setTimeout(function () {
				$(".fa-refresh").removeClass("fa-spin");
			}, 2000)
		});
		var tab_dashboard = $('#tab_dashboard').DataTable({
			processing: true, //Feature control the processing indicator.
			order: [
				[0, "asc"]
			],
			ajax: {
				"url": "<?php echo base_url()?>dashboard/dashboard/",
			},
			columns: [{
					'data': 'id'
				},
				{
					'data': 'name'
				},
				{
					'data': 'username'
				},
				{
					'data': 'email'
				},
				{
					'data': 'status'
				}
			],
			columnDefs: [{
					"width": "5%",
					"targets": [0]
				},
				{
					"width": "20%",
					"targets": [2]
				}
			]
		});
		get_mini_profile();

	</script>

</body>

</html>
