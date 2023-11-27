<!DOCTYPE html>
<html lang="en">

@include('user.inc.head')

<body>

@include('user.inc.header')

@include('user.inc.navbar')

@yield('content')

<!-- Footer Start -->
@include('user.inc.footer')
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


@include('user.inc.script')
</body>

</html>
