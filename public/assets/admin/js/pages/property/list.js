(function ($) {
    "use strict";
    let table = $('#datatable').DataTable({
        serverSide: true,
        scrollY: 500,
        scrollX: true,
        scrollCollapse: true,
        processing: true,
        "ordering": false,
        pageLength: 10,
        ajax:{
            url:$('#table-url').data("url"),
            data:function (d){
                d.property_type_id = $('#property_type_id').val()
                d.furniture_type_id = $('#furniture_type_id').val()
                d.property_category_id = $('#property_category_id').val()
                d.property_status_id = $('#property_status_id').val()
                d.city_id = $('#city_id').val()
                d.search = $('input[type="search"]').val()

            }
        },
        order:[0,'asc'],
        autoWidth: false,
        language: {
            paginate: {
                next: 'Next &#8250;',
                previous: '&#8249; Previous'
            }
        },
        columns: [
            {"data": 'checkbox', "name": 'checkbox', "orderable": false, "searchable": false},
            {"data": "name","name": 'name'},
            {"data": "makani_number",'name':'makani_number'},
            {"data": "p-number",'name':'p-number'},
            {"data": "price",'name':'price'},
            {"data": "payment_frequency",'name':'payment_frequency.name'},
            {"data": "property_type",'name':'property_type.name'},
            {"data": "furniture_type",'name':'furniture_type.name'},
            {"data": "property_category",'name':'property_category'},
            {"data": "property_status",'name':'property_status.name'},
            {"data": "landlord",'name':'landlord.name'},
            {"data": "action",'name':'action'}
        ]
    });
    $('.filter-select').change(function(){
        table.draw();
    });
})(jQuery)

