<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/tournaments') ?>"
			   class="btn btn-brand btn-elevate btn-icon-sm">
				<i class="la la-list"></i>
				Tournament List
			</a>
		</div>
		<div class="kt-portlet__head-label">
			<?php if ($pooling_data) { ?>
				<a href="<?php echo base_url('admin/pooling/start_pooling/' . $pooling_data->pooling_formate . '/' . $pooling_data->tournament_id . '/' . $pooling_data->id) ?>"
				   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm align-end">
					<i class="la la-list"></i>
					start pooling
				</a>
			<?php } ?>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open('admin/pooling/add_pooling/', 'class="kt-form kt-form--label-right"'); ?>
	<?php echo form_hidden('tournament_id', $tournament_id); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<div class="col-lg-4">
				<label class="">No of Pools:</label>
				<input name="no_of_pools" id="no_of_pools" type="number" class="form-control"
					   placeholder="Enter no of pools" required>
				<span id="text_pools" class="form-text text-danger d-none">Invalid no of pools</span>
			</div>
			<div class="col-lg-4">
				<label>Pooling Format:</label>
				<select name="pool_format" id="pool_format" type="text" class="form-control"
						placeholder="Select pool format" required>
					<option value="manual">Manual</option>
					<option value="auto">Auto</option>
					<option value="numbering">Numbering</option>
					<option value="forced_auto">Forced Auto</option>
					<option value="forced_num">Forced Numbering</option>
				</select>
			</div>
		</div>
	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-8">
					<button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit
					</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

	<!--end::Form-->
</div>

<script>
	$('#no_of_pools').on('change', function () {
		var pools = $(this).val();
		if (!(pools === '1' || pools === '2' || pools === '3' || pools === '4')) {
			$('#submit').attr('disabled', true);
			$('#text_pools').removeClass('d-none');
		} else {
			$('#submit').attr('disabled', false);
			$('#text_pools').addClass('d-none');
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/pooling/check_pools");?>',
				data: {
					'tournament_id': '<?php echo $tournament_id;?>',
					'pools': pools
				},
				datatype: 'JSON',
				success: function (data) {
					if (data === "true") {
						$('#submit').attr('disabled', false);
						$('#text_pools').addClass('d-none');
					} else {
						$('#submit').attr('disabled', true);
						$('#text_pools').removeClass('d-none');
					}
				},
				error: function () {
					alert('something went wrong');
				}
			});
		}
	});
</script>
