<div class="row">
	<div class="kt-portlet">
		<div class="kt-portlet__body">
			<div class="form-group row">
				<div class="col-lg-4 col-xl-4"></div>
				<label>Logo:</label>
				<div class="col-lg-7 col-xl-7">

					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-"
						 id="kt_user_edit_avatar">
						<div class="kt-avatar__holder"
							 style="background-image: url(<?php echo base_url('uploads/tournaments/' . $tournament->logo); ?>);"></div>

					</div>
				</div>
			</div>

			<div class="form-group row">


				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Tournament Name:</label>
					<span name="tournament_name" id="tournament_name"
						  class="form-control"><?php echo $tournament->tournament_name ?></span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Tournament Format:</label>

					<?php foreach ($tournament_format as $format) { ?>
					<span class="form-control"
						  value="<?php echo $format->id ?>"><?php echo $format->name ?></span>
					<?php
													} ?>
					</select>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Tournament Points System:</label>

					<?php foreach ($tournament_points as $points) { ?>
					<span class="form-control"
						  value="<?php echo $points->id ?>"><?php echo $points->name ?></span>
					<?php
														} ?>
					</select>
				</div>

			</div>

			<div class="form-group row">

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>No of Teams:</label>
					<span class="form-control"><?php echo $tournament->no_teams ?></span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Minimum Squad:</label>
					<span name="min_squad" id="min_squad"
						  class="form-control"><?php echo $tournament->min_squad ?></span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Maximum Squad:</label>
					<span name="max_squad" id="max_squad"
						  class="form-control"><?php echo $tournament->max_squad ?></span>
				</div>

			</div>

			<div class="form-group row">

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Starting Date:</label>
					<span name="starting_date" id="starting_date"
						  class="form-control"><?php echo $tournament->starting_date ?></span>
				</div>

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Squad Submission Date:</label>
					<span name="squad_submission_date" id="squad_submission_date"
						  class="form-control"><?php echo $tournament->squad_submission_date ?></span>
				</div>
			</div>


		</div>

	</div>
</div>
