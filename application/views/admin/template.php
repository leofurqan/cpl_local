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
<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

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
					<a href="<?php echo base_url('admin/dashboard'); ?>">
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
						} ?>"><a href="<?php echo base_url('admin/dashboard'); ?>" class="kt-menu__link "><span
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


						<li class="kt-menu__item kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'teams') {
							echo 'kt-menu__item--open';
						} ?>" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																						 class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon"><svg xmlns="http://www.w3.org/2000/svg"
																		xmlns:xlink="http://www.w3.org/1999/xlink"
																		version="1.1" width="512" height="512" x="0"
																		y="0" viewBox="0 0 80.13 80.13"
																		style="enable-background:new 0 0 512 512"
																		xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<path d="M48.355,17.922c3.705,2.323,6.303,6.254,6.776,10.817c1.511,0.706,3.188,1.112,4.966,1.112   c6.491,0,11.752-5.261,11.752-11.751c0-6.491-5.261-11.752-11.752-11.752C53.668,6.35,48.453,11.517,48.355,17.922z M40.656,41.984   c6.491,0,11.752-5.262,11.752-11.752s-5.262-11.751-11.752-11.751c-6.49,0-11.754,5.262-11.754,11.752S34.166,41.984,40.656,41.984   z M45.641,42.785h-9.972c-8.297,0-15.047,6.751-15.047,15.048v12.195l0.031,0.191l0.84,0.263   c7.918,2.474,14.797,3.299,20.459,3.299c11.059,0,17.469-3.153,17.864-3.354l0.785-0.397h0.084V57.833   C60.688,49.536,53.938,42.785,45.641,42.785z M65.084,30.653h-9.895c-0.107,3.959-1.797,7.524-4.47,10.088   c7.375,2.193,12.771,9.032,12.771,17.11v3.758c9.77-0.358,15.4-3.127,15.771-3.313l0.785-0.398h0.084V45.699   C80.13,37.403,73.38,30.653,65.084,30.653z M20.035,29.853c2.299,0,4.438-0.671,6.25-1.814c0.576-3.757,2.59-7.04,5.467-9.276   c0.012-0.22,0.033-0.438,0.033-0.66c0-6.491-5.262-11.752-11.75-11.752c-6.492,0-11.752,5.261-11.752,11.752   C8.283,24.591,13.543,29.853,20.035,29.853z M30.589,40.741c-2.66-2.551-4.344-6.097-4.467-10.032   c-0.367-0.027-0.73-0.056-1.104-0.056h-9.971C6.75,30.653,0,37.403,0,45.699v12.197l0.031,0.188l0.84,0.265   c6.352,1.983,12.021,2.897,16.945,3.185v-3.683C17.818,49.773,23.212,42.936,30.589,40.741z"
		  fill="#5867dd" data-original="#000000" style="" class=""/>
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>
</span><span class="kt-menu__link-text">Teams</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Teams</span></span></li>
									<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(3) === 'add_team') {
										echo 'kt-menu__item--active';
									} ?>"
										data-ktmenu-submenu-toggle="hover"><a
												href="<?php echo base_url('admin/teams/add_team'); ?>"
												class="kt-menu__link kt-menu__toggle"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Add Team</span></a>
									</li>
									<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'teams' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>" data-ktmenu-submenu-toggle="hover"><a
												href="<?php echo base_url('admin/teams'); ?>"
												class="kt-menu__link kt-menu__toggle"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Team List</span></a>
									</li>
								</ul>
							</div>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'clubs') {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 297 297" style="enable-background:new 0 0 512 512"
	 xml:space="preserve" class=""><g>
  <g xmlns="http://www.w3.org/2000/svg">
    <path d="M148.5,71.388c19.49,0,35.346-15.857,35.346-35.346S167.99,0.696,148.5,0.696s-35.346,15.857-35.346,35.346   S129.01,71.388,148.5,71.388z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="m155.932,82.821c-0.786-0.856-1.935-1.287-3.097-1.287h-8.67c-1.162,0-2.311,0.431-3.097,1.287-1.217,1.326-1.393,3.241-0.53,4.738l4.634,6.987-2.17,18.302 4.272,11.365c0.417,1.143 2.033,1.143 2.45,0l4.272-11.365-2.17-18.302 4.634-6.987c0.866-1.497 0.689-3.413-0.528-4.738z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="m94.069,164.469h108.86c2.776,0 5.035-2.259 5.035-5.035v-45.353c0-13.214-8.566-24.948-21.316-29.197l-9.94-3.051c-1.819-0.562-3.757,0.404-4.41,2.194l-23.798,65.296-23.798-65.297c-0.528-1.446-1.893-2.353-3.356-2.353-0.348,0-0.702,0.051-1.05,0.159l-9.864,3.026c-12.831,4.276-21.397,16.009-21.397,29.223v45.353c0,2.776 2.259,5.035 5.034,5.035z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="M35.345,89.454c19.49,0,35.346-15.856,35.346-35.345c0-19.49-15.857-35.346-35.346-35.346C15.856,18.763,0,34.62,0,54.109   C0,73.599,15.856,89.454,35.345,89.454z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="m95.511,186.619h-28.152v-55.605c0-17.681-14.333-32.014-32.013-32.014-17.68,0-32.013,14.333-32.013,32.013v75.535c0,16.975 13.761,30.736 30.736,30.736h36.527v50.333c0,4.798 3.889,8.687 8.687,8.687h33.725c4.798,0 8.687-3.889 8.687-8.687v-74.814c-1.42109e-14-14.461-11.723-26.184-26.184-26.184z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="m261.655,89.454c19.49,0 35.345-15.856 35.345-35.345 0-19.49-15.856-35.346-35.345-35.346s-35.346,15.857-35.346,35.346c-0.001,19.49 15.856,35.345 35.346,35.345z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
    <path d="m261.654,99c-17.681,0-32.013,14.333-32.013,32.013v55.605h-28.151c-14.461,0-26.184,11.723-26.184,26.184v74.814c0,4.798 3.889,8.687 8.687,8.687h33.725c4.798,0 8.687-3.889 8.687-8.687v-50.333h36.527c16.975,0 30.736-13.761 30.736-30.736v-75.535c0-17.679-14.333-32.012-32.014-32.012z"
		  fill="#494b74" data-original="#000000" style="" class=""/>
  </g>
</g></svg>
</span><span class="kt-menu__link-text">Clubs</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Clubs</span></span></li>
									<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(3) === 'add_club') {
										echo 'kt-menu__item--active';
									} ?>"
										data-ktmenu-submenu-toggle="hover"><a
												href="<?php echo base_url('admin/clubs/add_club'); ?>"
												class="kt-menu__link kt-menu__toggle"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Add Clubs</span></a>
									</li>
									<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'clubs' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"
										data-ktmenu-submenu-toggle="hover"><a
												href="<?php echo base_url('admin/clubs') ?>"
												class="kt-menu__link kt-menu__toggle"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Club List</span></a>
									</li>
								</ul>
							</div>
						</li>

						<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'officials') {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 28.055 28.055"
	 style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<path d="M14.249,1.027c-0.036,0-0.07,0.009-0.104,0.009c-0.106-0.003-0.211-0.01-0.318-0.009H14.249z M14.085,17.301   c-0.019,0-0.036-0.003-0.055-0.003c-0.014,0-0.027,0.003-0.041,0.003H14.085z M8.137,11.313c0.015-0.003,0.026-0.019,0.042-0.023   c0.941,3.405,3.377,5.953,5.852,6.007c2.254-0.104,5.022-2.606,5.944-5.994c0.424,0.026,0.848-0.474,0.967-1.17   c0.123-0.726-0.135-1.374-0.572-1.449c-0.028-0.005-0.057,0.013-0.084,0.014c-0.127-5.603-2.789-7.579-6.141-7.664   C10.688,1.051,7.593,3.453,7.789,8.7c-0.033,0-0.064-0.021-0.096-0.015C7.254,8.76,6.998,9.408,7.121,10.134   C7.241,10.858,7.697,11.386,8.137,11.313z M18.688,18.27l-3.141,6.146l-0.496-3.997l0.775-0.636h-1.878h-1.717l0.776,0.636   l-0.497,3.997L9.373,18.27C3.917,19.005,0,21.343,0,27.027h28.055C28.057,21.342,24.141,19.006,18.688,18.27z"
		  fill="#494b74" data-original="#000000" style="" class=""/></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g>
<g xmlns="http://www.w3.org/2000/svg"></g><g xmlns="http://www.w3.org/2000/svg"></g></g></svg>
</span><span class="kt-menu__link-text">Officials</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Officials</span></span></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'official_type') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/officials/official_type'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Add Official Type</span></a></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(3) === 'add_official') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/officials/add_official'); ?>"
												class="kt-menu__link"><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Add Official</span></a></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(2) === 'officials' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/officials'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Official List</span></a></li>
								</ul>
							</div>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'grounds') {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512"
	 xml:space="preserve" class=""><g>
<g xmlns="http://www.w3.org/2000/svg">
	<g>
		<g>
			<path d="M256,64C149.961,64,64,149.961,64,256s85.961,192,192,192s192-85.961,192-192C447.884,150.009,361.991,64.116,256,64z      M256,429.714c-95.94,0-173.714-77.775-173.714-173.714S160.06,82.286,256,82.286S429.714,160.06,429.714,256     C429.628,351.904,351.904,429.628,256,429.714z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M320,55.68V0H192v55.68C233.632,42.393,278.368,42.393,320,55.68z" fill="#494b74"
				  data-original="#000000" style="" class=""/>
			<path d="M433.28,143.086l24.046-13.897c-11.566-18.238-25.562-34.817-41.6-49.28l-17.737,21.12     C411.515,113.469,423.377,127.605,433.28,143.086z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M401.646,68.206c-19.183-14.878-40.557-26.69-63.36-35.017v29.349c16.299,6.926,31.634,15.93,45.623,26.789     L401.646,68.206z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M256,100.571c-85.841,0-155.429,69.588-155.429,155.429S170.159,411.429,256,411.429S411.429,341.841,411.429,256     C411.307,170.21,341.79,100.693,256,100.571z M282.231,129.422c1.76-4.708,6.992-7.112,11.711-5.381v0     c3.147,1.174,6.219,2.543,9.196,4.098c4.475,2.34,6.206,7.864,3.866,12.339c-2.34,4.475-7.864,6.206-12.339,3.866     c-2.307-1.205-4.687-2.266-7.125-3.179C282.843,139.376,280.471,134.13,282.231,129.422z M240.175,121.55     c1.691-1.717,4-2.687,6.41-2.693h8.942c5.049,0,9.143,4.093,9.143,9.143s-4.093,9.143-9.143,9.143h-8.669     c-5.076,0.01-9.213-4.068-9.277-9.143C237.549,125.59,238.483,123.267,240.175,121.55z M169.411,173.286     c1.134-3.163,2.464-6.252,3.982-9.25v0c1.477-2.914,4.396-4.819,7.658-4.997c3.262-0.178,6.371,1.398,8.156,4.134     s1.975,6.217,0.498,9.13c-1.175,2.322-2.207,4.713-3.089,7.161c-1.302,3.632-4.744,6.056-8.603,6.058     c-1.054,0-2.099-0.184-3.089-0.545c-2.282-0.818-4.146-2.51-5.18-4.703C168.71,178.081,168.59,175.567,169.411,173.286z      M164.571,211.657c0-5.049,4.093-9.143,9.143-9.143s9.143,4.093,9.143,9.143v8.96c0,5.049-4.093,9.143-9.143,9.143     s-9.143-4.093-9.143-9.143V211.657z M164.571,265.234v-8.895c0-5.049,4.093-9.143,9.143-9.143s9.143,4.093,9.143,9.143v8.938     c0,5.049-4.093,9.143-9.143,9.143s-9.143-4.093-9.143-9.143V265.234z M164.571,309.978v-8.942c0-5.049,4.093-9.143,9.143-9.143     s9.143,4.093,9.143,9.143v8.942c0,5.049-4.093,9.143-9.143,9.143S164.571,315.027,164.571,309.978z M194.52,356.35     c-1.581,2.997-4.689,4.875-8.078,4.878v0c-3.024,0.006-5.855-1.487-7.558-3.986c-1.892-2.765-3.611-5.644-5.147-8.62     c-2.318-4.485-0.561-9.999,3.924-12.317s9.999-0.561,12.317,3.924c1.198,2.313,2.536,4.55,4.005,6.701     C195.893,349.727,196.1,353.352,194.52,356.35z M195.504,142.237c-0.291-3.275,1.199-6.454,3.902-8.326l0,0     c2.737-1.937,5.591-3.703,8.545-5.29c4.45-2.387,9.993-0.714,12.379,3.737c2.387,4.45,0.714,9.993-3.737,12.379     c-2.292,1.23-4.506,2.6-6.629,4.103c-2.666,1.925-6.159,2.271-9.15,0.905C197.823,148.378,195.795,145.512,195.504,142.237z      M229.567,382.531L229.567,382.531c-0.852,2.271-2.574,4.11-4.785,5.11c-2.211,0.999-4.728,1.077-6.997,0.216     c-3.135-1.183-6.195-2.557-9.161-4.116c-4.452-2.353-6.163-7.863-3.827-12.323s7.84-6.192,12.309-3.873     c2.312,1.21,4.694,2.28,7.134,3.205C228.964,372.533,231.349,377.807,229.567,382.531z M272.037,390.436     c-1.67,1.72-3.962,2.696-6.359,2.706h-9.477c-5.049,0-9.143-4.093-9.143-9.143c0-5.049,4.093-9.143,9.143-9.143h8.942     c5.102-0.021,9.284,4.042,9.411,9.143C274.614,386.396,273.707,388.716,272.037,390.436z M274.286,356.571h-36.571     c-10.087-0.03-18.256-8.199-18.286-18.286V173.714c0.029-10.087,8.199-18.256,18.286-18.286h36.571     c10.087,0.029,18.256,8.199,18.286,18.286v164.571C292.542,348.372,284.372,356.542,274.286,356.571z M312.839,377.915     c-2.733,1.948-5.584,3.725-8.536,5.321c-4.436,2.344-9.932,0.674-12.316-3.74c-2.384-4.415-0.765-9.925,3.628-12.349     c2.288-1.238,4.497-2.615,6.616-4.125c2.66-1.895,6.129-2.226,9.101-0.87s4.993,4.195,5.304,7.446     C316.947,372.85,315.5,376.02,312.839,377.915z M316.429,158.036c0.44-2.385,1.81-4.496,3.808-5.871v0     c4.16-2.862,9.852-1.811,12.714,2.348c1.896,2.755,3.624,5.622,5.174,8.585c1.53,2.895,1.395,6.387-0.354,9.154     c-1.749,2.768-4.845,4.389-8.116,4.25c-3.271-0.139-6.218-2.016-7.726-4.923c-1.212-2.312-2.561-4.55-4.04-6.701     C316.514,162.882,315.989,160.421,316.429,158.036z M342.692,338.433c-1.127,3.16-2.445,6.249-3.947,9.25     c-2.261,4.514-7.753,6.341-12.268,4.08c-4.514-2.261-6.341-7.753-4.08-12.268c1.169-2.33,2.192-4.73,3.063-7.188     c1.094-3.078,3.747-5.339,6.96-5.931c3.213-0.592,6.497,0.576,8.616,3.063C343.155,331.927,343.786,335.355,342.692,338.433z      M347.429,300.069v0.025c0,5.049-4.093,9.143-9.143,9.143c-5.049,0-9.143-4.093-9.143-9.143v-8.942     c0-5.049,4.093-9.143,9.143-9.143c5.049,0,9.143,4.093,9.143,9.143V300.069z M347.429,255.393c0,5.049-4.093,9.143-9.143,9.143     c-5.049,0-9.143-4.093-9.143-9.143v-8.938c0-5.049,4.093-9.143,9.143-9.143c5.049,0,9.143,4.093,9.143,9.143V255.393z      M347.429,201.783v8.909c0,5.049-4.093,9.143-9.143,9.143c-5.049,0-9.143-4.093-9.143-9.143v-8.938     c0-5.049,4.093-9.143,9.143-9.143c5.049,0,9.143,4.093,9.143,9.143V201.783z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<rect x="237.714" y="320" width="36.571" height="18.286" fill="#494b74" data-original="#000000" style=""
				  class=""/>
			<rect x="237.714" y="173.714" width="36.571" height="18.286" fill="#494b74" data-original="#000000" style=""
				  class=""/>
			<path d="M173.714,62.537V33.189c-22.803,8.327-44.177,20.14-63.36,35.017l17.737,21.12     C142.081,78.467,157.416,69.463,173.714,62.537z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<rect x="237.714" y="210.286" width="36.571" height="91.429" fill="#494b74" data-original="#000000" style=""
				  class=""/>
			<path d="M461.257,210.56l26.971-4.754c-4.479-21.126-11.798-41.548-21.76-60.709l-24.046,13.806     C450.949,175.217,457.282,192.587,461.257,210.56z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M114.011,101.029l-17.737-21.12c-16.038,14.463-30.034,31.042-41.6,49.28l24.046,13.897     C88.623,127.605,100.485,113.469,114.011,101.029z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M338.286,449.463v29.349c22.803-8.327,44.177-20.139,63.36-35.017l-17.737-21.12     C369.919,433.533,354.584,442.537,338.286,449.463z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M237.714,465.463V512h36.571v-46.537c-6.034,0.457-12.16,0.823-18.286,0.823     C249.874,466.286,243.749,465.92,237.714,465.463z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M292.571,512H320v-55.68c-8.983,2.836-18.147,5.065-27.429,6.674V512z" fill="#494b74"
				  data-original="#000000" style="" class=""/>
			<path d="M442.423,353.097l24.046,13.806c9.962-19.161,17.281-39.583,21.76-60.709l-26.971-4.754     C457.282,319.413,450.949,336.783,442.423,353.097z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M397.989,410.971l17.737,21.12c16.038-14.463,30.033-31.042,41.6-49.28l-24.046-13.897     C423.377,384.395,411.515,398.531,397.989,410.971z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M78.72,368.914l-24.046,13.897c11.567,18.238,25.562,34.817,41.6,49.28l17.737-21.12     C100.485,398.531,88.623,384.395,78.72,368.914z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M110.354,443.794c19.183,14.878,40.557,26.69,63.36,35.017v-29.349c-16.299-6.926-31.634-15.93-45.623-26.789     L110.354,443.794z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M491.429,223.817l-26.971,4.754c2.438,18.204,2.438,36.653,0,54.857l26.971,4.754c1.456-10.667,2.22-21.417,2.286-32.183     C493.648,245.234,492.885,234.484,491.429,223.817z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M50.743,301.44l-26.971,4.754c4.479,21.126,11.798,41.548,21.76,60.709l24.046-13.806     C61.051,336.783,54.718,319.413,50.743,301.44z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M192,512h27.429v-49.006c-9.282-1.609-18.445-3.839-27.429-6.674V512z" fill="#494b74"
				  data-original="#000000" style="" class=""/>
			<path d="M45.714,256c0.005-9.173,0.616-18.336,1.829-27.429l-26.971-4.754c-1.456,10.667-2.22,21.417-2.286,32.183     c0.066,10.766,0.829,21.516,2.286,32.183l26.971-4.754C46.33,274.336,45.719,265.173,45.714,256z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
			<path d="M69.577,158.903l-24.046-13.806c-9.962,19.161-17.281,39.583-21.76,60.709l26.971,4.754     C54.718,192.587,61.051,175.217,69.577,158.903z"
				  fill="#494b74" data-original="#000000" style="" class=""/>
		</g>
	</g>
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>
</span><span class="kt-menu__link-text">Grounds</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Grounds</span></span>
									</li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'add_ground') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/grounds/add_ground'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Add Ground</span></a></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(2) === 'grounds' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/grounds'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Ground List </span></a></li>
								</ul>
							</div>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu <?php if (($this->uri->segment(2) === 'tournaments') || ($this->uri->segment(2) === 'icc_rules') || ($this->uri->segment(2) === 'code_of_conduct')) {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 495 495.83864"
	 style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg"
																					  d="m88.402344 15.960938c-.402344-4.648438-2.660156-8.9375-6.269532-11.898438-3.617187-3-8.28125-4.429688-12.957031-3.9804688l-52.726562 4.9531248c-4.664063.417969-8.96875 2.675782-11.960938 6.277344-2.996093 3.597656-4.4296872 8.242188-3.992187 12.902344l2.488281 26.367187 87.914063-8.234375zm0 0"
																					  fill="#494b74"
																					  data-original="#000000" style=""
																					  class=""/><path
				xmlns="http://www.w3.org/2000/svg"
				d="m130.484375 492.90625c1.683594-1.832031 2.507813-4.300781 2.257813-6.777344l-8.828126-93.742187c-39.835937-49.644531-46.285156-118.25-16.390624-174.449219l-14.917969-158.015625-87.914063 8.238281 39.574219 419.6875c.433594 4.546875 4.261719 8.011719 8.824219 7.992188h70.90625c2.480468-.007813 4.839844-1.074219 6.488281-2.933594zm0 0"
				fill="#494b74" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg"
																				d="m202.929688 140.273438c28.808593-8.449219 59.417968-8.546876 88.277343-.273438l.625-76.757812h-88.273437zm0 0"
																				fill="#494b74" data-original="#000000"
																				style="" class=""/><path
				xmlns="http://www.w3.org/2000/svg"
				d="m227.605469 374.566406c-53.714844-53.328125-73.042969-132.238281-50.054688-204.351562-6.796875 3.847656-13.257812 8.257812-19.324219 13.179687-1.289062 4.671875-2.503906 9.367188-3.449218 14.035157-.839844 4.109374-4.449219 7.058593-8.644532 7.0625-.589843 0-1.183593-.058594-1.765624-.175782-1.75-.382812-3.339844-1.308594-4.535157-2.648437-35.457031 41.878906-43.429687 100.511719-20.4375 150.332031 22.992188 49.824219 72.777344 81.804688 127.648438 82-.265625-1.789062.042969-3.613281.882812-5.214844 1.128907-2.050781 3.027344-3.570312 5.277344-4.222656 2.25-.648438 4.667969-.378906 6.71875.753906 4.148437 2.292969 8.484375 4.414063 12.828125 6.390625 10.652344-1.894531 21.050781-5.023437 30.984375-9.324219-28.648437-10.011718-54.671875-26.359374-76.128906-47.816406zm-91.808594-98.050781c-1.953125-12.140625-2.9375-24.421875-2.9375-36.722656 0-1.5625 0-3.113281 0-4.660157.257813-4.800781 4.191406-8.582031 9.003906-8.652343 2.339844.046875 4.570313 1.023437 6.191407 2.714843 1.625 1.691407 2.507812 3.957032 2.457031 6.300782v4.296875c.007812 11.359375.914062 22.695312 2.71875 33.910156.773437 4.808594-2.496094 9.339844-7.308594 10.113281-.46875.078125-.945313.117188-1.421875.117188-4.324219-.007813-8.011719-3.144532-8.703125-7.417969zm39.722656 81.089844c-1.339843.777343-2.863281 1.183593-4.410156 1.175781-3.160156.007812-6.085937-1.675781-7.664063-4.414062-6.910156-12.007813-12.714843-24.617188-17.347656-37.675782-1.558594-4.574218.851563-9.554687 5.40625-11.171875 4.558594-1.613281 9.566406.738281 11.234375 5.273438 4.277344 12.046875 9.640625 23.675781 16.023438 34.746093 1.171875 2.03125 1.484375 4.445313.875 6.710938-.613281 2.261719-2.097657 4.191406-4.132813 5.355469zm53.796875 58.546875c-3.097656 3.761718-8.65625 4.304687-12.421875 1.207031-5.789062-4.757813-11.472656-9.886719-16.816406-15.253906-4.410156-4.367188-8.675781-9.027344-12.746094-13.820313-3.15625-3.71875-2.703125-9.292968 1.015625-12.449218s9.289063-2.703126 12.445313 1.015624c3.761719 4.414063 7.71875 8.730469 11.761719 12.765626 4.96875 4.96875 10.203124 9.710937 15.550781 14.125 3.753906 3.097656 4.285156 8.652343 1.195312 12.410156zm0 0"
				fill="#494b74" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg"
																				d="m347.085938 377.644531c3.855468.804688 7.875 1.308594 11.871093 1.835938 27.316407-35.015625 36.558594-80.847657 24.945313-123.710938-11.613282-42.867187-42.726563-77.765625-83.984375-94.207031h-.050781c-1.816407-.058594-3.570313-.691406-5.003907-1.808594-15.164062-5.417968-31.144531-8.207031-47.246093-8.234375-3.390626 0-6.746094.253907-10.089844.492188-1.765625 3.59375-3.53125 7.1875-5.050782 10.859375-1.175781 2.925781-3.824218 5.003906-6.945312 5.449218-3.125.441407-6.246094-.8125-8.195312-3.292968-1.945313-2.484375-2.417969-5.816406-1.242188-8.742188.167969-.421875.371094-.828125.546875-1.253906-5.609375 1.265625-11.140625 2.875-16.550781 4.820312-20.777344 49.699219-18.851563 105.980469 5.265625 154.144532 24.117187 48.164062 68.03125 83.421875 120.269531 96.558594 6.796875-4.570313 13.183594-9.722657 19.09375-15.394532-.414062-.089844-.882812-.113281-1.269531-.203125-3.160157-.574219-5.757813-2.8125-6.789063-5.855469-1.027344-3.039062-.328125-6.398437 1.835938-8.773437 2.160156-2.375 5.441406-3.386719 8.5625-2.648437zm-143.609376-154.453125v-1.050781c-.003906-11.082031 1.019532-22.136719 3.054688-33.023437.902344-4.792969 5.515625-7.949219 10.308594-7.050782 4.792968.898438 7.949218 5.515625 7.046875 10.304688-1.835938 9.816406-2.757813 19.78125-2.753907 29.769531.097657 4.953125-3.753906 9.09375-8.703124 9.355469h-.125c-2.277344.089844-4.496094-.738282-6.15625-2.300782-1.660157-1.5625-2.621094-3.726562-2.671876-6.003906zm24.90625 71.335938c-4.503906 1.859375-9.664062-.277344-11.53125-4.777344-4.371093-10.535156-7.695312-21.476562-9.929687-32.664062-.945313-4.773438 2.152344-9.410157 6.925781-10.363282 4.769532-.957031 9.414063 2.128906 10.382813 6.894532 2.011719 10.066406 5 19.914062 8.925781 29.398437 1.851562 4.496094-.285156 9.644531-4.773438 11.511719zm38.652344 51.886718c-3.464844 3.425782-9.050781 3.394532-12.480468-.070312-8.023438-8.101562-15.253907-16.953125-21.59375-26.429688-1.945313-2.613281-2.292969-6.089843-.902344-9.039062 1.390625-2.945312 4.292968-4.890625 7.546875-5.050781 3.257812-.160157 6.335937 1.484375 8.011719 4.28125 5.699218 8.546875 12.203124 16.527343 19.417968 23.835937 3.441406 3.445313 3.441406 9.027344 0 12.472656zm55.289063 33.542969c-.917969 2.15625-2.65625 3.855469-4.832031 4.730469-2.171876.871094-4.605469.84375-6.757813-.078125-10.5-4.484375-20.539063-9.984375-29.96875-16.417969-3.613281-2.886718-4.382813-8.074218-1.769531-11.886718 2.617187-3.8125 7.730468-4.960938 11.726562-2.632813 8.476563 5.792969 17.503906 10.738281 26.949219 14.765625 4.46875 1.914062 6.546875 7.082031 4.652344 11.554688zm0 0"
																				fill="#494b74" data-original="#000000"
																				style="" class=""/><path
				xmlns="http://www.w3.org/2000/svg"
				d="m387.738281 217.902344c29.921875 56.21875 23.46875 124.859375-16.402343 174.519531l-8.871094 93.707031c-.238282 2.480469.585937 4.949219 2.269531 6.789063 1.679687 1.84375 4.0625 2.886719 6.554687 2.875h70.90625c4.566407.023437 8.398438-3.449219 8.828126-7.996094l39.535156-419.628906-87.902344-8.234375zm0 0"
				fill="#494b74" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg"
																				d="m478.785156 5.035156-52.726562-4.9453122c-4.664063-.4648438-9.320313.9492182-12.9375 3.9335942-3.613282 2.984374-5.882813 7.289062-6.308594 11.957031l-2.496094 26.410156 87.902344 8.238281 2.5-26.386718c.875-9.671876-6.226562-18.234376-15.890625-19.164063zm0 0"
																				fill="#494b74" data-original="#000000"
																				style="" class=""/><path
				xmlns="http://www.w3.org/2000/svg"
				d="m271.398438 449.707031c-22.679688 3.648438-45.886719 2.167969-67.921876-4.328125v41.589844c0 4.875 3.953126 8.824219 8.828126 8.824219h70.621093c4.875 0 8.828125-3.949219 8.828125-8.824219v-41.589844c-5.832031 1.652344-11.753906 2.96875-17.734375 3.9375-.832031.261719-1.699219.394532-2.570312.398438zm0 0"
				fill="#494b74" data-original="#000000" style="" class=""/><path xmlns="http://www.w3.org/2000/svg"
																				d="m292.179688 19.464844c.039062-4.683594-1.785157-9.191406-5.070313-12.53125-3.285156-3.335938-7.761719-5.234375-12.445313-5.273438l-52.964843-.414062h-.152344c-9.691406 0-17.570313 7.8125-17.652344 17.503906l-.203125 26.835938h88.273438zm0 0"
																				fill="#494b74" data-original="#000000"
																				style="" class=""/></g></svg>
</span><span class="kt-menu__link-text">Tournaments</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Tournaments</span></span></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(3) === 'tournaments' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/tournaments'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Tournament List</span></a></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(3) === 'tournaments' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/tournaments/tournament_rules'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Formate</span></a></li>
									<li class="kt-menu__item  <?php if ($this->uri->segment(3) === 'tournaments' && $this->uri->segment(3) === null) {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/tournaments/point_system'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Point System</span></a></li>

								</ul>
							</div>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'settings') {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
	 version="1.1" width="512" height="512" x="0" y="0" viewBox="0 0 24 24" style="enable-background:new 0 0 512 512"
	 xml:space="preserve" class=""><g><path xmlns="http://www.w3.org/2000/svg"
											d="m22.683 9.394-1.88-.239c-.155-.477-.346-.937-.569-1.374l1.161-1.495c.47-.605.415-1.459-.122-1.979l-1.575-1.575c-.525-.542-1.379-.596-1.985-.127l-1.493 1.161c-.437-.223-.897-.414-1.375-.569l-.239-1.877c-.09-.753-.729-1.32-1.486-1.32h-2.24c-.757 0-1.396.567-1.486 1.317l-.239 1.88c-.478.155-.938.345-1.375.569l-1.494-1.161c-.604-.469-1.458-.415-1.979.122l-1.575 1.574c-.542.526-.597 1.38-.127 1.986l1.161 1.494c-.224.437-.414.897-.569 1.374l-1.877.239c-.753.09-1.32.729-1.32 1.486v2.24c0 .757.567 1.396 1.317 1.486l1.88.239c.155.477.346.937.569 1.374l-1.161 1.495c-.47.605-.415 1.459.122 1.979l1.575 1.575c.526.541 1.379.595 1.985.126l1.494-1.161c.437.224.897.415 1.374.569l.239 1.876c.09.755.729 1.322 1.486 1.322h2.24c.757 0 1.396-.567 1.486-1.317l.239-1.88c.477-.155.937-.346 1.374-.569l1.495 1.161c.605.47 1.459.415 1.979-.122l1.575-1.575c.542-.526.597-1.379.127-1.985l-1.161-1.494c.224-.437.415-.897.569-1.374l1.876-.239c.753-.09 1.32-.729 1.32-1.486v-2.24c.001-.757-.566-1.396-1.316-1.486zm-10.683 7.606c-2.757 0-5-2.243-5-5s2.243-5 5-5 5 2.243 5 5-2.243 5-5 5z"
											fill="#494b74" data-original="#000000" style="" class=""/></g></svg>


</span><span class="kt-menu__link-text">Settings</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Settings</span></span></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'email_templates') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/settings/email_templates'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Templates</span></a></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'general') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/settings/general'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">General</span></a></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'tournament_slots') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/settings/tournament_slots'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Tournament Slots </span></a></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'application_settings') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/settings/application_settings'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Application Settings </span></a></li>
									<!--li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('tournaments'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Tournament List</span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('icc_rules/add_icc_rules'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">ICC Rules</span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('code_of_conduct/add_code_conduct'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Code of Conduct</span></a></li-->

								</ul>
							</div>
						</li>

						<li class="kt-menu__item  kt-menu__item--submenu <?php if ($this->uri->segment(2) === 'support') {
							echo 'kt-menu__item--active kt-menu__item--open';
						} ?>"
							data-ktmenu-submenu-toggle="hover"><a href="javascript:;"
																  class="kt-menu__link kt-menu__toggle"><span
										class="kt-menu__link-icon">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="512"
	 height="512" x="0" y="0" viewBox="0 0 496 496" style="enable-background:new 0 0 512 512" xml:space="preserve"
	 class=""><g>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M151.428,240v-56c0-53.016,42.984-96,96-96l0,0c53.016,0,96,42.984,96,96v56H151.428z" fill="#494b74"
	  data-original="#d3a06c" class=""/>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M247.428,88c-2.704,0-5.352,0.184-8,0.4c49.264,4.08,88,45.28,88,95.6v56h16v-56  C343.428,130.984,300.444,88,247.428,88z"
	  fill="#494b74" data-original="#b27946" class=""/>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M215.428,424h176l-15.016-45.04c-5.544-16.624-19.704-28.912-36.952-32.048L279.428,336h-64  l-60.04,10.912c-17.24,3.136-31.408,15.416-36.952,32.048l-7.008,31.848V424H215.428z"
	  fill="#494b74" data-original="#92e0c0" class=""/>
<g xmlns="http://www.w3.org/2000/svg">
	<polygon style="" points="215.428,312 215.428,336 247.428,368 279.428,336 279.428,312  " fill="#494b74"
			 data-original="#f9e0a6" class=""/>
	<path style="" d="M311.428,216h8c13.256,0,24,10.744,24,24l0,0c0,13.256-10.744,24-24,24h-8V216z" fill="#494b74"
		  data-original="#f9e0a6" class=""/>
	<path style="" d="M183.428,216h-8c-13.256,0-24,10.744-24,24l0,0c0,13.256,10.744,24,24,24h8V216z" fill="#494b74"
		  data-original="#f9e0a6" class=""/>
	<path style=""
		  d="M175.428,208v48c0,39.768,32.232,72,72,72l0,0c39.768,0,72-32.232,72-72v-48l0,0   c-25.608,0-50.176-10.176-68.288-28.288L247.428,176l-3.712,3.712C225.604,197.824,201.036,208,175.428,208L175.428,208z"
		  fill="#494b74" data-original="#f9e0a6" class=""/>
</g>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M303.428,256c0,37.056-28.008,67.544-64,71.528c2.632,0.296,5.296,0.472,8,0.472  c39.768,0,72-32.232,72-72v-48c-5.4,0-10.744-0.552-16-1.432V256z"
	  fill="#494b74" data-original="#eabd8c" class=""/>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M359.428,8h112c8.84,0,16,7.16,16,16v64c0,8.84-7.16,16-16,16h-24l-64,40l6.856-40h-30.856  c-8.84,0-16-7.16-16-16V24C343.428,15.16,350.588,8,359.428,8z"
	  fill="#ececec" data-original="#ececec" class=""/>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M356.764,424h34.664l-15.016-45.04c-5.544-16.624-19.704-28.912-36.952-32.048L279.428,336  l57.56,31.976c9.056,5.032,15.12,14.136,16.264,24.44L356.764,424z"
	  fill="#494b74" data-original="#48c397" class=""/>
<path xmlns="http://www.w3.org/2000/svg" style=""
	  d="M183.428,395.88l-28.688,25.944c-6.248,6.248-16.376,6.248-22.624,0L74.74,364.448  c-6.248-6.248-6.248-16.376,0-22.624l25.944-25.944l-48-48l-30.056,30.056c-18.744,18.744-18.744,49.136,0,67.88l108.12,108.12  c18.744,18.744,49.136,18.744,67.88,0l32.8-30.056L183.428,395.88z"
	  fill="#494b74" data-original="#fb5968" class=""/>
<path xmlns="http://www.w3.org/2000/svg"
	  d="M384.004,376.432c-6.472-19.4-22.984-33.72-43.112-37.384l-53.464-9.728v-4.144c9.304-5.4,17.4-12.624,23.848-21.176h16.152  c13.232,0,24-10.768,24-24v-96c0-57.344-46.656-104-104-104s-104,46.656-104,104v56c0,15.424,10.968,28.328,25.512,31.336  c4.488,22.992,18.856,42.448,38.488,53.84v4.144l-53.472,9.728c-20.12,3.664-36.64,17.984-43.104,37.384l-3.2,9.608l-27.248-27.248  c-3.12-3.12-3.12-8.2,0-11.32l31.6-31.592l-59.312-59.312L16.98,292.28c-10.576,10.576-16.4,24.64-16.4,39.6  s5.824,29.016,16.4,39.592l108.12,108.12C135.676,490.168,149.74,496,164.7,496s29.016-5.832,39.344-16.168l38.968-35.704  L230.86,432h171.664L384.004,376.432z M247.428,356.688l-24-24v-0.376c7.584,2.384,15.64,3.688,24,3.688  c8.36,0,16.416-1.304,24-3.688v0.376L247.428,356.688z M327.428,288H320.7c2.32-5.288,4.08-10.864,5.216-16.664  c3.424-0.712,6.576-2.072,9.512-3.784V280C335.428,284.416,331.836,288,327.428,288z M327.428,226.224c4.76,2.776,8,7.88,8,13.776  s-3.24,11-8,13.776V226.224z M159.428,240c0-5.896,3.24-11,8-13.776v27.552C162.668,251,159.428,245.896,159.428,240z M167.428,200  v9.136c-2.848,0.744-5.52,1.864-8,3.312V184c0-48.52,39.48-88,88-88s88,39.48,88,88v28.448c-2.48-1.448-5.152-2.576-8-3.312V200h-8  c-23.656,0-45.896-9.216-62.632-25.944l-9.368-9.368l-9.368,9.368C221.324,190.784,199.084,200,175.428,200H167.428z M183.428,256  v-40.304c24.024-1.808,46.424-11.72,64-28.432c17.576,16.712,39.976,26.632,64,28.432V256c0,11.664-3.184,22.576-8.656,32h-55.344  v16h42.192c-11.28,9.928-26.024,16-42.192,16C212.14,320,183.428,291.288,183.428,256z M89.372,315.88l-8.688,8.688L43.996,287.88  l8.688-8.688L89.372,315.88z M164.684,480c-10.68,0-20.728-4.168-28.288-11.72L28.276,360.168  c-7.552-7.552-11.712-17.6-11.712-28.28c0-10.688,4.16-20.736,11.712-28.288l4.4-4.4l36.688,36.688l-0.288,0.288  c-9.352,9.36-9.352,24.584,0,33.944l57.368,57.368c4.536,4.528,10.56,7.032,16.976,7.032s12.44-2.496,16.68-6.752l0.6-0.536  l36.856,36.856l-4.592,4.208C185.412,475.832,175.364,480,164.684,480z M209.364,453.256l-36.776-36.776l10.568-9.552l36.712,36.712  L209.364,453.256z M214.86,416l-31.16-31.16l-34.624,31.32c-3.016,3.032-8.288,3.032-11.312,0l-17.472-17.472l5.728-17.2  c4.616-13.856,16.416-24.088,30.792-26.712l55.92-10.16l34.696,34.696l34.688-34.688l55.912,10.16  c14.376,2.624,26.176,12.848,30.792,26.712L380.332,416H214.86z"
	  fill="#494b74" data-original="#000000" style="" class=""/>
<path xmlns="http://www.w3.org/2000/svg"
	  d="M471.428,0h-112c-13.232,0-24,10.768-24,24v64c0,13.232,10.768,24,24,24h21.368l-8.272,48.248l77.2-48.248h21.704  c13.232,0,24-10.768,24-24V24C495.428,10.768,484.66,0,471.428,0z M479.428,88c0,4.408-3.592,8-8,8h-26.296l-50.808,31.752  L399.772,96h-40.344c-4.408,0-8-3.592-8-8V24c0-4.408,3.592-8,8-8h112c4.408,0,8,3.592,8,8V88z"
	  fill="#494b74" data-original="#000000" style="" class=""/>
<rect xmlns="http://www.w3.org/2000/svg" x="367.428" y="32" width="96" height="16" fill="#494b74"
	  data-original="#000000" style="" class=""/>
<rect xmlns="http://www.w3.org/2000/svg" x="367.428" y="64" width="64" height="16" fill="#494b74"
	  data-original="#000000" style="" class=""/>
<rect xmlns="http://www.w3.org/2000/svg" x="447.428" y="64" width="16" height="16" fill="#494b74"
	  data-original="#000000" style="" class=""/>
<path xmlns="http://www.w3.org/2000/svg"
	  d="M75.548,198.856l-8.232-13.72l-21.68,13.008C68.308,105.88,151.276,40,247.428,40c21.016,0,41.752,3.12,61.632,9.28  L313.796,34c-21.416-6.64-43.744-10-66.368-10C142.9,24,52.86,96.304,29.452,197.16l-15.16-25.272l-13.72,8.232l28.12,46.856  L75.548,198.856z"
	  fill="#494b74" data-original="#000000" style="" class=""/>
<path xmlns="http://www.w3.org/2000/svg"
	  d="M416.572,195.88l13.72,8.232l14-23.336c7.368,21.56,11.136,44.112,11.136,67.224c0,47.576-16.48,94.088-46.392,130.96  l12.424,10.08c32.224-39.712,49.968-89.808,49.968-141.04c0-24.472-3.944-48.368-11.632-71.248l23.512,14.104l8.232-13.72  l-46.856-28.12L416.572,195.88z"
	  fill="#494b74" data-original="#000000" style="" class=""/>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
<g xmlns="http://www.w3.org/2000/svg">
</g>
</g></svg>



</span><span class="kt-menu__link-text">Support</span><i
										class="kt-menu__ver-arrow la la-angle-right"></i></a>
							<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span
												class="kt-menu__link"><span
													class="kt-menu__link-text">Support</span></span></li>
									<li class="kt-menu__item <?php if ($this->uri->segment(3) === 'requests') {
										echo 'kt-menu__item--active';
									} ?>"><a
												href="<?php echo base_url('admin/support'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Requests</span></a></li>
									<!--li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('tournaments'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Tournament List</span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('icc_rules/add_icc_rules'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">ICC Rules</span></a></li>
									<li class="kt-menu__item " aria-haspopup="true"><a
												href="<?php echo base_url('code_of_conduct/add_code_conduct'); ?>"
												class="kt-menu__link "><i
													class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span
													class="kt-menu__link-text">Code of Conduct</span></a></li-->

								</ul>
							</div>

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
					<p class="m-4" style="font-size: 16px"><b>Admin Panel</b></p>
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
								<span class="kt-header__topbar-username kt-hidden-mobile"><?php echo $this->session->userdata("cpl")["first_name"]; ?></span>
								<img class="kt-hidden" alt="Pic"
									 src="<?php echo base_url(''); ?>assets/media/users/300_25.jpg"/>

								<!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
								<span class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"><?php echo $this->session->userdata("cpl")["first_name"][0]; ?></span>
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
									<span class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"><?php echo $this->session->userdata("cpl")["first_name"][0]; ?></span>
								</div>
								<div class="kt-user-card__name">
									<?php echo $this->session->userdata("cpl")["first_name"] . '' . $this->session->userdata("cpl")["last_name"];; ?>
								</div>

							</div>

							<!--end: Head -->

							<!--begin: Navigation -->
							<div class="kt-notification">
								<a href="<?php echo base_url('admin/admin'); ?>"
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
									<a href="<?php echo base_url('admin/login/logout'); ?>"
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
					<?php  unset($_SESSION['message']); } ?>
					<?php if ($this->session->flashdata('exception') != null) { ?>
						<div class="alert alert-danger" role="alert">
							<div class="alert-text"><?php echo $this->session->flashdata('exception'); ?></div>
						</div>
					<?php  unset($_SESSION['exception']); } ?>
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
<script src="<?php echo base_url(''); ?>assets/js/pages/components/extended/sweetalert2.js" type="text/javascript"></script>

<!--end::Page Scripts -->
<script>
	$(".alert").delay(4000).slideUp(200, function () {
		$(this).alert('close');
	});
</script>
</body>

<!-- end::Body -->
</html>
