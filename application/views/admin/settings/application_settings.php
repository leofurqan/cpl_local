<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-12">

			<!--begin::Portlet-->
			<div class="kt-portlet" id="kt_portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Application Setting
						</h3>
					</div>

				</div>
				<div class="kt-portlet__body">
					<!--begin: Datatable -->
					<table class="table table-striped- table-bordered table-hover table-checkable">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Value</th>
							<th>Action</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$count = 1;
						if (!empty($application_settings)){
							foreach ($application_settings as $setting) { ?>
								<tr>
									<td><?php echo $count; ?></td>
									<td><?php echo $setting->name; ?></td>
									<td><?php echo $setting->value; ?></td>
									<td>
										<a href="#" class="btn btn-brand" data-toggle="modal"
												onclick="get_application_setting(<?php echo $setting->id; ?>)" data-target="#kt_modal_6"><i class="la la-edit"></i>
										</a>
										</td>
								</tr>
								<?php
								$count++;
							} } ?>
						</tbody>
					</table>

					<!--end: Datatable -->
				</div>
			</div>
		</div>
	</div>
</div>

<!--Modal-->
<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog"
	 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Update Setting</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/update_settings'); ?>
			<div class="modal-body">
				<input type="hidden" name="setting_id" id="setting_id">
				<div class="form-group row">
					<label class="col-lg-3 col-form-label">Name</label>
					<div class="col-lg-9">
						<input type="text" readonly placeholder="Please Enter name" name="application_setting_name" id="application_setting_name" class="form-control">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-form-label col-lg-3 col-sm-12">Value</label>
					<div class="col-lg-9 col-md-9 col-sm-12">
							<input class="form-control" id="application_setting_value" name="application_setting_value" placeholder="Please Enter Value" type="text" />
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<input type="submit" name="submit" value="submit"
					   class="btn btn-primary"/>
			</div>

			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<!--End Modal-->
<script>
	function get_application_setting(id) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/settings/get_application_setting_by_id");?>',
			data: {id: id},
			datatype: 'JSON',
			success: function (data) {
				let response= JSON.parse(data);
					$("#setting_id").val(response.id);
					$("#application_setting_name").val(response.name);
					$("#application_setting_value").val(response.value);
			}
		});
	}
</script>
