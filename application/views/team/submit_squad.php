<script src=<?php echo base_url(); ?>"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js">
</script>
<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-grid  kt-wizard-v1 kt-wizard-v1--white" id="tournament_wizard" data-ktwizard-state="step-first">
			<div class="kt-grid__item">

				<!--begin: Form Wizard Nav -->
				<div class="kt-wizard-v1__nav">
					<div class="kt-wizard-v1__nav-items">

						<!--doc: Replace A tag with SPAN tag to disable the step link click -->
						<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" data-ktwizard-state="current"
							 style="pointer-events:none;">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
									<i class="flaticon2-user"></i>
								</div>
								<div class="kt-wizard-v1__nav-label">
									1. Choose Players
								</div>
							</div>
						</div>
						<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" style="pointer-events:none;">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
									<i class="flaticon2-analytics-2"></i>
								</div>
								<div class="kt-wizard-v1__nav-label">
									2. Choose Captain
								</div>
							</div>
						</div>
						<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" style="pointer-events:none;">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
									<i class="flaticon2-poll-symbol"></i>
								</div>
								<div class="kt-wizard-v1__nav-label">
									3. Choose Wicket Keeper
								</div>
							</div>
						</div>
						<div class="kt-wizard-v1__nav-item" data-ktwizard-type="step" style="pointer-events:none;">
							<div class="kt-wizard-v1__nav-body">
								<div class="kt-wizard-v1__nav-icon">
									<i class="flaticon2-document"></i>
								</div>
								<div class="kt-wizard-v1__nav-label">
									4. Summary
								</div>
							</div>
						</div>

					</div>
				</div>

				<!--end: Form Wizard Nav -->
			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-wizard-v1__wrapper">

				<!--begin: Form Wizard Form-->
				<form class="kt-form" id="kt-form" style="width: 75%">
					<!--begin: Form Wizard Step 1-->
					<div class="kt-wizard-v1__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
						<div class="kt-heading kt-heading--md">Choose Players:</div>
						<div class="row">
							<?php foreach ($players as $player) { ?>
								<div class="col-lg-3 mb-4">
									<div class="card player_card border-0 shadow" id="<?php echo $player->id; ?>"
										 style="width: 100%; height:270px">
										<?php if ($player->image) { ?>
											<img src="<?php echo base_url('uploads/players/') . $player->image; ?>"
												 class="card-img-top rounded-circle m-auto w-75 h-auto"
												 alt="User Image"/>
										<?php } else { ?>
											<img src="<?php echo base_url('assets/media/users/user2.png'); ?>"
												 class="card-img-top rounded-circle m-auto w-75 h-auto"
												 alt="User Image"/>
										<?php } ?>
										<div class="card-body ">
											<div class="kt-widget__contact">
												<span class="kt-widget__label font-weight-bold">Name:</span>
												<span class="kt-widget__label m-auto"><?php echo $player->player_name; ?></span>
											</div>
											<div class="kt-widget__contact">
												<span class="kt-widget__label font-weight-bold">Status:</span>
												<span class="kt-widget__label m-auto badge badge-pill badge-success"><?php echo $player->playing_status; ?></span>
											</div>
										</div>
									</div>
								</div>
							<?php } ?>
						</div>
					</div>

					<!--end: Form Wizard Step 1-->

					<!--begin: Form Wizard Step 2-->
					<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Choose Captain:</div>
						<div class="row" id="captain_row">

						</div>


					</div>

					<!--end: Form Wizard Step 2-->

					<!--begin: Form Wizard Step 3-->
					<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Choose Wicket Keeper</div>
						<div class="row" id="wicket_row">

						</div>
					</div>

					<!--end: Form Wizard Step 3-->

					<!--begin: Form Wizard Step 4-->
					<div class="kt-wizard-v1__content" data-ktwizard-type="step-content">
						<div class="kt-heading kt-heading--md">Players Summary:</div>
						<table class="table table-striped">
							<thead>
							<tr>
								<td>Name</td>
								<td>Image</td>
								<td>Status</td>
								<td>Kit Size</td>
								<td>Shirt No</td>
							</tr>
							</thead>
							<tbody id="Summary">

							</tbody>
						</table>
					</div>

					<!--end: Form Wizard Step 4-->

					<!--begin: Form Wizard Step 5-->


					<!--end: Form Wizard Step 5-->

					<!--begin: Form Actions -->
					<div class="kt-form__actions">
						<button class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
								data-ktwizard-type="action-prev">
							Previous
						</button>
						<input id="submit_squad"
							   class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
							   data-ktwizard-type="action-submit" value="submit"/>
						<button class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u"
								data-ktwizard-type="action-next" id="next">
							Next Step
						</button>
					</div>

					<!--end: Form Actions -->
				</form>


				<!--end: Form Wizard Form-->
			</div>
		</div>
	</div>
</div>

<div id="kt_scrolltop" class="kt-scrolltop">
	<i class="fa fa-arrow-up"></i>
</div>
<script>
	var index;
	var players = [];
	var captain;
	var wicket;
	var shirt_no = [];
	var kit_size = [];
	$('.player_card').on('click', function () {
		if ($(this).hasClass('bg-success')) {
			$(this).removeClass('bg-success');

			for (var i = 0; i < players.length; i++) {
				if (players[i] === $(this).attr('id')) {
					players.splice(i, 1);
					break;
				}
			}
		} else {
			$(this).addClass('bg-success');
			players.push($(this).attr('id'));
		}
		if (players.length < 7) {
			$('#next').prop('disabled', true);
		} else {
			$('#next').prop('disabled', false);
		}
	});

	$('#submit_squad').on('click', function () {
		var url = document.URL;
		var id = url.substring(url.lastIndexOf('/') + 1);
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("team/squad/add_squad");?>',
			data: {
				player_id: players,
				captain: captain,
				wicket: wicket,
				shirt_no: shirt_no,
				kit_size: kit_size,
				id: id
			},
			datatype: 'JSON',
			success: function (data) {
				if (data) {
					location.href = '<?php echo base_url('team/tournaments')?>';
				} else {
					alert('Something went Wrong!!!');
				}
			}
		});
	});
	$('#next').on('click', function () {
		var html = '';
		var players_data = JSON.stringify(<?php echo json_encode($players)?>);
		var parsed_player = JSON.parse(players_data);
		if (!captain) {
			for (var j = 0; j < players.length; j++) {
				for (var k = 0; k < parsed_player.length; k++) {
					if (players[j] === parsed_player[k].id) {
						var image;
						if (parsed_player[k].image) {
							image = '<?php echo base_url('uploads/players/')?>' + parsed_player[k].image;
						} else {
							image = '<?php echo base_url('assets/media/users/user2.png'); ?>';
						}
						html += '<div class="col-lg-3 mb-4">' +
								'<div class="card captain_player border-0 shadow" id="' + parsed_player[k].id + '" style="width: 100%; height:270px">' +
								'<img src="' + image + '" class="card-img-top rounded-circle m-auto w-75 h-auto" alt="User Image"/>' +
								'<div class="card-body ">' +
								'<div class="kt-widget__contact">' +
								'<span class="kt-widget__label font-weight-bold">Name:</span>' +
								'<span class="kt-widget__label m-auto">' + parsed_player[k].player_name + '</span>' +
								'</div>' +
								'<div class="kt-widget__contact">' +
								'<span class="kt-widget__label font-weight-bold">Status:</span>' +
								'<span class="kt-widget__label m-auto badge badge-pill badge-success">' + parsed_player[k].playing_status + '</span>' +
								'</div>' +
								'</div>' +
								'</div>' +
								'</div>';
					}
				}
			}
			$('#captain_row').html(html);
		} else if (captain && !wicket) {
			for (var j = 0; j < players.length; j++) {
				for (var k = 0; k < parsed_player.length; k++) {
					if (players[j] === parsed_player[k].id) {
						var image;
						if (parsed_player[k].image) {
							image = '<?php echo base_url('uploads/players/')?>' + parsed_player[k].image;
						} else {
							image = '<?php echo base_url('assets/media/users/user2.png'); ?>';
						}
						html += '<div class="col-lg-3 mb-4">' +
								'<div class="card wicket_player border-0 shadow" id="' + parsed_player[k].id + '" style="width: 100%; height:270px">' +
								'<img src="' + image + '" class="card-img-top rounded-circle m-auto w-75 h-auto" alt="User Image"/>' +
								'<div class="card-body ">' +
								'<div class="kt-widget__contact">' +
								'<span class="kt-widget__label font-weight-bold">Name:</span>' +
								'<span class="kt-widget__label m-auto">' + parsed_player[k].player_name + '</span>' +
								'</div>' +
								'<div class="kt-widget__contact">' +
								'<span class="kt-widget__label font-weight-bold">Status:</span>' +
								'<span class="kt-widget__label m-auto badge badge-pill badge-success">' + parsed_player[k].playing_status + '</span>' +
								'</div>' +
								'</div>' +
								'</div>' +
								'</div>';
					}
				}
			}
			$('#wicket_row').html(html);
		} else if (captain && wicket) {
			var kit_size = JSON.stringify(<?php echo json_encode($kit_sizes)?>);
			var parsed_kit_size = JSON.parse(kit_size);
			var options = "";
			for (var kit = 0; kit < parsed_kit_size.length; kit++) {
				options += '<option value="' + parsed_kit_size[kit].id + '">' + parsed_kit_size[kit].player_size + '</option>';
			}
			for (var j = 0; j < players.length; j++) {
				for (var k = 0; k < parsed_player.length; k++) {
					if (players[j] === parsed_player[k].id) {
						var image;
						if (parsed_player[k].image) {
							image = '<?php echo base_url('uploads/players/')?>' + parsed_player[k].image;
						} else {
							image = '<?php echo base_url('assets/media/users/user2.png'); ?>';
						}
						html += '<tr>' +
								'<td>' + parsed_player[k].player_name +
								'</td>' +
								'<td><img src="' + image + '" alt="" class="rounded-circle" height=100 width=100/>' +
								'</td>' +
								'<td><span class="kt-widget__label m-auto badge badge-pill badge-success">' + parsed_player[k].playing_status +
								'</span></td>' +
								'<td><select  class="form-control kit_size" id="kit_size" name="kit_size">' +
								'<option>Select Kit Size </option>' +
								options +
								'</select>' +
								'</td>' +
								'<td>' +
								'<input class="form-control shirt_no" placeholder="Enter Shirt no" name="shirt_no[]" />' +
								'</td>' +
								'</tr>'
					}
				}
			}

			$('#Summary').html(html);
		}
	});

	$('#captain_row').on('click', '.captain_player', function () {
		$('.captain_player').removeClass('bg-success');
		$(this).addClass('bg-success');
		captain = $(this).attr('id');
		console.log(captain);
	});

	$('#wicket_row').on('click', '.wicket_player', function () {
		$('.wicket_player').removeClass('bg-success');
		$(this).addClass('bg-success');
		wicket = $(this).attr('id');
		console.log(wicket);
	});

	$('#Summary').on('change', '.shirt_no', function () {
		var value = $(this).val();
		var boolean;
		var loop_index;
		if (shirt_no.length === 0) {
			shirt_no.push(value);
		} else {
			for (var i = 0; i < shirt_no.length; i++) {
				if (shirt_no[i] === value) {
					boolean = true;
				}
			}
			if (boolean) {
				alert('Shirt Number is Already Given!!');
				$(this).val('');
			} else {
				shirt_no.push(value);
			}
		}
	});

	$('#Summary').on('change', '.kit_size', function () {
		var value = $(this).val();
		var boolean;
		var loop_index;
		$('#Summary').find('tr').click(function () {
			index = $(this).index();
		});
		for (var i = 0; i < kit_size.length; i++) {
			if (i === index) {
				loop_index = i;
				boolean = true;
			}
		}
		if (boolean) {
			kit_size[loop_index] = value;
		} else {
			kit_size.push(value);
		}
	});
</script>
