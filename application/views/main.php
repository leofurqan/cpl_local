<!Doctype HTML>
<html>
<head>
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<!-- CSS only -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	<style>
		.hide {
			display: none;
		}

		body {
			font-family: Poppins, Medium;
		}
	</style>
	<title>CPL Overlays</title>
</head>
<body style="height: 1080px; background-color: transparent;">
<section class="overlay_score hide">
	<div class="container-fluid w-100 h-100" id="score">
		<div class="row col-md-12 h-100">
			<div class="col-md-1 h-100" style="padding-top: 900px;">
				<img id="team_a_logo" width="85px;"/>
			</div>

			<div class="col-md-4 h-100" style="padding-top: 900px; color: black;">
				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-6">
						<h4 id="striker_name">Asad Akram</h4>
					</div>

					<div class="col-md-1">
						<h4 class="text-center" id="striker_score">108</h4>
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-1">
						<h4 class="text-center" id="striker_balls">90</h4>
					</div>
				</div>

				<div class="row">
					<div class="col-md-1"></div>
					<div class="col-md-6">
						<h4 id="non_striker_name">Muhammad Tau</h4>
					</div>

					<div class="col-md-1">
						<h4 class="text-center" id="non_striker_score">20</h4>
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-1">
						<h4 class="text-center" id="non_striker_balls">15</h4>
					</div>
				</div>
			</div>

			<div class="col-md-2 h-100" style="padding-top: 865px; padding-left: 75px;">
				<div class="row justify-content-center">
					<h2 class="text-white text-center" id="score_data">Railway: 125 - 6</h2>
				</div>

				<div class="row justify-content-center" style="padding-top: 5px;">
					<h4 class="text-white text-center" id="cr">CRR (5.29)</h4>
				</div>
				<!--<div class="row justify-content-center">
					<h4 class="text-white text-center" id="rr">
						1st Innings
					</h4>
				</div>-->
				<div class="row justify-content-center">
					<h3 class="text-white text-center" id="total_overs">Overs: 7.5</h3>
				</div>

			</div>

			<div class="col-md-1"></div>

			<div class="col-md-3 h-100" style="padding-top: 900px; color: black;">
				<div class="row">
					<div class="col-md-1"></div>

					<div class="col-md-6">
						<h4 id="baller_name">Khurram Atta</h4>
					</div>

					<div class="col-md-1">
						<h4 class="text-center" id="bowler_score">35</h4>
					</div>

					<div class="col-md-1"></div>

					<div class="col-md-1">
						<h4 class="text-center" id="bowler_over">2.5</h4>
					</div>
				</div>
				<div class="row mt-1" id="ball_by_ball"></div>
			</div>

			<div class="col-md-1 h-100" style="padding-top: 900px; padding-left: 75px;">
				<img id="team_b_logo" width="85px;"/>
			</div
		</div>
	</div>
</section>

<section class="match_start hide">
	<div class="container">
		<div class="row no-gutters" style="border-radius: 15px">
			<div class="col-lg-3 d-flex justify-content-start">
				<img width="150" height="120" id="tournament_image" src="" alt="img">
			</div>
			<div class="col-lg-6 d-flex align-items-center justify-content-start">
				<h2 id="tournament_name">Tournament name</h2>
			</div>
		</div>
		<div class="row m-2 p-2 no-gutters d-flex justify-content-center"
			 style="background-color: #d93726; color: white; border-radius: 75px">
			<div class="col-lg-5">
				<div class="row d-flex align-items-center">
					<div class="col-lg-1 d-flex justify-content-start">
						<img width="100" id="team_a_logo" src="" alt="img">
					</div>
					<div class="col-lg-11">
						<h4 id="team_a_name" class="text-center">Team A</h4>
					</div>
				</div>
			</div>
			<div class="col-lg-2 d-flex align-items-center justify-content-center">
				<img width="30%" src="<?php echo base_url('assets/media/bg/vs.png') ?>" alt="image">
			</div>
			<div class="col-lg-5">
				<div class="row d-flex align-items-center">
					<div class="col-lg-11">
						<h4 id="team_b_name" class="text-center">Team B</h4>
					</div>
					<div class="col-lg-1 d-flex justify-content-end">
						<img width="100" id="team_b_logo" src="" alt="img">
					</div>
				</div>
			</div>
		</div>
		<div class="row mt-3 no-gutters d-flex justify-content-center">
			<div class="col-lg-6 d-flex justify-content-center p-2"
				 style="background-color: #d93726; color: white; border-right: 1px solid white; border-top-left-radius: 50px; border-bottom-left-radius: 50px;">
				<div class="row" id="team_a_players">
				</div>
			</div>
			<div class="col-lg-6 d-flex justify-content-center p-2"
				 style="background-color: #d93726; color: white; border-bottom-right-radius: 50px; border-top-right-radius:50px; ">
				<div class="row text-center" id="team_b_players">

				</div>
			</div>
		</div>
		<div class="row no-gutters mt-3 p-2"
			 style="background-color: #d93726; color: white;border-radius: 25px">
			<h4 class="text-center" id="toss_decide"></h4>
		</div>
	</div>
</section>

<section class="over_end_overlay hide">
	<div class="container d-flex align-content-center flex-wrap" style="height: 100vh;">
		<div class="row container-fluid no-gutters">
			<div class="col-lg-5 d-flex justify-content-end">
				<img width="350" id="batting_img" src=""/>
			</div>
			<div class="col-lg-2 d-flex justify-content-center">
				<img width="200" src="<?php echo base_url('assets/media/bg/vs.png') ?>">
			</div>
			<div class="col-lg-5 d-flex justify-content-start">
				<img width="350" id="bowling_img" src=""/>
			</div>
		</div>
	</div>
</section>

</body>
<script>
	$(document).ready(function () {
		setInterval(function () {
			fetch_data();
		}, 2000);
	});

	function fetch_data() {
		var match_id = '<?php if (!empty($match_id)) {
			echo $match_id;
		} else echo '';?>';
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("/overlay/get_data");?>',
			data: {'match_id': match_id},
			datatype: 'JSON',
			success: function (data) {
				var json = JSON.parse(data);
				if (json.status) {
					console.log(json);
					if (json.innings.status === '0') {
						$('.match_start').removeClass('hide');
						$('#tournament_name').text(json.match_data.tournament_name)
						$('#tournament_image ').attr("src", "<?php echo base_url('uploads/tournaments/')?>" + json.match_data.logo);
						$('#team_a_logo').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.first_team.logo);
						$('#team_b_logo').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.second_team.logo);
						$('#team_a_name').text(json.first_team.company_name);
						$('#team_b_name').text(json.second_team.company_name);
						$('#toss_decide').text(json.match_data.toss_winner_name + ' won the toss and elected  to ' + json.match_data.toss_name + ' first');

						let team_a_players = '';
						let team_b_players = '';

						for (let i = 0; i < json.first_team_players.length; i++) {
							let role = '';
							if (json.first_team_players[i].role_id === '1') {
								role = '(C)'
							} else if (json.first_team_players[i].role_id === '2') {
								role = '(WK)'
							} else if (json.first_team_players[i].role_id === '4') {
								role = '(CK)'
							} else if (json.first_team_players[i].role_id === '5') {
								role = '(12th Man)'
							}

							team_a_players += '<div class="col-lg-12 d-flex justify-content-center mt-1">' +
									'<h5>' + json.first_team_players[i].player_name + ' ' + role + '</h5>' +
									'</div>'

						}

						for (let j = 0; j < json.second_team_players.length; j++) {
							let role = '';
							if (json.second_team_players[j].role_id === '1') {
								role = '(C)'
							} else if (json.second_team_players[j].role_id === '2') {
								role = '(WK)'
							} else if (json.second_team_players[j].role_id === '4') {
								role = '(CK)'
							} else if (json.second_team_players[j].role_id === '5') {
								role = '(12th Man)'
							}
							team_b_players += '<div class="col-lg-12 col-lg-12 d-flex justify-content-center mt-1">' +
									'<h5>' + json.second_team_players[j].player_name + ' ' + role + '</h5>' +
									'</div>'
						}

						$('#team_a_players').empty();
						$('#team_a_players').html(team_a_players);
						$('#team_b_players').empty();
						$('#team_b_players').html(team_b_players);
					} else if (json.innings_data.status === '1') {

						if (json.innings_data.innings_no === "2") {
							let balls_left = 120 - parseInt(json.valid_balls);
							let score_left = parseInt(json.bowling_team_score) - parseInt(json.runs);
							let rr = parseFloat((score_left / balls_left) * 6).toFixed(2);
							$('#rr').text('RR ' + '(' + rr + ')');
						}
						$('.overlay_score').removeClass('hide');
						$('.match_start').addClass('hide');
						$('.over_end_overlay').addClass('hide');


						$('#score_data').text(json.batting_team.company_name.slice(0, 7) + ':' + json.runs + '-' + json.wickets);
						$('#total_overs').text('Overs:' + json.batting_team_balls);

						let crr = parseFloat((json.runs / json.batting_team_balls) || 0).toFixed(2);
						$('#cr').text('CRR ' + '(' + crr + ')');


						var url = 'url(<?php echo base_url('') ?>assets/media/bg/overlay.png)';
						$('#team_a_logo').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.first_team.logo);
						$('#team_b_logo').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.second_team.logo)

						$('#score').css({
							'background': url,
							'background-repeat': 'no-repeat',
							'background-size': 'cover',
							'color': 'white',
							'font-weight': 'bold'
						});
						if (json.last_wicket === json.innings_data.facing_id) {
							$('#striker_name').css("text-decoration", "line-through");
						} else if (json.last_wicket === json.innings_data.non_facing_id) {
							$('#non_striker_name').css("text-decoration", "line-through");
						} else {
							$('#striker_name').css("text-decoration", "");
							$('#non_striker_name').css("text-decoration", "");
						}
						$('#striker_name').text(json.innings_data.striker_name.slice(0, 10) + '*');
						$('#striker_score').text(json.striker_score);
						$('#striker_balls').text(json.striker_balls);

						$('#non_striker_name').text(json.innings_data.non_striker_name.slice(0, 10));
						$('#non_striker_score').text(json.non_striker_score);
						$('#non_striker_balls').text(json.non_striker_balls);


						$('#baller_name').text(json.innings_data.bowler_name.slice(0, 10));
						$('#bowler_over').text(json.over_count);
						$('#bowler_score').text(json.bowler_score);

						$('#ball_by_ball').empty();
						$('#ball_by_ball').html(json.bowler_balls_data);

					} else if (json.innings_data.status === '2') {
						$('.overlay_score').addClass('hide');
						$('.match_start').addClass('hide');
						$('.over_end_overlay').removeClass('hide');
						$('.over_end_overlay #batting_img ').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.first_team.logo);
						$('.over_end_overlay #bowling_img').attr("src", "<?php echo base_url('uploads/teams/')?>" + json.second_team.logo);
					}
				}
			}
		});
	}
</script>
</html>
