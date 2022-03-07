<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<div class="kt-portlet">
			<div class="kt-portlet__body">
				<ul class="nav nav-tabs  nav-tabs-line nav-tabs-line-brand" role="tablist">
					<li class="nav-item">
						<a class="nav-link <?php if ($page === 'match_stats') {
							echo 'active';
						} ?>"
						   href="<?php echo base_url('player/matches/view_matches/match_stats/' . $match_id) ?>"
						   role="tab">Match Stats</a>
					</li>

				</ul>
				<div class="tab-content">
					<?php if ($page === 'match_stats') { ?>
						<div class="tab-pane <?php if ($page === 'match_stats') {
							echo 'active';
						} ?>">
							<?php $this->load->view('player/matches/view/match_stats') ?>
						</div>
					<?php } ?>


				</div>
			</div>
		</div>
	</div>
</div>

