<!DOCTYPE html>

<html lang="en">

<!-- begin::Head -->
<head>

	<base href="">
	<meta charset="utf-8"/>
	<title><?php echo $title; ?></title>
	<meta name="description" content="Updates and statistics">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!--begin::Fonts -->
	<link rel="stylesheet"
		  href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">


	<!--end::Fonts -->

	<!--begin::Page Vendors Styles(used by this page) -->

	<!--end::Page Vendors Styles -->

	<!--begin::Global Theme Styles(used by all pages) -->

	<!--begin:: Vendor Plugins -->

	<link href="<?php echo base_url(''); ?>assets/plugins/general/perfect-scrollbar/css/perfect-scrollbar.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/tether/dist/css/tether.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-timepicker/css/bootstrap-timepicker.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-select/dist/css/bootstrap-select.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/select2/dist/css/select2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/ion-rangeslider/css/ion.rangeSlider.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/nouislider/distribute/nouislider.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/owl.carousel/dist/assets/owl.carousel.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/owl.carousel/dist/assets/owl.theme.default.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/dropzone/dist/dropzone.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/quill/dist/quill.snow.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/summernote/dist/summernote.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-markdown/css/bootstrap-markdown.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/animate.css/animate.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/toastr/build/toastr.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/morris.js/morris.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/socicon/css/socicon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/line-awesome/css/line-awesome.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/flaticon/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/plugins/flaticon2/flaticon.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/general/@fortawesome/fontawesome-free/css/all.min.css"
		  rel="stylesheet" type="text/css"/>

	<!--end:: Vendor Plugins -->
	<link href="<?php echo base_url(''); ?>assets/css/style.bundle.css" rel="stylesheet" type="text/css"/>

	<!--begin:: Vendor Plugins for custom pages -->
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/core/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/daygrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/list/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/timegrid/main.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-bs4/css/dataTables.bootstrap4.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-autofill-bs4/css/autoFill.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-colreorder-bs4/css/colReorder.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedcolumns-bs4/css/fixedColumns.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedheader-bs4/css/fixedHeader.bootstrap4.min.css"
		  rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-keytable-bs4/css/keyTable.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowgroup-bs4/css/rowGroup.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowreorder-bs4/css/rowReorder.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-scroller-bs4/css/scroller.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-select-bs4/css/select.bootstrap4.min.css"
		  rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/jstree/dist/themes/default/style.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/jqvmap.css" rel="stylesheet"
		  type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/plugins/custom/uppy/dist/uppy.min.css" rel="stylesheet"
		  type="text/css"/>

	<!--end:: Vendor Plugins for custom pages -->

	<!--end::Global Theme Styles -->

	<!--begin::Layout Skins(used by all pages) -->
	<link href="<?php echo base_url(''); ?>assets/css/skins/header/base/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/header/menu/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/brand/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/skins/aside/dark.css" rel="stylesheet" type="text/css"/>
	<link href="<?php echo base_url(''); ?>assets/css/pages/wizard/wizard-1.css" rel="stylesheet" type="text/css"/>
	<!--end::Layout Skins -->
	<link rel="shortcut icon" href="<?php echo base_url(''); ?>assets/media/cpl/favicon.ico"/>
	<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery/dist/jquery.js"
			type="text/javascript"></script>

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize">

<!-- begin:: Page -->

<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed ">
	<div class="kt-header-mobile__logo">

		<a href="index&demo=demo1.html">
			<img alt="Logo" src="<?php echo base_url(''); ?>assets/media/logos/logo-light.png"/>
		</a>
	</div>
	<div class="kt-header-mobile__toolbar">
		<button class="kt-header-mobile__toggler kt-header-mobile__toggler--left" id="kt_aside_mobile_toggler">
			<span></span></button>
		<button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler"><span></span></button>
		<button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler"><i
					class="flaticon-more"></i></button>

	</div>
</div>

<!-- end:: Header Mobile -->
<div class="kt-grid kt-grid--hor kt-grid--root">
	<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">


		<!-- begin:: Aside -->

		<!-- Uncomment this to display the close button of the panel
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>
-->
		<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
			 id="kt_aside">

			<!-- begin:: Aside -->
			<div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
				<div class="kt-aside__brand-logo">
					<a href="<?php echo base_url('commentator/dashboard'); ?>">
						<img width="120px" height="100px" alt="Logo"
							 src="<?php echo base_url(''); ?>assets/media/cpl/man.png"/>
					</a>
				</div>
				<div class="kt-aside__brand-tools">
					<button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler">
								<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
										   width="24px" height="24px" viewBox="0 0 24 24" version="1.1"
										   class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<path d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
												  fill="#000000" fill-rule="nonzero"
												  transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "/>
											<path d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
												  fill="#000000" fill-rule="nonzero" opacity="0.3"
												  transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "/>
										</g>
									</svg></span>
						<span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
								   width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
										<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
											<polygon points="0 0 24 0 24 24 0 24"/>
											<path d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
												  fill="#000000" fill-rule="nonzero"/>
											<path d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
												  fill="#000000" fill-rule="nonzero" opacity="0.3"
												  transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "/>
										</g>
									</svg></span>
					</button>

					<!--
			<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
			-->
				</div>
			</div>

			<!-- end:: Aside -->

			<!-- begin:: Aside Menu -->
			<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
				<div id="kt_aside_menu" class="kt-aside-menu " data-ktmenu-vertical="1" data-ktmenu-scroll="1"
					 data-ktmenu-dropdown-timeout="500">
					<ul class="kt-menu__nav ">
						<li class="kt-menu__item <?php if ($this->uri->segment(2) === 'dashboard') {
							echo 'kt-menu__item--active';
						} ?>"><a href="<?php echo base_url('commentator/dashboard'); ?>" class="kt-menu__link "><span
										class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg"
																		xmlns:xlink="http://www.w3.org/1999/xlink"
																		width="24px" height="24px" viewBox="0 0 24 24"
																		version="1.1" class="kt-svg-icon">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
														  fill="#000000" fill-rule="nonzero"/>
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
														  fill="#000000" opacity="0.3"/>
												</g>
									</svg></span><span class="kt-menu__link-text">Dashboard</span></a></li>

						<li class="kt-menu__item <?php if ($this->uri->segment(2) === 'matches') {
							echo 'kt-menu__item--active';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="<?php echo base_url('commentator/matches'); ?>"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"  version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 60 60" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" id="023---Cricket" fill="none"><g id="Icons" transform="translate(1 1)"><path id="Shape" d="m57.65 9-9.14 9.14-3.51-3.56 9.14-9.23c.1893156-.20521118.4558011-.32193289.735-.32193289s.5456844.11672171.735.32193289l2.09 2.16c.2056611.19671832.3177614.47174639.3082166.75618177-.0095448.28443537-.1398304.55132968-.3582166.73381823z" fill="#5d78ff" data-original="#783e22" style="" class=""/><path id="Shape" d="m38 1v3h-1c-.5522847 0-1 .44771525-1 1h-6c0-.55228475-.4477153-1-1-1h-2c-.5522847 0-1 .44771525-1 1h-6c0-.55228475-.4477153-1-1-1h-1v-3c0-.55228475.4477153-1 1-1h18c.5522847 0 1 .44771525 1 1z" fill="#5d78ff" data-original="#fec108" style="" class=""/><circle id="Oval" cx="8" cy="19" fill="#5d78ff" r="8" data-original="#f44335" style="" class=""/><g fill="#ffdc00"><path id="Shape" d="m40 5v10.31l-4 4v-14.31c0-.55228475.4477153-1 1-1h2c.5522847 0 1 .44771525 1 1z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/><path id="Shape" d="m40 30.87v26.13c0 .5522847-.4477153 1-1 1h-2c-.5522847 0-1-.4477153-1-1v-22.13z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/><path id="Shape" d="m30 5v20.28l-4 4v-24.28c0-.55228475.4477153-1 1-1h2c.5522847 0 1 .44771525 1 1z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/><path id="Shape" d="m30 40.87v16.13c0 .5522847-.4477153 1-1 1h-2c-.5522847 0-1-.4477153-1-1v-12.13z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/><path id="Shape" d="m20 5v30.26l-4 4v-34.26c0-.55228475.4477153-1 1-1h2c.5522847 0 1 .44771525 1 1z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/><path id="Shape" d="m20 50.87v6.13c0 .5522847-.4477153 1-1 1h-2c-.5522847 0-1-.4477153-1-1v-2.13z" fill="#5d78ff" data-original="#ffdc00" style="" class=""/></g><path id="Shape" d="m13.6 13.4-11.2 11.2c-.87283415-.8360914-1.54025862-1.8628983-1.95-3l10.09-10.14c1.1549402.404142 2.2017848 1.0678278 3.06 1.94z" fill="#5d78ff" data-original="#c81e1e" style="" class=""/><path id="Shape" d="m15.55 16.43-10.11 10.11c-1.13042969-.4183169-2.15473766-1.0807027-3-1.94l11.16-11.2c.8692519.8507809 1.5357407 1.886402 1.95 3.03z" fill="#5d78ff" data-original="#c81e1e" style="" class=""/><path id="Shape" d="m49.42 21.45-36.25 36.25c-.1877666.1893127-.4433625.2957983-.71.2957983s-.5222334-.1064856-.71-.2957983l-6.44-6.38c-.24051916-.2448412-.338671-.5959228-.26-.93.12-.55-1.84 1.71 36.59-36.72.3047033-.30789.7729935-.3845927 1.16-.19l2.2 1.1 3.53 3.53 1.1 2.18c.1895813.3912084.1046987.8600836-.21 1.16z" fill="#5d78ff" data-original="#f57c00" style="" class=""/><path id="Shape" d="m47.71 19.07-36.25 36.25c-.1877666.1893127-.4433625.2957983-.71.2957983s-.5222334-.1064856-.71-.2957983l-5-4.93c.04047275-.1810167.13049391-.3472097.26-.48l36.34-36.24c.3047033-.30789.7729935-.3845927 1.16-.19l2.2 1.1 2.48 2.48.43.86c.1871841.3865111.1066853.8493793-.2 1.15z" fill="#5d78ff" data-original="#ff9801" style="" class=""/></g><path id="Shape" d="m57.29 5.6c-.3751365-.37555409-.8841815-.58657331-1.415-.58657331s-1.0398635.21101922-1.415.58657331l-8.68 8.76-1.54-.77c-.7430469-.3639222-1.6334708-.2327437-2.24.33v-7.92c0-1.1045695-.8954305-2-2-2v-2c0-1.1045695-.8954305-2-2-2h-18c-1.1045695 0-2 .8954305-2 2v2c-1.1045695 0-2 .8954305-2 2v8.5c-1.6859336-2.1628306-4.2581754-3.4489515-7-3.5-4.91736288.1261479-8.87385207 4.0826371-9 9 .12614793 4.9173629 4.08263712 8.8738521 9 9 2.7418246-.0510485 5.3140664-1.3371694 7-3.5v14.33l-10.4 10.37c-.76228575.777687-.76228575 2.022313 0 2.8l6.45 6.38c.3751365.3755541.8841815.5865733 1.415.5865733s1.0398635-.2110192 1.415-.5865733l1.12-1.12c.1313358 1.0019841.9894814 1.7485708 2 1.74h2c1.1045695 0 2-.8954305 2-2v-5.72l4-4v9.72c0 1.1045695.8954305 2 2 2h2c1.1045695 0 2-.8954305 2-2v-15.72l4-4v19.72c0 1.1045695.8954305 2 2 2h2c1.1045695 0 2-.8954305 2-2v-25.72l9.13-9.12c.6077772-.6100488.7568332-1.5406413.37-2.31l-.77-1.54 8.68-8.68c.7754472-.78007491.7754472-2.03992509 0-2.82zm-17.29 52.4h-2v-21.72l2-2zm-12-30.14v-21.86h2v19.87zm4-20.86h4v12.88l-4 4zm8-1v9.89l-2 2v-11.89zm-2-2c-.7102221.00428692-1.3648954.38491093-1.72 1h-4.56c-.3551046-.61508907-1.0097779-.99571308-1.72-1v-2h8zm-18-2h8v2c-.7102221.00428692-1.3648954.38491093-1.72 1h-4.56c-.3551046-.61508907-1.0097779-.99571308-1.72-1zm0 4v29.84l-2 2v-31.84zm-16.55 18.14c-.32235238-.4183349-.59736338-.871097-.82-1.35l9.16-9.16c.478903.2226366.9316651.4976476 1.35.82zm11.1-8.28c.3200436.4163483.5949213.8655388.82 1.34l-9.17 9.17c-.4744612-.2250787-.92365165-.4999564-1.34-.82zm-4.99-2.86-7.56 7.56c-.13064118-2.0422923.62380684-4.0420526 2.07087713-5.4891229s3.44683059-2.2015183 5.48912287-2.0708771zm-1.13 14 7.57-7.57c.1339586 2.0458231-.6204718 4.0501016-2.0701851 5.4998149s-3.4539918 2.2041437-5.4998149 2.0701851zm13.57-20h4v22.85l-4 4zm-2 51h-2v-1.72l2-2zm10 0h-2v-11.72l2-2zm-16.54 0c-.06-.1.85.84-6.45-6.38 22.23-22.18-32.86 32.77 36.34-36.24l2 1 3.3 3.3 1 2c-37.54 37.67-36.09 36.32-36.19 36.32zm36.06-40.3-2.13-2.13 8.48-8.57 2.13 2.21z" fill="#5d78ff" data-original="#000000" style="" class=""/></g></g></svg>

</span><span class="kt-menu__link-text">Matches</span></a>
						</li>



					</ul>
				</div>
			</div>

			<!-- end:: Aside Menu -->
		</div>

		<!-- end:: Aside -->

		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

			<!-- begin:: Header -->
			<div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

				<!-- begin:: Header Menu -->


				<div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
					<p class="m-4" style="font-size: 16px"><b>commentator Panel</b></p>

				</div>

				<!-- end:: Header Menu -->

				<!-- begin:: Header Topbar -->
				<div class="kt-header__topbar">


					<!--begin: Search -->

					<!--begin: Search -->
					<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown"
						 id="kt_quick_search_toggle">
						<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
									<span class="kt-header__topbar-icon">
										<svg xmlns="http://www.w3.org/2000/svg"
											 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
											 viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
											<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
												<rect x="0" y="0" width="24" height="24"/>
												<path d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
													  fill="#000000" fill-rule="nonzero" opacity="0.3"/>
												<path d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
													  fill="#000000" fill-rule="nonzero"/>

											</g>
										</svg> </span>
						</div>
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-lg">

							<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact"
								 id="kt_quick_search_dropdown">
								<form method="get" class="kt-quick-search__form">
									<div class="input-group">
										<div class="input-group-prepend"><span class="input-group-text"><i
														class="flaticon2-search-1"></i></span></div>
										<input type="text" class="form-control kt-quick-search__input"
											   placeholder="Search...">
										<div class="input-group-append"><span class="input-group-text"><i
														class="la la-close kt-quick-search__close"></i></span></div>
									</div>
								</form>
								<div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325"
									 data-mobile-height="200">

								</div>
							</div>
						</div>
					</div>

					<!--end: Search -->

					<!--begin: User Bar -->
					<div class="kt-header__topbar-item kt-header__topbar-item--user">
						<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
							<div class="kt-header__topbar-user">
								<span class="kt-header__topbar-welcome kt-hidden-mobile">Hi,</span>

								<span class="kt-header__topbar-username kt-hidden-mobile"><?php echo $this->session->userdata("cpl")["full_name"]; ?></span>
								<img class="kt-hidden" alt="Pic"
									 src="<?php echo base_url(''); ?>assets/media/users/300_25.jpg"/>

								<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
								<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"><?php echo $this->session->userdata("cpl")["full_name"][0]; ?></span>

							</div>
						</div>
						<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl">

							<!--begin: Head -->

							<div class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
								 style="background-image: url(<?php echo base_url(''); ?>assets/media/misc/bg-1.jpg)">
								<div class="kt-user-card__avatar">
									<img class="kt-hidden" alt="Pic"
										 src="<?php echo base_url(''); ?>assets/media/users/300_25.jpg"/>

									<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
									<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?php echo $this->session->userdata("cpl")["full_name"][0]; ?></span>
								</div>
								<div class="kt-user-card__name">
									<?php echo $this->session->userdata("cpl")["full_name"]; ?>
								</div>


							</div>

							<!--end: Head -->

							<!--begin: Navigation -->
							<div class="kt-notification">

								<a href="<?php echo base_url('coordinator/coordinator'); ?>"
								   class="kt-notification__item">

									<div class="kt-notification__item-icon">
										<i class="flaticon2-calendar-3 kt-font-success"></i>
									</div>
									<div class="kt-notification__item-details">
										<div class="kt-notification__item-title kt-font-bold">
											My Profile
										</div>
										<div class="kt-notification__item-time">
											Account settings and more
										</div>
									</div>
								</a>


								<div class="kt-notification__custom kt-space-between">
									<a href="<?php echo base_url('commentator/login/logout'); ?>"
									   class="btn btn-label btn-label-brand btn-sm btn-bold">Sign Out</a>

								</div>
							</div>

							<!--end: Navigation -->
						</div>

					</div>

					<!--end: User Bar -->
				</div>

				<!-- end:: Header Topbar -->
			</div>

			<!-- end:: Header -->

			<div class="kt-content kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

				<!-- begin:: Content Head -->
				<div class="kt-subheader  kt-grid__item" id="kt_subheader">
					<div class="kt-container  kt-container--fluid ">
						<div class="kt-subheader__main">
							<h3 class="kt-subheader__title"><?php echo $title; ?></h3>
						</div>
					</div>
				</div>
				<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
					<?php if ($this->session->flashdata('message') != null) { ?>
						<div class="alert alert-success" role="alert">
							<div class="alert-text"><?php echo $this->session->flashdata('message'); ?></div>
						</div>
					<?php } ?>
					<?php if ($this->session->flashdata('exception') != null) { ?>
						<div class="alert alert-danger" role="alert">
							<div class="alert-text"><?php echo $this->session->flashdata('exception'); ?></div>
						</div>
					<?php } ?>
					<?php echo $view; ?>
				</div>
			</div>

			<!-- begin:: Footer -->
			<div class="kt-footer  kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" id="kt_footer">
				<div class="kt-container  kt-container--fluid ">
					<div class="kt-footer__copyright">

						<?php echo date('Y'); ?> &copy;&nbsp;<a href="<?php base_url('dashboard'); ?>"
																target="_blank"
																class="kt-link">A - Tech Solutions</a>

					</div>
				</div>
			</div>

			<!-- end:: Footer -->
		</div>
	</div>
</div>

<!-- end:: Page -->


<!-- begin::Quick Panel -->
<div id="kt_quick_panel" class="kt-quick-panel">
	<a href="#" class="kt-quick-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></a>
	<div class="kt-quick-panel__nav">
		<ul class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand  kt-notification-item-padding-x"
			role="tablist">
			<li class="nav-item active">
				<a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_logs" role="tab">Audit Logs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
			</li>
		</ul>
	</div>
	<div class="kt-quick-panel__content">
		<div class="tab-content">
			<div class="tab-pane fade show kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
				<div class="kt-notification">
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-line-chart kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New order has been received
							</div>
							<div class="kt-notification__item-time">
								2 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-box-1 kt-font-brand"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New customer is registered
							</div>
							<div class="kt-notification__item-time">
								3 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-chart2 kt-font-danger"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								Application has been approved
							</div>
							<div class="kt-notification__item-time">
								3 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-image-file kt-font-warning"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New file has been uploaded
							</div>
							<div class="kt-notification__item-time">
								5 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-drop kt-font-info"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New user feedback received
							</div>
							<div class="kt-notification__item-time">
								8 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-pie-chart-2 kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								System reboot has been successfully completed
							</div>
							<div class="kt-notification__item-time">
								12 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-favourite kt-font-danger"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New order has been placed
							</div>
							<div class="kt-notification__item-time">
								15 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item kt-notification__item--read">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-safe kt-font-primary"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								Company meeting canceled
							</div>
							<div class="kt-notification__item-time">
								19 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-psd kt-font-success"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New report has been received
							</div>
							<div class="kt-notification__item-time">
								23 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon-download-1 kt-font-danger"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								Finance report has been generated
							</div>
							<div class="kt-notification__item-time">
								25 hrs ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon-security kt-font-warning"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New customer comment recieved
							</div>
							<div class="kt-notification__item-time">
								2 days ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification__item">
						<div class="kt-notification__item-icon">
							<i class="flaticon2-pie-chart kt-font-warning"></i>
						</div>
						<div class="kt-notification__item-details">
							<div class="kt-notification__item-title">
								New customer is registered
							</div>
							<div class="kt-notification__item-time">
								3 days ago
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="tab-pane fade kt-scroll" id="kt_quick_panel_tab_logs" role="tabpanel">
				<div class="kt-notification-v2">
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon-bell kt-font-brand"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								5 new user generated report
							</div>
							<div class="kt-notification-v2__item-desc">
								Reports based on sales
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon2-box kt-font-danger"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								2 new items submited
							</div>
							<div class="kt-notification-v2__item-desc">
								by Grog John
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon-psd kt-font-brand"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								79 PSD files generated
							</div>
							<div class="kt-notification-v2__item-desc">
								Reports based on sales
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon2-supermarket kt-font-warning"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								$2900 worth producucts sold
							</div>
							<div class="kt-notification-v2__item-desc">
								Total 234 items
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon-paper-plane-1 kt-font-success"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								4.5h-avarage response time
							</div>
							<div class="kt-notification-v2__item-desc">
								Fostest is Barry
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon2-information kt-font-danger"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								Database server is down
							</div>
							<div class="kt-notification-v2__item-desc">
								10 mins ago
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon2-mail-1 kt-font-brand"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								System report has been generated
							</div>
							<div class="kt-notification-v2__item-desc">
								Fostest is Barry
							</div>
						</div>
					</a>
					<a href="#" class="kt-notification-v2__item">
						<div class="kt-notification-v2__item-icon">
							<i class="flaticon2-hangouts-logo kt-font-warning"></i>
						</div>
						<div class="kt-notification-v2__itek-wrapper">
							<div class="kt-notification-v2__item-title">
								4.5h-avarage response time
							</div>
							<div class="kt-notification-v2__item-desc">
								Fostest is Barry
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="tab-pane kt-quick-panel__content-padding-x fade kt-scroll" id="kt_quick_panel_tab_settings"
				 role="tabpanel">
				<form class="kt-form">
					<div class="kt-heading kt-heading--sm kt-heading--space-sm">Customer Care</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable Notifications:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable Case Tracking:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Support Portal:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--success kt-switch--sm">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
					<div class="kt-heading kt-heading--sm kt-heading--space-sm">Reports</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Generate Reports:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable Report Export:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" name="quick_panel_notifications_3">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Allow Data Collection:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--danger">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>
					<div class="kt-heading kt-heading--sm kt-heading--space-sm">Memebers</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable Member singup:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Allow User Feedbacks:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" name="quick_panel_notifications_5">
											<span></span>
										</label>
									</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Enable Customer Portal:</label>
						<div class="col-4 kt-align-right">
									<span class="kt-switch kt-switch--sm kt-switch--brand">
										<label>
											<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
											<span></span>
										</label>
									</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- end::Quick Panel -->


<!-- begin::Scrolltop -->
<div id="kt_scrolltop" class="kt-scrolltop">
	<i class="fa fa-arrow-up"></i>
</div>

<!-- end::Scrolltop -->


<!-- begin::Demo Panel -->
<div id="kt_demo_panel" class="kt-demo-panel">
	<div class="kt-demo-panel__head">
		<h3 class="kt-demo-panel__title">
			Select A Demo

			<!--<small>5</small>-->
		</h3>
		<a href="#" class="kt-demo-panel__close" id="kt_demo_panel_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-demo-panel__body">
		<div class="kt-demo-panel__item kt-demo-panel__item--active">
			<div class="kt-demo-panel__item-title">
				Demo 1
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo1.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo1/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo1/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 2
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo2.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo2/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo2/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 3
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo3.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo3/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo3/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 4
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo4.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo4/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo4/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 5
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo5.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo5/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo5/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 6
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo6.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo6/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo6/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 7
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo7.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo7/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo7/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 8
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo8.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo8/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo8/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 9
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo9.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo9/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo9/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 10
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo10.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo10/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo10/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 11
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo11.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo11/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo11/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 12
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo12.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="../demo12/index.html" class="btn btn-brand btn-elevate " target="_blank">Default</a>
					<a href="../demo12/rtl/index.html" class="btn btn-light btn-elevate" target="_blank">RTL
						Version</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 13
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo13.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
				</div>
			</div>
		</div>
		<div class="kt-demo-panel__item ">
			<div class="kt-demo-panel__item-title">
				Demo 14
			</div>
			<div class="kt-demo-panel__item-preview">
				<img src="<?php echo base_url(''); ?>assets/media/demos/preview/demo14.jpg" alt=""/>
				<div class="kt-demo-panel__item-preview-overlay">
					<a href="#" class="btn btn-brand btn-elevate disabled">Coming soon</a>
				</div>
			</div>
		</div>
		<a href="https://1.envato.market/EA4JP" target="_blank"
		   class="kt-demo-panel__purchase btn btn-brand btn-elevate btn-bold btn-upper">
			Buy Metronic Now!
		</a>
	</div>
</div>

<!-- end::Demo Panel -->

<!--Begin:: Chat-->
<div class="modal fade- modal-sticky-bottom-right" id="kt_chat_modal" role="dialog" data-backdrop="false">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="kt-chat">
				<div class="kt-portlet kt-portlet--last">
					<div class="kt-portlet__head">
						<div class="kt-chat__head ">
							<div class="kt-chat__left">
								<div class="kt-chat__label">
									<a href="#" class="kt-chat__title">Jason Muller</a>
									<span class="kt-chat__status">
												<span class="kt-badge kt-badge--dot kt-badge--success"></span> Active
											</span>
								</div>
							</div>
							<div class="kt-chat__right">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-clean btn-sm btn-icon"
											data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
										<i class="flaticon-more-1"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-md">

										<!--begin::Nav-->
										<ul class="kt-nav">
											<li class="kt-nav__head">
												Messaging
												<i class="flaticon2-information" data-toggle="kt-tooltip"
												   data-placement="right" title="Click to learn more..."></i>
											</li>
											<li class="kt-nav__separator"></li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-group"></i>
													<span class="kt-nav__link-text">New Group</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-open-text-book"></i>
													<span class="kt-nav__link-text">Contacts</span>
													<span class="kt-nav__link-badge">
																<span class="kt-badge kt-badge--brand  kt-badge--rounded-">5</span>
															</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-bell-2"></i>
													<span class="kt-nav__link-text">Calls</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-dashboard"></i>
													<span class="kt-nav__link-text">Settings</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a href="#" class="kt-nav__link">
													<i class="kt-nav__link-icon flaticon2-protected"></i>
													<span class="kt-nav__link-text">Help</span>
												</a>
											</li>
											<li class="kt-nav__separator"></li>
											<li class="kt-nav__foot">
												<a class="btn btn-label-brand btn-bold btn-sm" href="#">Upgrade
													plan</a>
												<a class="btn btn-clean btn-bold btn-sm" href="#"
												   data-toggle="kt-tooltip" data-placement="right"
												   title="Click to learn more...">Learn more</a>
											</li>
										</ul>

										<!--end::Nav-->
									</div>
								</div>
								<button type="button" class="btn btn-clean btn-sm btn-icon" data-dismiss="modal">
									<i class="flaticon2-cross"></i>
								</button>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-scroll kt-scroll--pull" data-height="410" data-mobile-height="300">
							<div class="kt-chat__messages kt-chat__messages--solid">
								<div class="kt-chat__message kt-chat__message--success">
									<div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/100_12.jpg"
														 alt="image">
												</span>
										<a href="#" class="kt-chat__username">Jason Muller</span></a>
										<span class="kt-chat__datetime">2 Hours</span>
									</div>
									<div class="kt-chat__text">
										How likely are you to recommend our company<br> to your friends and family?
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
									<div class="kt-chat__user">
										<span class="kt-chat__datetime">30 Seconds</span>
										<a href="#" class="kt-chat__username">You</span></a>
										<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/300_21.jpg"
														 alt="image">
												</span>
									</div>
									<div class="kt-chat__text">
										Hey there, we’re just writing to let you know that you’ve<br> been
										subscribed to
										a repository on GitHub.
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--success">
									<div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/100_12.jpg"
														 alt="image">
												</span>
										<a href="#" class="kt-chat__username">Jason Muller</span></a>
										<span class="kt-chat__datetime">30 Seconds</span>
									</div>
									<div class="kt-chat__text">
										Ok, Understood!
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
									<div class="kt-chat__user">
										<span class="kt-chat__datetime">Just Now</span>
										<a href="#" class="kt-chat__username">You</span></a>
										<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/300_21.jpg"
														 alt="image">
												</span>
									</div>
									<div class="kt-chat__text">
										You’ll receive notifications for all issues, pull requests!
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--success">
									<div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/100_12.jpg"
														 alt="image">
												</span>
										<a href="#" class="kt-chat__username">Jason Muller</span></a>
										<span class="kt-chat__datetime">2 Hours</span>
									</div>
									<div class="kt-chat__text">
										You were automatically <b class="kt-font-brand">subscribed</b> <br>because
										you’ve been given access to the repository
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
									<div class="kt-chat__user">
										<span class="kt-chat__datetime">30 Seconds</span>
										<a href="#" class="kt-chat__username">You</span></a>
										<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/300_21.jpg"
														 alt="image">
												</span>
									</div>
									<div class="kt-chat__text">
										You can unwatch this repository immediately <br>by clicking here: <a
												href="#"
												class="kt-font-bold kt-link"></a>
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--success">
									<div class="kt-chat__user">
												<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/100_12.jpg"
														 alt="image">
												</span>
										<a href="#" class="kt-chat__username">Jason Muller</span></a>
										<span class="kt-chat__datetime">30 Seconds</span>
									</div>
									<div class="kt-chat__text">
										Discover what students who viewed Learn <br>Figma - UI/UX Design Essential
										Training also viewed
									</div>
								</div>
								<div class="kt-chat__message kt-chat__message--right kt-chat__message--brand">
									<div class="kt-chat__user">
										<span class="kt-chat__datetime">Just Now</span>
										<a href="#" class="kt-chat__username">You</span></a>
										<span class="kt-media kt-media--circle kt-media--sm">
													<img src="<?php echo base_url(''); ?>assets/media/users/300_21.jpg"
														 alt="image">
												</span>
									</div>
									<div class="kt-chat__text">
										Most purchased Business courses during this sale!
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-chat__input">
							<div class="kt-chat__editor">
								<textarea placeholder="Type here..." style="height: 50px"></textarea>
							</div>
							<div class="kt-chat__toolbar">
								<div class="kt_chat__tools">
									<a href="#"><i class="flaticon2-link"></i></a>
									<a href="#"><i class="flaticon2-photograph"></i></a>
									<a href="#"><i class="flaticon2-photo-camera"></i></a>
								</div>
								<div class="kt_chat__actions">
									<button type="button"
											class="btn btn-brand btn-md  btn-font-sm btn-upper btn-bold kt-chat__reply">
										reply
									</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--ENd:: Chat-->


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

<script src="<?php echo base_url(''); ?>assets/plugins/general/popper.js/dist/umd/popper.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap/dist/js/bootstrap.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js-cookie/src/js.cookie.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/moment/min/moment.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/tooltip.js/dist/umd/tooltip.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/perfect-scrollbar/dist/perfect-scrollbar.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/sticky-js/dist/sticky.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/wnumb/wNumb.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery-form/dist/jquery.form.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/block-ui/jquery.blockUI.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-datepicker.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-timepicker.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-daterangepicker/daterangepicker.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-maxlength/src/bootstrap-maxlength.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/plugins/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-select/dist/js/bootstrap-select.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-switch/dist/js/bootstrap-switch.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-switch.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/select2/dist/js/select2.full.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/ion-rangeslider/js/ion.rangeSlider.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/typeahead.js/dist/typeahead.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/handlebars/dist/handlebars.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/inputmask/dist/jquery.inputmask.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/inputmask/dist/inputmask/inputmask.date.extensions.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/nouislider/distribute/nouislider.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/owl.carousel/dist/owl.carousel.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/autosize/dist/autosize.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/clipboard/dist/clipboard.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/dropzone/dist/dropzone.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/dropzone.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/crud/file-upload/dropzonejs.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/quill/dist/quill.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.polyfills.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/@yaireo/tagify/dist/tagify.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/summernote/dist/summernote.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/crud/forms/widgets/summernote.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/markdown/lib/markdown.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-markdown/js/bootstrap-markdown.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-markdown.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/bootstrap-notify/bootstrap-notify.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/bootstrap-notify.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery-validation/dist/jquery.validate.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery-validation/dist/additional-methods.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/jquery-validation.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/toastr/build/toastr.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/dual-listbox/dist/dual-listbox.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/raphael/raphael.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/morris.js/morris.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/chart.js/dist/Chart.bundle.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/plugins/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/plugins/jquery-idletimer/idle-timer.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/waypoints/lib/jquery.waypoints.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/counterup/jquery.counterup.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/es6-promise-polyfill/promise.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/sweetalert2/dist/sweetalert2.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/js/global/integration/plugins/sweetalert2.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery.repeater/src/lib.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery.repeater/src/jquery.input.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/jquery.repeater/src/repeater.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/general/dompurify/dist/purify.js"
		type="text/javascript"></script>

<!--end:: Vendor Plugins -->
<script src="<?php echo base_url(''); ?>assets/js/scripts.bundle.js" type="text/javascript"></script>

<!--begin:: Vendor Plugins for custom pages -->
<script src="<?php echo base_url(''); ?>assets/plugins/custom/plugins/jquery-ui/jquery-ui.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/core/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/daygrid/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/google-calendar/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/interaction/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/list/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/@fullcalendar/timegrid/main.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/gmaps/gmaps.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/dist/es5/jquery.flot.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.resize.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.categories.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.pie.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.stack.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.crosshair.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/flot/source/jquery.flot.axislabels.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net/js/jquery.dataTables.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-bs4/js/dataTables.bootstrap4.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/js/global/integration/plugins/datatables.init.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-autofill/js/dataTables.autoFill.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-autofill-bs4/js/autoFill.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jszip/dist/jszip.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/pdfmake/build/pdfmake.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/pdfmake/build/vfs_fonts.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons/js/dataTables.buttons.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.colVis.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.flash.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.html5.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-buttons/js/buttons.print.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-colreorder/js/dataTables.colReorder.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedcolumns/js/dataTables.fixedColumns.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-keytable/js/dataTables.keyTable.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-responsive/js/dataTables.responsive.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowgroup/js/dataTables.rowGroup.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-rowreorder/js/dataTables.rowReorder.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-scroller/js/dataTables.scroller.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/datatables.net-select/js/dataTables.select.min.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/crud/datatables/basic/basic.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jstree/dist/jstree.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/jquery.vmap.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.world.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.russia.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.usa.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.germany.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/jqvmap/dist/maps/jquery.vmap.europe.js"
		type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/plugins/custom/uppy/dist/uppy.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/custom/wizard/wizard-1.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/components/calendar/basic.js" type="text/javascript"></script>


<!--end:: Vendor Plugins for custom pages -->

<!--end::Global Theme Bundle -->


<!--begin::Page Vendors(used by this page) -->
<script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM"
		type="text/javascript"></script>

<!--
end::Page
Vendors -->

<!--begin::Page Scripts(used by this page) -->
<script src="<?php echo base_url(''); ?>assets/js/pages/crud/forms/widgets/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/crud/forms/widgets/bootstrap-timepicker.js" type="text/javascript"></script>
<script src="<?php echo base_url(''); ?>assets/js/pages/dashboard.js" type="text/javascript"></script>

<!--end::Page Scripts -->
<script>
	$(".alert").delay(4000).slideUp(200, function () {
		$(this).alert('close');
	});
</script>

</body>

<!-- end::Body -->
</html>
