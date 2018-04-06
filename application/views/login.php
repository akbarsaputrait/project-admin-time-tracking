<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Recka | Login</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/styles.css'); ?>">
</head>

<body>
	<div class="page-wrapper flex-row align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-5">
					<div class="card p-4">
						<div class="card-header text-center text-uppercase h4 font-weight-light">
							Masuk sebagai Admin
						</div>
						<?php echo validation_errors('<div class="alert alert-danger" id="alert">','</div>'); ?>
						<?php echo form_open('admin/login');?>
						<div class="card-body">
							<div class="form-group">
								<label class="form-control-label">Username</label>
								<input type="text" class="form-control" id="username" name="username" autofocus>
							</div>
							<div class="form-group">
								<label class="form-control-label">Password</label>
								<input type="password" class="form-control" id="password" name="password">
							</div>
						</div>
						<div class="card-footer">
							<div class="row">
								<div class="col-sm-6">
									<button type="submit" id="submit" class="btn btn-primary btn-block">Masuk</button>
								</div>
								<div class="col-sm-6">
									<span class="btn btn-danger btn-block" data-toggle="modal" data-target="#modaldaftar">Daftar</span>
								</div>
							</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="modaldaftar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					...
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery-3.2.1.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
	<script src="<?php echo base_url('assets/js/carbon.js') ?>"></script>
	<script type="text/javascript">
		$().ready(function () {
			$(".alert").fadeIn(1000).fadeOut(2000);
		});

	</script>
</body>

</html>
