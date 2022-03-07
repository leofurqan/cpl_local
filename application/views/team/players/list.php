<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

	<!--Begin::Section-->
	<?php
	$rows = ((int)(sizeof($players) / 4)) + 1;
	$remaining = sizeof($players);
	$count = 0;
	for ($i = 0; $i < $rows; $i++) { ?>
		<div class="row">
			<?php if ($remaining < 4) {
				for ($j = 0; $j < $remaining; $j++) { ?>
					<div class="col-xl-3">
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head kt-portlet__head--noborder">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">
										<?php if ($players[$count]->is_verified == '1') { ?>
											<i class="flaticon2-correct kt-font-success">Verified</i>
										<?php } ?>
									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="dropdown dropdown-inline">
										<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="flaticon-more-1"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<ul class="kt-nav">
												<li class="kt-nav__item">
													<a href="<?php echo base_url('team/players/edit/' . $players[$count]->id) ?>"
													   class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-edit"></i>
														<span class="kt-nav__link-text">Edit</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link"
													   onclick="change_id(<?php echo $players[$count]->id ?>)"
													   data-toggle="modal" data-target="#change_password">
														<i class="kt-nav__link-icon flaticon2-pen"></i>
														<span class="kt-nav__link-text">Change Password</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="<?php echo base_url('team/players/send_player_credentials/' . $players[$count]->id) ?>"
													   class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-email"></i>
														<span class="kt-nav__link-text">Send Credentials</span>
													</a>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="kt-widget kt-widget--user-profile-2">
									<div class="kt-widget__head">
										<div class="kt-widget__media">
											<?php if ($players[$count]->image) { ?>
												<img class="kt-widget__img kt-hidden-"
													 src="<?php echo base_url('uploads/players/') . $players[$count]->image; ?>"
													 alt="image">
											<?php } else { ?>
												<img class="kt-widget__img kt-hidden-"
													 src="<?php echo base_url('assets/media/users/user2.png'); ?>"
													 alt="image">
											<?php } ?>
											<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
												ChS
											</div>
										</div>
										<div class="kt-widget__info">
											<a href="#" class="kt-widget__username">
												<?php echo $players[$count]->player_name; ?>
											</a>
											<span class="kt-widget__desc">
												<?php echo $players[$count]->playing_status; ?>
											</span>
										</div>
									</div>
									<div class="kt-widget__body">
										<div class="kt-widget__section">
											<!--I distinguish three <a href="#" class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-54pq</a>objectsves First	esetablished and nice coocked rice-->
										</div>
										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact justify-content-start">
														<span class="kt-widget__label">Tournaments:</span>
														<span class="kt-widget__data ml-3"><?php echo $this->db->query('select (select count(*) from tournament_player_mapping where player_id = "' . $players[$count]->id . '") as tournament_count')->row()->tournament_count; ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact justify-content-start">
														<span class="kt-widget__label">Matches:</span>
														<span class="kt-widget__data ml-3"><?php echo $this->db->query('select (select count(*) from match_player_mapping where player_id = "' . $players[$count]->id . '") as matches_count')->row()->matches_count; ?></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">Innings:</span>
														<span class="kt-widget__data ml-3">0</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">Runs:</span>
														<span class="kt-widget__data ml-3">
															<?php echo $this->db->select('COALESCE(SUM(batsman_score.runs_scored), 0) as batsman_score')
																	->from('ball_by_ball')
																	->join('batsman_score',
																	'ball_by_ball.match_id = batsman_score.match_id 
																	and ball_by_ball.innings_no = batsman_score.innings_no 
																	and ball_by_ball.over_id = batsman_score.over_id 
																	and ball_by_ball.ball_id = batsman_score.ball_id')
																	->where('ball_by_ball.striker', $players[$count]->id)
																	->get()->row()->batsman_score;

															?>

														</span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">30s:</span>
														<span class="kt-widget__data ml-3">
																<?php echo 	$this->db->select('count(batsman_score) as num_of_thirties')
																		->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 30 and 49 ) as A')
																		->get()->row()->num_of_thirties;
																?>

														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">50s:</span>
														<span class="kt-widget__data ml-3">
															<?php echo 	$this->db->select('count(batsman_score) as num_of_fifties')
																	->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 50 and 99 ) as A')
																	->get()->row()->num_of_fifties;
															?>
														</span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">100s:</span>
														<span class="kt-widget__data ml-3">
																<?php echo 	$this->db->select('count(batsman_score) as num_of_hundreds')
																		->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 100 and 199 ) as A')
																		->get()->row()->num_of_hundreds;
																?>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact  d-flex justify-content-start">
														<span class="kt-widget__label">Wickets:</span>
														<span class="kt-widget__data ml-3">
															<?php
															echo $this->db->select('count(*) as wickets')
																	->from('ball_by_ball')
																	->join('match_wickets',
																			'ball_by_ball.match_id = match_wickets.match_id 
																				and ball_by_ball.innings_no = match_wickets.innings_no
																				 and ball_by_ball.over_id = match_wickets.over_id 
																					 and ball_by_ball.ball_id = match_wickets.ball_id')
																	->where('ball_by_ball.bowler', $players[$count]->id)->get()->row()->wickets;

															?>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-widget__item">
											<div class="row justify-content-center">
												<?php if ($players[$count]->status == '1') { ?>
													<button
															class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill mb-2 "
															onclick="change_status(<?php echo $players[$count]->id ?>,<?php echo $players[$count]->status ?>)">
														Actives
													</button>
												<?php } else { ?>
													<button
															class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill mb-2"
															onclick="change_status(<?php echo $players[$count]->id; ?>,<?php echo $players[$count]->status ?>)">
														Inactive
													</button>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="kt-widget__footer">


										<a href="<?php echo base_url('team/players/overview/' . $players[$count]->id) ?>"
										   class="btn btn-outline-success btn-elevate btn-elevate-air btn-icon btn-sm"
										   data-container="body"
										   data-toggle="kt-tooltip" data-placement="top" title="View Profile"><i
													class="fa fa-eye"></i></a>

										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $count++;
				}
			} else {
				for ($j = 0; $j < 4; $j++) { ?>

					<div class="col-xl-3">
						<div class="kt-portlet kt-portlet--height-fluid">
							<div class="kt-portlet__head kt-portlet__head--noborder">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">
										<?php if ($players[$count]->is_verified == '1') { ?>
											<i class="flaticon2-correct kt-font-success">Verified</i>
										<?php } ?>

									</h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="dropdown dropdown-inline">
										<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-lg"
												data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="flaticon-more-1"></i>
										</button>
										<div class="dropdown-menu dropdown-menu-right">
											<ul class="kt-nav">
												<li class="kt-nav__item">
													<a href="<?php echo base_url('team/players/edit/' . $players[$count]->id) ?>"
													   class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-edit"></i>
														<span class="kt-nav__link-text">Edit</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="#" class="kt-nav__link"
													   onclick="change_id(<?php echo $players[$count]->id ?>)"
													   data-toggle="modal" data-target="#change_password">
														<i class="kt-nav__link-icon flaticon2-pen"></i>
														<span class="kt-nav__link-text">Change Password</span>
													</a>
												</li>
												<li class="kt-nav__item">
													<a href="<?php echo base_url('team/players/send_player_credentials/' . $players[$count]->id) ?>"
													   class="kt-nav__link">
														<i class="kt-nav__link-icon flaticon2-email"></i>
														<span class="kt-nav__link-text">Send Credentials</span>
													</a>
												</li>

											</ul>
										</div>
									</div>
								</div>
							</div>
							<div class="kt-portlet__body">
								<div class="kt-widget kt-widget--user-profile-2">
									<div class="kt-widget__head">
										<div class="kt-widget__media">
											<?php if ($players[$count]->image) { ?>
												<img class="kt-widget__img kt-hidden-"
													 src="<?php echo base_url('uploads/players/') . $players[$count]->image; ?>"
													 alt="image">
											<?php } else { ?>
												<img class="kt-widget__img kt-hidden-"
													 src="<?php echo base_url('assets/media/users/user2.png'); ?>"
													 alt="image">
											<?php } ?>
											<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
												ChS
											</div>
										</div>
										<div class="kt-widget__info">
											<a href="#" class="kt-widget__username">
												<?php echo $players[$count]->player_name; ?>
											</a>
											<span class="kt-widget__desc">
												<?php echo $players[$count]->playing_status; ?>
											</span>
										</div>
									</div>
									<div class="kt-widget__body">
										<div class="kt-widget__section">
											<!--I distinguish three <a href="#" class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-54pq</a>objectsves First	esetablished and nice coocked rice-->
										</div>
										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact justify-content-start">
														<span class="kt-widget__label">Tournaments:</span>
														<span class="kt-widget__data ml-3"><?php echo $this->db->query('select (select count(*) from tournament_player_mapping where player_id = "' . $players[$count]->id . '") as tournament_count')->row()->tournament_count; ?></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact justify-content-start">
														<span class="kt-widget__label">Matches:</span>
														<span class="kt-widget__data ml-3"><?php echo $this->db->query('select (select count(*) from match_player_mapping where player_id = "' . $players[$count]->id . '") as matches_count')->row()->matches_count; ?></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">Innings:</span>
														<span class="kt-widget__data ml-3">0</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">Runs:</span>
														<span class="kt-widget__data ml-3">
															<?php echo $this->db->select('COALESCE(SUM(batsman_score.runs_scored), 0) as batsman_score')
																	->from('ball_by_ball')
																	->join('batsman_score',
																			'ball_by_ball.match_id = batsman_score.match_id 
																	and ball_by_ball.innings_no = batsman_score.innings_no 
																	and ball_by_ball.over_id = batsman_score.over_id 
																	and ball_by_ball.ball_id = batsman_score.ball_id')
																	->where('ball_by_ball.striker', $players[$count]->id)
																	->get()->row()->batsman_score;

															?>
														</span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">30s:</span>
														<span class="kt-widget__data ml-3">
															<?php echo 	$this->db->select('count(batsman_score) as num_of_thirties')
																	->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 30 and 49 ) as A')
																	->get()->row()->num_of_thirties;
															?>

														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">50s:</span>
														<span class="kt-widget__data ml-3">
																<?php echo 	$this->db->select('count(batsman_score) as num_of_fifties')
																		->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 50 and 99 ) as A')
																		->get()->row()->num_of_fifties;

																?>
														</span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">100s:</span>
														<span class="kt-widget__data ml-3">
															<?php echo 	$this->db->select('count(batsman_score) as num_of_hundreds')
																	->from('(select SUM(batsman_score.runs_scored) as batsman_score from `batsman_score`
 																		JOIN `ball_by_ball` ON `ball_by_ball`.`match_id` = `batsman_score`.`match_id` 
 																		and `ball_by_ball`.`innings_no` = `batsman_score`.`innings_no` 
 																		and `ball_by_ball`.`over_id` = `batsman_score`.`over_id` 
 																		and `ball_by_ball`.`ball_id` = `batsman_score`.`ball_id` 
 																		where ball_by_ball.striker = '.$players[$count]->id.'
 																		having batsman_score BETWEEN 100 and 199 ) as A')
																	->get()->row()->num_of_hundreds;
															?>
														</span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact d-flex justify-content-start">
														<span class="kt-widget__label">Wickets:</span>
														<span class="kt-widget__data ml-3">
															<?php
															echo $this->db->select('count(*) as wickets')
																	->from('ball_by_ball')
																	->join('match_wickets',
																			'ball_by_ball.match_id = match_wickets.match_id 
																				and ball_by_ball.innings_no = match_wickets.innings_no
																				 and ball_by_ball.over_id = match_wickets.over_id 
																					 and ball_by_ball.ball_id = match_wickets.ball_id')
																	->where('ball_by_ball.bowler', $players[$count]->id)->get()->row()->wickets;

															?>
														</span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-widget__item">
											<div class="row justify-content-center">
												<?php if ($players[$count]->status == '1') { ?>
													<button
															class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill mb-2 "
															onclick="change_status(<?php echo $players[$count]->id ?>,<?php echo $players[$count]->status ?>)">
														Actives
													</button>
												<?php } else { ?>
													<button
															class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill mb-2"
															onclick="change_status(<?php echo $players[$count]->id; ?>,<?php echo $players[$count]->status ?>)">
														Inactive
													</button>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="kt-widget__footer">
										<a href="<?php echo base_url('team/players/overview/' . $players[$count]->id) ?>"
										   class="btn btn-outline-success btn-elevate btn-elevate-air btn-icon btn-sm"
										   data-container="body"
										   data-toggle="kt-tooltip" data-placement="top" title="View Profile"><i
													class="fa fa-eye"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php $count++;
				}
				$remaining = $remaining - 4;
			} ?>
		</div>
	<?php } ?>

	<!--End::Section-->
</div>
<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('team/players/change_password', 'class="kt-form kt-form--label-right"'); ?>

			<div class="modal-body">
				<div class="form-group row">
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="hidden" class="form-control"
							   name="player_id" id="player_id">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">New Password</label>
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="password" class="form-control" name="new_password"
							   id="new_password" placeholder="New password">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">Verify Password</label>
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="password" class="form-control" name="confirm_password"
							   id="confirm_password" placeholder="Verify password">
					</div>
				</div>
				<div class="row d-none justify-content-center" id="error">
					<span class="text-danger">New Password & Confirm Password should be equal.</span>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" value="submit" name="submit"
						class="btn btn-brand btn-bold">Change Password
				</button>&nbsp;
				<button type="reset" class="btn btn-secondary">Cancel</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script>


	$('.kt-form').submit(function (e) {
		$('#error').addClass('d-none');
		if ($('#new_password').val() === $('#confirm_password').val()) {
			$('.kt-form').submit();
		} else {
			e.preventDefault();
			$('#error').removeClass('d-none');
		}
	});

	function change_id(id) {
		$('#player_id').val(id);
	}


	function change_status(id, status) {

		$.ajax({
			type: 'POST',
			url: ' <?php echo base_url("team/players/change_status");?>',
			data: {id: id, status: status},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}

</script>
