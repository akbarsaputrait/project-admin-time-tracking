<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recka | Profile</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/simple-line-icons.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
	<style type="text/css">
		#image-preview {
			width: 200px;
			height: 200px;
			border-radius: 100px;
			position: relative;
			overflow: hidden;
			background-color: #f1f1f1;
			color: #fff;
			margin: 0 auto;
		}

		#image-preview input {
			line-height: 200px;
			font-size: 200px;
			position: absolute;
			opacity: 0;
			z-index: 10;
		}

		#image-preview label {
			position: absolute;
			z-index: 5;
			opacity: 0.8;
			cursor: pointer;
			background-color: #bdc3c7;
			width: 200px;
			height: 50px;
			font-size: 20px;
			line-height: 50px;
			text-transform: uppercase;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			margin: auto;
			text-align: center;
		}

	</style>
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
					<li class="nav-item">
						<a href="<?php echo base_url('user');?>" class="nav-link" id="user">
							<i class="icon icon-user"></i> Pengguna
						</a>
					</li>
					<li class="nav-item active">
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
						<div class="col-md-2" role="tablist">
							<div class="list-group">
								<a data-toggle="tab" href="#profile" role="tab" class="list-group-item active">Profile</a>
								<a data-toggle="tab" href="#setting" role="tab" class="list-group-item">Account Setting</a>
							</div>
						</div>
						<div class="col-md-10">
							<div class="tab-content" style="border: none;">
								<div class="tab-pane fade show active" id="profile" role="tabpanel" style="padding: 0;">
									<div class="card">
										<div class="card-header bg-light">
											<div>Profile Information</div>
											<div class="text-muted small">These information are visible to the public.</div>
										</div>
										<div class="card-body">
											<div class="row">
												<div class="col-md-12 d-flex justify-content-center">
													<div class="profile">
													</div>
												</div>
											</div>
											<div class="container">
												<div class="row">
													<div class="col-md-6">
														<div class="row">
															<div class="col-md-4">
																<h4>Username</h4>
																<h4>Email</h4>
															</div>
															<div class="col-md-1">
																<h4>:</h4>
																<h4>:</h4>
															</div>
															<div class="col-md-7">
																<h4 class="text-left">
																	<?= $this->session->nama;?>
																</h4>
																<h4 class="text-left">
																	<?= $this->session->email;?>
																</h4>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="tab-pane fade" id="setting" role="tabpanel" style="border: none; padding: 0;">
									<div class="card" id="profile">
										<div class="card-header bg-light">
											Account Setting
										</div>
										<div class="card-body">
											<div class="row mb-5">
												<div class="col-md-4">

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
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/functions.js')?>" charset="utf-8"></script>
	<script src="<?php echo base_url('assets/js/popper.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/chart.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/carbon.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/demo.js') ?>"></script>
	<script>
		var base_url = '<?php echo base_url()?>';
		var id_admin = '<?php echo $this->session->id;?>';
		var nama_admin = '<?php echo $this->session->nama;?>';

		function readURL(input) {
			if (input.files && input.files[0]) {
				var reader = new FileReader();

				reader.onload = function (e) {
					$('#img_preview').attr('src', e.target.result);
				}

				reader.readAsDataURL(input.files[0]);
			}
		}

		get_admin();
		get_mini_profile();

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
				url: base_url + "profil/change_photo_profile/<?php echo $this->session->id;?>",
				data: data,
				processData: false,
				contentType: false,
				cache: false,
				timeout: 600000,
				beforeSend: function () {
					$(".profile, .mini-profile").empty();
				},
				success: function (data, msg) {
					$("#change_photo").modal('hide');
					$("#form_photo").val("");
					get_admin();
					get_mini_profile();
				}
			});
		});

	</script>
</body>

</html>
