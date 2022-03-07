<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('team/players') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Players List
			</a>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open_multipart('team/players/edit/' . $player->id, 'class="kt-form kt-form--label-right"'); ?>

	<div class="kt-portlet__body">
		<div class="form-group row">
			<label>Image:</label>
			<div class="col-lg-9 col-xl-6">
				<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
					<div class="kt-avatar__holder" style="background-image: url(<?php echo base_url('uploads/players/' . $player->image); ?>);"></div>
					<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
						<i class="fa fa-pen"></i>
						<input value="<?php echo base_url('uploads/players/' . $player->image); ?>" type="file" name="image" accept=".png, .jpg, .jpeg" height="100" width="100">
					</label>
					<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
				</div>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-lg-4">
				<label>Player Name:</label>
				<input name="player_name" type="text" class="form-control" placeholder="Enter player name" required
					   data-error="Please enter your name" value="<?php echo $player->player_name; ?>">
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Display Name:</label>
				<input name="display_name" type="text" class="form-control" placeholder="Enter display name of 10 characters"
					   data-error="Please enter your display name" value="<?php echo $player->display_name; ?>">
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-lg-4">
				<label class="">Email:</label>
				<input id="email" name="email" type="email" class="form-control" placeholder="Enter your email"
					   data-error="Please enter your email" value="<?php echo $player->email; ?>">
			</div>

		</div>

		<div class="form-group row">
			<div class="col-lg-4">
				<label class="">Contact:</label>
				<input id="contact" name="contact" type="number" class="form-control" placeholder="Enter contact number"

					   data-error="Please enter your contact number" value="<?php echo $player->contact; ?>">

				<div class="help-block with-errors"></div>
			</div>
			<div class="col-lg-4">
				<label>Playing Status:</label>
				<select name="playing_status" id="playing_status" type="text" class="form-control"
						placeholder="Select playing status" >
					<option <?php if ($player->playing_status === 'batsman') {
						echo 'selected';
					} ?>>Batsman
					</option>
					<option<?php if ($player->playing_status === 'bowler') {
						echo 'selected';
					} ?>>Bowler
					</option>
					<option<?php if ($player->playing_status === 'all_rounder') {
						echo 'selected';
					} ?>>All Rounder
					</option>
				</select>
				<span class="form-text text-muted">Please select playing status</span>
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-lg-4">
				<label>Batting Style:</label>
				<select name="batting_style" id="batting_style" type="text" class="form-control"
						placeholder="Select batting style" >
					<option<?php if ($player->batting_style === 'RHB') {
						echo 'selected';
					} ?>>RHB (Right Hand Batsman)
					</option>
					<option<?php if ($player->batting_style === 'LHB') {
						echo 'selected';
					} ?>>LHB (Left Hand Batsman)
					</option>

				</select>

				<span class="form-text text-muted">Please select batting style</span>
				<div class="help-block with-errors"></div>
			</div>

		</div>

		<div class="form-group row">
			<div class="col-lg-4">
				<label>Bowling Style:</label>
				<select name="bowling_style" id="bowling_style" type="text" class="form-control"
						placeholder="Select bowling style" >
					<option<?php if ($player->bowling_style === 'RAF') {
						echo 'selected';
					} ?>>RAF (Right Arm Fast)
					</option>
					<option<?php if ($player->bowling_style === 'LAF') {
						echo 'selected';
					} ?>>LAF (Left Arm Fast)
					</option>
					<option<?php if ($player->bowling_style === 'RAMF') {
						echo 'selected';
					} ?>>RAMF (Right Arm Medium Fast)
					</option>
					<option<?php if ($player->bowling_style === 'LAMF') {
						echo 'selected';
					} ?>>LAMF (Left Arm Medium Fast)
					</option>
					<option<?php if ($player->bowling_style === 'RALS') {
						echo 'selected';
					} ?>>RALS (Right Arm Leg Spin)
					</option>
					<option<?php if ($player->bowling_style === 'RAOS') {
						echo 'selected';
					} ?>>RAOS (Right Arm Off Spin)
					</option>
					<option<?php if ($player->bowling_style === 'LAS') {
						echo 'selected';
					} ?>>LAS (Left Arm Spin)
					</option>
					<option<?php if ($player->bowling_style === 'Chinaman') {
						echo 'selected';
					} ?>>Chinaman
					</option>
				</select>
				<span class="form-text text-muted">Please select bowling style</span>
				<div class="help-block with-errors"></div>
			</div>

			<div class="col-lg-4">
				<label>Status:</label>
				<div class="kt-radio-inline">
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="status" <?php echo set_radio('fmenu_type', '1', $player->status == '1'); ?> value="1"> Active
						<span></span>
					</label>
					<label class="kt-radio kt-radio--solid">
						<input type="radio" name="status" <?php echo set_radio('fmenu_type', '0', $player->status == '0'); ?> value="0"> Inactive
						<span></span>
					</label>
				</div>
			</div>

		</div>




	</div>

	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-lg-4"></div>
				<div class="col-lg-8">
					<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php echo form_close(); ?>

<!--end::Form-->

<script>
	$('#email').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("team/players/check_email");?>',
			data: {
				'email': $(this).val()
			},
			datatype: 'JSON',
			success: function (data) {
				var response = JSON.parse(data);
				console.log(response);
				$('#email').removeClass('is-valid');
				$('#email').removeClass('is-invalid');
				$('#email').parent().find('.valid-feedback').remove();
				$('#email').parent().find('.invalid-feedback').remove();
				if (data === "false") {
					$('#email').addClass('is-invalid');
					$('#email').parent().append('<div class="invalid-feedback">Email already exist.</div>');
				} else {
					$('#email').addClass('is-valid');
					$('#email').parent().append('<div class="valid-feedback">Email is available.</div>');
				}
			},
			error: function () {
				alert('something went wrong');
			}
		});
	});
</script>
<script>
	$('#contact').change(function () {
		let regExp = /^(92)\d{3}\d{7}$|^\d{10}$/;
		if (!regExp.test($(this).val())){

			$('#contact').addClass('is-invalid');
			$('#contact').parent().append('<div class="invalid-feedback">Phone number pattern 92xxxxxxxxxx</div>');
			$('#submit').prop('disabled', true);
		}
		else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("team/players/check_contact");?>',
				data: {
					'contact': $(this).val()
				},
				datatype: 'JSON',
				success: function (data) {
					var response = JSON.parse(data);
					console.log(response);
					$('#contact').removeClass('is-valid');
					$('#contact').removeClass('is-invalid');
					$('#contact').parent().find('.valid-feedback').remove();
					$('#contact').parent().find('.invalid-feedback').remove();
					if (data === "false") {
						$('#contact').addClass('is-invalid');
						$('#contact').parent().append('<div class="invalid-feedback">Contact already exist.</div>');
						$('#submit').prop('disabled', true);
					} else {
						$('#contact').addClass('is-valid');
						$('#contact').parent().append('<div class="valid-feedback">Contact is available.</div>');
						$('#submit').prop('disabled', false);
					}
				},
				error: function () {
					alert('something went wrong');
				}
			});
		}
	});
</script>
