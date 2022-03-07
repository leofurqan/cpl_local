
<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
												 version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 28.055 28.055"
												 style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<path d="M14.249,1.027c-0.036,0-0.07,0.009-0.104,0.009c-0.106-0.003-0.211-0.01-0.318-0.009H14.249z M14.085,17.301   c-0.019,0-0.036-0.003-0.055-0.003c-0.014,0-0.027,0.003-0.041,0.003H14.085z M8.137,11.313c0.015-0.003,0.026-0.019,0.042-0.023   c0.941,3.405,3.377,5.953,5.852,6.007c2.254-0.104,5.022-2.606,5.944-5.994c0.424,0.026,0.848-0.474,0.967-1.17   c0.123-0.726-0.135-1.374-0.572-1.449c-0.028-0.005-0.057,0.013-0.084,0.014c-0.127-5.603-2.789-7.579-6.141-7.664   C10.688,1.051,7.593,3.453,7.789,8.7c-0.033,0-0.064-0.021-0.096-0.015C7.254,8.76,6.998,9.408,7.121,10.134   C7.241,10.858,7.697,11.386,8.137,11.313z M18.688,18.27l-3.141,6.146l-0.496-3.997l0.775-0.636h-1.878h-1.717l0.776,0.636   l-0.497,3.997L9.373,18.27C3.917,19.005,0,21.343,0,27.027h28.055C28.057,21.342,24.141,19.006,18.688,18.27z"
		  fill="#5867dd" data-original="#000000" style="" class=""/></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g></g></svg>
										</span>
					<h3 class="kt-portlet__head-title">
						Official Table
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">

							&nbsp;
							<a href="<?php echo base_url('admin/officials/add_official') ?>"
							   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
								<i class="la la-plus"></i>
								Add Officials
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body" >

				<!--begin: Datatable -->
				<table class="table table-striped table-bordered table-hover text-center table-checkable" id="table_officials">
					<thead>
					<tr>
						<th>#</th>
						<th>Profile Picture</th>
						<th>Full Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Official Type</th>
						<th>Date</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = 1;
					foreach ($officials as $official) {

						?>
						<tr>
							<td><?php echo $count; ?></td>
							<td>
								<?php if (!empty($official->image)){?>
								<img width="36px;" src="<?php echo base_url('uploads/officials/' . $official->image); ?>"/>
								<?php } else{?>
									<img width="36px;" src="<?php echo base_url('uploads/officials/profile.png'); ?>"/>
								<?php } ?>
							</td>
							<td><?php echo $official->full_name; ?></td>
							<td><?php echo $official->email; ?></td>
							<td><?php echo $official->contact; ?></td>
							<td><?php echo $official->type_name; ?></td>

							<td><?php echo date_format(date_create($official->created_date), 'M d, Y'); ?></td>
							<td>
								<?php if ($official->status == '1') { ?>
									<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill" onclick="change_status(<?php echo $official->id ?>,<?php echo $official->status ?>)">Active</span>
								<?php } else { ?>
									<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill" onclick="change_status(<?php echo $official->id ?>,<?php echo $official->status ?>)">Inactive</span>
								<?php } ?>
							</td>
							<td>

								<div class="btn-group">
									<a href="<?php echo base_url('admin/officials/edit/' . $official->id) ?>"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm"><i class="la la-edit"></i></a>
									<!--<a href="<?php /*echo base_url('admin/officials/delete/' . $official->id) */?>"
									   onclick="return confirm('Are you sure ?')"
									   class="btn btn-outline-danger btn-elevate btn-elevate-air btn-icon btn-sm"><i
												class="la la-trash"></i></a>-->
									<a href="#"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" onclick="change_id(<?php echo $official->id?>)"
									   data-toggle="modal" data-target="#change_password"><i class="la la-key"></i></a>
									<a href="<?php echo base_url('admin/officials/send_official_credentials/' . $official->id) ?>"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm"><i
												class="la flaticon2-email"></i></a>
								</div>
							</td>
						</tr>
						<?php
						$count++;
					} ?>
					</tbody>
				</table>

				<!--end: Datatable -->
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="change_password" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Change Password</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/officials/change_password', 'class="kt-form kt-form--label-right"'); ?>

			<div class="modal-body">
				<div class="form-group row">
					<div class="col-lg-9 col-xl-6">
						<input type="hidden" class="form-control"
							   name="official_id" id="official_id">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-sm-3 col-lg-3 col-form-label">New Password</label>
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="password" class="form-control" name="new_password"
							   id="new_password" placeholder="New password">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">Verify Password</label>
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="password" class="form-control" name="confirm_password"
							   id="confirm_password" placeholder="Verify password">
					</div>
				</div>
				<div class="row d-none justify-content-center" id="error">
					<span class="text-danger">New Password & Confirm Password should be equal.</span>
				</div>
			</div>
			<div class="modal-footer">

				<button type="submit" value="submit" name="submit"
						class="btn btn-brand btn-bold">Change Password
				</button>&nbsp;
				<button type="reset" class="btn btn-secondary">Cancel</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<script>

	$('document').ready(function () {
		$('#table_officials').DataTable({
			responsive: true,
			// Pagination settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			buttons: [
				'print',
				'copyHtml5',
				'excelHtml5',
				'csvHtml5',
				'pdfHtml5',
			],
		});
	});


	$('.kt-form').submit(function (e) {
		$('#error').addClass('d-none');
		if ($('#new_password').val() === $('#confirm_password').val()) {
			$('.kt-form').submit();
		} else {
			e.preventDefault();
			$('#error').removeClass('d-none');
		}
	});
	function change_id(id) {
		$('#official_id').val(id);
	}


	function change_status(id,status) {

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/officials/change_status");?>',
			data: {id: id,status:status},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}






</script>
