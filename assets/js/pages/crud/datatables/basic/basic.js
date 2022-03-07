"use strict";
var KTDatatablesBasicBasic = function () {

	var initTable1 = function () {
		var table = $('#tournament_table');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			pageLength: 25,
			paging: false,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
			],

			buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
			],
		});

		table.on('change', '.kt-group-checkable', function () {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function () {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				} else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function () {
			$(this).parents('tr').toggleClass('active');
		});
	};

	var accepted_table = function () {
		var table = $('#accepted_table');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			pageLength: 25,
			paging: false,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
			],

			buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
			],
		});

		table.on('change', '.kt-group-checkable', function () {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function () {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				} else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function () {
			$(this).parents('tr').toggleClass('active');
		});
	};

	var sent_table = function () {
		var table = $('#sent_table');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			pageLength: 25,
			paging: false,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
			],

			buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [1, 2, 3]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
			],
		});

		table.on('change', '.kt-group-checkable', function () {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function () {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				} else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function () {
			$(this).parents('tr').toggleClass('active');
		});
	};

	var initTable2 = function () {
		var table = $('#player_table');

		// begin first table
		table.DataTable({
			responsive: true,

			// DOM Layout settings
			dom: `<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,

			lengthMenu: [5, 10, 25, 50],
			paging: false,
			pageLength: 25,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
			],
		});

		table.on('change', '.kt-group-checkable', function () {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function () {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				} else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function () {
			$(this).parents('tr').toggleClass('active');
		});
	};

	var initTable3 = function () {
		var table = $('#teams_table');

		// begin first table
		table.DataTable({
			responsive: true,

			dom: `<'row'<'col-sm-6 text-left'f><'col-sm-6 text-right'B>>
			<'row'<'col-sm-12'tr>>
			<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
			lengthMenu: [5, 10, 25, 50],
			paging: true,
			pageLength: 25,

			language: {
				'lengthMenu': 'Display _MENU_',
			},

			// Order settings
			order: [[1, 'desc']],

			headerCallback: function (thead, data, start, end, display) {
				thead.getElementsByTagName('th')[0].innerHTML = `
                    <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                        <input type="checkbox" value="" class="kt-group-checkable">
                        <span></span>
                    </label>`;
			},

			columnDefs: [
				{
					targets: 0,
					width: '30px',
					className: 'dt-right',
					orderable: false,
					render: function (data, type, full, meta) {
						return `
                        <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                            <input type="checkbox" value="" class="kt-checkable">
                            <span></span>
                        </label>`;
					},
				},
			],
			buttons: [
				{
					extend: 'print',
					exportOptions: {
						columns: [1, 2, 3, 4]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'excelHtml5',
					exportOptions: {
						columns: [1, 2, 3, 4]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
				{
					extend: 'pdfHtml5',
					exportOptions: {
						columns: [1, 2, 3, 4]
					},
					className: 'btn btn-sm btn-outline-secondary',
				},
			],
		});

		table.on('change', '.kt-group-checkable', function () {
			var set = $(this).closest('table').find('td:first-child .kt-checkable');
			var checked = $(this).is(':checked');

			$(set).each(function () {
				if (checked) {
					$(this).prop('checked', true);
					$(this).closest('tr').addClass('active');
				} else {
					$(this).prop('checked', false);
					$(this).closest('tr').removeClass('active');
				}
			});
		});

		table.on('change', 'tbody tr .kt-checkbox', function () {
			$(this).parents('tr').toggleClass('active');
		});
	};


	return {

		//main function to initiate the module
		init: function () {
			initTable1();
			initTable2();
			initTable3();
			accepted_table();
			sent_table();
		},
	};
}();

jQuery(document).ready(function () {
	KTDatatablesBasicBasic.init();
});
