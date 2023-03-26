// npm package: datatables.net-bs5
// github link: https://github.com/DataTables/Dist-DataTables-Bootstrap5

$(function() {
  'use strict';

  $(function() {


    $('#dataTableMember').DataTable({
      "aLengthMenu": [
        [10, 30, 50, -1],
        [10, 30, 50, "All"]
      ],

      "iDisplayLength": 10,
      "language": {
        search: ""
      }
    });

    $('#dataTableMember').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });

    $('#ScrolldataTableMember').DataTable({
      rowReorder: true,
      "scrollY": 400, 
      "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
      "paging": false,//Dont want paging                
      "bPaginate": false,//Dont want paging 
      "language": {
        search: ""
      }

    });

    $('#ScrolldataTableMember').each(function() {
      var datatable = $(this);
      // SEARCH - Add the placeholder for Search and Turn this into in-line form control
      var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
      search_input.attr('placeholder', 'Search');
      search_input.removeClass('form-control-sm');
      // LENGTH - Inline-Form control
      var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
      length_sel.removeClass('form-control-sm');
    });





  });

  
});