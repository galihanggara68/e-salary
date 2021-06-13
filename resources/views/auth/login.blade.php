<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login | Techpolitan</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('frontend/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animate/animate.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/css-hamburgers/hamburgers.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/animsition/css/animsition.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/vendor/daterangepicker/daterangepicker.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('{{ asset('frontend/images/bg-01.jpg') }}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Login
				</span>
				<form class="login100-form validate-form p-b-33 p-t-5" method="POST" action="{{ route('login') }}">
                    @csrf
					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input type="text" placeholder="Email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                        <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror   

					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100  @error('password') is-invalid @enderror" type="password" required name="password" placeholder="Password">
                        <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    {{-- <div class="wrap-input100">
                        <div class="col-md-6 offset-md-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                    </div> --}}

					<div class="container-login100-form-btn m-t-32">
						<button class="login100-form-btn">
                            {{ __('Login') }}
                        </button>
					</div>
                    
                    <div class="container-login100-form-btn">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
					</div>
                    
                    <div class="container-login100-form-btn m-t-32">
                        <span>Belum Punya akun? 
                            <a class="btn btn-link" href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a></span>
					</div>

				</form>
				
				$data = mysqli_fetch_assoc($login);
 
 // cek jika user login sebagai admin
 if($data['level']=="admin"){
	 // buat session login dan username
	 $_SESSION['username'] = $username;
	 $_SESSION['level'] = "admin";
	 // alihkan ke halaman dashboard admin
	 header("location:halaman_admin.php");
  
 // cek jika user login sebagai pegawai
 }else if($data['level']=="pegawai"){
	 // buat session login dan username
	 $_SESSION['username'] = $username;
	 $_SESSION['level'] = "pegawai";
	 // alihkan ke halaman dashboard pegawai
	 header("location:halaman_pegawai.php");
  
 // cek jika user login sebagai pengurus
 }else if($data['level']=="pengurus"){
	 // buat session login dan username
	 $_SESSION['username'] = $username;
	 $_SESSION['level'] = "pengurus";
	 // alihkan ke halaman dashboard pengurus
	 header("location:halaman_pengurus.php");
  
 }else{
  
	 // alihkan ke halaman login kembali
	 header("location:index.php?pesan=gagal");
 }
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/animsition/js/animsition.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/daterangepicker/moment.min.js') }}"></script>
	<script src="{{ asset('frontend/vendor/daterangepicker/daterangepicker.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('frontend/vendor/countdowntime/countdowntime.js') }}"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>