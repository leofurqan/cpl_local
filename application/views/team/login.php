<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>
	<base href="../../../">
	<script>var base_url = '<?php echo base_url();?>'</script>
	<meta charset="utf-8"/>
	<title>CPL | Team Login</title>
	<meta name="description" content="Login page example">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

	<!--end::Fonts -->

	<!--begin::Page Custom Styles(used by this page) -->
	<link href="<?php echo base_url(); ?>assets/css/pages/login/login-6.css" rel="stylesheet" type="text/css"/>

	<!--end::Page Custom Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->

	<!--begin:: Vendor Plugins -->
	<link href="<?php echo base_url(); ?>assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/animate.css/animate.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/toastr/build/toastr.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/morris.js/morris.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/socicon/css/socicon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/plugins/line-awesome/css/line-awesome.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css"
		  rel="stylesheet" type="text/css"/>

	<!--end:: Vendor Plugins -->
	<link href="<?php echo base_url(); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

	<!--begin:: Vendor Plugins for custom pages -->
	<link href="<?php echo base_url(); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet"
		  type="text/css"/>

	<!--end:: Vendor Plugins for custom pages -->

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?php echo base_url(); ?>assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(); ?>assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>

	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/media/cpl/favicon.ico"/>
</head>

<!-- end::Head -->

<!-- begin::Body -->
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

<!-- begin:: Page -->
<div class="kt-grid kt-grid--ver kt-grid--root">
	<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v6 kt-login--signin" id="kt_login">
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
			<div class="kt-grid__item  kt-grid__item--order-tablet-and-mobile-2  kt-grid kt-grid--hor kt-login__aside">
				<div class="kt-login__wrapper">
					<div class="kt-login__container">
						<div class="kt-login__body">
							<div class=" kt-login__logo">
								<a href="#">
									<img width="250px" height="250px" src="<?php echo base_url(); ?>assets/media/cpl/man.png">
								</a>
							</div>

							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In To Team</h3>
								</div>
								<?php echo form_open('', "id=kt_login_team"); ?>
								<div class="kt-login__form">
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email Or Mobile Number" name="email"
											   autocomplete="off" style="border-radius: 10px" required>
									</div>
									<div class="form-group">
										<input class="form-control form-control-last" type="password"
											   placeholder="Password" name="password" style="border-radius: 10px"
											   required>
									</div>
									<div class="kt-login__extra">
										<label class="kt-checkbox">
											<input type="checkbox" name="remember"> Remember me
											<span></span>
										</label>
										<a href="javascript:;" id="kt_login_forgot">Forget Password ?</a>
									</div>
									<div class="kt-login__actions">
										<button type="submit" id="kt_login_team_submit"
												class="btn btn-brand btn-pill btn-elevate">Sign In
										</button>
									</div>
								</div>
								<?php echo form_close(); ?>
							</div>
							<div class="kt-login__forgot">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Forgotten Password ?</h3>
									<div class="kt-login__desc">Enter your email to reset your password:</div>
								</div>
								<div class="kt-login__form">
									<form class="kt-form" action="">
										<div class="form-group">
											<input class="form-control" type="text" placeholder="Email" name="email"
												   id="kt_email" autocomplete="off">
										</div>
										<div class="kt-login__actions">
											<button id="kt_login_forgot_submit"
													class="btn btn-brand btn-pill btn-elevate">Request
											</button>
											<button id="kt_login_forgot_cancel" class="btn btn-outline-brand btn-pill">
												Cancel
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-login__account">
								<span class="kt-login__account-msg">
									All Copyrights reserved | CPS Club
								</span>&nbsp;&nbsp;

					</div>
				</div>
			</div>
			<div class="kt-grid__item kt-grid__item--fluid kt-grid__item--center kt-grid kt-grid--ver kt-login__content"
				 style="background-image: url(<?php echo base_url(); ?>assets/media/bg/cpl.jpg);">
				<div class="kt-login__section">
					<div class="kt-login__block">
						<h3 class="kt-login__title">THE LAHORE CPS CLUB</h3>
						<div class="kt-login__desc" style="margin-bottom: 10rem">
							The Corporate Premier League Club was formed by a group of professionals in the year
							2009-10, <br>for the facilitation of the corporate sector to bring
							on board, quality sports events, backed by a <br>solid code of conduct, giving no relief on
							the aspects of fair play The members of the
							CPL Club<br> in honorary capacity since then, with the support of the valued sponsors and
							corporate <br>teams have taken initiative.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
	var KTAppOptions = {
		"colors": {
			"state": {
				"brand": "#5d78ff",
				"dark": "#282a3c",
				"light": "#ffffff",
				"primary": "#5867dd",
				"success": "#34bfa3",
				"info": "#36a3f7",
				"warning": "#ffb822",
				"danger": "#fd3995"
			},
			"base": {
				"label": [
					"#c5cbe3",
					"#a1a8c3",
					"#3d4465",
					"#3e4466"
				],
				"shape": [
					"#f0f3ff",
					"#d9dffa",
					"#afb4d4",
					"#646c9a"
				]
			}
		}
	};
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->

<!--begin:: Vendor Plugins -->
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery/dist/jquery.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/popper.js/dist/umd/popper.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js-cookie/src/js.cookie.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/moment/min/moment.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/sticky-js/dist/sticky.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery-form/dist/jquery.form.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/block-ui/jquery.blockUI.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/select2/dist/js/select2.full.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/typeahead.js/dist/typeahead.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/handlebars/dist/handlebars.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/nouislider/distribute/nouislider.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/owl.carousel/dist/owl.carousel.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/autosize/dist/autosize.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/clipboard/dist/clipboard.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/dropzone/dist/dropzone.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/dropzone.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/summernote/dist/summernote.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/markdown/lib/markdown.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery-validation/dist/jquery.validate.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery-validation/dist/additional-methods.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/toastr/build/toastr.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/chart.js/dist/Chart.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/waypoints/lib/jquery.waypoints.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/counterup/jquery.counterup.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/es6-promise-polyfill/promise.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery.repeater/src/lib.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery.repeater/src/jquery.input.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/jquery.repeater/src/repeater.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/general/dompurify/dist/purify.js" type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="<?php echo base_url(); ?>assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="<?php echo base_url(); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/core/main.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/daygrid/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/google-calendar/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/interaction/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/list/main.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/@fullcalendar/timegrid/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/dist/es5/jquery.flot.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.resize.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.categories.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.pie.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.stack.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.crosshair.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/flot/source/jquery.flot.axislabels.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net/js/jquery.dataTables.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/js/global/integration/plugins/datatables.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/pdfmake/build/pdfmake.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/pdfmake/build/vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.print.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/jquery.vmap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>

<!--end:: Vendor Plugins for custom pages -->

<!--end::Global Theme Bundle -->

<!--begin::Page Scripts(used by this page) -->
<script src="<?php echo base_url(); ?>assets/js/pages/custom/login/login-team.js" type="text/javascript"></script>

<!--end::Page Scripts -->
</body>

<!-- end::Body -->
</html>
