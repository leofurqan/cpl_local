<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile" id="team_portlet">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<svg xmlns="http://www.w3.org/2000/svg"
												 xmlns:xlink="http://www.w3.org/1999/xlink"
												 version="1.1" width="20" height="20" x="0"
												 y="0" viewBox="0 0 80.13 80.13"
												 style="enable-background:new 0 0 512 512"
												 xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112   c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984   c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984   z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263   c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833   C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088   c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699   C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276   c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752   C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032   c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265   c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>
										</span>
					<h3 class="kt-portlet__head-title">
						Team Table
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">
							<button type="button" id="team_credentials"
									class="btn btn-brand btn-elevate btn-elevate-air btn-pill">Team
								Credentials<i class="la la-send la-rotate-180"></i>
							</button>
							<a href="<?php echo base_url('admin/teams/add_team') ?>"
							   class="btn btn-brand btn-elevate btn-elevate-air btn-pill">
								<i class="la la-plus"></i>
								Add Teams
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered text-center table-hover table-checkable" id="teams_table">
					<thead>
					<tr>
						<th>RecordID</th>
						<th>Logo</th>
						<th>Company Name</th>
						<th>Team Category</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody id="table_teams">
					<?php
					if (!empty($teams)) {
					foreach ($teams as $team) { ?>
						<tr id="<?php echo $team->id; ?>">
							<td><?php echo $team->id; ?></td>
							<td>
								<img width="36px;" src="<?php echo base_url('uploads/teams/' . $team->logo); ?>"/>
							</td>
							<td><?php echo $team->company_name; ?></td>
							<td><?php echo $team->category; ?></td>
							<td id="email"><?php echo $team->email; ?></td>
							<td><?php echo $team->contact; ?></td>
							<td>
								<?php if ($team->status == '1') { ?>
									<span
											class="kt-badge kt-badge--elevate   kt-badge--success kt-badge--inline kt-badge--pill"
											onclick="change_status(<?php echo $team->id ?>,<?php echo $team->status ?>)">
										Active
									</span>
								<?php } else { ?>
									<span
											class="kt-badge  kt-badge--elevate kt-badge--danger kt-badge--inline kt-badge--pill"
											onclick="change_status(<?php echo $team->id; ?>,<?php echo $team->status ?>)">
										Inactive
									</span>
								<?php } ?>
							</td>
							<td>
								<div class="btn-group">
									<a href="<?php echo base_url('admin/teams/edit/' . $team->id) ?>"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
									   data-toggle="kt-tooltip" data-placement="top" title="Edit"><i
												class="la la-edit"></i></a>
<!--									<a href="--><?php //echo base_url('admin/teams/delete/' . $team->id) ?><!--"-->
<!--									   onclick="return confirm('Are you sure ?')"-->
<!--									   class="btn btn-outline-danger btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"-->
<!--									   data-toggle="kt-tooltip" data-placement="top" title="Delete"><i-->
<!--												class="la la-trash"></i></a>-->
									<a href="#"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm"
									   onclick="change_id(<?php echo $team->id ?>)"
									   data-toggle="modal" data-target="#change_password"><i class="la la-key"></i></a>
<!--									<a href="--><?php //echo base_url('admin/teams/send_teams_credentials/' . $team->id) ?><!--"-->
<!--									   class="btn btn-outline-primary btn-icon btn-sm"><i-->
<!--												class="la flaticon2-email"></i></a>-->
									<a href="<?php echo base_url('admin/teams/players/' . $team->id) ?>"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
									   data-toggle="kt-tooltip" data-placement="top" title="Player List"><i
												class="la flaticon2-user"></i></a>
								</div>
							</td>
						</tr>
						<?php
					}
					} ?>
					</tbody>
				</table>
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
			<?php echo form_open('admin/teams/change_password', 'class="kt-form kt-form--label-right"'); ?>

			<div class="modal-body">
				<div class="form-group row">
					<div class="col-lg-9 col-xl-6 col-sm-6">
						<input type="hidden" class="form-control"
							   name="team_id" id="team_id">
					</div>
				</div>
				<div class="form-group row">
					<label class="col-xl-3 col-lg-3 col-sm-3 col-form-label">New Password</label>
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

	$('#team_credentials').on('click', function () {
		var emails = [];
		var i = 0;
		$('#table_teams tr.active td#email').each(function () {
			emails[i] = $(this).html();
			i++;
		});

		if (i === 0) {
			alert('Please select Atleast 1 team');
		} else {
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Sending...'
			});

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/teams/send_team_credentials");?>',
				data: {
					'email': JSON.stringify(emails),
				},
				datatype: 'JSON',
				success: function (data) {
					KTApp.unblockPage('#team_portlet');
					console.log(data);
					if (data === 'true') {
						window.location.href = '<?php echo base_url("admin/teams");?>';
					} else {
						alert('Something went wrong....');
					}
				},
				error: function () {
					KTApp.unblockPage('#team_portlet');
					alert('something went wrong');
				}
			});
		}
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
		$('#team_id').val(id);
	}

	function change_status(id, status) {

		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/teams/change_status");?>',
			data: {id: id, status: status},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}

</script>
<script>
	$('.kt-form').submit(function (e) {
		$('#error').addClass('d-none');
		if ($('#email').val() === $('#password').val()) {
			$('.kt-form').submit();
		} else {
			e.preventDefault();
			$('#error').removeClass('d-none');
		}
	});


</script>
