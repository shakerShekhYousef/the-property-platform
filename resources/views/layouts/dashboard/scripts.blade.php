<!-- JAVASCRIPT -->
<script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
<script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

<!-- Peity JS -->
<script src="{{ asset('assets/libs/peity/jquery.peity.min.js') }}"></script>

<script src="{{ asset('assets/libs/morris.js/morris.min.js') }}}"></script>

<script src="{{ asset('assets/libs/raphael/raphael.min.js') }}"></script>

<!-- Dashboard init JS -->
<script src="{{ asset('assets/js/pages/dashboard.init.js') }}"></script>

<!-- App js -->
<script src="{{ asset('assets/js/app.js') }}"></script>
<!-- jquery-validation -->
<script src="{{asset('assets/js/pages/jquery-validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('assets/js/pages/jquery-validation/additional-methods.min.js')}}"></script>
<script>
    $('#languageDropdown li').on('click', function() {
        $('#changeLanguageDropdown').html($(this).text() + '<i class="mdi mdi-chevron-down"></i>');
        if ($(this).text() == "EN") {
            sessionStorage.setItem("curr_language", "EN");
            window.location.href = "{{ route('home','en') }}";
        } else if ($(this).text() == "FR") {
            sessionStorage.setItem("curr_language", "FR");
            window.location.href = "{{ route('home','fr') }}";
        }
        else if ($(this).text() == "AR") {
            sessionStorage.setItem("curr_language", "AR");
            window.location.href = "{{ route('home','ar') }}";
        }
    });
</script>

<script>
    $(document).ready(function() {
        if (sessionStorage.getItem('curr_language') == "EN") {
            $('#changeLanguageDropdown').html("EN" + '<i class="mdi mdi-chevron-down"></i>');
            $("#bootstrap-style").attr("href", "public/assets/css/bootstrap.min.css");
            $("#app-style").attr("href", "public/assets/css/app.min.css");
            $("html").attr("dir", "ltr");
            sessionStorage.setItem("curr_language", "EN");
        } else if (sessionStorage.getItem('curr_language') == "FR") {
            $('#changeLanguageDropdown').html("FR" + '<i class="mdi mdi-chevron-down"></i>');
            $("#bootstrap-style").attr("href", "public/assets/css/bootstrap.min.css");
            $("#app-style").attr("href", "public/assets/css/app.min.css");
            $("html").attr("dir", "ltr");
            sessionStorage.setItem("curr_language", "FR");
        }
        else if (sessionStorage.getItem('curr_language') == "AR") {
            $('#changeLanguageDropdown').html("AR" + '<i class="mdi mdi-chevron-down"></i>');
            $("#bootstrap-style").attr("href", "public/assets/css/bootstrap-rtl.min.css");
            $("#app-style").attr("href", "public/assets/css/app-rtl.min.css");
            $("html").attr("dir", "rtl");
            sessionStorage.setItem("curr_language", "AR");
        } else {
            $('#changeLanguageDropdown').html("EN" + '<i class="mdi mdi-chevron-down"></i>');
            $("#bootstrap-style").attr("href", "public/assets/css/bootstrap.min.css");
            $("#app-style").attr("href", "public/assets/css/app.min.css");
            $("html").attr("dir", "ltr");
            sessionStorage.setItem("curr_language", "EN");
        }
        $('html').attr('hidden',false);
    });
</script>
