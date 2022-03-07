<div class="row">
	<div class="col-md-12">
		<div class="kt-portlet" id="tournament_portlet">
			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="kt-portlet__head-label col-md-4">
						<h3 class="kt-portlet__head-title">
							<?php echo $tournament->tournament_name; ?>
						</h3>
					</div>
					<div class="col-md-4"></div>

				</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-striped- table-bordered table-hover " id="team_table">
					<thead>
					<tr>
						<th>#</th>
						<th>Logo</th>
						<th>Name</th>
						<th>Email</th>
						<th>Invitation</th>
					</tr>
					</thead>
					<tbody>
					<?php $count = 1;
						foreach ($teams as $team) {
							$team_invitation = $this->db->select('*')->from('team_tournament_mapping')->where('tournament_id', $tournament->id)->where('team_id', $team->id)->get()->row();
							 ?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><img width="48px" src="<?php echo base_url('uploads/teams/' . $team->logo); ?>"</td>
								<td><?php echo $team->company_name; ?></td>
								<td id="email"><?php echo $team->email; ?></td>
								<td><?php if ($team_invitation === null) { ?>
										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">Not Sent</span>
									<?php } else {
										if ($team_invitation->status == '0') { ?>
											<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Sent</span>
											<?php
										} else if ($team_invitation->status == '1') { ?>
											<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Accepted</span>
										<?php } else if ($team_invitation->status == '2') { ?>
											<span class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Confirmed</span>
											<?php
										}
									} ?></td>

							</tr>
							<?php
							$count++;
					} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script>
	$('document').ready(function () {
		$('#team_table').DataTable({
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
