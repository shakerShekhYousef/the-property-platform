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
                d.property_id = $('#property_id').val()
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
            {"data": "email",'name':'email'},
            {"data": "mobile_number",'name':'mobile_number'},
            {"data": "nationality",'name':'nationality'},
            {"data": "state",'name':'state'},
            {"data": "address1",'name':'address1'},
            {"data": "address2",'name':'address2'},
            {"data": "postcode",'name':'postcode'},
            {"data": "city",'name':'city.name'},
            {"data": "property",'name':'property.name'},
            {"data": "action",'name':'action'}
        ]
    });
    $('.filter-select').change(function(){
        table.draw();
    });
})(jQuery)

