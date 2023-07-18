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
                d.city_id = $('#city_id').val()
                d.country_id = $('#country_id').val()
                d.user_id = $('#user_id').val()
                d.entry_user_id = $('#entry_user_id').val()
                d.creation_date = $('#creation_date').val()
                d.lead_source_id = $('#lead_source_id').val()
                d.start_date = $('#start_date').val()
                d.end_date = $('#end_date').val()
                d.status_id = $('#status_id').val()
                d.project_id = $('#project_id').val()
                d.has_comment = $('#has_comment').val()
                d.campaign_id = $('#campaign_id').val()
                d.campaign_utm_source_id = $('#campaign_utm_source_id').val()
                d.campaign_utm_medium_id = $('#campaign_utm_medium_id').val()
                d.campaign_utm_campaign_id = $('#campaign_utm_campaign_id').val()
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
            {"data": "additional_mobile_number",'name':'additional_mobile_number'},
            {"data": "campaign",'name':'campaign.name'},
            {"data": "campaign_utm_source",'name':'campaign_utm_source.name'},
            {"data": "campaign_utm_medium",'name':'campaign_utm_medium.name'},
            {"data": "campaign_utm_campaign",'name':'campaign_utm_campaign.name'},
            {"data": "user",'name':'user.name'},
            {"data": "entryUser",'name':'entryUser.name'},
            {"data": "leadSource",'name':'leadSource.name'},
            {"data": "leadProject",'name':'leadProject.name'},
            {"data": "creation_date",'name':'creation_date'},
            {"data": "leadStatus",'name':'leadStatus.name'},
            {"data": "leadType",'name':'leadType.name'},
            {"data": "comment",'name':'comment'},
            {"data": "action",'name':'action'},
        ],
    });
    
    $('.filter-select').change(function(){
        table.draw();
    });
})(jQuery)

