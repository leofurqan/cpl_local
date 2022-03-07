<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('marketing_manager/matches/match_summary') ?>"
			   class="btn btn-brand btn-elevate btn-icon-sm">
				<i class="la la-list"></i>
				Match Summary List
			</a>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open_multipart('marketing_manager/matches/edit_match_summary/'.$match_summary->id,'class="kt-form kt-form--label-right"'); ?>

	<div class="kt-portlet__body">
		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">Tournament</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-4">
				<label>Tournament:</label>
				<select class="form-control" name="tournament_id" id="tournament_id">
					<option value="">Select Tournament</option>
					<?php foreach ($tournaments as $tournament) { ?>
						<option value="<?php echo $tournament->id; ?>"><?php echo $tournament->tournament_name; ?></option>
					<?php } ?>
				</select>
			</div>
			<div class="col-lg-4">
				<label>Pool:</label>
				<input type="text" class="form-control" name="pool_name" placeholder="Pool Name"
					   value="<?php echo $match_summary->pool_name;?>"
				/>
			</div>
		</div>

		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">First Team</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Team:</label>
				<select class="form-control" name="first_team_id" id="first_team">
					<option  value="<?php echo $match_summary->first_team_id;?>">Select Tournament First</option>
				</select>
			</div>

			<div class="col-lg-3">
				<label>Score:</label>
				<input type="text" class="form-control" name="first_team_score" value="<?php echo $match_summary->first_team_score;?>" placeholder="First Team Score"/>
			</div>

			<div class="col-lg-3">
				<label>Wickets:</label>
				<input type="text" class="form-control" name="first_team_wickets" value="<?php echo $match_summary->first_team_wickets;?>" placeholder="First Team Score"/>
			</div>

			<!--<div class="col-lg-3">
				<div class="kt-checkbox-inline mt-5">
					<label class="kt-checkbox">
						<input type="checkbox"> Winning Team
						<span></span>
					</label>
				</div>
			</div>-->

			<div class="col-lg-3">
				<label>Overs Played:</label>
				<input type="text" class="form-control" name="first_team_overs_played" value="<?php echo $match_summary->first_team_overs_played;?>"
					   placeholder="First Team Overs Played"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 1 Name:</label>
				<select class="form-control" name="first_team_batting_player_1_name"
						id="first_team_batting_player_1_name">
					<option value="<?php echo $match_summary->first_team_batting_player_1_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 1 Score:</label>
				<input type="text" class="form-control" name="first_team_batting_player_1_score" value="<?php echo $match_summary->first_team_batting_player_1_score;?>"
					   placeholder="Player 1 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 1 Balls:</label>
				<input type="text" class="form-control" name="first_team_batting_player_1_balls" value="<?php echo $match_summary->first_team_batting_player_1_balls;?>"
					   placeholder="Player 1 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 2 Name:</label>
				<select class="form-control" name="first_team_batting_player_2_name"
						id="first_team_batting_player_2_name">
					<option value="<?php echo $match_summary->first_team_batting_player_2_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 2 Score:</label>
				<input type="text" class="form-control" name="first_team_batting_player_2_score" value="<?php echo $match_summary->first_team_batting_player_2_score;?>"
					   placeholder="Player 2 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 2 Balls:</label>
				<input type="text" class="form-control" name="first_team_batting_player_2_balls" value="<?php echo $match_summary->first_team_batting_player_2_balls;?>"
					   placeholder="Player 2 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 3 Name:</label>
				<select class="form-control" name="first_team_batting_player_3_name"
						id="first_team_batting_player_3_name">
					<option value="<?php echo $match_summary->first_team_batting_player_3_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 3 Score:</label>
				<input type="text" class="form-control" name="first_team_batting_player_3_score"
					   value="<?php echo $match_summary->first_team_batting_player_3_score;?>"
					   placeholder="Player 3 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 3 Balls:</label>
				<input type="text" class="form-control" name="first_team_batting_player_3_balls"
					   value="<?php echo $match_summary->first_team_batting_player_3_balls;?>"
					   placeholder="Player 3 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 1 Name:</label>
				<select class="form-control" name="first_team_bowling_player_1_name"
						id="first_team_bowling_player_1_name">
					<option value="<?php echo $match_summary->first_team_bowling_player_1_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 1 Score:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_1_score"
					   value="<?php echo $match_summary->first_team_bowling_player_1_score;?>"
					   placeholder="Player 1 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 1 Overs:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_1_balls"
					   value="<?php echo $match_summary->first_team_bowling_player_1_balls;?>"
					   placeholder="Player 1 Overs"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 2 Name:</label>
				<select class="form-control" name="first_team_bowling_player_2_name"
						id="first_team_bowling_player_2_name">
					<option value="<?php echo $match_summary->first_team_bowling_player_2_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 2 Score:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_2_score"
					   value="<?php echo $match_summary->first_team_bowling_player_2_score;?>"
					   placeholder="Player 2 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 2 Overs:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_2_balls"
					   value="<?php echo $match_summary->first_team_bowling_player_2_balls;?>"
					   placeholder="Player 2 Overs"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 3 Name:</label>
				<select class="form-control" name="first_team_bowling_player_3_name"
						id="first_team_bowling_player_3_name">
					<option value="<?php echo $match_summary->first_team_bowling_player_3_name;?>">Select First Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 3 Score:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_3_score"
					   value="<?php echo $match_summary->first_team_bowling_player_3_balls;?>"
					   placeholder="Player 3 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 3 Overs:</label>
				<input type="text" class="form-control" name="first_team_bowling_player_3_balls"
					   value="<?php echo $match_summary->first_team_batting_player_3_balls;?>"
					   placeholder="Player 3 Overs"/>
			</div>
		</div>

		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">Second Team</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Team:</label>
				<select class="form-control" name="second_team_id" id="second_team">
					<option value="<?php echo $match_summary->second_team_id;?>">Select Tournament First</option>
				</select>
			</div>

			<div class="col-lg-3">
				<label>Score:</label>
				<input type="text" class="form-control" name="second_team_score"
					   value="<?php echo $match_summary->second_team_score;?>"
					   placeholder="Second Team Score"/>
			</div>

			<div class="col-lg-3">
				<label>Wickets:</label>
				<input type="text" class="form-control" name="second_team_wickets"
					   value="<?php echo $match_summary->second_team_wickets;?>"
					   placeholder="Second Team Wickets"/>
			</div>

			<!--<div class="col-lg-3">
				<div class="kt-checkbox-inline mt-5">
					<label class="kt-checkbox">
						<input type="checkbox"> Winning Team
						<span></span>
					</label>
				</div>
			</div>-->

			<div class="col-lg-3">
				<label>Overs Played:</label>
				<input type="text" class="form-control" name="second_team_overs_played"
					   value="<?php echo $match_summary->second_team_overs_played;?>"
					   placeholder="Second Team Overs Played"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 1 Name:</label>
				<select class="form-control" name="second_team_batting_player_1_name"
						id="second_team_batting_player_1_name">
					<option value="<?php echo $match_summary->second_team_batting_player_1_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 1 Score:</label>
				<input type="text" class="form-control" name="second_team_batting_player_1_score"
					   value="<?php echo $match_summary->second_team_batting_player_1_score;?>"
					   placeholder="Player 1 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 1 Balls:</label>
				<input type="text" class="form-control" name="second_team_batting_player_1_balls"
					   value="<?php echo $match_summary->second_team_batting_player_1_balls;?>"
					   placeholder="Player 1 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 2 Name:</label>
				<select class="form-control" name="second_team_batting_player_2_name"
						id="second_team_batting_player_2_name">
					<option value="<?php echo $match_summary->second_team_batting_player_2_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 2 Score:</label>
				<input type="text" class="form-control" name="second_team_batting_player_2_score"
					   value="<?php echo $match_summary->second_team_batting_player_2_score;?>"
					   placeholder="Player 2 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 2 Balls:</label>
				<input type="text" class="form-control" name="second_team_batting_player_2_balls"
					   value="<?php echo $match_summary->second_team_batting_player_2_balls;?>"
					   placeholder="Player 2 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Batsman 3 Name:</label>
				<select class="form-control" name="second_team_batting_player_3_name"
						id="second_team_batting_player_3_name">
					<option value="<?php echo $match_summary->second_team_batting_player_3_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Batsman 3 Score:</label>
				<input type="text" class="form-control" name="second_team_batting_player_3_score"
					   value="<?php echo $match_summary->second_team_batting_player_3_score;?>"
					   placeholder="Player 3 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Batsman 3 Balls:</label>
				<input type="text" class="form-control" name="second_team_batting_player_3_balls"
					   value="<?php echo $match_summary->second_team_batting_player_3_balls;?>"
					   placeholder="Player 3 Balls"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 1 Name:</label>
				<select class="form-control" name="second_team_bowling_player_1_name"
						id="second_team_bowling_player_1_name">
					<option value="<?php echo $match_summary->second_team_bowling_player_1_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 1 Score:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_1_score"
					   value="<?php echo $match_summary->second_team_bowling_player_1_score;?>"
					   placeholder="Player 1 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 1 Overs:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_1_overs"
					   value="<?php echo $match_summary->second_team_bowling_player_1_overs;?>"
					   placeholder="Player 1 Overs"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 2 Name:</label>
				<select class="form-control" name="second_team_bowling_player_2_name"

						id="second_team_bowling_player_2_name">
					<option value="<?php echo $match_summary->second_team_bowling_player_2_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 2 Score:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_2_score"
					   value="<?php echo $match_summary->second_team_bowling_player_2_score;?>"
					   placeholder="Player 2 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 2 Overs:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_2_overs"
					   value="<?php echo $match_summary->second_team_bowling_player_2_overs;?>"
					   placeholder="Player 2 Overs"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Bowler 3 Name:</label>
				<select class="form-control" name="second_team_bowling_player_3_name"
						id="second_team_bowling_player_3_name">
					<option value="<?php echo $match_summary->second_team_bowling_player_3_name;?>">Select Second Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Bowler 3 Score:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_3_score"
					   value="<?php echo $match_summary->second_team_bowling_player_3_score;?>"
					   placeholder="Player 3 Score"/>
			</div>
			<div class="col-lg-3">
				<label>Bowler 3 Overs:</label>
				<input type="text" class="form-control" name="second_team_bowling_player_3_overs"
					   value="<?php echo $match_summary->second_team_bowling_player_3_overs;?>"
					   placeholder="Player 3 Overs"/>
			</div>
		</div>

		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">Winning Team</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Winning Team:</label>
				<select class="form-control" name="winning_team_id" id="winning_team">
					<option value="<?php echo $match_summary->winning_team_id;?>">Select Tournament First</option>
				</select>
			</div>

			<div class="col-lg-3">
				<label>Won by Runs/Wickets:</label>
				<input type="text" class="form-control" name="won_by"
					   value="<?php echo $match_summary->won_by;?>"
					   placeholder="Won by"/>
			</div>
		</div>

		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">Player of the match (Batting)</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Player of the match:</label>
				<select class="form-control" name="player_of_the_match_id"
						id="player_of_the_match">
					<option value="<?php echo $match_summary->player_of_the_match_id;?>">Select Winning Team</option>
				</select>
			</div>
			<div class="col-lg-3">
				<label>Player of the match score:</label>
				<input type="text" class="form-control" name="player_of_the_match_score"
					   value="<?php echo $match_summary->player_of_the_match_score;?>"
					   placeholder="Player of the match score"/>
			</div>
			<div class="col-lg-3">
				<label>Player of the match balls:</label>
				<input type="text" class="form-control" name="player_of_the_match_balls"
					   value="<?php echo $match_summary->player_of_the_match_balls;?>"
					   placeholder="Player of the match balls"/>
			</div>
			<div class="col-lg-3">
				<label>No. of 4's:</label>
				<input type="text" class="form-control" name="player_of_the_match_4s"
					   value="<?php echo $match_summary->player_of_the_match_4s;?>"
					   placeholder="4's"/>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>No. of 6's:</label>
				<input type="text" class="form-control" name="player_of_the_match_6s"
					   value="<?php echo $match_summary->player_of_the_match_6s;?>"
					   placeholder="6's"/>
			</div>
		</div>

		<div class="row bg-primary p-2 justify-content-center">
			<h4 class="text-white">Player of the match (Bowling)</h4>
		</div>

		<br/>

		<div class="form-group row">
			<div class="col-lg-3">
				<label>Player of the match bowling score:</label>
				<input type="text" class="form-control" name="player_of_the_match_bowling_score"
					   value="<?php echo $match_summary->player_of_the_match_bowling_score;?>"
					   placeholder="Player of the match bowling score"/>
			</div>
			<div class="col-lg-3">
				<label>Player of the match overs:</label>
				<input type="text" class="form-control" name="player_of_the_match_overs"
					   value="<?php echo $match_summary->player_of_the_match_overs;?>"
					   placeholder="Player of the match overs"/>
			</div>
			<div class="col-lg-3">
				<label>No. of 4's:</label>
				<input type="text" class="form-control" name="player_of_the_match_bowling_4s"
					   value="<?php echo $match_summary->player_of_the_match_bowling_4s;?>"
					   placeholder="Bowling 4's"/>
			</div>
			<div class="col-lg-3">
				<label>No. of 6's:</label>
				<input type="text" class="form-control" name="player_of_the_match_bowling_6s"
					   value="<?php echo $match_summary->player_of_the_match_bowling_6s;?>"
					   placeholder="Bowling 6's"/>
			</div>
		</div>
	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-8">
					<button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit
					</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!--end::Form-->
</div>
<script>
	$('#tournament_id').onload(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("marketing_manager/matches/get_teams_by_tournament_id");?>',
			data: {
				'tournament_id': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				$('#first_team').html(data);
				$('#second_team').html(data);
				$('#winning_team').html(data);
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});

	$('#first_team').onload(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("marketing_manager/matches/get_players_by_team_id");?>',
			data: {
				'team_id': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				$('#first_team_batting_player_1_name').html(data);
				$('#first_team_batting_player_2_name').html(data);
				$('#first_team_batting_player_3_name').html(data);
				$('#first_team_bowling_player_1_name').html(data);
				$('#first_team_bowling_player_2_name').html(data);
				$('#first_team_bowling_player_3_name').html(data);
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});

	$('#second_team').onload(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("marketing_manager/matches/get_players_by_team_id");?>',
			data: {
				'team_id': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				$('#second_team_batting_player_1_name').html(data);
				$('#second_team_batting_player_2_name').html(data);
				$('#second_team_batting_player_3_name').html(data);
				$('#second_team_bowling_player_1_name').html(data);
				$('#second_team_bowling_player_2_name').html(data);
				$('#second_team_bowling_player_3_name').html(data);
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});

	$('#winning_team').onload(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("marketing_manager/matches/get_players_by_team_id");?>',
			data: {
				'team_id': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				$('#player_of_the_match').html(data);
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});
</script>
