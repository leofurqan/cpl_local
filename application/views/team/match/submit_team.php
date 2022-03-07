<div class="row">
	<div class="col-md-12">
		<div class="kt-portlet" id="tournament_portlet">
			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="kt-portlet__head-label col-md-12 align-self-center">
						<h4 class="kt-portlet__head-title">


									<img width="60px" src="<?php echo base_url('uploads/tournaments/' . $match->logo); ?>">

							<?php echo  $match->tournament_name ; ?>
							(
							<?php echo  $match->first_team_name ;?>
							VS
							<?php echo  $match->second_team_name ;?>
							)
						</h4>


				</div>

					</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-striped- table-bordered table-hover table-checkable" id="player_table">
					<thead>
					<tr>
						<th>RecordID</th>
						<th>Image</th>
						<th>Name</th>
						<th>Playing Style</th>
						<th>Player Role</th>
						<th>Shirt Number</th>
					</tr>
					</thead>
					<tbody id="table_players">
					<?php if (!empty($players)) {
						foreach ($players as $player) { ?>
							<tr id="<?php echo $player->id; ?>">
								<td id="player_id"><?php echo $player->id; ?></td>
								<td><?php if ($player->image) { ?>
										<img width="48px;" src="<?php echo base_url('uploads/players/' . $player->image); ?>"/>
									<?php } else { ?>
										<img width="48px;" src="<?php echo base_url('assets/media/users/user2.png'); ?>"/>
									<?php } ?>
								</td>
								<td><?php echo $player->player_name; ?></td>
								<td><?php echo $player->playing_status; ?></td>
								<td>
									<select class="form-control" name="player_role" id="player_role">
										<option value="0">Select Player Role</option>
										<?php foreach ($player_roles as $role) { ?>
											<option value="<?php echo $role->id; ?>"<?php if ($role->id == $player->role_id) {
												echo 'selected';
											} ?>><?php echo $role->role_name; ?></option>
										<?php } ?>
									</select>
								</td>
								<td><?php echo $player->shirt_number; ?></td>
							</tr>
							<?php
						}
					} ?>
					</tbody>
				</table>
			</div>

			<div class="kt-portlet__foot">
				<div class="kt-form__actions">
					<div class="row">
						<div class="col-lg-4"></div>
						<div class="col-lg-8">
							<button type="button" id="submit" class="btn btn-primary">Submit</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#submit').on('click', function () {
		var players = [];
		var count = 0;
		$('#table_players tr.active').each(function () {
			players[count] = {
				player_id: $(this).attr('id'),
				player_role: $(this).find('#player_role').val(),
			};
			count++;
		});

		if (count < 3 || count > 12) {
			alert('Please select players between 7 to 12');
		} else {
			var captain_count = 0;
			for (var i = 0; i < players.length; i++) {
				if (players[i].player_role == 1 || players[i].player_role == 4) {
					captain_count++;
				}
			}

			if (captain_count === 0 || captain_count > 1) {
				alert('Please select only 1 captain');
			} else {
				var keeper_count = 0;
				for (var i = 0; i < players.length; i++) {
					if (players[i].player_role == 2 || players[i].player_role == 4) {
						keeper_count++;
					}
				}

				if (keeper_count === 0 || keeper_count > 1) {
					alert('Please select only 1 keeper');
				} else {
					if (players.length == 12) {
						var tm = 0;
						for (var i = 0; i < players.length; i++) {
							if (players[i].player_role == 5) {
								tm++;
							}
						}

						if (tm === 0 || tm > 1) {
							alert('Please select one 12th man');
						} else {
							KTApp.blockPage({
								overlayColor: '#000000',
								type: 'v2',
								state: 'primary',
								message: 'Submitting...'
							});

							$.ajax({
								type: 'POST',
								url: '<?php echo base_url("team/match/submit_match_squad");?>',
								data: {
									'players': JSON.stringify(players),
									'match_id': '<?php echo $match->id;?>'
								},
								datatype: 'JSON',
								success: function (data) {
									KTApp.unblockPage('#tournament_portlet');
									if (data === "true") {
										<?php echo $this->session->set_flashdata('success', "Submitted Successfully"); ?>
										window.location.href = '<?php echo base_url("team/match/");?>';
									} else {
										alert('something went wrong');
									}
								},
								error: function () {
									KTApp.unblockPage('#tournament_portlet');
									alert('something went wrong');
								}
							});
						}
					} else {
						KTApp.blockPage({
							overlayColor: '#000000',
							type: 'v2',
							state: 'primary',
							message: 'Submitting...'
						});

						$.ajax({
							type: 'POST',
							url: '<?php echo base_url("team/match/submit_match_squad");?>',
							data: {
								'players': JSON.stringify(players),
								'match_id': '<?php echo $match->id;?>'
							},
							datatype: 'JSON',
							success: function (data) {
								KTApp.unblockPage('#tournament_portlet');
								if (data === "true") {
									<?php echo $this->session->set_flashdata('success', "Submitted Successfully"); ?>
									window.location.href = '<?php echo base_url("team/match/");?>';
								} else {
									alert('something went wrong');
								}
							},
							error: function () {
								KTApp.unblockPage('#tournament_portlet');
								alert('something went wrong');
							}
						});
					}
				}
			}
		}
	});
</script>
