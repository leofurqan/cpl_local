<div class="row">
	<div class="col-md-12">
		<div class="kt-portlet" id="tournament_portlet">
			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="kt-portlet__head-label col-md-6 align-self-center">
						<h3 class="kt-portlet__head-title">
							<img width="50px" src="<?php echo base_url('uploads/tournaments/' . $tournament->logo); ?>">
							<?php echo $tournament->tournament_name; ?>
						</h3>
					</div>
					<div class="col-md-2"></div>
					<div class="col-md-4 align-self-center">
						<div class="btn-group pull-right">
							<button type="button"
									class="btn btn-brand btn-elevate btn-pill btn-elevate-air"
									data-toggle="modal"
									data-target="#kt_modal_6"><i
										class="la la-send"></i>Add Player To Tournament Squad
							</button>
						</div>
					</div>
					<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog"
						 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Add Tournament squad</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									</button>
								</div>
								<?php echo form_open('team/squad/submit_squad/'.$tournament_id); ?>
								<div class="modal-body">

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Select Players:</label>
										<div class="col-lg-9">
											<select name="player_name" type="text" id="player_name"
													class="form-control kt-select2" required>
												<option value="">Select Player</option>
												<?php foreach ($players as $player) { ?>

														<option value="<?php echo $player->id ?>"><?php echo $player->player_name; ?></option>
														<?php
													 } ?>

											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Player Role:</label>
										<div class="col-lg-9">
											<select class="form-control" name="player_role" id="player_role" required>
												<option value="">Select Player Role</option>
												<?php foreach ($player_roles as $role) { ?>
													<option value="<?php echo $role->id; ?>"><?php echo $role->role_name; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Kit Size</label>
										<div class="col-lg-9">
											<select class="form-control" name="player_kit_size" id="kit_size" required>
												<option value="">Select Kit Size</option>
												<?php foreach ($kit_sizes as $kit_size) { ?>
													<option value="<?php echo $kit_size->id; ?>"><?php echo $kit_size->player_size; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Shirt Number</label>
										<div class="col-lg-9">
											<input type="number" required name="shirt_number" class="form-control" id="shirt_number"/>
										</div>
								</div>
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Print Kit</label>
										<div class="col-lg-9">
										<div class="kt-radio-inline">
											<label class="kt-radio kt-radio--solid">
												<input type="radio" name="print_kit" checked value="1"> Yes
												<span></span>
											</label>
											<label class="kt-radio kt-radio--solid">
												<input type="radio" name="print_kit" value="0"> No
												<span></span>
											</label>
										</div>
									</div>
									</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" id="submit" name="submit" value="submit"
											class="btn btn-primary">Save changes
									</button>
								</div>

								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-striped- table-bordered table-hover table-checkable" id="table_players">
					<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Name</th>
						<th>Playing Style</th>
						<th>Player Role</th>
						<th>Kit Size</th>
						<th>Shirt Number</th>
						<th>Print Kit</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = 1;
					foreach ($squad as $s) { ?>
						<tr>
							<td><?php echo $count; ?></td>

							<td>
								<?php if ($s->image) { ?>
								<img width="36px;" src="<?php echo base_url('uploads/players/' . $s->image); ?>"/>
								<?php } else { ?>
								<img width="36px;" src="<?php echo base_url('assets/media/users/user2.png'); ?>"/>
								<?php } ?>
							</td>
							<td><?php echo $s->player_name; ?></td>
							<td><?php echo $s->playing_status; ?></td>
							<td><?php echo $s->player_role; ?></td>
							<td><?php echo $s->player_size; ?></td>
							<td><?php echo $s->shirt_number; ?></td>

							<td>
								<?php if ($s->print_kit == '1') { ?>
									<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill">Yes</span>
								<?php } else { ?>
									<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill">No</span>
								<?php } ?>
							</td>
							<td>
								<div class="btn-group">
									<a href="<?php echo base_url('team/squad/delete/' .$s->id .'/'.$s->tournament_id) ?>"
									   onclick="return confirm('Are you sure ?')"
									   class="btn btn-outline-danger btn-elevate btn-elevate-air btn-icon btn-sm"><i
												class="la la-trash"></i></a>
								</div>
							</td>
						</tr>
						<?php
						$count++;
					} ?>
					</tbody>
				</table>
			</div>


		</div>
	</div>
</div>
<script>
	$('#player_name').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("team/squad/check_player");?>',
			data: {
				'player_id': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				$('#player_name').removeClass('is-valid');
				$('#player_name').removeClass('is-invalid');
				$('#player_name').parent().find('.valid-feedback').remove();
				$('#player_name').parent().find('.invalid-feedback').remove();
				if (data === "true") {
					$('#player_name').addClass('is-invalid');
					$('#player_name').parent().append('<div class="invalid-feedback">Player already exist.</div>');
					$('#submit').prop('disabled', true);
				} else {
					$('#player_name').addClass('is-valid');
					$('#player_name').parent().append('<div class="valid-feedback">Player is available.</div>');
					$('#submit').prop('disabled', false);
				}

			},
			error: function () {
				alert('something went wrong');
			}
		});
	});

	$('#player_role').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("team/squad/check_captain");?>',
			data: {
				role_id: $(this).val(),
				tournament_id:<?php echo $tournament_id; ?>
			},
			datatype: 'JSON',
			success: function (data) {
				$('#player_role').removeClass('is-valid');
				$('#player_role').removeClass('is-invalid');
				$('#player_role').parent().find('.valid-feedback').remove();
				$('#player_role').parent().find('.invalid-feedback').remove();
				console.log(data);
				if (data === "true") {
					$('#player_role').addClass('is-invalid');
					$('#player_role').parent().append('<div class="invalid-feedback"> already exist.</div>');
					$('#submit').prop('disabled', true);
				} else {
					$('#player_role').addClass('is-valid');
					$('#player_role').parent().append('<div class="valid-feedback">Available.</div>');
					$('#submit').prop('disabled', false);
				}

			},
			error: function () {
				alert('something went wrong');
			}
		});
	});

	//$('#player_role').change(function () {
	//	$.ajax({
	//		type: 'POST',
	//		url: '<?php //echo base_url("team/squad/check_keeper");?>//',
	//		data: {
	//			'role_id': $(this).val()
	//		},
	//		datatype: 'JSON',
	//		success: function (data) {
	//			$('#player_role').removeClass('is-valid');
	//			$('#player_role').removeClass('is-invalid');
	//			$('#player_role').parent().find('.valid-feedback').remove();
	//			$('#player_role').parent().find('.invalid-feedback').remove();
	//			if (data === "true") {
	//				$('#player_role').addClass('is-invalid');
	//				$('#player_role').parent().append('<div class="invalid-feedback">Keeper already exist.</div>');
	//				$('#submit').prop('disabled', true);
	//			} else {
	//				$('#player_role').addClass('is-valid');
	//				$('#player_role').parent().append('<div class="valid-feedback">Available.</div>');
	//				$('#submit').prop('disabled', false);
	//			}
	//
	//		},
	//		error: function () {
	//			alert('something went wrong');
	//		}
	//	});
	//});

	$('#shirt_number').keyup(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("team/squad/check_shirt_number");?>',
			data: {
				shirt_number: $(this).val(),
				tournament_id:<?php echo $tournament_id; ?>
			},
			datatype: 'JSON',
			success: function (data) {
				$('#shirt_number').removeClass('is-valid');
				$('#shirt_number').removeClass('is-invalid');
				$('#shirt_number').parent().find('.valid-feedback').remove();
				$('#shirt_number').parent().find('.invalid-feedback').remove();
				if (data === "true") {
					$('#shirt_number').addClass('is-invalid');
					$('#shirt_number').parent().append('<div class="invalid-feedback">Shirt Number already exist.</div>');
					$('#submit').prop('disabled', true);
				} else {
					$('#shirt_number').addClass('is-valid');
					$('#shirt_number').parent().append('<div class="valid-feedback">Shirt Number is available.</div>');
					$('#submit').prop('disabled', false);
				}

			},
			error: function () {
				alert('something went wrong');
			}
		});
	});


	$('document').ready(function () {
		$('#table_players').DataTable({
			responsive: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
		});
	});


</script>

