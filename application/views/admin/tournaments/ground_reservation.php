<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
	<div class="row">
		<div class="col-lg-12">

			<!--begin::Portlet-->
			<div class="kt-portlet" id="kt_portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<span class="kt-portlet__head-icon">
							<i class="flaticon-map-location"></i>
						</span>
						<h3 class="kt-portlet__head-title">
							Reserved Grounds
						</h3>
					</div>

					<div class="kt-portlet__head-toolbar">
						<button type="button" class="btn btn-brand m-1" data-toggle="modal"
								data-target="#kt_modal_6"><i class="la la-plus"></i>Reservation
						</button>

						<a href="<?php echo base_url('admin/tournaments/print_reserved_squad/'.$tournament_id)?>" class="btn btn-warning m-1"><i class="la la-print"></i>Print
						</a>
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
								<?php echo form_open('admin/grounds/reserve_ground', 'id=reserve_ground'); ?>
								<div class="modal-body">
											<input type="hidden" name="tournament_id" value="<?php echo $tournament_id; ?>">
									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Ground:</label>
										<div class="col-lg-9">
											<select name="ground_id" type="text" class="form-control kt-select2"
													id="ground" required>
												<?php foreach ($grounds as $ground) { ?>
													<option value="<?php echo $ground->id ?>"><?php echo $ground->ground_name ?></option>
													<?php
												} ?>
											</select>
										</div>
									</div>

									<div class="form-group row">
										<label class="col-lg-3 col-form-label">Reserve Date</label>
										<div class="col-lg-9">
											<input type="text" name="reserve_date" class="form-control"
												   id="reserve_date" readonly placeholder="Select date"/>
										</div>
									</div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
									<button type="submit" id="submit" name="submit" value="submit"
											class="btn btn-primary">Save changes
									</button>
								</div>

								<?php echo form_close(); ?>
							</div>
						</div>
					</div>

				</div>
				<div class="kt-portlet__body">
					<div id="calendar_ground_reservations"></div>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	$('document').ready(function () {
		$('#tournament').select2({
			placeholder: "Select a tournament"
		});

		$('#ground').select2({
			placeholder: "Select a ground"
		});

		$('#reserve_date').datepicker({
			todayHighlight: true,
			orientation: "bottom left",
			multidate: true,
			startDate: new Date('<?php echo $tournament->starting_date; ?>')
		});

		var e = JSON.parse('<?php echo json_encode($reserved_ground); ?>');
		var events = [];
		for (var i = 0; i < e.length; i++) {
			let event = {
				"title": e[i]["ground_name"],
				"start": e[i]["reserve_date"]
			}
			events.push(event);
		}

		var todayDate = moment().startOf('day');
		var YM = todayDate.format('YYYY-MM');
		var YESTERDAY = todayDate.clone().subtract(1, 'day').format('YYYY-MM-DD');
		var TODAY = todayDate.format('YYYY-MM-DD');
		var TOMORROW = todayDate.clone().add(1, 'day').format('YYYY-MM-DD');

		var calendarEl = document.getElementById('calendar_ground_reservations');
		var calendar = new FullCalendar.Calendar(calendarEl, {
			plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],

			isRTL: KTUtil.isRTL(),
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'dayGridMonth,timeGridWeek,timeGridDay'
			},

			height: 800,
			contentHeight: 780,
			aspectRatio: 3,  // see: https://fullcalendar.io/docs/aspectRatio

			nowIndicator: true,
			now: TODAY + 'T09:25:00', // just for demo

			views: {
				dayGridMonth: {buttonText: 'month'},
				timeGridWeek: {buttonText: 'week'},
				timeGridDay: {buttonText: 'day'}
			},

			defaultView: 'dayGridMonth',
			defaultDate: TODAY,

			editable: true,
			eventLimit: true, // allow "more" link when too many events
			navLinks: true,
			events: events,

			eventRender: function (info) {
				var element = $(info.el);
			}
		});

		calendar.render();
	});

	$('#reserve_ground').submit(function (e) {
		e.preventDefault();
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/grounds/reserve_ground");?>',
			dataType: "json",
			data: $('#reserve_ground').serialize(),
			success: function (result) {
				console.log(result);
				location.reload();
			},
			error: function (error) {

			}
		});
	})

	$('#filter_tournament').on('change', function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/grounds/filter_reserve_ground_by_tournament");?>',
			dateType: "json",
			data: {'tournament_id': $('#filter_tournament').val()},
			success: function (result) {
				$('#table_grounds').DataTable().clear().destroy();
				$('#body_grounds').html(result);
				$('#table_grounds').DataTable({
					responsive: true,
					// Pagination settings
					dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
						<'row'<'col-sm-12'tr>>
						<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
					searching: false,
					paging: false,
					buttons: [
						'print',
						'excelHtml5',
						'pdfHtml5',
					],
				});
			},
			error: function (error) {

			}
		});
	});
</script>
