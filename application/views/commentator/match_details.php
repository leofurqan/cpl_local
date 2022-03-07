<!DOCTYPE html>

<html>
<head>
	<!--begin::Fonts -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">


	<!--end::Fonts -->

	<!--begin::Page Vendors Styles(used by this page) -->

	<!--end::Page Vendors Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->

	<!--begin:: Vendor Plugins -->

	<link href="<?php echo base_url(''); ?>assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/animate.css/animate.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/toastr/build/toastr.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/morris.js/morris.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/socicon/css/socicon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/line-awesome/css/line-awesome.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css"
		  rel="stylesheet" type="text/css"/>

	<!--end:: Vendor Plugins -->
	<link href="<?php echo base_url(''); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

	<!--begin:: Vendor Plugins for custom pages -->
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet"
		  type="text/css"/>

	<!--end:: Vendor Plugins for custom pages -->

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?php echo base_url(''); ?>assets/css/skins/header/base/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/header/menu/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css"/>
	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/media/cpl/favicon.ico"/>
	<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery/dist/jquery.js"
			type="text/javascript"></script>
</head>
<script src="<?php echo base_url('overlay/jquery.min.js') ?>"></script>
<style>
	.btatting_indicator {
		height: 10px;
		width: 10px;
		background-color: red;
		border-radius: 50%;
		display: inline-block;
		float: right;
		margin-top: 7px;
	}
</style>
<body>
<?php if ($match_team) { ?>
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<input type="hidden" id="match_id" value="<?php echo $match_team->id ?>">
				<div class="kt-portlet__body">
					<ul class="nav nav-tabs  nav-tabs-line" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#live" role="tab">Live</a>
						</li>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="live" role="tabpanel">
							<div class="row">
								<div class="col-lg-7 col-md-5 col-sm-5" id="match_teams">
									<div class="row" id="<?php echo $match_team->first_team_id ?>">
										<div class="col-sm-3">
											<img class="img-responsive" width="100" height="100"
												 src="<?php echo base_url('uploads/teams/' . $match_team->first_team_logo) ?>"
												 alt="<?php echo $match_team->first_team_name ?>">
										</div>
										<div class="col-sm-5" style="padding: 2rem">
											<span></span>
											<h4><?php echo $match_team->first_team_name ?></h4>
										</div>
										<div class="score_info col-sm-4" style="padding: 2rem">

										</div>
									</div>
									<div class="row mt-2" id="<?php echo $match_team->second_team_id ?>">
										<div class="col-sm-3">
											<img class="img-responsive" width="100" height="100"
												 src="<?php echo base_url('uploads/teams/' . $match_team->second_team_logo) ?>"
												 alt="<?php echo $match_team->second_team_name ?>">
										</div>
										<div class="col-sm-5" style="padding: 2rem">
											<span></span>
											<h4><?php echo $match_team->second_team_name ?></h4>
										</div>
										<div class="score_info col-sm-4" style="padding: 2rem">

										</div>

									</div>
								</div>

								<div class="col-lg-5 border" style="padding: 2rem">
									<div class="row border p-3">
										<div class="col-sm-3 crr">
											<p>Current RR</p>
										</div>
										<div class="col-sm-3 crr">
											<h5>0.0</h5>
										</div>
										<div class="col-sm-3 rr d-none">
											<p>Required RR</p>
										</div>
										<div class="col-sm-3 rr d-none">
											<h5>0.0</h5>
										</div>
									</div>
									<div id="ball_score_left" class="row border p-3 mt-3 d-none">

									</div>
									<div class="row mt-3">
										<h6><?php echo $match_team->toss_winner_name . ' won the toss and elected  to ' . $match_team->toss_name ?></h6>
									</div>
								</div>
							</div>
							<div class="row mt-3">
								<div class="col-lg-6">
									<div class="row" id="batting_row">

									</div>
								</div>
								<div class="col-lg-6">
									<div class="row" id="bolwer_row">

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php } ?>
<!--end::Portlet-->
<script>
	$(document).ready(function () {
		setInterval(function () {
			get_data();
		}, 1000);
	});

	function get_data() {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("matches/get_data_match");?>',
			data: {'match_id': $('#match_id').val()},
			datatype: 'JSON',
			success: function (data) {
				var json = JSON.parse(data);
				if (json.match_data.innings_no === "2") {
					$('#' + json.match_data.bowling_team).find('.col-sm-5').children('span').removeClass('btatting_indicator');
					$('#' + json.match_data.bowling_team).find('.score_info').remove();
					$('#ball_score_left').removeClass('d-none');
					$('.rr').removeClass('d-none');
					let balls_left = 120 - parseInt(json.valid_balls);
					let score_left = parseInt(json.bowling_team_score) - parseInt(json.runs);
					let rr = parseFloat((score_left / balls_left) * 6).toFixed(2);
					$('.rr').children('h5').text(rr);

					$('#ball_score_left').html('<div class="col-sm-3"><p>Score left</p></div>' +
							'<div class="col-sm-3"><h5>' + score_left + '</h5></div>' +
							'<div class="col-sm-3"><p>Balls left</p></div>' +
							'<div class="col-sm-3"><h5>' + balls_left + '</h5></div>'
					);

				}
				$('#' + json.match_data.batting_team).find('.col-sm-5').children('span').addClass("btatting_indicator");
				$('#' + json.match_data.batting_team).find('.score_info').html('<div class="row"><div class="col-lg-6"><p>(' + json.batting_team_balls + '/20 ov)</p></div><div class="col-lg-6"><h5 id="socre_wickets">' + json.runs + '/' + json.wickets + '</h5></div></div>')

				var bolwer_table = '';
				var batting_table = '';
				$('#over').text('(' + json.batting_team_balls + '/20 ov)');

				let crr = parseFloat((json.runs / json.batting_team_balls) || 0).toFixed(2);
				$('.crr').children('h5').text(crr);

				bolwer_table += '<div class="col-lg-8"><table class="table">' +
						'<thead class="thead-light">' +
						'<th>Bowlers</th>' +
						'<th>O</th>' +
						'<th>M</th>' +
						'<th>R</th>' +
						'<th>W</th>' +
						'</thead>' +
						'<tbody>' +
						'<tr>' +
						'<td>' + json.match_data.bowler_name + '</td>' +
						'<td>' + json.over_count + '</td>' +
						'<td>0</td>' +
						'<td>' + json.bowler_runs + '</td>' +
						'<td>' + json.bowler_wickets + '</td>' +
						'</tr>' +
						'</tbody>' +
						'</table>' +
						'</div>' +
						'<div class="col-lg-4">' +
						'<table class="table">' +
						'<thead class="thead-dark">' +
						'<th>MAT</th>' +
						'<th>WKTS</th>' +
						'<th>AVE</th>' +
						'</thead>' +
						'<tbody>' +
						'<tr>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'</tr>' +
						'</tbody>' +
						'</table>' +
						'</div>';
				$('#bolwer_row').html(bolwer_table);

				batting_table += '<div class="col-lg-8">' +
						'<table class="table">' +
						'<thead class="thead-light">' +
						'<th>BATTERS</th>' +
						'<th>R</th>' +
						'<th>B</th>' +
						'<th>4s</th>' +
						'<th>6s</th>' +
						'<th>SR</th>' +
						'<th>THIS BOWLER</th>' +
						'</thead>' +
						'<tbody>' +
						'<tr>' +
						'<td>' + json.match_data.striker_name + '*</td>' +
						'<td>' + json.striker_score + '</td>' +
						'<td>' + json.striker_balls + '</td>' +
						'<td>' + json.striker_4s + '</td>' +
						'<td>' + json.striker_6s + '</td>' +
						'<td>' + parseFloat((json.striker_score / json.striker_balls) * 100 || 0).toFixed(2) + '</td>' +
						'<td>' + json.current_striker_bowler_score + '(' + json.balls + 'b)</td>' +
						'</tr>' +
						'<tr>' +
						'<td>' + json.match_data.non_striker_name + '</td>' +
						'<td>' + json.non_striker_score + '</td>' +
						'<td>' + json.non_striker_balls + '</td>' +
						'<td>' + json.non_striker_4s + '</td>' +
						'<td>' + json.non_striker_6s + '</td>' +
						'<td>' + parseFloat((json.non_striker_score / json.non_striker_balls) * 100 || 0).toFixed(2) + '</td>' +
						'<td>' + json.current_non_striker_bowler_score + '(' + json.balls_non + 'b)</td>' +
						'</tr>' +
						'</tbody>' +
						'</table>' +
						'</div>' +
						'<div class="col-lg-4">' +
						'<table class="table">' +
						'<thead class="thead-dark">' +
						'<th>MAT</th>' +
						'<th>Runs</th>' +
						'<th>HS</th>' +
						'<th>AVE</th>' +
						'</thead>' +
						'<tbody>' +
						'<tr>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'</tr>' +
						'<tr>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'<td>0</td>' +
						'</tr>' +
						'</tbody>' +
						'</table>' +
						'</div>';
				$('#batting_row').html(batting_table);
			}
		});
	}
</script>
</body>
</html>
