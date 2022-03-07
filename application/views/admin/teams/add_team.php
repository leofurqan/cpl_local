<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<a href="<?php echo base_url('admin/teams') ?>"
			   class="btn btn-brand btn-elevate btn-elevate-air btn-icon-sm">
				<i class="la la-list"></i>
				Teams List
			</a>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open_multipart('admin/teams/add_team', 'class="kt-form kt-form--label-right"'); ?>
	<div class="kt-portlet__body">
		<div class="form-group row">
			<label>Image:</label>
			<div class="col-lg-9 col-xl-6">
				<div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_edit_avatar">
					<div class="kt-avatar__holder" style=""></div>
					<label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
						<i class="fa fa-pen"></i>
						<input  type="file" name="logo" accept=".png, .jpg, .jpeg" height="100" width="100" required>
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
				<input name="company_name" type="text" class="form-control" placeholder="Enter company name" required
					   data-error="Please enter your company name">
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Display Name:</label>
				<input name="display_name" type="text" class="form-control" placeholder="Enter display name of 10 characters" required
					   data-error="Please enter your display name" maxlength="10">
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Manager Name:</label>
				<input name="manager_name" type="text" class="form-control" placeholder="Enter manager name" required
					   data-error="Please enter your name">
				<div class="help-block with-errors"></div>
			</div>



		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Email 1:</label>
				<input id="email" name="email" type="email" class="form-control" placeholder="Enter your email" required
					   data-error="Please enter your email">
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Contact 1:</label>
				<input id="contact"  name="contact" type="number" maxlength="12" class="form-control"
					   placeholder="Enter contact number" required
					   data-error="Please enter your contact number">

				<div class="help-block with-errors"></div>

			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Email 2:</label>
				<input id="email_2" name="email_2" type="email" class="form-control" placeholder="Enter your email"
					   data-error="Please enter your email">
			</div>





		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Contact 2:</label>
				<input id="contact_2" name="contact_2" type="number" maxlength="12" class="form-control"
					   placeholder="Enter contact number"
					   data-error="Please enter your contact number">

				<div class="help-block with-errors"></div>


			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Email 3:</label>
				<input id="email_3" name="email_3" type="email" class="form-control" placeholder="Enter your email"
					   data-error="Please enter your email">
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Contact 3:</label>
				<input id="contact_3" name="contact_3" type="number" maxlength="12" class="form-control"
					   placeholder="Enter contact number"
					   data-error="Please enter your contact number">

				<div class="help-block with-errors"></div>

			</div>




		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Address:</label>
				<div class="kt-input-icon kt-input-icon--right">
					<input name="address" type="text" class="form-control" placeholder="Enter your address"
						   data-error="Please enter your address">
					<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i class="la la-map-marker"></i></span></span>
				</div>
				<div class="help-block with-errors"></div>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Facebook Link:</label>
				<div class="kt-input-icon kt-input-icon--right">
					<input name="facebook" type="text" class="form-control" placeholder="Enter your facebook link">
					<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
									class="la la-facebook-official"></i></span></span>
				</div>
				<div class="help-block with-errors"></div>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Twitter Link:</label>
				<div class="kt-input-icon kt-input-icon--right">
					<input name="twitter" type="text" class="form-control" placeholder="Enter your twitter link">
					<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
									class="la la-twitter"></i></span></span>
				</div>
				<div class="help-block with-errors"></div>
			</div>


		</div>
		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Category:</label>

				<select name="category" type="text" class="form-control" placeholder="Chose team category" required>
					<option value="">Select Team Category</option>
						<option value="Diamond">Diamond</option>
					<option value="Gold">Gold</option>

				</select>

				<span class="form-text text-muted">Please Chose your type</span>
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
				<label class="text-black" for="message">Description</label>
				<textarea name="description" id="message" cols="30" rows="7" class="form-control"
						  placeholder="Describe your company"></textarea>
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	<div class="kt-portlet__foot">
		<div class="kt-form__actions">
			<div class="row">
				<div class="col-xl-5 col-lg-5 col-sm-5"></div>
				<div class="col-xl-7 col-lg-7 col-sm-7">
					<button type="submit" value="submit" name="submit" id="submit" class="btn btn-primary">Submit
					</button>
					<button type="reset" class="btn btn-secondary">Cancel</button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>

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
		let regExp = /^(92)\d{3}\d{7}$|^\d{10}$/;
		if (!regExp.test($(this).val())){

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
