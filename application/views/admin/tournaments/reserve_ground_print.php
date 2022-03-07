<div class="row">
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
			</div>
		</div>
		<div class="kt-portlet__body">
			<table class="table table-striped text-center table-bordered table-hover">
				<thead>
				<tr>
					<th>#</th>
					<th>Date</th>
					<th>Name</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$count =1; ?>
				<?php foreach ($reserved_ground as $value) { ?>
						<tr>
							<td style="font-size: larger; justify-content: center;text-align-all: justify"><?php echo $count;?></td>
							<td style="font-size: larger; justify-content: center;text-align-all: justify"><?php echo $value->reserve_date ; ?></td>
							<td style="font-size: larger; justify-content: center;text-align-all: justify"><?php echo $value->ground_name ; ?></td>

						</tr>
						<?php $count++; }  ?>
				</tbody>
			</table>
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
	}


</script>
