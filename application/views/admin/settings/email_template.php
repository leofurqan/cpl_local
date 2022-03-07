<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

	<!--Begin::Section-->
	<div class="form-group row">
		<div class="col-xl-3">

			<!--Begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>

				</div>

				<div class="kt-portlet__body">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-2">
						<div class="kt-widget__head" style="justify-content: center;">
							<div class="kt-widget__media">
								<img width="100px"
									 src="<?php echo base_url('assets/media/icons/invitation_email.png') ?>"
									 alt="image">
								<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
								</div>
							</div>

						</div>
						<div class="kt-widget__body">

							<div class="kt-widget__item">
								<div class="kt-widget__contact" style="justify-content: center;">
									<span class="kt-widget__label">Team Invitation Email</span>

								</div>

							</div>
							<div class="kt-widget__footer">
								<button type="button" class="btn btn-label-warning btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
										data-target="#invite_team">Edit Template
								</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>

				<!--End::Portlet-->
			</div>

		</div>

		<div class="col-xl-3">

			<!--Begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>

				</div>

				<div class="kt-portlet__body">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-2">
						<div class="kt-widget__head" style="justify-content: center;">
							<div class="kt-widget__media">
								<img width="100px"
									 src="<?php echo base_url('assets/media/icons/invitation_email.png') ?>"
									 alt="image">
								<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
								</div>
							</div>

						</div>
						<div class="kt-widget__body">

							<div class="kt-widget__item">
								<div class="kt-widget__contact" style="justify-content: center;">
									<span class="kt-widget__label">Login Credentials Template</span>

								</div>

							</div>
							<div class="kt-widget__footer">
								<button type="button" class="btn btn-label-primary btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
										data-target="#login_credentials">Edit Template
								</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>

				<!--End::Portlet-->
			</div>

		</div>


<!--End::Section-->

<div class="modal fade" id="invite_team" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Team Invitation Template</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/email_templates'); ?>
			<?php echo form_hidden('template_name', 'invite_team'); ?>
			<div class="modal-body">
				<label>Email Subject:</label>
				<?php $team_invite = $this->db->select('*')->from('email_templates')->where('template_name', 'invite_team')->get()->row(); ?>
				<input name="subject" type="text" value="<?php echo $team_invite->subject?>" class="form-control" placeholder="Enter subject" required>

				<textarea name="template_value" class="summernote" id="kt_summernote_1">
					<?php echo $team_invite->template_value; ?>
				</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

		<div class="modal fade" id="login_credentials" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
			 aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Login Credentials Template</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						</button>
					</div>
					<?php echo form_open('admin/settings/login_credentials'); ?>
					<?php echo form_hidden('template_name', 'login_credentials'); ?>
					<div class="modal-body">
						<?php $login_credentials = $this->db->select('*')->from('email_templates')->where('template_name', 'login_credentials')->get()->row(); ?>
						<label>Email Subject:</label>
						<input name="subject" value="<?php echo $login_credentials->subject?>" type="text" class="form-control" placeholder="Enter subject" required>

						<textarea name="template_value" class="summernote" id="kt_summernote_1">
					<?php echo $login_credentials->template_value; ?>
				</textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
					</div>
					<?php echo form_close(); ?>
				</div>
			</div>
		</div>



		<!--Begin::Section-->

		<div class="col-xl-3">

			<!--Begin::Portlet-->
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>

				</div>

				<div class="kt-portlet__body">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-2">
						<div class="kt-widget__head" style="justify-content: center;">
							<div class="kt-widget__media">
								<img width="100px"
									 src="<?php echo base_url('assets/media/icons/regulation.png') ?>"
									 alt="image">
								<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
								</div>
							</div>

						</div>
						<div class="kt-widget__body">

							<div class="kt-widget__item">
								<div class="kt-widget__contact" style="justify-content: center;">
									<span class="kt-widget__label">Sms Template</span>

								</div>

							</div>
							<div class="kt-widget__footer">
								<button type="button" class="btn btn-label-success btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
										data-target="#cps_rules">Edit Template
								</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>

				<!--End::Portlet-->
			</div>

		</div>



<!--End::Section-->

<div class="modal fade" id="cps_rules" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Sms Template</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/cps_rules'); ?>
			<?php echo form_hidden('template_name', 'cps_rules'); ?>
			<div class="modal-body">
				<?php $cps_rules = $this->db->select('*')->from('email_templates')->where('template_name', 'cps_rules')->get()->row(); ?>
				<textarea name="template_value" class="summernote" id="kt_summernote_1" style="display: none;">
										<?php echo $cps_rules->template_value?>
									</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
<div class="col-xl-3">

	<!--Begin::Portlet-->
	<div class="kt-portlet kt-portlet--height-fluid">
		<div class="kt-portlet__head kt-portlet__head--noborder">
			<div class="kt-portlet__head-label">
				<h3 class="kt-portlet__head-title">
				</h3>
			</div>

		</div>

		<div class="kt-portlet__body">

			<!--begin::Widget -->
			<div class="kt-widget kt-widget--user-profile-2">
				<div class="kt-widget__head" style="justify-content: center;">
					<div class="kt-widget__media">
						<img width="100px"
							 src="<?php echo base_url('assets/media/icons/policy.png') ?>"
							 alt="image">
						<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
						</div>
					</div>

				</div>
				<div class="kt-widget__body">

					<div class="kt-widget__item">
						<div class="kt-widget__contact" style="justify-content: center;">
							<span class="kt-widget__label">Code of Conduct</span>

						</div>

					</div>
					<div class="kt-widget__footer">
						<button type="button" class="btn btn-label-danger btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
								data-target="#code_of_conduct">Edit Template
						</button>
					</div>
				</div>

				<!--end::Widget -->
			</div>
		</div>

		<!--End::Portlet-->
	</div>

</div>

</div>

	<div class="form-group row">
		<div class="col-xl-3">
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>

				</div>

				<div class="kt-portlet__body">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-2">
						<div class="kt-widget__head" style="justify-content: center;">
							<div class="kt-widget__media">
								<img width="100px"
									 src="<?php echo base_url('assets/media/icons/invitation_email.png') ?>"
									 alt="image">
								<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
								</div>
							</div>

						</div>
						<div class="kt-widget__body">

							<div class="kt-widget__item">
								<div class="kt-widget__contact" style="justify-content: center;">
									<span class="kt-widget__label">Registration Template</span>

								</div>

							</div>
							<div class="kt-widget__footer">
								<button type="button" class="btn btn-label-primary btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
										data-target="#registration">Edit Template
								</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>

				<!--End::Portlet-->
			</div>


		</div>
	</div>

	<div class="form-group row">
		<div class="col-xl-3">
			<div class="kt-portlet kt-portlet--height-fluid">
				<div class="kt-portlet__head kt-portlet__head--noborder">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
						</h3>
					</div>

				</div>

				<div class="kt-portlet__body">

					<!--begin::Widget -->
					<div class="kt-widget kt-widget--user-profile-2">
						<div class="kt-widget__head" style="justify-content: center;">
							<div class="kt-widget__media">
								<img width="100px"
									 src="<?php echo base_url('assets/media/icons/invitation_email.png') ?>"
									 alt="image">
								<div class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
								</div>
							</div>

						</div>
						<div class="kt-widget__body">

							<div class="kt-widget__item">
								<div class="kt-widget__contact" style="justify-content: center;">
									<span class="kt-widget__label">Tournament Invite Accept Template</span>

								</div>

							</div>
							<div class="kt-widget__footer">
								<button type="button" class="btn btn-label-primary btn-elevate btn-elevate-air btn-lg btn-upper" data-toggle="modal"
										data-target="#invite_accept">Edit Template
								</button>
							</div>
						</div>

						<!--end::Widget -->
					</div>
				</div>

				<!--End::Portlet-->
			</div>


		</div>
	</div>

</div>

<div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Registration Template</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/registration'); ?>
			<?php echo form_hidden('template_name', 'registration'); ?>
			<div class="modal-body">
				<label>Email Subject:</label>
				<?php $login_credentials = $this->db->select('*')->from('email_templates')->where('template_name', 'registration')->get()->row(); ?>

				<input name="subject" value="<?php echo $login_credentials->subject?>" type="text" class="form-control" placeholder="Enter subject" required>

				<textarea name="template_value" class="summernote" id="kt_summernote_1">
					<?php echo $login_credentials->template_value; ?>
				</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>


<!--End::Section-->

<div class="modal fade" id="code_of_conduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Code of Conduct Template</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/code_of_conduct'); ?>
			<?php echo form_hidden('template_name', 'code_of_conduct'); ?>
			<div class="modal-body">
				<?php $code_of_conduct = $this->db->select('*')->from('email_templates')->where('template_name', 'code_of_conduct')->get()->row(); ?>
				<textarea name="template_value" class="summernote" id="kt_summernote_1" style="display: none;">
										<?php echo $code_of_conduct->template_value?>
									</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>

<div class="modal fade" id="invite_accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
	 aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Tournament Invite Accept Template</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				</button>
			</div>
			<?php echo form_open('admin/settings/email_templates'); ?>
			<?php echo form_hidden('template_name', 'invite_accept'); ?>
			<div class="modal-body">
				<label>Email Subject:</label>
				<?php $tournament_invite = $this->db->select('*')->from('email_templates')->where('template_name', 'invite_accept')->get()->row(); ?>

				<input name="subject" value="<?php echo $tournament_invite->subject?>" type="text" class="form-control" placeholder="Enter subject" required>

				<textarea name="template_value" class="summernote" id="kt_summernote_1">
					<?php echo $tournament_invite->template_value; ?>
				</textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" value="submit" name="submit" class="btn btn-primary">Save</button>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>




