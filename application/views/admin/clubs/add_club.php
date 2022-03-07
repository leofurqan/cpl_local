<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/clubs') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Club List
			</a>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open_multipart('admin/clubs/add_club','class="kt-form kt-form--label-right"');?>
		<div class="kt-portlet__body">

			<div class="form-group row">
				<label>Logo:</label>
				<div class="col-lg-9 col-xl-6">
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
						<div class="kt-avatar__holder" style=""></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input  type="file" name="logo" accept=".png, .jpg, .jpeg" height="100" width="100">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
					</div>
				</div>
			</div>


			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">					<label>Club Name:</label>
					<input name="club_name" type="text" class="form-control" placeholder="Enter club name" required>
					<span class="form-text text-muted">Please enter your club name</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Owner Name:</label>
					<div class="input-group">

						<input name="owner_name" type="text" class="form-control" placeholder="Enter your name" required>
					</div>
					<span class="form-text text-muted">Please enter your name</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Email:</label>
					<input id="email" name="email" type="email" class="form-control" placeholder="Enter email" required>
					<span class="form-text text-muted">Please enter your email</span>
				</div>

			</div>

			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Contact:</label>
					<input id="contact" name="contact" type="number" maxlength="12" class="form-control" placeholder="Enter contact number" required>
					<div>
					<span class="form-text text-muted">Please enter your contact</span>
					</div>
					</div>

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Address:</label>
					<div class="kt-input-icon kt-input-icon--right">
						<input name="address" type="text" class="form-control" placeholder="Enter your address" required>
						<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
					</div>
					<span class="form-text text-muted">Please enter your address</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Status:</label>
					<div class="kt-radio-inline">
						<label class="kt-radio kt-radio--solid">
							<input type="radio" name="status" checked value="1"> Active
							<span></span>
						</label>
						<label class="kt-radio kt-radio--solid">
							<input type="radio" name="status" value="0"> Inactive
							<span></span>
						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<div class="col-xl-12 col-lg-12 col-sm-12">
					<label>URL:</label>
					<div class="kt-input-icon kt-input-icon--right">
						<input name="url" type="text" class="form-control" placeholder="Enter your url">
						<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la flaticon-earth-globe"></i></span></span>
					</div>
					<span class="form-text text-muted">Please enter your url</span>
				</div>

			</div>
			<div class="form-group row">

				<div class="col-xl-12 col-lg-12 col-sm-12">
					<label class="text-black" for="message">Description</label>
						<textarea name="description" id="message" cols="30" rows="7" class="form-control"
								  placeholder="Describe your club"></textarea>
					</div>
					<span class="form-text text-muted">Please describe your club</span>


			</div>

		</div>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-sm-5"></div>
					<div class="col-xl-7 col-lg-7 col-sm-7">
						<button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close();?>

	<!--end::Form-->
</div>
<script>
	$('#email').change(function () {
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/clubs/check_email");?>',
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
					$('#submit').prop('disabled', true);
				} else {
					$('#email').addClass('is-valid');
					$('#email').parent().append('<div class="valid-feedback">Email is available.</div>');
					$('#submit').prop('disabled', false);
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
		$.ajax({
			type: 'POST',
			url: '<?php echo base_url("admin/clubs/check_contact");?>',
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
	});
</script>
