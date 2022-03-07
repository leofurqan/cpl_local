<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Tournament List
			</a>
		</div>
	</div>
	<!--begin::Form-->
	<?php echo form_open('admin/tournaments/add_scheduling', 'class="kt-form kt-form--label-right"'); ?>
	<?php echo form_hidden('tournament_id', $tournament_id); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<div class="col-lg-4">
				<label>Time Slot:</label>
				<select name="time_slots[]" id="time_slots" type="text" class="form-control" required multiple>
					<?php foreach ($time_slots as $slot){ ?>
						<option value="<?php echo $slot->id?>"><?php echo $slot->name?>(<?php echo $slot->starting_time .'-'. $slot->ending_time  ?>)</option>
					<?php } ?>
				</select>
			</div>
			<div class="col-lg-4">
				<label>Match Format:</label>
				<select name="match_format" id="match_format" type="text" class="form-control" required>
					<?php foreach ($match_formats as $match_format){ ?>
						<option value="<?php echo $match_format->format_id?>"><?php echo $match_format->format_name?></option>
				<?php } ?>
				</select>
			</div>
		</div>
	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-8">
					<input type="submit" value="submit" name="submit" id="submit" class="btn btn-primary"/>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!--end::Form-->
</div>
<script>
	$('document').ready(function () {
		$('#match_format').select2({
			placeholder: "Select a match format"
		});$('#time_slots').select2({
			placeholder: "Select a tournament slots"
		});
	});
</script>

