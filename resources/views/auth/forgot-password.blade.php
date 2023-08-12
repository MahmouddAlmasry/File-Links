<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home</title>
	<link rel="stylesheet" href="{{asset('assets/styles/style.min.css')}}">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="{{asset('assets/plugin/waves/waves.min.css')}}">

	<!-- RTL -->
	<link rel="stylesheet" href="{{asset('assets/styles/style-rtl.min.css')}}">
</head>

<body>
    <div id="single-wrapper">

    <form method="POST" action="{{ route('password.email') }}" class="frm-single">
        @csrf

        <div class="inside">
			<div class="title"><strong>Ninja</strong>Admin</div>
			<!-- /.title -->
			<div class="frm-title">Reset Password</div>
			<!-- /.frm-title -->
			<p class="text-center">Enter your email address and we'll send you an email with instructions to reset your password.</p>
			<div class="frm-input"><input type="email" name="email" value="{{old('email')}}" placeholder="Enter Email" class="frm-inp"><i class="fa fa-envelope frm-ico"></i>
                @error('email')
                    <div>
                        {{ $message }}
                    </div>
                @enderror
            </div>
			<!-- /.frm-input -->
			<button type="submit" class="frm-submit">Send Email<i class="fa fa-arrow-circle-right"></i></button>
			<a href="{{route('login')}}" class="a-link"><i class="fa fa-sign-in"></i>Already have account? Login.</a>
			<div class="frm-footer">NinjaAdmin © 2016.</div>
			<!-- /.footer -->
		</div>
		<!-- .inside -->
    </form>
</div><!--/#single-wrapper -->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{asset('assets/scripts/jquery.min.js')}}"></script>
	<script src="{{asset('assets/scripts/modernizr.min.js')}}"></script>
	<script src="{{asset('assets/plugin/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/plugin/nprogress/nprogress.js')}}"></script>
	<script src="{{asset('assets/plugin/waves/waves.min.js')}}"></script>

	<script src="{{asset('assets/scripts/main.min.js')}}"></script>
</body>
</html>
