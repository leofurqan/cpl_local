<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments/tournament_rules') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Tournament Rules
			</a>
		</div>
	</div>

	<?php echo form_open('admin/tournaments/edit_tournament_rules/' . $rules->id, array('class' => 'kt-form')); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Formate Name:</label>
				<input type="text" class="form-control" name="name" placeholder="Enter formate name"
					   value="<?php echo $rules->name; ?>" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Total Overs:</label>
				<input name="maximum_over" type="number" class="form-control"
					   placeholder="Enter Maximum Overs" value="<?php echo $rules->maximum_over; ?>" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Max Overs (Per Bowler):</label>
				<input name="max_over" type="number" class="form-control"
					   placeholder="Enter Max Overs" value="<?php echo $rules->max_over; ?>" required>
			</div>
		</div>
		<div class="form-group row">

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Balls in a Over:</label>
				<input name="max_balls" type="number" class="form-control"
					   placeholder="Enter Balls" value="<?php echo $rules->max_balls; ?>" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Score on Wide Ball:</label>
				<input name="wide_ball" type="number" class="form-control"
					   placeholder="Enter Score" value="<?php echo $rules->wide_ball; ?>" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Score on No Ball:</label>
				<input name="no_ball" type="number" class="form-control"
					   placeholder="Enter Score" value="<?php echo $rules->no_ball; ?>" required>
			</div>
		</div>
		<div class="form-group row">

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Free Hit on No Ball:</label>
				<div class="kt-radio-inline">
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="free_hit" checked value="1" <?php if ($rules->free_hit == 1) {
							echo 'selected';
						} ?> required> Yes
						<span></span>
					</label>
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="free_hit" value="0" <?php if ($rules->free_hit == 0) {
							echo 'selected';
						} ?> required> No
						<span></span>
					</label>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-5"></div>
				<div class="col-lg-7">
					<button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
