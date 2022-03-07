<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Tournaments
			</a>
		</div>
	</div>

	<?php echo form_open_multipart('admin/tournaments/edit_tournament/' . $tournament->id, array('class' => 'kt-form')); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<label>Logo:</label>
			<div class="col-lg-9 col-xl-6">
				<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
					<div class="kt-avatar__holder" style="background-image: url(<?php echo base_url('uploads/tournaments/' . $tournament->logo); ?>);"></div>
					<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
						<i class="fa fa-pen"></i>
						<input value="<?php echo base_url('uploads/tournaments/' . $tournament->logo); ?>" type="file" name="logo" accept=".png, .jpg, .jpeg" height="100" width="100">
					</label>
					<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-xl-4">
				<label class="">Clubs:</label>
				<select name="club_name" type="text" id="club_name" class="form-control"
						placeholder="Select Club" >
					<?php foreach ($clubs as $club) { ?>
						<option value="<?php echo $club->id ?>" <?php if ($tournament->club_id == $club->id) {
							echo 'selected';
						} ?>><?php echo $club->club_name ?></option>
						<?php
					} ?>
				</select>
			</div>

			<div class="col-xl-4">
				<label>Tournament Name:</label>
				<input name="tournament_name" id="tournament_name" type="text"
					   class="form-control"
					   placeholder="Enter tournament name" value="<?php echo $tournament->tournament_name; ?>" >
			</div>
			<div class="col-xl-4">
				<label class="">Tournament Format:</label>
				<select name="tournament_format" type="text" id="name" class="form-control"
						placeholder="Select Tournament Format">
					<?php foreach ($tournament_format as $format) { ?>
						<option value="<?php echo $format->id ?>" <?php if ($tournament->tournament_format_id == $format->id) {
							echo 'selected';
						} ?>><?php echo $format->name ?></option>
						<?php
					} ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xl-4">
				<label class="">Tournament Points System:</label>
				<select name="tournament_points" type="text" id="name" class="form-control"
						placeholder="Select Tournament Points">
					<?php foreach ($tournament_points as $points) { ?>
						<option value="<?php echo $points->id ?>" <?php if ($tournament->tournament_points_id == $points->id) {
							echo 'selected';
						} ?>><?php echo $points->name ?></option>
						<?php
					} ?>
				</select>
			</div>
			<div class="col-xl-4">
				<label>No of Teams:</label>
				<input name="no_teams" id="no_teams" type="number" class="form-control"
					   placeholder="Enter no of teams" value="<?php echo $tournament->no_teams; ?>" >
			</div>

		</div>
		<div class="form-group row">
			<div class="col-xl-4">
				<label class="">Starting Date:</label>
				<input name="starting_date" id="starting_date" type="date"
					   class="form-control"
					   placeholder="Enter starting date" value="<?php echo $tournament->starting_date; ?>" >
			</div>
			<div class="col-xl-4">
				<label class="">Squad Submission Date:</label>
				<input name="squad_submission_date" id="squad_submission_date" type="date"
					   class="form-control"
					   placeholder="Enter squad submission date"
					   value="<?php echo $tournament->squad_submission_date; ?>"
					   required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Minimum Squad:</label>
				<input name="min_squad" id="min_squad" type="number"
					   class="form-control"
					   placeholder="Enter minimum no of Squad"
					   value="<?php echo $tournament->min_squad; ?>"
					   required>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Maximum Squad:</label>
				<input name="max_squad" id="max_squad" type="number" class="form-control"
					   placeholder="Enter maximum no of Squad" value="<?php echo $tournament->max_squad; ?>" >
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Code of Conduct:</label>
					<?php if ($tournament->code_conduct){?>
					<a target="_blank" href="<?php echo base_url('uploads/tournaments_files/' . $tournament->code_conduct); ?>">COC Rules</a>
					<?php } ?>
					<input name="code_conduct" class="m-2" id="code_conduct" type="file">
				</div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Rules:</label>
					<?php if ($tournament->rules){?>
						<a target="_blank" href="<?php echo base_url('uploads/tournaments_files/' . $tournament->rules); ?>">Rules</a>
					<?php } ?>

					<input name="rules" class="m-2" id="rules" type="file">
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Invitation:</label>
					<?php if ($tournament->invitation){?>
						<a target="_blank" href="<?php echo base_url('uploads/tournaments_files/' . $tournament->invitation); ?>">Invitation</a>
					<?php } ?>

					<input name="invitation" class="m-2" id="invitation" type="file">
				</div>
			</div>
			<div class="col-xl-4">
				<label>Status:</label>
				<div class="kt-radio-inline">
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="status" checked value="1" <?php if ($tournament->status == 1) {
							echo 'selected';
						} ?> > Active
						<span></span>
					</label>
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="status" value="0" <?php if ($tournament->status == 0) {
							echo 'selected';
						} ?> > Inactive
						<span></span>
					</label>
				</div>
			</div>
		</div>
	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-sm-5"></div>
				<div class="col-xl-7 col-lg-7 col-sm-7">
					<button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit
					</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
