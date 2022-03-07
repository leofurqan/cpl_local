<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Select Tournament
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open('admin/grounds/reserve_ground/' . $ground_id, 'class="kt-form kt-form--label-right"'); ?>
	<div class="kt-portlet__body">

		<div class="form-group row">
			<div class="col-lg-4">
				<label class="">Tournaments:</label>
				<select name="tournament_name" type="text" id="tournament_name" class="form-control"
						placeholder="Select tournament" required>
					<?php foreach ($tournaments as $tournament) { ?>
						<option value="<?php echo $tournament->id ?>"><?php echo $tournament->tournament_name ?></option>
						<?php
					} ?>
				</select>
				<span class="form-text text-muted">Please select ground</span>
			</div>
			<div class="col-xl-4">
				<label class="">Date:</label>
				<input name="date" id="date" type="date" class="form-control"
					   placeholder="Enter  date" required>

				<span class="form-text text-muted">Please enter date</span>
			</div>
		</div>
	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-8">
					<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!--end::Form-->
</div>
<script>
	$(document).ready(function () {
		var date_input = $('input[name="date"]');
		var container = $('.kt-form form').length > 0 ? $('.kt-form form').parent() : "body";
		var options = {
			multidate: true,
			format: 'yyyy-mm-dd',
			container: container,
			todayHighlight: true,
			autoclose: false,
		};
		date_input.datepicker(options);
	})
</script>
