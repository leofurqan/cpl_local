<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments/tournament_rules') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Formate List
			</a>
		</div>
	</div>

	<?php echo form_open('admin/tournaments/add_tournament_rules', array('class' => 'kt-form')); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<div class="col-lg-12 col-xl-12 col-sm-12">
				<label style="font-size: large;font: bold">Formate:</label>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Name:</label>
				<input type="text" class="form-control" name="name" placeholder="Enter Formate name" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Total Overs:</label>
				<input name="maximum_over" type="number" class="form-control"
					   placeholder="Enter Maximum Overs" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Max Overs (Per Bowler):</label>
				<input name="max_over" type="number" class="form-control"
					   placeholder="Enter Max Overs" required>
			</div>

		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Balls in a Over:</label>
				<input name="max_balls" type="number" class="form-control"
					   placeholder="Enter Balls" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Score on No Ball:</label>
				<input name="no_ball" type="number" class="form-control"
					   placeholder="Enter Score" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Score on Wide Ball:</label>
				<input name="wide_ball" type="number" class="form-control"
					   placeholder="Enter Score" required>
			</div>
		</div>

		<div class="form-group row">

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>DL Method:</label>
				<div class="kt-radio-inline">
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="free_hit" checked value="1" required> Yes
						<span></span>
					</label>
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="free_hit" value="0" required> No
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
