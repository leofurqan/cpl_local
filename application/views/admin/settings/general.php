<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Select Type
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open('admin/settings/general', 'class="kt-form kt-form--label-right"'); ?>
	<div class="kt-portlet__body">

		<div class="form-group row">
			<label class="col-3 col-form-label">Sms API</label>
			<div class="col-3">
				<span class="kt-switch kt-switch--outline kt-switch--icon kt-switch--success">
					<label>

						<?php if($general->sms_api==='0'){ ?>
							<input type="checkbox"  name="sms_api" ">
						<span></span>

						<?php }else{ ?>

							<input type="checkbox" checked="checked" name="sms_api" ">
						<span></span>


						<?php } ?>


					</label>
				</span>
			</div>

		</div>


	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-xl-8 col-lg-8 col-sm-8">
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
	function change_sms_api(id, sms_api) {

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/settings/general");?>',
			data: {id: id, sms_api: sms_api},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}
</script>
