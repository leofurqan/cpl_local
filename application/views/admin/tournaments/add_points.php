<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments/point_system') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Points List
			</a>
		</div>
	</div>

	<?php echo form_open('admin/tournaments/add_point_system', array('class' => 'kt-form')); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<div class="col-lg-12 col-xl-12 col-sm-12">
				<label style="font-size: large;font: bold">Point System:</label>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-lg-12 col-xl-12 col-sm-12">
				<label style="font-size: medium;font: bold">Match Points:</label>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Formate Name:</label>
				<input type="text" class="form-control" name="name" placeholder="Enter formate name" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on Match Win:</label>
				<input name="on_win" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on Match Tie:</label>
				<input name="on_tie" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
		</div>
			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Points on Match Loss:</label>
					<input name="on_loss" type="text" class="form-control"
						   placeholder="Enter Points" required>
				</div>

			</div>


		<div class="form-group row">
			<div class="col-lg-12 col-xl-12 col-sm-12">
				<label style="font-size: medium;font: bold">Batting Points:</label>

			</div>
		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on Runs:</label>
				<input name="on_run" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 50:</label>
				<input name="on_fifty" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 100:</label>
				<input name="on_hundred" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>

		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 125:</label>
				<input name="on_oneTwentyfive" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 150:</label>
				<input name="on_oneFifty" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 1 Six:</label>
				<input name="on_six" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-12 col-xl-12 col-sm-12">
				<label style="font-size: medium;font: bold">Bowling Points:</label>

			</div>
		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 1 Catch:</label>
				<input name="on_catch" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 1 Stumping:</label>
				<input name="on_stump" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 1 Wicket:</label>
				<input name="on_wicket" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>

		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 3 Wickets:</label>
				<input name="three_wickets" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Points on 4 Wickets:</label>
				<input name="four_wickets" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>
		<div class="col-xl-4 col-lg-4 col-sm-4">

				<label>Points on 5 Wickets:</label>
				<input name="five_wickets" type="number" class="form-control"
					   placeholder="Enter Points" required>
			</div>

		</div>
		<div class="form-group row">
		<div class="col-xl-4 col-lg-4 col-sm-4">
			<label>Points on 6 Wickets:</label>
			<input name="six_wickets" type="number" class="form-control"
				   placeholder="Enter Points" required>
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
