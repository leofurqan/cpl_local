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
<?php if ($match_team){?>
	<div class="row">
		<div class="col-lg-12">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<input type="hidden" id="match_id" value="<?php echo $match_team->id ?>">
				<div class="kt-portlet__body">
					<ul class="nav nav-tabs  nav-tabs-line" role="tablist">
						<div class="col-lg-5 col-xl-5 col-md-5">
						<li class="nav-item">
							<a class="nav-link active" data-toggle="tab" href="#live" role="tab">Live</a>

						</li>
						</div>
						<div class="col-lg-7 col-xl-7 col-md-7">
						<li class="nav-item text-success kt-font-bold"><?php echo $match_team->tournament_name;?></li>
						</div>
					</ul>
					<div class="tab-content">
						<div class="tab-pane active" id="live" role="tabpanel">
							<div class="row">
								<div class="col-lg-7 col-md-5 col-sm-5" id="match_teams">
									<div class="row" id="<?php echo $match_team->first_team_id?>">
										<div class="col-sm-3">
											<img class="img-responsive" width="100" height="100"
												 src="<?php echo base_url('uploads/teams/' . $match_team->first_team_logo) ?>"
												 alt="<?php echo $match_team->first_team_name ?>">
										</div>
										<div class="col-sm-5"  style="padding: 2rem">
											<span></span>
											<h4><?php echo $match_team->first_team_name ?></h4>
										</div>
										<div class="score_info col-sm-4" style="padding: 2rem">

										</div>
									</div>
									<div class="row mt-2" id="<?php echo $match_team->second_team_id?>">
										<div class="col-sm-3">
											<img class="img-responsive" width="100" height="100"
												 src="<?php echo base_url('uploads/teams/' . $match_team->second_team_logo) ?>"
												 alt="<?php echo $match_team->second_team_name ?>">
										</div>
										<div class="col-sm-5" style="padding: 2rem">
											<span ></span>
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
										<h6><?php echo $match_team->toss_winner_name . ' WON THE TOSS AND ELECTED TO ' . $match_team->toss_name . ' FIRST' ?></h6>
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
			url: '<?php echo base_url("team/dashboard/get_data_match");?>',
			data: {'match_id': $('#match_id').val()},
			datatype: 'JSON',
			success: function (data) {
				var json = JSON.parse(data);
				if (json.match_data.innings_no === "2") {
					$('#'+json.match_data.bowling_team).find('.col-sm-5').children('span').removeClass('btatting_indicator');
					$('#'+json.match_data.bowling_team).find('.score_info').remove();
					$('#ball_score_left').removeClass('d-none');
					$('.rr').removeClass('d-none');
					let balls_left = 120 - parseInt(json.valid_balls);
					let score_left = parseInt(json.bowling_team_score) - parseInt(json.runs);
					let rr = parseFloat((score_left / balls_left) * 6).toFixed(2) ;
					$('.rr').children('h5').text(rr);

					$('#ball_score_left').html('<div class="col-sm-3"><p>Score left</p></div>' +
							'<div class="col-sm-3"><h5>'+score_left+'</h5></div>' +
							'<div class="col-sm-3"><p>Balls left</p></div>' +
							'<div class="col-sm-3"><h5>'+ balls_left+'</h5></div>'
					);

				}
				$('#'+json.match_data.batting_team).find('.col-sm-5').children('span').addClass("btatting_indicator");
				$('#'+json.match_data.batting_team).find('.score_info').html('<div class="row"><div class="col-lg-6"><p>('+json.batting_team_balls+'/20 ov)</p></div><div class="col-lg-6"><h5 id="socre_wickets">'+json.runs+'/'+json.wickets+'</h5></div></div>')

				var bolwer_table = '';
				var batting_table = '';
				$('#over').text('('+json.batting_team_balls+'/20 ov)');

				let crr = parseFloat(json.runs/json.batting_team_balls).toFixed(2);
				$('.crr').children('h5').text(crr);

				bolwer_table += '<div class="col-lg-8"><table class="table">' +
						'<thead class="thead-light">' +
						'<th>Bowlers</th>' +
						'<th>O</th>' +
						'<th>M</th>' +
						'<th>R</th>' +
						'<th>W</th>' +
						'</thead>'+
						'<tbody>'+
						'<tr>'+
						'<td>'+json.match_data.bowler_name+'</td>'+
						'<td>'+json.over_count+'</td>' +
						'<td>0</td>' +
						'<td>'+json.bowler_runs+'</td>' +
						'<td>'+json.bowler_wickets+'</td>' +
						'</tr>'+
						'</tbody>'+
						'</table>'+
						'</div>'+
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

				batting_table +='<div class="col-lg-8">' +
						'<table class="table">' +
						'<thead class="thead-light">' +
						'<th>Batters</th>' +
						'<th>R</th>' +
						'<th>B</th>' +
						'<th>4s</th>' +
						'<th>6s</th>' +
						'<th>SR</th>' +
						'<th>This Over</th>' +
						'</thead>' +
						'<tbody>' +
						'<tr>' +
						'<td>'+json.match_data.striker_name+'*</td>' +
						'<td>'+json.striker_score+'</td>' +
						'<td>'+json.striker_balls+'</td>' +
						'<td>'+json.striker_4s+'</td>' +
						'<td>'+json.striker_6s+'</td>' +
						'<td>'+parseFloat((json.striker_score/json.striker_balls) * 100 || 0).toFixed(2)+'</td>' +
						'<td>'+json.current_striker_bowler_score+'('+json.balls+'b)</td>' +
						'</tr>' +
						'<tr>' +
						'<td>'+json.match_data.non_striker_name+'</td>' +
						'<td>'+json.non_striker_score+'</td>' +
						'<td>'+json.non_striker_balls+'</td>' +
						'<td>'+json.non_striker_4s+'</td>' +
						'<td>'+json.non_striker_6s+'</td>' +
						'<td>'+parseFloat((json.non_striker_score/json.non_striker_balls) * 100 || 0).toFixed(2) +'</td>' +
						'<td>'+json.current_non_striker_bowler_score+'('+json.balls_non+'b)</td>' +
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




