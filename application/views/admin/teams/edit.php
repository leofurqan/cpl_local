
<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<div class="btn-group">
				<a type="button" href="<?php echo base_url('admin/teams') ?>" class="btn btn-primary btn-elevate btn-elevate-air"><i
							class="fa fa-list"></i>Team List</a>
			</div>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open_multipart('admin/teams/edit/'.$team->id,'class="kt-form kt-form--label-right"');?>
		<div class="kt-portlet__body">
			<div class="form-group row">
				<label>Logo:</label>
				<div class="col-lg-9 col-xl-6">
					<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
						<div class="kt-avatar__holder" style="background-image: url(<?php echo base_url('uploads/teams/' . $team->logo); ?>);"></div>
						<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
							<i class="fa fa-pen"></i>
							<input value="<?php echo base_url('uploads/teams/' . $team->logo); ?>" type="file" name="logo" accept=".png, .jpg, .jpeg" height="100" width="100">
						</label>
						<span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
																				<i class="fa fa-times"></i>
																			</span>
					</div>
				</div>
			</div>

			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Company Name:</label>
					<input name="company_name" type="text" class="form-control" placeholder="Enter company name" value="<?php echo $team->company_name; ?>">
					<span class="form-text text-muted">Please enter your company name</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Manager Name:</label>
					<input name="manager_name" type="text" class="form-control" placeholder="Enter manager name"
						   data-error="Please enter your name" value="<?php echo $team->manager_name; ?>">
					<div class="help-block with-errors"></div>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Display Name:</label>
					<input name="display_name" type="text" class="form-control" placeholder="Enter display name of 10 characters"
						   data-error="Please enter your display name" value="<?php echo $team->display_name; ?>">
					<div class="help-block with-errors"></div>
				</div>


			</div>
			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Email:</label>
					<input id="email" name="email" type="email" class="form-control" placeholder="Enter email" value="<?php echo $team->email; ?>">
					<span class="form-text text-muted">Please enter your email</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Contact:</label>
					<input id="contact" name="contact" type="number" maxlength="12" class="form-control" placeholder="Enter contact number" value="<?php echo $team->contact; ?>">
					<div>
						<span class="form-text text-muted">Please enter your contact</span>
					</div>
				</div>

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Email 2:</label>
					<input id="email_2" name="email_2" type="email" class="form-control" placeholder="Enter email" value="<?php echo $team->email_2; ?>">
					<span class="form-text text-muted">Please enter your email</span>
				</div>




			</div>

			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Contact 2:</label>
					<input id="contact_2" name="contact_2" type="number" maxlength="12" class="form-control" placeholder="Enter contact number" value="<?php echo $team->contact_2; ?>">
					<div>
						<span class="form-text text-muted">Please enter your contact</span>
					</div>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Email 3:</label>
					<input id="email_3" name="email_3" type="email" class="form-control" placeholder="Enter email" value="<?php echo $team->email_3; ?>">
					<span class="form-text text-muted">Please enter your email</span>
				</div>

				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label class="">Contact 3:</label>
					<input id="contact_3" name="contact_3" type="number" maxlength="12" class="form-control" placeholder="Enter contact number" value="<?php echo $team->contact_3; ?>">
					<div>
						<span class="form-text text-muted">Please enter your contact</span>
					</div>
				</div>



			</div>
			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Address:</label>
					<div class="kt-input-icon kt-input-icon--right">
						<input name="address" type="text" class="form-control" placeholder="Enter your address" value="<?php echo $team->address; ?>">
						<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
					</div>
					<span class="form-text text-muted">Please enter your address</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Facebook Link:</label>
					<div class="kt-input-icon kt-input-icon--right">
						<input name="facebook" type="text" class="form-control" placeholder="Enter your facebook link" value="<?php echo $team->facebook; ?>">
						<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
										class="la la-facebook-official"></i></span></span>
					</div>
					<div class="help-block with-errors"></div>
				</div>


				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Twitter Link:</label>
					<div class="kt-input-icon kt-input-icon--right">
						<input name="twitter" type="text" class="form-control" placeholder="Enter your twitter link" value="<?php echo $team->twitter; ?>">
						<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
										class="la la-twitter"></i></span></span>
					</div>
					<div class="help-block with-errors"></div>
				</div>
			</div>
				<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Status:</label>
					<div class="kt-radio-inline">
						<label class="kt-radio kt-radio--solid">
							<input type="radio" name="status" checked value="1" <?php if ($team->status == '1'){
								echo "checked";
							}?>> Active

						</label>
						<label class="kt-radio kt-radio--solid">
							<input type="radio" name="status" value="0"<?php if ($team->status == '0'){
								echo "checked";
							}?>> Inactive

						</label>
					</div>
				</div>
			</div>
			<div class="form-group row">

				<div class="col-xl-12 col-lg-12 col-sm-12">
						<label class="text-black" for="message">Description</label>
						<textarea name="description" id="message" cols="30" rows="7" class="form-control"
								  placeholder="Describe your company"><?php echo $team->description; ?></textarea>

					<span class="form-text text-muted">Please describe your company</span>
					</div>


			</div>
		</div>
		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-xl-5 col-lg-5 col-sm-5"></div>
					<div class="col-xl-7 col-lg-7 col-sm-7">
						<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
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
			url: '<?php echo base_url("admin/teams/check_email");?>',
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
			alert('Phone number pattern 92xxxxxxxxxx');
			$('#contact').addClass('is-invalid');
			$('#contact').parent().append('<div class="invalid-feedback">Phone number pattern 92xxxxxxxxxx</div>');
			$('#submit').prop('disabled', true);

		}
		else {
			$.ajax({
				type: 'POST',
				url: '<?php echo base_url("admin/teams/check_contact");?>',
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
