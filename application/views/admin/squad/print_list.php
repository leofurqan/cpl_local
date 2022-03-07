<div class="row">
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" >
		<div class="kt-portlet" id="kt-portlet">

			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="col-md-3" style="justify-content: center">
						<img width="100px;"
							 src="<?php echo base_url('uploads/tournaments/' . $tournament->logo); ?>"/>
					</div>
					<div class="kt-portlet__head-label col-md-6 text-center" style="justify-content: center">
						<h3 class="kt-portlet__head-title">
							The Lahore CPS Club Pvt Limited
							<br>
							<?php echo $tournament->tournament_name; ?>

						</h3>
					</div>

					<div class="col-md-3 justify-content-end d-flex">
						<img width="100px;"
							 src="<?php echo base_url('uploads/teams/' . $team->logo); ?>"/>
					</div>
				</div>

			</div>
			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="col-md-4" style="justify-content: center">

					</div>
					<div class="kt-portlet__head-label col-md-4" style="justify-content: center">


						<h3 class="kt-portlet__head-title text-center">
							<?php echo $team->company_name; ?>
						</h3>
					</div>

					<div class="col-md-4 ">

					</div>
				</div>
			</div>
			<div class="kt-portlet__body">

				<!--begin: Datatable -->
				<table class="table table-striped text-center table-bordered table-hover">
					<thead>
					<tr>
						<th>#</th>
						<th>Image</th>
						<th>Name</th>
						<th>Player Role</th>
						<th>Shirt Number</th>
						<th>Comment Box</th>
					</tr>
					</thead>
					<tbody>
					<?php
					if (isset($squad)) {
						$count = 1;
						foreach ($squad as $s) { ?>
							<tr>
								<td style="font-size: larger; justify-content: center;text-align-all: justify"><?php echo $count; ?></td>
								<td>
									<?php if ($s->image) { ?>
										<img width="48px;" src="<?php echo base_url('uploads/players/' . $s->image); ?>"/>
									<?php } else { ?>
										<img width="48px;" src="<?php echo base_url('assets/media/users/user2.png'); ?>"/>
									<?php } ?>
								</td>
								<td  style="font-size: larger;  justify-content: center;"><?php echo $s->player_name; ?></td>
								<td style="font-size: larger; justify-content: center;text-align-all: justify"><?php echo $s->role_name; ?></td>
								<td style="border: #0f0f16;font-size: larger; justify-content: center;text-align-all: justify "><?php echo $s->shirt_number; ?></td>

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
	$(document).ready(function () {
		mprint('kt-portlet')
	});
	function mprint(el) {
		var printContents = document.getElementById(el).innerHTML;
		var originalContents = document.body.innerHTML;
		document.body.innerHTML = printContents;
		window.print();
		document.body.innerHTML = originalContents;

	}


</script>
