
<?php //echo "im here" ;die();?>

<div class="kt-portlet">
	<div class="kt-portlet__head">
	</div>


	<!--begin::Form-->
	<?php echo form_open_multipart('admin/code_of_conduct/add_code_conduct', 'class="kt-form kt-form--label-right"'); ?>
	<div class="kt-portlet__body">


		<div class="card">




			<div class="card-header" id="heading">

			</div>

			<div class="form-group row">
				<div class="col-lg-12 col-md-12 col-sm-12">
					<textarea name="summernote" class="summernote" id="kt_summernote_1" style="display: none;">
						<?php echo $code_of_conduct->template_value?>
					</textarea>
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
	<?php echo form_close(); ?>
</div>






