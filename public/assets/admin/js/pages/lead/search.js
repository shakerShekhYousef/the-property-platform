$(document).ready(function(){

    $('#country_id').change(function(){
        if($(this).val() != '')
        {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var url = $("#search-url").data('url')
            var _token = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url:url,
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                    $('#city_id').html(result);
                }

            })
        }
    });
    $('#country_id').change(function(){
        $('#city_id').val('');
    });
});
