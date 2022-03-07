
<?php //echo "im here" ;die();?>
<div class="kt-portlet">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Select Type
			</h3>
		</div>
	</div>

	<!--begin::Form-->
	<?php echo form_open('admin/officials/official_type','class="kt-form kt-form--label-right"');?>
		<div class="kt-portlet__body">

			<div class="form-group row">
				<div class="col-xl-4 col-lg-4 col-sm-4">
					<label>Official Type Name:</label>
					<input name="type_name" type="text" class="form-control" placeholder="Enter your type"required>
					<span class="form-text text-muted">Please enter your type</span>
				</div>

			</div>


			</div>

		<div class="kt-portlet__foot">
			<div class="kt-form__actions">
				<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-xl-8 col-lg-8 col-sm-8">
						<button type="submit" value="submit" name="submit" class="btn btn-primary">Submit</button>
						<button type="reset" class="btn btn-secondary">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	<?php echo form_close();?>

	<!--end::Form-->
</div>
