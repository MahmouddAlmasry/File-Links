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
            <form method="POST" action="{{ route('password.store') }}" class="frm-single">
                @csrf
                <div class="inside">
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="title"><strong>Ninja</strong>Admin</div>
                <!-- /.title -->
                <div class="frm-title">Reset Password</div>
                <!-- /.frm-title -->

                <!-- Email Address -->
                <div class="frm-input">
                    <input type="email" name="email" value="{{ old('email', $request->email) }}" placeholder="Email"
                        class="frm-inp">
                    <i class="fa fa-envelope frm-ico"></i>
                    @error('email')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="frm-input">
                    <input type="password" name="password" placeholder="New Password" class="frm-inp">
                    <i class="fa fa-lock frm-ico"></i>
                    @error('password')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="frm-input">
                    <input type="password" name="password_confirmation" placeholder=" Confirm Password" class="frm-inp">
                    <i class="fa fa-lock frm-ico"></i>
                    @error('password_confirmation')
                        <div>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="frm-submit">Reset Password<i class="fa fa-arrow-circle-right"></i></button>
            </div>
            </form>
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
