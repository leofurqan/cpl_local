<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<svg xmlns="http://www.w3.org/2000/svg"
												 xmlns:xlink="http://www.w3.org/1999/xlink"
												 version="1.1" width="20" height="20" x="0"
												 y="0" viewBox="0 0 80.13 80.13"
												 style="enable-background:new 0 0 512 512"
												 xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112   c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984   c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984   z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263   c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833   C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088   c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699   C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276   c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752   C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032   c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265   c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>
										</span>
					<h3 class="kt-portlet__head-title">
						Schedule List
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				​
				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered table-hover table-checkable" id="table_teams">
					<thead>
					<tr>
						<th>#</th>
						<th>First Team</th>
						<th>Second Team</th>
						<th>Ground</th>
						<th>Coordinator</th>
						<th>Umpire</th>
						<th>Match Date</th>
						<th>Match Time</th>
						<th>Action</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = 1;
					foreach ($matches as $match) { ?>
						<tr>
							<td><?php echo $count; ?></td>
							<td><?php echo $match->first_name; ?></td>
							<td><?php echo $match->second_name; ?></td>
							<td><?php foreach ($grounds as $ground) {
									if ($ground->id == $match->ground_id) {
										echo $ground->ground_name;
									}
								} ?></td>
							<td><?php foreach ($coordinators as $coordinator) {
									if ($coordinator->id == $match->coordinator_id) {
										echo $coordinator->full_name;
									}
								} ?></td>
							<td><?php foreach ($umpires as $umpire) {
									if ($umpire->id == $match->first_umpire_id || $umpire->id == $match->second_umpire_id || $umpire->id == $match->third_umpire_id) {
										echo $umpire->full_name . ',';
									}
								} ?></td>
							<td><?php echo $match->match_date; ?></td>
							<td><?php if ($match->match_time) {
									foreach ($time_slots as $time_slot) {
										if ($time_slot->time_slot_id == $match->match_time) {
											echo $time_slot->name . '(' . $time_slot->starting_time . '-' . $time_slot->ending_time . ')';
										}
									}
								} else {
									echo '0';
								} ?></td>
							<td>
								<a href="#" onclick="get_match_data(<?php echo $match->match_id ?>)"
								   data-toggle="modal" data-target="#add_match"
								   class="btn btn-outline-success btn-elevate btn-elevate-air btn-icon btn-sm">
									<i class="la la-edit"></i>
								</a>
								<a href="<?php echo base_url('admin/tournaments/reset_match_scheduling/' . $match->tournament_id . '/' . $match->match_id) ?>"
								   class="btn btn-outline-warning btn-elevate btn-elevate-air btn-icon btn-sm">
									<i class="la la-undo"></i>
								</a>
							</td>
						</tr>
						<?php $count++;
					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="add_match" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Add Match</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/matches/update_match', 'class="kt-form kt-form--label-right"'); ?>

			<div class="modal-body">
				<input type="hidden" id="match_id" name="match_id">
				<input type="hidden" id="tournament_id" name="tournament_id"
					   value="<?php echo $this->uri->segment(5); ?>">
				<div class="form-group row">
					<div class="col-lg-6">
						<label>First Team:</label>
						<input class="form-control" id="first_team" readonly name="first_team" required/>
						<span class="form-text text-muted">first team name</span>
					</div>
					<div class="col-lg-6">
						<label>Second Team:</label>
						<input class="form-control" readonly id="second_team" name="second_team" required/>
						<span class="form-text text-muted">second team name</span>
					</div>
				</div>
				<hr>
				<div class="form-group row">
					<div class="col-lg-4">
						<label>Select date:</label>
						<input type="text" class="form-control" name="match_date" id="kt_datepicker_1" readonly
							   placeholder="Select date" required/>
						<span class="form-text text-muted">please select date</span>
					</div>
					<div class="col-lg-4">
						<label>Select time slot:</label>
						<select name="time_slot" id="time_slot" class="form-control" required>
							<option value="">Select time slots</option>
							<?php foreach ($time_slots as $time_slot) { ?>
								<option value="<?php echo $time_slot->time_slot_id ?>"><?php echo $time_slot->name; ?>
									(<?php echo $time_slot->starting_time . '-' . $time_slot->ending_time ?>)
								</option>
							<?php } ?>
						</select>
						<div id="error_match" class="invalid-feedback" style="display: none">Match already exists on
							this time.
						</div>
						<span class="form-text text-muted">please select time slot</span>
					</div>
					<div class="col-lg-4">
						<label>Ground:</label>
						<select class="form-control" id="ground_name" name="ground_name" required>
							<option>Select ground</option>

						</select>
						<span class="form-text text-muted">please select ground</span>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-4">
						<label>Coordinator:</label>
						<select class="form-control" name="coordinator_name" required>
							<option>Select coordinator</option>
							<?php foreach ($coordinators as $coordinator) { ?>
								<option value="<?php echo $coordinator->id ?>"><?php echo $coordinator->full_name; ?></option>
							<?php } ?>
						</select>
						<span class="form-text text-muted">please select coordinator</span>
					</div>
					<div class="col-lg-4">
						<label>Scorer:</label>
						<select class="form-control" name="scorer_name" required>
							<option value="">Select scorer</option>
							<?php foreach ($scorers as $scorer) { ?>
								<option value="<?php echo $scorer->id ?>"><?php echo $scorer->full_name; ?></option>
							<?php } ?>
						</select>
						<span class="form-text text-muted">please select scorer</span>
					</div>
					<div class="col-lg-4">
						<label>Commentator:</label>
						<select class="form-control" name="commentator_id" required>
							<option>Select Commentator</option>
							<?php foreach ($commentators as $commentator) { ?>
								<option value="<?php echo $commentator->id ?>"><?php echo $commentator->full_name; ?></option>
							<?php } ?>
						</select>
						<span class="form-text text-muted">please select commentator</span>
					</div>
				</div>
				<div class="form-group row">
					<div class="col-lg-4">
						<label>First Umpire:</label>
						<select class="form-control" id="first_umpire" name="first_umpire" required>
							<option value="">Select first umpire</option>
							<?php foreach ($umpires as $umpire) { ?>
								<option value="<?php echo $umpire->id ?>"><?php echo $umpire->full_name; ?></option>
							<?php } ?>
						</select>
						<span class="form-text text-muted">please select first umpire</span>
					</div>
					<div class="col-lg-4">
						<label>Second Umpire:</label>
						<select class="form-control" id="second_umpire" name="second_umpire" required>
							<option>Select second umpire</option>
						</select>
						<span class="form-text text-muted">please select second umpire</span>
					</div>
					<div class="col-lg-4">
						<label>Third Umpire:</label>
						<select class="form-control" id="third_umpire" name="third_umpire" required>
							<option>Select third umpire</option>
						</select>
						<span class="form-text text-muted">please select third umpire</span>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" value="submit" name="submit"
						id="submit_btn" class="btn btn-brand btn-bold">Submit
				</button>&nbsp;
				<button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">Cancel</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>
	function get_match_data(id) {
		$('#match_id').val(id);
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_teams_by_id");?>',
			dataType: "json",
			data: {id: id},
			success: function (result) {
				$('#first_team').val(result.first_name);
				$('#second_team').val(result.second_name);
				$('#kt_datepicker_1').val(result.match_date);
				$('#time_slot').val(result.match_time);
				$('#first_umpire').val(result.first_umpire_id);
				get_grounds_by_date(result.match_date);
			}
		});
	}

	function get_grounds_by_date(date) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_grounds_by_reserve_date");?>',
			dataType: "json",
			data: {reserve_date: date, tournament_id: $('#tournament_id').val()},
			success: function (result) {
				if ($.trim(result)) {
					var html = '';
					var i;
					for (i = 0; i < result.length; i++) {
						html += '<option value=' + result[i].id + '>' + result[i].ground_name + '</option>';
					}
					$('#ground_name').find('option').not(':first').remove();
					$('#ground_name').append(html);
				} else {
					$('#ground_name').find('option').not(':first').remove();
				}

			}
		});
	}

	$('#first_umpire').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_second_umpire");?>',
			dataType: "json",
			data: {id: $(this).val()},
			success: function (result) {
				if ($.trim(result)) {
					var html = '';
					var i;
					for (i = 0; i < result.length; i++) {
						html += '<option value=' + result[i].id + '>' + result[i].full_name + '</option>';
					}
					$('#second_umpire').find('option').not(':first').remove();
					$('#second_umpire').append(html);
				}

			}
		});
	});

	$('#second_umpire').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_third_umpire");?>',
			dataType: "json",
			data: {id: $(this).val(), second_id: $('#first_umpire').val()},
			success: function (result) {
				if ($.trim(result)) {
					var html = '';
					var i;
					for (i = 0; i < result.length; i++) {
						html += '<option value=' + result[i].id + '>' + result[i].full_name + '</option>';
					}
					$('#third_umpire').find('option').not(':first').remove();
					$('#third_umpire').append(html);
				}


			}
		});
	});

	$('#kt_datepicker_1').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_grounds_by_reserve_date");?>',
			dataType: "json",
			data: {reserve_date: $(this).val(), tournament_id: $('#tournament_id').val()},
			success: function (result) {
				if ($.trim(result)) {
					var html = '';
					var i;
					for (i = 0; i < result.length; i++) {
						html += '<option value=' + result[i].id + '>' + result[i].ground_name + '</option>';
					}
					$('#ground_name').find('option').not(':first').remove();
					$('#ground_name').append(html);
				} else {
					$('#ground_name').find('option').not(':first').remove();
				}

			}
		});
	})
	;
	$('#kt_datepicker_1').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_matches_by_date");?>',
			dataType: "json",
			data: {date: $(this).val(), time: $('#time_slot').val(), ground: $('#ground_name').val()},
			success: function (result) {
				if (result === 0) {
					$('#error_match').css('display', 'none');
					$('#submit_btn').prop('disabled', false);
					$('#time_slot').removeClass('is-invalid');
				} else {
					$('#error_match').css('display', 'block');
					$('#submit_btn').prop('disabled', true);
					$('#time_slot').addClass('is-invalid');
				}

			}
		});
	});

	$('#ground_name').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/matches/get_matches_by_date");?>',
			dataType: "json",
			data: {ground: $(this).val(), time: $('#time_slot').val(), date: $('#kt_datepicker_1').val()},
			success: function (result) {
				if (result === 0) {
					$('#error_match').css('display', 'none');
					$('#submit_btn').prop('disabled', false);
					$('#time_slot').removeClass('is-invalid');
				} else {
					$('#error_match').css('display', 'block');
					$('#submit_btn').prop('disabled', true);
					$('#time_slot').addClass('is-invalid');
				}

			}
		});
	});
</script>

