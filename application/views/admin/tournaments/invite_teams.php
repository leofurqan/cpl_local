<div class="row">
	<div class="col-md-12">
		<div class="kt-portlet" id="tournament_portlet">
			<div class="kt-portlet__head">

			</div>
			<div class="kt-portlet__body">
				<table class="table table-striped- table-bordered table-hover table-checkable" id="tournament_table">
					<thead>
					<tr>
						<th>RecordID</th>
						<th>Logo</th>
						<th>Name</th>
						<th>Email</th>
						<th>Invitation</th>
<!--						<th>Pooling</th>-->
						<th>Actions</th>
					</tr>
					</thead>
					<tbody id="table_teams">
					<?php if (!empty($teams)) {
						foreach ($teams as $team) {
							$team_invitation = $this->db->select('*')->from('team_tournament_mapping')->where('tournament_id', $tournament->id)->where('team_id', $team->id)->order_by('status', 'desc')->get()->row();
							$pooling_invitation = $this->db->select('*')->from('pooling_invitation')->where('tournament_id', $tournament->id)->where('team_id', $team->id)->get()->row(); ?>
							<tr id="<?php echo $team->id; ?>">
								<td><?php echo $team->id; ?></td>
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
											 <span onclick="confirm_status(<?php echo $team_invitation->id ?>,<?php echo $team_invitation->status ?>)" class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Accepted</span>
										<?php } else if ($team_invitation->status == '2') { ?>
											<span  class="kt-badge kt-badge--brand kt-badge--inline kt-badge--pill">Confirmed</span>
											<?php
										}
									} ?></td>
<!--								<td>--><?php //if ($pooling_invitation === null) { ?>
<!--										<span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">Not Sent</span>-->
<!--									--><?php //} else {
//										if ($pooling_invitation->status == '0') { ?>
<!--											<span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Sent</span>-->
<!--											--><?php
//										} else { ?>
<!--											<span class="kt-badge kt-badge--success kt-badge--inline kt-badge--pill">Accepted</span>-->
<!--										--><?php //}
//									} ?><!--</td>-->
								<td>
									<div class="btn-group">
										<a href="<?php echo base_url('admin/tournaments/squad/' . $tournament->id . '/' . $team->id) ?>"
										   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
										   data-toggle="kt-tooltip" data-placement="top" title="Team Squad">
											<i class="fa fa-users"></i></a>
										<a href="<?php echo base_url('admin/tournaments/print_list/' . $tournament->id . '/' . $team->id) ?>"
										   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" target="_blank" data-container="body"
										   data-toggle="kt-tooltip" data-placement="top" title="Team Squad list">
											<i class="fa fa-print"></i></a>
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


