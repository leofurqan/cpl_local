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
						   href="<?php echo base_url('player/tournaments/view_tournament/home/' . $tournament_id) ?>"
						   role="tab">Home</a>
					</li>

				</ul>
				<div class="tab-content">
					<?php if ($page === 'home') { ?>
						<div class="tab-pane <?php if ($page === 'home') {
							echo 'active';
						} ?>">
							<?php $this->load->view('player/tournaments/view/home') ?>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>
</div>

