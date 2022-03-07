<ul class="nav nav-tabs teams_tabs" id="myTab" role="tablist">
	<li class="nav-item">
		<a class="nav-link active" id="team_invite-tab" data-toggle="tab" href="#team_invite" role="tab" aria-controls="home" aria-selected="true">Team Invite</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="sent-tab" data-toggle="tab" href="#sent" role="tab" aria-controls="profile" aria-selected="false">Sent</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="accepted-tab" data-toggle="tab" href="#accepted" role="tab" aria-controls="contact" aria-selected="false">Accepted</a>
	</li>
	<li class="nav-item">
		<a class="nav-link" id="confirmed-tab" data-toggle="tab" href="#confirmed" role="tab" aria-controls="contact" aria-selected="false">Confirmed</a>
	</li>
</ul>
<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="team_invite" role="tabpanel" aria-labelledby="team_invite-tab">
		<div class="row mb-5 d-flex justify-content-end">
			<div class="col-md-4">
				<div class="btn-group pull-right">
					<button type="button" id="team_invitation"
							class="btn btn-brand btn-elevate btn-elevate-air btn-pill">Team
						Invitation<i class="la la-send la-rotate-180"></i>
					</button>
<!--					&nbsp;&nbsp;-->
<!--					<button type="button" id="pooling_invitation"-->
<!--							class="btn btn-brand btn-elevate btn-pill btn-elevate-air"><i-->
<!--								class="la la-send"></i>Pooling Invitation-->
<!--					</button>-->
				</div>
			</div>
		</div>
		<table class="table table-striped- table-bordered table-hover table-checkable" id="tournament_table">
			<thead>
			<tr>
				<th>RecordID</th>
				<th>Logo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Invitation</th>
			</tr>
			</thead>
			<tbody id="table_teams">
			<?php foreach ($invite_not_sent_teams as $not_sent_team) { ?>
				<tr id="<?php echo $not_sent_team->id; ?>">
					<td><?php echo $not_sent_team->id; ?></td>
					<td><img width="48px" src="<?php echo base_url('uploads/teams/' . $not_sent_team->logo); ?>"</td>
					<td><?php echo $not_sent_team->company_name; ?></td>
					<td id="email"><?php echo $not_sent_team->email; ?></td>
					<td><span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--pill">Not Sent</span></td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane fade table-responsive" id="sent" role="tabpanel" aria-labelledby="sent-tab">

			<div class="row mb-2 d-flex justify-content-end">
				<div class="col-md-4">
					<div class="btn-group pull-right">
						<button type="button" id="send_email_again"
								class="btn btn-brand btn-elevate btn-elevate-air btn-pill">Send Email<i class="la la-send la-rotate-180"></i>
						</button>
					</div>
				</div>
			</div>

		<table class="table sent_table table-striped- table-bordered table-hover table-checkable" id="sent_table" >
			<thead>
			<tr>
				<th>RecordID</th>
				<th>Logo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Invitation</th>
			</tr>
			</thead>
			<tbody id="table_sent_teams">
			<?php foreach ($invite_sent_teams as $sent_team) { ?>
				<tr id="<?php echo $sent_team->id; ?>">
						<td><?php echo $sent_team->id; ?></td>
						<td><img width="48px" src="<?php echo base_url('uploads/teams/' . $sent_team->logo); ?>"</td>
						<td><?php echo $sent_team->company_name; ?></td>
						<td id="sent_team_email"><?php echo $sent_team->email; ?></td>
						<td><span class="kt-badge kt-badge--warning kt-badge--inline kt-badge--pill">Sent</span></td>
					</tr>
					<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane fade table-responsive" id="accepted" role="tabpanel" aria-labelledby="accepted-tab">
		<?php if ($pooling == null) { ?>
		<div class="row mb-2 d-flex justify-content-end">
			<div class="col-md-4">
				<div class="btn-group pull-right">
					<button type="button" id="confirm_team"
							class="btn btn-brand btn-elevate btn-elevate-air btn-pill">Confirm Team<i class="la la-send la-rotate-180"></i>
					</button>
				</div>
			</div>
		</div>
		<?php } ?>
		<table class="table  table-striped- table-bordered table-hover table-checkable" id="accepted_table">
			<thead>
			<tr>
				<th>RecordID</th>
				<th>Logo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Invitation</th>

			</tr>
			</thead>
			<tbody id="accepted_teams">
			<?php foreach ($invite_accepted_teams as $accepted_team) { ?>
				<tr id="<?php echo $accepted_team->id; ?>">
					<td><?php echo $accepted_team->id; ?></td>
					<td><img width="48px" src="<?php echo base_url('uploads/teams/' . $accepted_team->logo); ?>"</td>
					<td><?php echo $accepted_team->company_name; ?></td>
					<td><?php echo $accepted_team->email; ?></td>
					<td>
						<?php if ($pooling == null) { ?>
						<button class="btn  kt-badge kt-badge--success kt-badge--inline kt-badge--pill btn-success"><span onclick="confirm_status(<?php echo $accepted_team->invite_id ?>,2)" class="">Accepted</span></button>
						<?php } else{ ?>
							<button class="btn  kt-badge kt-badge--success kt-badge--inline kt-badge--pill btn-success"><span class="">Accepted</span></button>
						<?php }?>

					</td>
				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

	<div class="tab-pane fade table-responsive" id="confirmed" role="tabpanel" aria-labelledby="confirmed-tab">
		<table class="table confirmed_table table-striped- table-bordered table-hover table-checkable" >
			<thead>
			<tr>
				<th>RecordID</th>
				<th>Logo</th>
				<th>Name</th>
				<th>Email</th>
				<th>Invitation</th>
				<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<?php foreach ($invite_confirmed_teams as $confirmed_team) { ?>
				<tr>
					<td><?php echo $confirmed_team->id; ?></td>
					<td><img width="48px" src="<?php echo base_url('uploads/teams/' . $confirmed_team->logo); ?>"</td>
					<td><?php echo $confirmed_team->company_name; ?></td>
					<td><?php echo $confirmed_team->email; ?></td>
					<td>
						<?php if ($pooling == null) { ?>
						<button class="btn  kt-badge kt-badge--primary kt-badge--inline kt-badge--pill btn-primary"><span onclick="confirm_status(<?php echo $confirmed_team->invite_id ?>,1)" class="">Confirmed</span></button>
						<?php } else{ ?>
							<button class="btn  kt-badge kt-badge--primary kt-badge--inline kt-badge--pill btn-primary"><span class="">Confirmed</span></button>
							<?php }?>
					</td>
					<td>
						<div class="btn-group">
							<a href="<?php echo base_url('admin/tournaments/squad/' . $tournament->id . '/' . $confirmed_team->id) ?>"
							   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" data-container="body"
							   data-toggle="kt-tooltip" data-placement="top" title="Team Squad">
								<i class="fa fa-users"></i></a>
							<a href="<?php echo base_url('admin/tournaments/print_list/' . $tournament->id . '/' . $confirmed_team->id) ?>"
							   class="btn btn-outline-primary btn-elevate btn-elevate-air btn-icon btn-sm" target="_blank" data-container="body"
							   data-toggle="kt-tooltip" data-placement="top" title="Team Squad list">
								<i class="fa fa-print"></i></a>
						</div>
					</td>

				</tr>
			<?php } ?>
			</tbody>
		</table>
	</div>

</div>

<script>
	$(document).ready(function () {

		if (window.location.hash) {
			$("a[href='" + location.hash + "']").tab("show");
			window.location.hash = "";
		}

		$('.confirmed_table').DataTable({
					responsive: true,

					lengthMenu: [5, 10, 25, 50],
					paging: false,
					pageLength: 25,

					language: {
						'lengthMenu': 'Display _MENU_',
					},

					// Order settings
					order: [[1, 'desc']],


				});

	});


	$('#team_invitation').on('click', function () {
		var emails = [];
		var i = 0;
		$('#table_teams tr.active td#email').each(function () {
			emails[i] = $(this).html();
			i++;
		});

		if (i === 0) {
			alert('Please select atleast 1 team');
		} else {
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Sending...'
			});

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/tournaments/send_team_invitation");?>',
				data: {
					'email': JSON.stringify(emails),
					'tournament_id': '<?php echo $tournament->id;?>'
				},
				datatype: 'JSON',
				success: function (data) {
					KTApp.unblockPage('#tournament_portlet');
					if (data) {
						window.location.hash = '#sent';
						location.reload();
					} else {
						alert('Something went wrong....');
					}
				},
				error: function () {
					KTApp.unblockPage('#tournament_portlet');
					alert('something went wrong');
				}
			});
		}
	});

	$('#send_email_again').on('click', function () {
		var emails = [];
		var i = 0;
		$('#table_sent_teams tr.active td#sent_team_email').each(function () {
			emails[i] = $(this).html();
			i++;
		});

		if (i === 0) {
			alert('Please select atleast 1 team');
		} else {
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Sending...'
			});

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/tournaments/send_team_invitation");?>',
				data: {
					'email': JSON.stringify(emails),
					'tournament_id': '<?php echo $tournament->id;?>'
				},
				datatype: 'JSON',
				success: function (data) {
					KTApp.unblockPage('#tournament_portlet');
					if (data) {
						window.location.hash = '#sent';
						location.reload();
					} else {
						alert('Something went wrong....');
					}
				},
				error: function () {
					KTApp.unblockPage('#tournament_portlet');
					alert('something went wrong');
				}
			});
		}
	});




	$('#confirm_team').on('click', function () {
		var ids = [];
		var i = 0;
		$('#accepted_teams tr.active').each(function () {
			ids[i] = $(this).attr('id');
			i++;
		});

		if (i === 0) {
			alert('Please select atleast 1 team');
		} else {
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Confirming...'
			});

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/tournaments/confirm_teams");?>',
				data: {
					'id': JSON.stringify(ids),
				},
				datatype: 'JSON',
				success: function (data) {
					KTApp.unblockPage('#tournament_portlet');
					if (data) {
						window.location.hash = '#confirmed';
						location.reload();
					} else {
						alert('Something went wrong....');
					}
				},
				error: function () {
					KTApp.unblockPage('#tournament_portlet');
					alert('something went wrong');
				}
			});
		}
	});

	$('#pooling_invitation').on('click', function () {
		var emails = [];
		var i = 0;
		$('#table_teams tr.active td#email').each(function () {
			emails[i] = $(this).html();
			i++;
		});

		if (i === 0) {
			alert('Please select atleast 1 team');
		} else {
			KTApp.blockPage({
				overlayColor: '#000000',
				type: 'v2',
				state: 'primary',
				message: 'Sending...'
			});

			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/tournaments/send_pooling_invitation");?>',
				data: {
					'email': JSON.stringify(emails),
					'tournament_id': '<?php echo $tournament->id;?>'
				},
				datatype: 'JSON',
				success: function (data) {
					KTApp.unblockPage('#tournament_portlet');
					if (data) {
						window.location.href = '<?php echo base_url("admin/tournaments/invite_teams/") . $tournament->id;?>';
					} else {
						alert('Something went wrong');
					}
				},
				error: function () {
					KTApp.unblockPage('#tournament_portlet');
					alert('something went wrong');
				}
			});
		}
	});

	function confirm_status(id, status) {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/tournaments/confirm_status");?>',
			data: {id: id, status: status},
			datatype: 'JSON',
			success: function (data) {
				location.reload();
			}
		});
	}
</script>
