<?php //echo "im here" ;die();?>
<div class="kt-portlet">


	<!--begin::Form-->
	<?php echo form_open('admin/settings/sms_api', 'class="kt-form kt-form--label-right"'); ?>
	<div class="kt-portlet__body">

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Msid:</label>
				<input name="msid" type="text" value="<?php echo $api_info->msid ?>" class="form-control" placeholder="Enter MSID" required>
				<span class="form-text text-muted">Please enter MSID</span>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Short Code:</label>
				<div class="input-group">

					<input name="short_code" value="<?php echo $api_info->short_code ?>" type="text" class="form-control" placeholder="Enter your short code" required>
				</div>
				<span class="form-text text-muted">Please enter your short code</span>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Language:</label>
				<input id="language" name="language" type="text" value="<?php echo $api_info->language ?>" class="form-control" placeholder="Enter language" required>
				<span class="form-text text-muted">Please enter language</span>
			</div>

		</div>

		<div class="form-group row">
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label class="">Password:</label>
				<input value="<?php echo $api_info->password ?>" id="password" name="password" type="number" maxlength="12" class="form-control"
					   placeholder="Enter password" required>
				<div>
					<span class="form-text text-muted">Please enter your password</span>
				</div>
			</div>

			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>Message Type:</label>
				<div class="kt-input-icon kt-input-icon--right">
					<input value="<?php echo $api_info->message_type ?>" name="message_type" type="text" class="form-control" placeholder="Enter your message type" required>
				</div>
				<span class="form-text text-muted">Please enter message type</span>
			</div>
			<div class="col-xl-4 col-lg-4 col-sm-4">
				<label>URL:</label>
				<div class="kt-input-icon kt-input-icon--right">
					<input name="url" type="text" value="<?php echo $api_info->url ?>" class="form-control" placeholder="Enter your url" required>
					<span class="kt-input-icon__icon kt-input-icon__icon--right"><span><i
									class="la flaticon-earth-globe"></i></span></span>
				</div>
				<span class="form-text text-muted">Please enter your url</span>
			</div>
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
