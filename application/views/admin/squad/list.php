<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet kt-portlet--mobile">
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
														<path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112 c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984   c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984   z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263   c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833   C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088   c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699   C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276   c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752   C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032   c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265   c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"
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
													</g></g>
											</svg>
										</span>
					<h3 class="kt-portlet__head-title">
						Squad Table
					</h3>
				</div>
				<div class="kt-portlet__head-toolbar">
					<div class="kt-portlet__head-wrapper">
						<div class="kt-portlet__head-actions">

						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped text-center table-bordered table-hover" id="table_squad">
					<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Name</th>
						<th>Playing Status</th>
						<th>Player Role</th>
						<th>Shirt Number</th>
						<th>Kit Size</th>
						<th>Comment Box</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if (isset($squad)) {
						$count = 1;
						foreach ($squad as $s) { ?>
							<tr>
								<td><?php echo $count; ?></td>
								<td>
									<?php if ($s->image) { ?>
										<img width="48px;" src="<?php echo base_url('uploads/players/' . $s->image); ?>"/>
									<?php } else { ?>
										<img width="48px;" src="<?php echo base_url('assets/media/users/user2.png'); ?>"/>
									<?php } ?>
								</td>
								<td><?php echo $s->player_name; ?></td>
								<td><?php echo $s->playing_status; ?></td>
								<td><?php echo $s->role_name; ?></td>
								<td><?php echo $s->shirt_number; ?></td>
								<td><?php echo $s->player_size; ?></td>
							</tr>
							<?php
							$count++;
						}
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
		$('#table_squad').DataTable({
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



</script>
