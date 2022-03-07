<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
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
									</h3>
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
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Innings:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Runs:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">30s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">50s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">100s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Wickets:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-widget__item">
											<div class="row justify-content-center">
												<?php if ($players[$count]->status == '1') { ?>
													<span
															class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill mb-2 "
															onclick="change_status(<?php echo $players[$count]->id ?>,<?php echo $players[$count]->status ?>)">
														Actives
													</span>
												<?php } else { ?>
													<span
															class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill mb-2"
															onclick="change_status(<?php echo $players[$count]->id; ?>,<?php echo $players[$count]->status ?>)">
														Inactive
													</span>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="kt-widget__footer">


										<a href="<?php echo base_url('team/players/overview/' . $players[$count]->id) ?>"
										   class="btn btn-outline-success btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
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
									</h3>
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
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Innings:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Runs:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">30s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">50s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>

										<div class="kt-widget__item">
											<div class="row">
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">100s:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
												<div class="col-md-6">
													<div class="kt-widget__contact">
														<span class="kt-widget__label">Wickets:</span>
														<span class="kt-widget__data"></span>
													</div>
												</div>
											</div>
										</div>
										<div class="kt-widget__item">
											<div class="row justify-content-center">
												<?php if ($players[$count]->status == '1') { ?>
													<span
															class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill mb-2 "
															onclick="change_status(<?php echo $players[$count]->id ?>,<?php echo $players[$count]->status ?>)">
														Actives
													</span>
												<?php } else { ?>
													<span
															class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill mb-2"
															onclick="change_status(<?php echo $players[$count]->id; ?>,<?php echo $players[$count]->status ?>)">
														Inactive
													</span>
												<?php } ?>
											</div>
										</div>
									</div>
									<div class="kt-widget__footer">
										<a href="<?php echo base_url('admin/players/overview/' . $players[$count]->id) ?>"
										   class="btn btn-outline-success btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
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
</div>

<script>
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
