<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-12">

			<!--begin::Portlet-->
			<div class="kt-portlet" id="kt_portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							Time slots
						</h3>
					</div>
					<div class="kt-portlet__head-toolbar">
						<button type="button" class="btn btn-brand m-1" data-toggle="modal"
								data-target="#kt_modal_6"><i class="la la-clock-o"></i>Time Slot
						</button>
					</div>

					<div class="modal fade" id="kt_modal_6" tabindex="-1" role="dialog"
						 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLongTitle">Add Reservation</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									</button>
								</div>
								<?php echo form_open('admin/settings/tournament_slots'); ?>
								<div class="modal-body">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Name </label>
										<div class="col-lg-9">
											<input type="text" name="time_slot_name" class="form-control">
										</div>
									</div>
									<div class="form-group row">
											<label class="col-form-label col-lg-3 col-sm-12">Starting Time</label>
											<div class="col-lg-9 col-md-9 col-sm-12">
												<div class="input-group timepicker">
													<input class="form-control" id="starting_time" name="starting_time" readonly placeholder="Select time" type="text" />
													<div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-clock-o"></i>
														</span>
													</div>
												</div>
											</div>
									</div>

									<div class="form-group row">
										<label class="col-form-label col-lg-3 col-sm-12">Ending Time</label>
										<div class="col-lg-9 col-md-9 col-sm-12">
											<div class="input-group timepicker">
												<input class="form-control" id="ending_time" name="ending_time"  readonly placeholder="Select time" type="text" />
												<div class="input-group-append">
														<span class="input-group-text">
															<i class="la la-clock-o"></i>
														</span>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<input type="submit" name="submit" value="submit"
											class="btn btn-primary"/>
								</div>

								<?php echo form_close(); ?>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-portlet__body">
					<!--begin: Datatable -->
					<table class="table table-striped- table-bordered table-hover table-checkable">
						<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Starting Time</th>
							<th>Ending Time</th>
						</tr>
						</thead>
						<tbody>
						<?php
						$count = 1;
						if (!empty($time_slots)){
						foreach ($time_slots as $slot) { ?>
							<tr>
								<td><?php echo $count; ?></td>
								<td><?php echo $slot->name; ?></td>
								<td><?php echo $slot->starting_time; ?></td>
								<td><?php echo $slot->ending_time; ?></td>
							</tr>
							<?php
							$count++;
						} } ?>
						</tbody>
					</table>

					<!--end: Datatable -->
				</div>
			</div>
		</div>
	</div>
</div>

