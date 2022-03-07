<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

		<!--Begin::App-->
		<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">

			<div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">

				<!--begin:: Widgets/Applications/User/Profile1-->

				<div class="kt-portlet ">
					<div class="kt-portlet__head  kt-portlet__head--noborder">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">
							</h3>
						</div>
					</div>
					<div class="kt-portlet__body kt-portlet__body--fit-y">

						<!--begin::Widget -->
						<div class="kt-widget kt-widget--user-profile-1">
							<div class="kt-widget__head">
								<div class="kt-widget__media">
									<img src="<?php echo base_url('uploads/players/' . $player->image); ?>" alt="image">
								</div>
								<div class="kt-widget__content">
									<div class="kt-widget__section">
										<a href="#" class="kt-widget__username"><i
													class="flaticon2-correct kt-font-success">
												<?php echo $player->player_name ?>
											</i>
										</a>
										<span class="kt-widget__subtitle">
																Player
															</span>
									</div>
									<div class="kt-widget__action">
										<label class=" col-form-label">CPL Ranking</label>

										<span class="kt-widget__data"></span>
									</div>
								</div>
							</div>
							<div class="kt-widget__body">
								<div class="kt-widget__content">
									<div class="kt-widget__info">
										<span class="kt-widget__label">Email:</span>
										<a href="#" class="kt-widget__data"><?php echo $player->email ?></a>
									</div>
									<div class="kt-widget__info">
										<span class="kt-widget__label">Phone:</span>
										<a href="#" class="kt-widget__data"><?php echo $player->contact ?></a>
									</div>
								</div>
								<div class="kt-widget__items">

									<a href="<?php echo base_url('team/players/overview/' . $player->id); ?>"
									   class="kt-widget__item kt-widget__item--active">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg"
																		 xmlns:xlink="http://www.w3.org/1999/xlink"
																		 width="24px" height="24px" viewBox="0 0 24 24"
																		 version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
																		   fill-rule="evenodd">
																			<polygon points="0 0 24 0 24 24 0 24"/>
																			<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
																				  fill="#000000" fill-rule="nonzero"
																				  opacity="0.3"/>
																			<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
																				  fill="#000000" fill-rule="nonzero"/>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">
																	Personal Information
																</span>
															</span>
									</a>

									<a href="<?php echo base_url('admin/players/batting_stats/' . $player->id); ?>"
									   class="kt-widget__item ">
															<span class="kt-widget__section">
																<span class="kt-widget__icon">
																	<svg xmlns="http://www.w3.org/2000/svg"
																		 xmlns:xlink="http://www.w3.org/1999/xlink"
																		 width="24px" height="24px" viewBox="0 0 24 24"
																		 version="1.1" class="kt-svg-icon">
																		<g stroke="none" stroke-width="1" fill="none"
																		   fill-rule="evenodd">
																			<rect x="0" y="0" width="24" height="24"/>
																			<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
																				  fill="#000000" opacity="0.3"/>
																			<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
																				  fill="#000000" opacity="0.3"/>
																			<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
																				  fill="#000000" opacity="0.3"/>
																		</g>
																	</svg> </span>
																<span class="kt-widget__desc">
																	 Statistics
																</span>
															</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
				<div class="row">
					<div class="col-xl-12">
						<div class="kt-portlet">
							<div class="kt-portlet__head">
								<div class="kt-portlet__head-label">
									<h3 class="kt-portlet__head-title">Player Information <small>Player personal
											informaiton</small></h3>
								</div>
								<div class="kt-portlet__head-toolbar">
									<div class="kt-portlet__head-wrapper">

									</div>
								</div>
							</div>

							<div class="kt-portlet__body">
								<div class="kt-section kt-section--first">
									<div class="kt-section__body">
										<div class="row">
											<label class="col-xl-3"></label>
											<div class="col-lg-9 col-xl-6">
												<h3 class="kt-section__title kt-section__title-sm">Player Info:</h3>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
											<div class="col-lg-9 col-xl-6">
												<div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">


														<span class="kt-widget__data"><img style="border-radius: 50px"
																						   width="80px;"
																						   src="<?php echo base_url('uploads/players/' . $player->image); ?>"/></span>


												</div>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Player Name</label>
											<div class="col-lg-9 col-xl-6">
												<span class="kt-widget__data"><?php echo $player->player_name; ?></span>
											</div>
										</div>
										<!--								<div class="form-group row">-->
										<!--									<label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>-->
										<!--									<div class="col-lg-9 col-xl-6">-->
										<!--										<input class="form-control" type="text" value="-->
										<?php //echo $user->last_name; ?><!--">-->
										<!--									</div>-->
										<!--								</div>-->
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Contact</label>
											<div class="col-lg-9 col-xl-6">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><i
																	class="la la-phone"></i></span></div>
													<span class="kt-widget__data"><?php echo $player->contact; ?></span>
												</div>

											</div>
										</div>


										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
											<div class="col-lg-9 col-xl-6">
												<div class="input-group">
													<div class="input-group-prepend"><span class="input-group-text"><i
																	class="la la-at"></i></span></div>
													<span class="kt-widget__data"><?php echo $player->email; ?></span>
												</div>
												<span class="form-text text-muted">We'll never share your email with anyone else.</span>
											</div>
										</div>

										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Tournaments</label>
											<div class="col-lg-9 col-xl-6">
												<span class="kt-widget__data"><?php echo $this->db->query('select (select count(*) from tournament_player_mapping where player_id = "' . $player->id . '") as tournament_count')->row()->tournament_count; ?></span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Matches</label>
											<div class="col-lg-9 col-xl-6">
												<span class="kt-widget__data"><?php echo $this->db->query('select (select count(*) from match_player_mapping where player_id = "' . $player->id . '") as matches_count')->row()->matches_count; ?></span>
											</div>
										</div>
										<div class="form-group row">
											<label class="col-xl-3 col-lg-3 col-form-label">Innings</label>
											<div class="col-lg-9 col-xl-6">

												<span class="kt-widget__data"></span>
											</div>
										</div>


									</div>
								</div>
							</div>
							<div class="kt-portlet__foot">
								<div class="kt-form__actions">
									<div class="row">
										<div class="col-lg-3 col-xl-3">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('#email').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("player/profile/check_email");?>',
			data: {
				'email': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				var response = JSON.parse(data);
				console.log(response);
				$('#email').removeClass('is-valid');
				$('#email').removeClass('is-invalid');
				$('#email').parent().find('.valid-feedback').remove();
				$('#email').parent().find('.invalid-feedback').remove();
				if (data === "false") {
					$('#email').addClass('is-invalid');
					$('#email').parent().append('<div class="invalid-feedback">Email already exist.</div>');
				} else {
					$('#email').addClass('is-valid');
					$('#email').parent().append('<div class="valid-feedback">Email is available.</div>');
				}
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});
</script>
<script>
	$('#cnic').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("player/profile/check_cnic");?>',
			data: {
				'cnic': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				var response = JSON.parse(data);
				console.log(response);
				$('#cnic').removeClass('is-valid');
				$('#cnic').removeClass('is-invalid');
				$('#cnic').parent().find('.valid-feedback').remove();
				$('#cnic').parent().find('.invalid-feedback').remove();
				if (data === "false") {
					$('#cnic').addClass('is-invalid');
					$('#cnic').parent().append('<div class="invalid-feedback">CNIC already exist.</div>');
				} else {
					$('#cnic').addClass('is-valid');
					$('#cnic').parent().append('<div class="valid-feedback">CNIC is available.</div>');
				}
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});
</script>
<script>
	$('#contact').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("player/profile/check_contact");?>',
			data: {
				'contact': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				var response = JSON.parse(data);
				console.log(response);
				$('#contact').removeClass('is-valid');
				$('#contact').removeClass('is-invalid');
				$('#contact').parent().find('.valid-feedback').remove();
				$('#contact').parent().find('.invalid-feedback').remove();
				if (data === "false") {
					$('#contact').addClass('is-invalid');
					$('#contact').parent().append('<div class="invalid-feedback">Contact already exist.</div>');
				} else {
					$('#contact').addClass('is-valid');
					$('#contact').parent().append('<div class="valid-feedback">Contact is available.</div>');
				}
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});
</script>
