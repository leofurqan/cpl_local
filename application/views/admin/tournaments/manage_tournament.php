<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
			<div class="kt-portlet__head">
				<div class="kt-portlet__head-label">
					<h3 class="kt-portlet__head-title">
						<?php echo $tournament->tournament_name; ?>
					</h3>
				</div>
			</div>
			<div class="kt-portlet__body">
				<ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-brand" role="tablist">
					<li class="nav-item">
						<a class="nav-link <?php if ($page === 'home') {
							echo 'active';
						} ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/home/' . $tournament_id) ?>"
						   role="tab"><i class="flaticon-information"></i> Home</a>
					</li>

					<li class="nav-item">
						<a class="nav-link <?php if ($page === 'detail') {
							echo 'active';
						}  ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/detail/' . $tournament_id) ?>"
									> Detail</a>
					</li>
					<li class="nav-item">
						<a class="nav-link <?php if ($page === 'teams') {
							echo 'active';
						}  ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/teams/' . $tournament_id) ?>"
						   > Teams</a>
					</li>
					<li class="nav-item">
						<?php if ($tournament->no_teams == $count_of_confirmed_teams){?>
						<a class="nav-link <?php if ($page === 'pooling') {
							echo 'active';
						}  ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/pooling/' . $tournament_id) ?>"> Pooling</a>
						<?php } else { ?>
							<a style="cursor: pointer;" class="nav-link text-muted" onclick="notified('No. Of Confirm Teams Should be Equal to Tournament no. of Teams')" ><i class="fa fa-lock fa-sm"></i>Pooling</a>
						<?php } ?>
					</li>
					<li class="nav-item">
						<?php if ($teams_pools > 0){?>
						<a class="nav-link <?php if ($page === 'ground_reservation') {
							echo 'active';
						}  ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/ground_reservation/' . $tournament_id) ?>"> Ground Reservation</a>
						<?php } else { ?>
							<a style="cursor: pointer;" class="nav-link text-muted" onclick="notified('Please Complete Pooling First')" ><i class="fa fa-lock fa-sm"></i>Ground Reservation</a>
						<?php } ?>
					</li>
					<li class="nav-item">
						<?php if ($no_of_reserved_ground >= 1){?>
						<a class="nav-link <?php if ($page === 'scheduling') {
							echo 'active';
						}  ?>"
						   href="<?php echo base_url('admin/tournaments/manage_tournament/scheduling/' . $tournament_id) ?>"
						 > Scheduling</a>
						<?php } else{ ?>
							<a style="cursor: pointer;" class="nav-link text-muted" onclick="notified('Please Reserve At least One Ground')" ><i class="fa fa-lock fa-sm"></i>Scheduling</a>
						<?php } ?>
					</li>
				</ul>
				<div class="tab-content">
					<?php if ($page === 'home') { ?>
						<div class="tab-pane <?php if ($page === 'home') {
							echo 'active';
						} ?>">
							<?php $this->load->view('admin/tournaments/home') ?>
						</div>
					<?php } ?>

					<?php if ($page === 'detail') { ?>
						<div class="tab-pane <?php if ($page === 'detail') {
							echo 'active';
						} ?>">
							<?php $this->load->view('admin/tournaments/detail') ?>
						</div>
					<?php } ?>
					<?php if ($page === 'teams') { ?>
						<div class="tab-pane <?php if ($page === 'teams') {
							echo 'active';
						} ?>">
							<?php $this->load->view('admin/tournaments/teams') ?>
						</div>
					<?php } ?>

					<?php if ($page === 'pooling') { ?>
						<div class="tab-pane <?php if ($page === 'pooling') {
							echo 'active';
						} ?>">
							<?php if ($pooling_complete == true){?>
							<?php $this->load->view('admin/tournaments/pooling_view') ?>
							<?php } else { ?>
								<?php $this->load->view('admin/tournaments/pooling') ?>
							<?php } ?>
						</div>
					<?php } ?>
					<?php if ($page === 'ground_reservation') { ?>
						<div class="tab-pane <?php if ($page === 'ground_reservation') {
							echo 'active';
						} ?>">
							<?php $this->load->view('admin/tournaments/ground_reservation') ?>
						</div>
					<?php } ?>
					<?php if ($page === 'scheduling') { ?>
						<div class="tab-pane <?php if ($page === 'scheduling') {
							echo 'active';
						} ?>">
							<?php if ($status == true){
								$this->load->view('admin/matches/scheduling');
							} else{
								$this->load->view('admin/tournaments/scheduling');
							 } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	function notified(msg){
		swal.fire("Message", msg, "error");
	}
</script>
