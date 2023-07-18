$(document).ready(function (){
    $(document).on('click','#remove_inventory',function (){
        var url =  $(this).data("url");
        var id = $(this).data("id");
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: url,
            data: {id: id,_token:_token},
            success: function (data) {
                console.log('success')
            }
        });
    });
    $(document).on('click','#remove_property',function (){
        var url =  $(this).data("url");
        var id = $(this).data("id");
        var _token = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type: "POST",
            url: url,
            data: {id: id,_token:_token},
            success: function (data) {
                console.log('success')
            }
        });
    });
});
