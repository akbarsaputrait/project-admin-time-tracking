var id = window.location.href.split('/')[6]; //Mengambil ID user hasil dari split url
// Function untuk ketika reload page tidak kembali ke tab active
function nav_tab() {
	$('#pills-tab a').click(function (e) {
		e.preventDefault();
		$(this).tab('show');
	});

	$("ul.nav-tabs > li > a").on("shown.bs.tab", function (e) {
		var dd = $(e.target).attr("href").substr(1);
		window.location.hash = dd;
	});

	var hash = window.location.hash;
	$('#pills-tab a[href="' + hash + '"]').tab('show');
}

function get_admin() {
	$.ajax({
		url: base_url + 'admin/get_admin/' + id_admin,
		dataType: 'json',
		success: function (data) {
			$.each(data, function (index, value) {
				$(".profile").append('<a href="#" data-target="#change_photo" data-toggle="modal"><img src="' + base_url + 'images/' + value.photo_profile +
					'" style="border-radius: 50%;" class="img-profile" height="200" id="img-profile"></a>'
				);
			});
		}
	});
}

function get_mini_profile() {
	$.ajax({
		url: base_url + 'admin/get_admin/' + id_admin,
		dataType: 'json',
		success: function (data) {
			$.each(data, function (index, value) {
				$(".mini-profile").append('<img src="' + base_url + 'images/' + value.photo_profile + '" class="avatar avatar-sm" alt="logo"><span class="small ml-1 d-md-down-none">' + nama_admin + '</span>');
			});
		}
	});
}

// Load data screenshot hari ini
function get_ss_today() {
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: base_url + 'screenshots/get_screenshot_today/' + id,
		success: function (data) {
			$.each(data, function (index, value) {
				if (value.data != 'null') {
					$("#alert_today").hide();
					$("#ss_today").append('<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"><a data-caption="<b>' + value.app +
						'</b>, ' + value.title + '<br/><b>' + value.date +
						'</b>, ' + value.time + '" data-fancybox="group1" href="' + base_url + 'images/' + value.filename +
						'"><figure class="figure"><img src="' + base_url + 'images/' + value.filename +
						'" class="figure-img img-fluid rounded"><figcaption class="figure-caption text-center" style="font-size: 17px;">' +
						value.app + '<br/>' + value.title + '<br/>' + value.date + '</figcaption></figure></a></div>'
					);
				} else {
					$("#alert_today").show();
				}
			});
		}
	});
}

// Load data screenshot kemarin
function get_ss_yesterday() {
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: base_url + 'screenshots/get_screenshot_yesterday/' + id,
		success: function (data) {
			$.each(data, function (index, value) {
				if (value.data != 'null') {
					$("#alert_yesterday").hide();
					$("#ss_yesterday").append('<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"><a data-caption="<b>' +
						value.app + '</b>, ' + value.title + '<br/><b>' +
						value.date +
						'</b>, ' + value.time + '" data-fancybox="group2" href="' + base_url + 'images/' + value.filename +
						'"><figure class="figure"><img src="' + base_url + 'images/' + value.filename +
						'" class="figure-img img-fluid rounded img-responsive"><figcaption class="figure-caption text-center" style="font-size: 17px;">' +
						value.app + '<br/>' + value.title + '<br/>' + value.date + '</figcaption></figure></a></div>');
				} else {
					$("#alert_yesterday").show();
				}
			});
		}
	});
}

// Load data screenshot minggu ini
function get_ss_week() {
	$.ajax({
		type: 'GET',
		dataType: 'json',
		url: base_url + 'screenshots/get_screenshot_week/' + id,
		success: function (data) {
			$.each(data, function (index, value) {
				if (value.data != 'null') {
					$("#alert_week").hide();
					$("#ss_week").append('<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"><a data-caption="<b>' + value.app +
						'</b>, ' + value.title + '<br/><b>' + value.date +
						'</b>, ' + value.time + '" data-fancybox="group3" href="' + base_url + 'images/' + value.filename +
						'"><figure class="figure"><img src="' + base_url + 'images/' + value.filename +
						'" class="figure-img img-fluid rounded img-responsive"><figcaption class="figure-caption text-center" style="font-size: 17px;">' +
						value.app + '<br/>' + value.title + '<br/>' + value.date + '</figcaption></figure></a></div>');
				} else {
					$("#alert_week").show();
				}
			});
		}
	});
}

// Load data screenshot berdasarkan select option date
function get_screenshot_everytime_by_date(start, end) {
	$.ajax({
		type: 'POST',
		url: base_url + 'screenshots/get_screenshot_everytime_by_date/' + id,
		data: {
			startdate: start,
			enddate: end
		},
		success: function (data) {
			$("#ss_everytime").empty();
			$("#ss_everytime").hide().fadeIn();
			$.each(data, function (index, value) {
				if (value.status === 404) {
					$("#ss_everytime").append('<div class="col-md-12"><div class="alert alert-danger" id="alert_date">Tangkapan layar tidak ditemukan!</div></div>');
				} else {
					$("#alert_date").hide();
					$("#ss_everytime").append('<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"><a data-caption="<b>' +
						value.app + '</b>, ' + value.title + '<br/><b>' +
						value.date +
						'</b>, ' + value.time + '" data-fancybox="group4" href="' + base_url + 'images/' + value.filename +
						'"><figure class="figure"><img src="' + base_url + 'images/' + value.filename +
						'" class="figure-img img-fluid rounded img-responsive"><figcaption class="figure-caption text-center" style="font-size: 17px;">' +
						value.app + '<br/>' + value.title + '<br/>' + value.date + '</figcaption></figure></a></div>');
				}
			});
		}
	});
}

// Load data screenshot selamanya
function get_all_ss() {
	$.ajax({
		url: base_url + 'screenshots/get_all_ss/' + id,
		type: 'GET',
		dataType: 'JSON',
		success: function (data) {
			$("#ss_everytime").empty();
			$("#ss_everytime").hide().fadeIn();
			$.each(data.data, function (index, value) {
				$("#ss_everytime").append('<div class="col-md-3 col-lg-3 col-sm-3 col-xs-3"><a data-caption="<b>' + value
					.app + '</b>, ' + value.title + '<br/><b>' +
					value.date +
					'</b>, ' + value.time + '" data-fancybox="group5" href="' + base_url + 'images/' + value.filename +
					'"><figure class="figure"><img src="' + base_url + 'images/' + value.filename +
					'" class="figure-img img-fluid rounded img-responsive"><figcaption class="figure-caption text-center" style="font-size: 17px;">' +
					value.app + '<br/>' + value.title + '<br/>' + value.date + '</figcaption></figure></a></div>');
			});
		}
	});
}

// Load data jumlah task berstatus done
function count_status() {
	$.ajax({
		url: base_url + 'tasks/get_count_status/' + id,
		dataType: 'json',
		success: function (data) {
			$("#count_status").html(data);
		}
	});
}

function get_project() {
	$.ajax({
		url: base_url + 'tasks/get_project/' + id,
		dataType: 'json',
		success: function(data) {
			$("#project").append($('<option></option>').val('').text('Pilih semua'));
			
			$.each(data, function(index, value){
				$("#project").append($('<option></option>').val(value.project).text(value.project));
				console.log(value);
			});
		}
	});
}

function get_client() {
	$.ajax({
		url: base_url + 'user/get_client/' + id,
		type: 'GET',
		dataType: 'JSON',
		success: function (data) {
			$.each(data, function (index, value) {
				if (value.status === 'Online') {
					$("#info_client").append(
						'<div class="row"><div class="col-md-1"><a href="#" data-target="#change_photo" data-toggle="modal"><div class="profile"><img src="' + base_url + 'images/' + value.photo_profile +
						'" width="100" height="100" class="img-profile"  id="profile" alt="Photo Profile" style="border-radius: 100px;"></a></div></div><div class="col-md-10" id="text-client"><div class="ml-3"><h1 class="mb-1" id="name">' +
						value.name + '</h1><div class="text-muted"><h5 id="info">' + value.email + '<br/>' + value.pc +
						' <span class="badge badge-pill badge-success">Online</span></h5></div></div></div></div>');
					$("#img_preview").attr('src', '' + base_url + 'images/' + value.photo_profile);
				} else {
					$("#info_client").append(
						'<div class="row"><div class="col-md-1"><a href="#" data-target="#change_photo" data-toggle="modal"><div class="profile"><img src="' + base_url + 'images/' + value.photo_profile +
						'" width="100" height="100" class="img-profile" id="profile" alt="Photo Profile" style="border-radius: 100px;"></a></div></div><div class="col-md-10" id="text-client"><div class="ml-3"><h1 class="mb-1" id="name">' +
						value.name + '</h1><div class="text-muted"><h5 id="info">' + value.email + '<br/>' + value.pc +
						' <span class="badge badge-pill badge-danger">Offline</span></h5></div></div></div></div>');
					$("#img_preview").attr('src', '' + base_url + 'images/' + value.photo_profile);
				}
			});
		}
	});
}


function get_stats_app() {
	$.ajax({
		type: 'GET',
		url: base_url + 'statistic/get_stats_app/' + id,
		dataType: 'JSON',
		success: function (data) {
			$("#tes").append('<canvas id="stats-app" width="40%"></canvas>');
			var app = [];
			var count = [];

			for (var i in data) {
				app.push(data[i].app);
				count.push(parseFloat(data[i].count));
			}

			var ctx = $("#stats-app");
			var stats_app = new Chart(ctx, {
				type: 'pie',
				data: {
					labels: app,
					datasets: [{
						label: 'Aplikasi',
						data: count,
						backgroundColor: [
							'rgba(255, 99, 132, 0.2)',
							'rgba(54, 162, 235, 0.2)',
							'rgba(255, 206, 86, 0.2)',
							'rgba(75, 192, 192, 0.2)',
							'rgba(153, 102, 255, 0.2)'
						],
						borderColor: [
							'rgba(255,99,132,1)',
							'rgba(54, 162, 235, 1)',
							'rgba(255, 206, 86, 1)',
							'rgba(75, 192, 192, 1)',
							'rgba(153, 102, 255, 1)'
						]
					}]
				}
			});
		}
	});
}

function get_stats_tasks() {
	$.ajax({
		type: 'GET',
		url: base_url + 'Statistic/data_stats_task/' + id,

		dataType: 'JSON',
		success: function (data) {
			$("#tes1").append('<canvas id="stats-task"></canvas>');
			var name = [];
			var date = [];
			var ctx = $("#stats-task");

			for (var i in data) {
				name.push(data[i].name);
				date.push(data[i].date);
			}

			var stats_app = new Chart(ctx, {
				type: "horizontalBar",
				data: {
					labels: name,
					datasets: [{
						label: "Hari",
						data: date,
						fill: false,
						backgroundColor: [
							"rgba(255, 99, 132, 0.2)",
							"rgba(255, 159, 64, 0.2)",
							"rgba(255, 205, 86, 0.2)",
							"rgba(75, 192, 192, 0.2)",
							"rgba(54, 162, 235, 0.2)",
							"rgba(153, 102, 255, 0.2)",
							"rgba(201, 203, 207, 0.2)"
						],
						borderColor: [
							"rgb(255, 99, 132)",
							"rgb(255, 159, 64)",
							"rgb(255, 205, 86)",
							"rgb(75, 192, 192)",
							"rgb(54, 162, 235)",
							"rgb(153, 102, 255)",
							"rgb(201, 203, 207)"
						],
						borderWidth: 1
					}]
				},
				options: {
					scales: {
						xAxes: [{
							ticks: {
								beginAtZero: true
							}
						}]
					}
				}
			});

		}
	});
}