<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recka | Pengguna</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dataTables.bootstrap4.min.css')?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/responsive.dataTables.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/buttons.dataTables.min.css')?>">
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
					<div class="row">
						<div class="col-md-6">
							<div class="card" style="box-shadow: 0 5px 10px 0 rgba(0,0,0,.1); border: none;">
								<div class="card-body d-flex justify-content-between align-items-center">
									<div>
										<span class="h4 d-block font-weight-normal mb-1">
											<?=$count_client?>
										</span>
										<span class="font-weight-light">Jumlah Pengguna</span>
									</div>
									<div class="h2 text-muted">
										<i class="icon icon-people"></i>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md">
							<div class="card">
								<div class="card-body" style="padding: 23px;">
									<div class="input-group">
										<input type="email" class="form-control" placeholder="Email" style="margin-right: 10px;">
										<div class="input-group-addon">
											<button class="btn btn-primary">Tambah Pengguna</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">
									<div class="row">
										<div class="col-md-12 text-center">
											<button class="btn btn-outline-primary" id="refresh">
												<i class="fa fa-refresh"></i> Segarkan
											</button>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover table-responsive" id="tab_users" width="100%">
											<thead>
												<tr>
													<td>
														<b>Nama</b>
													</td>
													<td>
														<b>PC</b>
													</td>
													<td>
														<b>Email</b>
													</td>
													<td>
														<b>Detail</b>
													</td>
												</tr>
											</thead>
											<tfoot>
												<tr>
													<td>
														<b>Nama</b>
													</td>
													<td>
														<b>PC</b>
													</td>
													<td>
														<b>Email</b>
													</td>
													<td>
														<b>Detail</b>
													</td>
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
	</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/functions.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/chart.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/carbon.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/dataTables.buttons.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/dataTables.responsive.min.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/pace.js')?>" charset="utf-8"></script>

	<script type="text/javascript">
		paceOptions = {
			elements: true
		};

		var base_url = '<?php echo base_url()?>';
		var id_admin = '<?php echo $this->session->id;?>';
		var nama_admin = '<?php echo $this->session->nama;?>';

		$("#refresh").click(function () {
			$(".fa-refresh").addClass("fa-spin");
			tab_users.ajax.reload(null, false);
			setTimeout(function () {
				$(".fa-refresh").removeClass("fa-spin");
			}, 2000)
		});
		var tab_users = $('#tab_users').DataTable({
			responsive: true,
			select: true,
			searching: true,
			paging: true,
			processing: true,
			order: [
				[1, 'asc']
			],
			ajax: {
				url: "<?php echo base_url('user/get_user')?>",
			},
			columns: [{
					'data': 'name'
				},
				{
					'data': 'pc'
				},
				{
					'data': 'email'
				},
				{
					'data': 'id',
					"render": function (data, type, row, meta) {
						return '<a href="<?php echo base_url()?>user/activities/' + data +
							'" class="btn btn-primary">See Activities</a>';
					}
				}
			],
			columnDefs: [
				{
					"width": "20%",
					"targets": [0]
				},
				{
					"width": "10%",
					"targets": [1]
				},
				{
					"width": "20%",
					"targets": [2]
				},
				{
					"width": "10%",
					"targets": [3]
				}
			]
		});
		get_mini_profile();

	</script>
</body>

</html>
