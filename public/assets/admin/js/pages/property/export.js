$(document).ready(function(){
    $('#export-excel').click(function (){
        var url = $(this).data('url');
        var _token = $('meta[name="csrf-token"]').attr('content');
        var property_type_id = $('#property_type_id').val();
        var property_status_id = $('#property_status_id').val();
        var property_category_id = $('#property_category_id').val();
        var furniture_type_id = $('#furniture_type_id').val();
        var city_id = $('#city_id').val();
        $.ajax({
            url:url,
            method:"POST",
            data:{
                _token:_token,
                export:true,
                property_type_id:property_type_id,
                property_status_id:property_status_id,
                property_category_id:property_category_id,
                furniture_type_id:furniture_type_id,
                city_id:city_id
            },
            success:function(result)
            {
                const url = window.URL.createObjectURL(new Blob([result.data]));
                const link = document.createElement('a');
                link.setAttribute('download', 'file.pdf');
                document.body.appendChild(link);
                link.click();
            },
            error:function (result){
                console.log(result)
            }

        })
    });
});
