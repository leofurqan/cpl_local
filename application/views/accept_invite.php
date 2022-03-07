<!DOCTYPE html>

<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>CPS | CLUB</title>
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
	<link href="<?php echo base_url(''); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/pages/error/error-4.css" rel="stylesheet" type="text/css"/>
	<link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/media/cpl/favicon.ico"/>
	<style>
		.parent {
			display: flex;
			justify-content: center;
			align-items: center;


		}
	</style>

</head>
<body style="background-image: url(<?php echo base_url(''); ?>assets/media/bg/cpl_2.jpg);"
	  class="kt-error-v4  kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading ">

<div class="kt-grid kt-grid--ver kt-grid--root h-100 d-flex justify-content-center align-items-center" >
	<div class="kt-grid__item kt-grid__item--fluid kt-grid ">
		<div class="kt-container kt-container--fluid kt-grid__item kt-grid__item--fluid">
			<div class="row">
				<div class="col-lg-12 col-md-12 col-sm-12 ">
					<div class="kt-portlet kt-portlet--mobile" style="width: 75%;margin:0 auto; opacity: 0.80; border-radius: 30px">
						<div class="kt-portlet__head">
							<div class="kt-portlet__head-label">
								<h3 class="kt-portlet__head-title">
									Team Invitation
								</h3>
							</div>
						</div>
						<?php echo form_open('invitation/accept_invite'); ?>
						<?php echo form_hidden('invitation_id', $invitation->id); ?>
						<div class="kt-portlet__body text-center">
							<h5>We are inviting you to the tournament</h5>
							<div class="row mt-5 justify-content-center text-primary">
								<img width="150px"
									 src="<?php echo base_url('uploads/tournaments/') . $tournament->logo; ?>"/>
							</div>
							<div class="row mt-3 justify-content-center text-primary">
								<h4><?php echo $tournament->tournament_name; ?></h4>
							</div>
							<hr>
							<?php if ($invitation->status === '0') { ?>

								<div class="row justify-content-center">
									<h5>Agree with <a
												href="<?php echo base_url('uploads/tournaments_files/' . $tournament->code_conduct); ?>">
											Term & Conditions</a></h5>

								</div>
								<div class="row justify-content-center">
									<button type="submit" class="btn btn-primary">Accept</button>
								</div>


							<?php } else { ?>
								<div class="row justify-content-center">
									<h4>You have accepted the invitation</h4>
								</div>
							<?php } ?>
						</div>
						<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
