{{-- <x-guest-layout> --}}
    <!DOCTYPE html>
    <html lang="en" dir="rtl">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Home</title>
        <link rel="stylesheet" href="{{ asset('assets/styles/style.min.css') }}">

        <!-- Waves Effect -->
        <link rel="stylesheet" href="{{ asset('assets/plugin/waves/waves.min.css') }}">

        <!-- RTL -->
        <link rel="stylesheet" href="{{ asset('assets/styles/style-rtl.min.css') }}">
    </head>

    <body>
        <div id="single-wrapper">
        <div class="frm-single">
        <form method="POST" action="{{ route('verification.send') }}" >
            @csrf
            <div class="inside">
                <div class="title"><strong>Ninja</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Confirm Email</div>
                <!-- /.frm-title -->
                <p class="text-center">A email has been send Please check for an email from company and click on the included link to verfication email.</p>
                <button type="submit" class="frm-submit">Send Email<i class="fa fa-arrow-circle-right"></i></button>
                <!-- /.footer -->
            </div>
            <!-- .inside -->
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <div class="inside">
                <button type="submit" class="frm-submit">Logout<i class="fa fa-sign-in"></i></button>
                <div class="frm-footer">NinjaAdmin © 2016.</div>
            </div>
        </form>
    </div>
    </div><!--/#single-wrapper -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="assets/script/html5shiv.min.js"></script>
    <script src="assets/script/respond.min.js"></script>
<![endif]-->
    <!--
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('assets/scripts/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/scripts/modernizr.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugin/nprogress/nprogress.js') }}"></script>
    <script src="{{ asset('assets/plugin/waves/waves.min.js') }}"></script>

    <script src="{{ asset('assets/scripts/main.min.js') }}"></script>
</body>

</html>
