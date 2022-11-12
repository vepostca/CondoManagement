var TableDatatablesButtons = function () {
    var initTable = function () {
        var table = $('#index_datatable').DataTable();

        //var oTable = table.dataTable();

        // handle datatable custom tools
        $('#datatable_index_tools > li > a.tool-action').on('click', function() {
            var action = $(this).attr('data-action');
            table.button(action).trigger();
        });
    }
    return {

        //main function to initiate the module
        init: function () {

            if (!jQuery().dataTable) {
                return;
            }
            initTable();
        }
    };
}();

jQuery(document).ready(function() {
    TableDatatablesButtons.init();
});