<!DOCTYPE html>
<html lang="en">
<head>
	<title>c Example</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/cricketpage.css">

	<style>
		.website_wraper {
			height: 100%;
			width: 100%;
		}

		.header_section {
			border-top-left-radius: 50px;
			border-bottom-left-radius: 50px;
			border-top-right-radius: 50px;
			border-bottom-right-radius: 50px;
			background: #001648;
			height: 100px;
		}

		.header_left_section {
			display: inline-block;
		}

		.header_left_section img {
			border: 4px solid #fafafa;
			border-radius: 50%;
			position: relative;
		}

		.header_left_section .logo_text {
			position: relative;
			font-size: 1.2em;
			color: #fafafa;
			font-weight: bold;
			padding: 1rem;
		}

		.header_left_section img {
			width: 75px;
			height: 75px;
		}

		.header_right_Section img {
			border: 4px solid #fafafa;
			border-radius: 50%;
			position: relative;
			width: 75px;
			height: 75px;
		}

		.header_center_section h5, p {
			color: #fafafa;
			font-weight: bold;
		}

		.cricket_Section {
			padding: 0.3rem;
			width: 100%;
		}

		.header_card {
			width: 80%;
			margin: auto;
			background: #022573;
			border-top-left-radius: 2rem;
			border-top-right-radius: 2rem;
			border-bottom-left-radius: 2rem;
			border-bottom-right-radius: 2rem;
		}

		.header_card2 {
			width: 73%;
			margin: auto;
			background: #0140d0;
			border-top-left-radius: 2rem;
			border-top-right-radius: 2rem;
			border-bottom-left-radius: 2rem;
			border-bottom-right-radius: 2rem;
		}

		.header_card3 {
			width: 50%;
			background: #0140d0;
			border-top-left-radius: 2rem;
			border-top-right-radius: 2rem;
			border-bottom-left-radius: 2rem;
			border-bottom-right-radius: 2rem;
		}

		/*.cricket_left_section {
			display: inline-block;
			position: relative;
			width: 35%;
		}*/


		.cricket_right_section {
			display: inline-block;
			position: relative;
			width: 37%;
			text-align: right;
		}


		.cricket_left_section img {
			width: 50px;
			height: 50px;
			padding: 0.2rem;
		}

		.span span {
			font-size: 1.3em;
			margin-left: 30%;
		}

		.cricket_left_section .logo_text {
			position: relative;
			top: 0.25rem;
			left: 40%;
			font-size: 1.5em;
			color: #fafafa;
			font-weight: bold;
			padding: 1rem;
			width: 100%;

		}

		.cricket_right_section img {
			width: 50px;
			height: 50px;


			padding: 0.2rem;

		}


		.table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 65%;
			margin: auto;
		}

		td, th {
			border: 1px solid #dddddd;
			text-align: left;
			padding: 2px;
		}

		tr:nth-child(even) {
			background-color: #ffffff;
		}

		.table th {
			padding: 0.50rem;
		}


		.no-gutter.row,
		.no-gutter.container,
		.no-gutter.container {
			margin-left: 0;
			margin-right: 0;
		}

		.no-gutter > [class^="col-"] {
			padding-left: 0;
			padding-right: 0;
		}

		.padding-0 {
			padding-right: 0;
			padding-left: 0;
		}
	</style>
</head>

<body style="height: 100%; background-image: url('<?php echo base_url('') ?>assets/media/bg/match_summary_bg.jpg'); background-repeat: no-repeat; background-size: cover">
<div class="website_wraper">
	<section class="header_section m-3 p-1">
		<div class="container-fluid;">
			<div class="row">
				<div class="col-sm-4 mt-2">
					<?php $tournament = $this->db->select('tournament_name, logo')->from('tournaments')->where('id', $match_summary->tournament_id)->get()->row(); ?>
					<div class="header_left_section ml-3">
						<img src="<?php echo base_url('uploads/tournaments/') . $tournament->logo; ?>" alt=""/>
						<span class="w-75 logo_text"><?php echo $tournament->tournament_name; ?></span>
					</div>
				</div>

				<div class="col-sm-4 mt-3">
					<div class="header_center_section text-center">
						<h5>Match Summary</h5>
						<p>CPL T20 - POOL # <?php echo $match_summary->pool_name; ?> (Match
							# <?php echo $match_summary->id; ?>)</p>
					</div>
				</div>

				<div class="col-sm-4 mt-2">
					<div class="header_right_Section text-right mr-3">
						<img src="<?php echo base_url('assets/media/logos/cps.png') ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="cricket_Section mt-3">
		<div class="c_header">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-6">
						<div class="header_card">
							<?php $first_team = $this->db->select('id, company_name, logo')->from('teams')->where('id', $match_summary->first_team_id)->get()->row(); ?>
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-2 p-1">
									<img width="50px"
										 src="<?php echo base_url('uploads/teams/') . $first_team->logo; ?>" alt="">
								</div>
								<div class="col-md-8 text-center my-auto text-white">
									<h4><?php echo $first_team->company_name; ?></h4>
								</div>
								<?php if ($first_team->id === $match_summary->winning_team_id) { ?>
									<div class="col-md-2 p-1 text-right">
										<img width="50px"
											 src="<?php echo base_url('assets/media/icons/match_win.png'); ?>" alt="">
									</div>
								<?php } ?>
							</div>
						</div>

						<div class="header_card2 mt-4">
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-4 p-1">
									<img width="50px" src="<?php echo base_url('assets/media/icons/cricket_bat'); ?>"
										 alt="">
								</div>
								<div class="col-md-4 text-center my-auto text-white">
									<h5 class="text-white font-weight-bold"><?php echo "Score: " . $match_summary->first_team_score . '-' . $match_summary->first_team_wickets; ?></h5>
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
						<div class="header_card_body">
							<table class="table shadow">
								<?php $batsman_1 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_batting_player_1_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_1->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_1_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_1_balls; ?></th>
								</tr>
								<?php $batsman_2 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_batting_player_2_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_2->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_2_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_2_balls; ?></th>
								</tr>
								<?php $batsman_3 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_batting_player_3_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_3->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_3_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_batting_player_3_balls; ?></th>
								</tr>
							</table>

						</div>
						<div class="header_card2">
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-4 p-1">
									<img width="50px" src="<?php echo base_url('assets/media/icons/cricket_ball'); ?>"
										 alt="">
								</div>
								<div class="col-md-4 text-center my-auto text-white">
									<h5 class="text-white font-weight-bold"><?php echo "Overs: " . $match_summary->first_team_overs_played; ?></h5>
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
						<div class="header_card_body">
							<table class="table shadow">
								<?php $bowler_1 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_bowling_player_1_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_1->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_1_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_1_overs; ?></th>
								</tr>
								<?php $bowler_2 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_bowling_player_2_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_2->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_2_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_2_overs; ?></th>
								</tr>
								<?php $bowler_3 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_bowling_player_3_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_3->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_3_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_bowling_player_3_overs; ?></th>
								</tr>
							</table>

						</div>

					</div>
					<div class="col-sm-6">
						<div class="header_card">
							<?php $second_team = $this->db->select('id, company_name, logo')->from('teams')->where('id', $match_summary->second_team_id)->get()->row(); ?>
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-2 p-1">
									<img width="50px"
										 src="<?php echo base_url('uploads/teams/') . $second_team->logo; ?>" alt="">
								</div>
								<div class="col-md-8 text-center my-auto text-white">
									<h4><?php echo $second_team->company_name; ?></h4>
								</div>
								<?php if ($second_team->id === $match_summary->winning_team_id) { ?>
									<div class="col-md-2 p-1 text-right">
										<img width="50px"
											 src="<?php echo base_url('assets/media/icons/match_win.png'); ?>" alt="">
									</div>
								<?php } ?>
							</div>
						</div>

						<div class="header_card2 mt-4">
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-4 p-1">
									<img width="50px" src="<?php echo base_url('assets/media/icons/cricket_bat'); ?>"
										 alt="">
								</div>
								<div class="col-md-4 text-center my-auto text-white">
									<h5 class="text-white font-weight-bold"><?php echo "Score: " . $match_summary->second_team_score . '-' . $match_summary->second_team_wickets; ?></h5>
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
						<div class="header_card_body">
							<table class="table shadow">
								<?php $batsman_1 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_batting_player_1_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_1->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_1_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_1_balls; ?></th>
								</tr>
								<?php $batsman_2 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_batting_player_2_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_2->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_2_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_2_balls; ?></th>
								</tr>
								<?php $batsman_3 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->second_team_batting_player_3_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $batsman_3->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_3_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->second_team_batting_player_3_balls; ?></th>
								</tr>
							</table>
						</div>
						<div class="header_card2">
							<div class="row col-md-12 m-0 p-0">
								<div class="col-md-4 p-1">
									<img width="50px" src="<?php echo base_url('assets/media/icons/cricket_ball'); ?>"
										 alt="">
								</div>
								<div class="col-md-4 text-center my-auto text-white">
									<h5 class="text-white font-weight-bold"><?php echo "Overs: " . $match_summary->second_team_overs_played; ?></h5>
								</div>
								<div class="col-md-4"></div>
							</div>
						</div>
						<div class="header_card_body">
							<table class="table shadow">
								<?php $bowler_1 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_bowling_player_1_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_1->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_1_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_1_balls; ?></th>
								</tr>
								<?php $bowler_2 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_bowling_player_2_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_2->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_2_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_2_balls; ?></th>
								</tr>
								<?php $bowler_3 = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->first_team_bowling_player_3_name)->get()->row(); ?>
								<tr>
									<th width="350px;"><?php echo $bowler_3->player_name; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_3_score; ?></th>
									<th class="text-center"
										width="75px;"><?php echo $match_summary->first_team_bowling_player_3_balls; ?></th>
								</tr>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<?php $player = $this->db->select('id, player_name')->from('players')->where('id', $match_summary->player_of_the_match_id)->get()->row(); ?>
	<div class="row my-3 mx-0">
		<div class="col-md-5 mx-auto shadow-lg">
			<div class="row">
				<h5 class="text-center text-white header_card3 mx-auto p-1">Player of the match</h5>
			</div>
			<div class="row">
				<div class="col-md-5">
					<img class="rounded-circle p-1" width="100px;"
						 src="<?php echo base_url('assets/media/users/user.png'); ?>"/>
					<span class="font-weight-bold"><?php echo $player->player_name; ?></span>
				</div>

				<div class="col-md-7 my-auto">
					<?php if ($match_summary->player_of_the_match_balls !== '0') { ?>
						<div class="col-md-12">
							<?php $sr = number_format((float)$match_summary->player_of_the_match_score / $match_summary->player_of_the_match_balls * 100, 2, '.', ''); ?>
							<img class="rounded-circle p-1" width="40px;"
								 src="<?php echo base_url('assets/media/icons/cricket_bat_black.png'); ?>"/>
							<span class="font-weight-bold"><?php echo $match_summary->player_of_the_match_score . ' (' . $match_summary->player_of_the_match_balls . ')' . ' | SR: ' . $sr . ' | 4s: ' . $match_summary->player_of_the_match_4s . ' | 6s: ' . $match_summary->player_of_the_match_6s; ?></span>
						</div>
					<?php } ?>


					<?php if ($match_summary->player_of_the_match_bowling_score !== '0') { ?>
						<div class="col-md-12">
							<?php $ec = number_format((float)explode('-', $match_summary->player_of_the_match_bowling_score)[0] / $match_summary->player_of_the_match_overs, 2, '.', ''); ?>
							<img class="rounded-circle p-1" width="40px;"
								 src="<?php echo base_url('assets/media/icons/cricket_ball_black.png'); ?>"/>
							<span class="font-weight-bold"><?php echo $match_summary->player_of_the_match_bowling_score . ' (' . $match_summary->player_of_the_match_overs . ')' . ' | EC: ' . $ec . ' | 4s: ' . $match_summary->player_of_the_match_bowling_4s . ' | 6s: ' . $match_summary->player_of_the_match_bowling_6s; ?></span>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>

	<section class="mt-1 p-4" style="background-color: #001648">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 col-md-4">
					<div class="footer_link" style="background-color: white;border-radius: 30px">
						<button class="btn shadow w-100 p-2" style="border-radius: 20px">
							<a href="" class="font-weight-bold " style="color: black">Powered by: A - Tech Solutions</a>
						</button>
					</div>
				</div>
				<?php $winning_team = $this->db->select('id, company_name')->from('teams')->where('id', $match_summary->winning_team_id)->get()->row(); ?>
				<div class="col-lg-8 col-md-8">
					<div class="footer_link" style="background-color: white;border-radius: 30px">
						<button class="btn shadow w-100 p-2" style="border-radius: 20px">
							<a href="" class="font-weight-bold"
							   style="color: black"><?php echo $winning_team->company_name . ' Won by ' . $match_summary->won_by; ?></a>
						</button>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>

</body>
</html>
