<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
			<div class="kt-portlet__head kt-portlet__head--lg">
				<div class="kt-portlet__head-label">
										<span class="kt-portlet__head-icon">
											<svg xmlns="http://www.w3.org/2000/svg"
												 xmlns:xlink="http://www.w3.org/1999/xlink"
												 version="1.1" width="20" height="20" x="0" y="0" viewBox="0 0 297 297"
												 style="enable-background:new 0 0 512 512"
												 xml:space="preserve" class=""><g>
  <g xmlns="http://www.w3.org/2000/svg">
    <path d="M148.5,71.388c19.49,0,35.346-15.857,35.346-35.346S167.99,0.696,148.5,0.696s-35.346,15.857-35.346,35.346   S129.01,71.388,148.5,71.388z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="m155.932,82.821c-0.786-0.856-1.935-1.287-3.097-1.287h-8.67c-1.162,0-2.311,0.431-3.097,1.287-1.217,1.326-1.393,3.241-0.53,4.738l4.634,6.987-2.17,18.302 4.272,11.365c0.417,1.143 2.033,1.143 2.45,0l4.272-11.365-2.17-18.302 4.634-6.987c0.866-1.497 0.689-3.413-0.528-4.738z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="m94.069,164.469h108.86c2.776,0 5.035-2.259 5.035-5.035v-45.353c0-13.214-8.566-24.948-21.316-29.197l-9.94-3.051c-1.819-0.562-3.757,0.404-4.41,2.194l-23.798,65.296-23.798-65.297c-0.528-1.446-1.893-2.353-3.356-2.353-0.348,0-0.702,0.051-1.05,0.159l-9.864,3.026c-12.831,4.276-21.397,16.009-21.397,29.223v45.353c0,2.776 2.259,5.035 5.034,5.035z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="M35.345,89.454c19.49,0,35.346-15.856,35.346-35.345c0-19.49-15.857-35.346-35.346-35.346C15.856,18.763,0,34.62,0,54.109   C0,73.599,15.856,89.454,35.345,89.454z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="m95.511,186.619h-28.152v-55.605c0-17.681-14.333-32.014-32.013-32.014-17.68,0-32.013,14.333-32.013,32.013v75.535c0,16.975 13.761,30.736 30.736,30.736h36.527v50.333c0,4.798 3.889,8.687 8.687,8.687h33.725c4.798,0 8.687-3.889 8.687-8.687v-74.814c-1.42109e-14-14.461-11.723-26.184-26.184-26.184z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="m261.655,89.454c19.49,0 35.345-15.856 35.345-35.345 0-19.49-15.856-35.346-35.345-35.346s-35.346,15.857-35.346,35.346c-0.001,19.49 15.856,35.345 35.346,35.345z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
    <path d="m261.654,99c-17.681,0-32.013,14.333-32.013,32.013v55.605h-28.151c-14.461,0-26.184,11.723-26.184,26.184v74.814c0,4.798 3.889,8.687 8.687,8.687h33.725c4.798,0 8.687-3.889 8.687-8.687v-50.333h36.527c16.975,0 30.736-13.761 30.736-30.736v-75.535c0-17.679-14.333-32.012-32.014-32.012z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
  </g>
</g></svg>
										</span>
					<h3 class="kt-portlet__head-title">
						Club Table
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">

							&nbsp;
							<a href="<?php echo base_url('admin/clubs/add_club') ?>"
							   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
								<i class="la la-plus"></i>
								Add Club
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped- table-bordered text-center table-hover table-checkable" id="table_clubs">
					<thead>
					<tr>
						<th>#</th>
						<th>Logo</th>
						<th>Club Name</th>
						<th>Owner Name</th>
						<th>Email</th>
						<th>Contact</th>
						<th>Status</th>
						<th>Actions</th>
					</tr>
					</thead>
					<tbody>
					<?php
					$count = 1;
					foreach ($clubs as $club) { ?>
						<tr>
							<td><?php echo $count; ?></td>
							<td><img width="36px;" src="<?php echo base_url('uploads/clubs/' . $club->logo); ?>"/></td>
							<td><?php echo $club->club_name; ?></td>
							<td><?php echo $club->owner_name; ?></td>
							<td><?php echo $club->email; ?></td>
							<td><?php echo $club->contact; ?></td>

							<!--							<td>-->
							<?php //echo date_format(date_create($club->created_date), 'M d, Y'); ?><!--</td>-->

							<td>
								<?php if ($club->status == '1') { ?>
									<span class="kt-badge  kt-badge--success kt-badge--inline kt-badge--pill"
											onclick="change_status(<?php echo $club->id ?>,<?php echo $club->status ?>)">
										Active
									</span>
								<?php } else { ?>
									<span class="kt-badge  kt-badge--danger kt-badge--inline kt-badge--pill"
											onclick="change_status(<?php echo $club->id ?>,<?php echo $club->status ?>)">
										Inactive
									</span>
								<?php } ?>
							</td>

							<td>
								<div class="btn-group">
									<a href="<?php echo base_url('admin/clubs/edit/' . $club->id) ?>"
									   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm"><i class="la la-edit"></i></a>
								<!--	<a href="<?php /*echo base_url('admin/clubs/delete/' . $club->id) */?>"
									   onclick="return confirm('Are you sure ?')"
									   class="btn btn-outline-danger btn-elevate btn-elevate-air btn-icon btn-sm"><i
												class="la la-trash"></i></a>-->
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

<script>

	$('document').ready(function () {
		$('#table_clubs').DataTable({
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


	function change_status(id, status) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/clubs/change_status");?>',
			data: {id: id, status: status},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}
</script>
