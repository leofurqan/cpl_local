<div class="kt-portlet kt-portlet--tabs">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-toolbar">
			<ul class="nav nav-tabs nav-tabs-line nav-tabs-line-success nav-tabs-line-2x" role="tablist">
				<li class="nav-item">
					<a class="nav-link active" data-toggle="tab" href="#kt_portlet_base_demo_1_1_tab_content"
					   role="tab">
						<i class="la la-cog"></i> Products
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_2_tab_content" role="tab">
						<i class="la la-cog"></i> Details
					</a>
				</li>

				<li class="nav-item">
					<a class="nav-link" data-toggle="tab" href="#kt_portlet_base_demo_1_3_tab_content" role="tab">
						<i class="la la-cog"></i> Invitation
					</a>
				</li>

			</ul>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="tab-content">
			<div class="tab-pane active" id="kt_portlet_base_demo_1_1_tab_content" role="tabpanel">

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
							<div class="col-xl-4 col-lg-4 col-sm-4">
								<label>Product Name:</label>
								<input name="product_name" type="text" class="form-control" placeholder="Enter product name" required
									   data-error="Please enter your product name">
								<div class="help-block with-errors"></div>
							</div>
							<div class="col-xl-4 col-lg-4 col-sm-4">
								<label>Price:</label>
								<input name="price" type="text" class="form-control" placeholder="Enter price" required
									   data-error="Please enter product price" maxlength="10">
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
								<input id="contact" name="contact" type="number" maxlength="12" class="form-control"
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

			</div>
			<div class="tab-pane" id="kt_portlet_base_demo_1_2_tab_content" role="tabpanel">




			</div>

			<div class="tab-pane" id="kt_portlet_base_demo_1_3_tab_content" role="tabpanel">



			</div>

		</div>
	</div>
</div>
