<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('user/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('user/lib/owlcarousel/owl.carousel.min.js')}}"></script>

<!-- Contact Javascript File -->
<script src="{{asset('user/mail/jqBootstrapValidation.min.js')}}"></script>
<script src="{{asset('user/mail/contact.js')}}"></script>

<!-- Template Javascript -->
<script src="{{asset('user/js/main.js')}}"></script>

<!-- JavaScript alertify js -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

{{--<script>--}}
{{--    window.addEventListener('wishlistError', event => {--}}

{{--        alertify.set('notifier','position', 'top-right');--}}
{{--        alertify.success(event.detail.text);--}}

{{--    });--}}
{{--</script>--}}

@stack('script')

