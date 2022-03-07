<div class="row">
	<div class="col-md-12">
		<div class="kt-portlet" id="tournament_portlet">
			<div class="kt-portlet__head">
				<div class="row col-md-12">
					<div class="kt-portlet__head-label col-md-4">
						<h3 class="kt-portlet__head-title">

						</h3>
					</div>
					<div class="col-md-4"></div>
					<div class="col-md-4 align-self-center">
						<div class="btn-group pull-right">
							<button type="button" id=""
									class="btn btn-brand btn-elevate btn-elevate-air btn-pill">Add Squad<i class="la la-send la-rotate-180"></i>
							</button>
							&nbsp;&nbsp;
							<button type="button" class="btn btn-brand btn-elevate btn-pill btn-elevate-air"><i
									class="la la-send"></i>Submit Squad
							</button>
						</div>
					</div>
				</div>
			</div>
			<div class="kt-portlet__body">
				<table class="table table-striped- table-bordered table-hover table-checkable" id="tournament_table">
					<thead>
					<tr>
						<th>RecordID</th>

						<th>Images</th>



					</tr>
					</thead>
					<tbody>
					<?php
					$rows = ((int)(sizeof($players)/12))+1 ;
					$remaining = sizeof($players);
					$count = 0;
					for ($i = 0; $i < $rows; $i++) { ?>

					<tr>
						<td></td>
						<td>
						<?php if ($remaining < 12) {
						for ($j = 0; $j < $remaining; $j++) { ?>



									<img  style="border-radius: 50px" width="60px;"
										 src="<?php echo base_url('uploads/players/' . $players[$count]->image); ?>"/>

						<?php
						$count++;
					}
							}?>
						</td>
							</tr>
					<?php

					}
					?>

					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
