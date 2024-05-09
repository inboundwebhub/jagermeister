@extends('layouts.app')
@section('content')
 <img src="{{ asset('images/bg1.jpg') }}" id="bg" alt="">
@endsection
@push('style-lib')
    <link href="{{ asset('css1.css') }}" rel="stylesheet" type="text/css"/>
@endpush

@push('script-lib')
<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
<script>
    WebFont.load({
        custom: {
            families: ["Meister-Bold"]
        }
    });
</script>
 <!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
});
 function deleteCookie(typeData) {
    $.ajax({
        url: '{{ route("delete.cookie") }}',
        type: 'DELETE',
        data: {typeData: typeData},
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(response) {
            console.log(response.message);
            // Additional actions after deleting the cookie
        },
        error: function(xhr, status, error) {
            console.log('An error occurred while deleting the cookie.');
            console.error(xhr.responseText);
        }
    });
}
</script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-LH9YW40F88');
</script>
<script type="text/javascript" src="{{ asset('js/lib/phaser.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/code.js') }}"></script>
@endpush