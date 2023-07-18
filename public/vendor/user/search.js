$(document).ready(function(){

    $('#role_id').change(function(){
        if($(this).val() != '')
        {
            var select = $(this).attr("id");
            var value = $(this).val();
            var dependent = $(this).data('dependent');
            var url = $("#search-url").data('url')
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:url,
                method:"POST",
                data:{select:select, value:value, _token:_token, dependent:dependent},
                success:function(result)
                {
                    $('#role_id').html(result);
                }

            })
        }
    });
    $('#role_id').change(function(){
        $('#role_id').val('');
    });
});
