<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha256-3blsJd4Hli/7wCQ+bmgXfOdK7p/ZUMtPXY08jmxSSgk=" crossorigin="anonymous"></script>
<script>
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };
    @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
    @endif
    @if(Session::has('info'))
    toastr.info("{{ Session::get('info') }}");
    @endif
    @if(Session::has('warning'))
    toastr.warning("{{ Session::get('warning') }}");
    @endif
    // @if(Session::has('error'))
    // toastr.error("{{ Session::get('error') }}");
    //         @endif
    //         @if ($errors->any())
    // var html ='<ul>';
    // @foreach ($errors->all() as $error)
    //     html +='<li>{{ $error }}</li>';
    // @endforeach
    //     html +=' </ul>';
    // toastr.error(html);
    // @endif
</script>
