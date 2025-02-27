<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
	<title>Syndash - Bootstrap4 Admin Template</title>
	<!--favicon-->
	<link rel="icon" href="{{asset('assets')}}/images/favicon-32x32.png" type="image/png" />
	<!-- loader-->
	<link href="{{asset('assets')}}/css/pace.min.css" rel="stylesheet" />
	<script src="{{asset('assets')}}/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css" />
	<!-- Icons CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/icons.css" />
	<!-- App CSS -->
	<link rel="stylesheet" href="{{asset('assets')}}/css/app.css" />
</head>

<body class="bg-login">
	<!-- wrapper -->
	<div class="wrapper">
		<div class="section-authentication-login d-flex align-items-center justify-content-center">
			<div class="row">
				<div class="col-12 col-lg-10 mx-auto">
					<div class="card radius-15">
						<div class="row no-gutters">
							<div class="col-lg-6">
								<div class="card-body p-md-5">
                                    <form action="{{url('admin/login')}}" method="POST">
                                        @csrf
                                        <div class="text-center">
                                            <img src="{{asset('assets')}}/images/logo-icon.png" width="80" alt="">
                                            <h3 class="mt-4 font-weight-bold">Welcome Back</h3>
                                        </div>
                                        {{-- <div class="input-group shadow-sm rounded mt-5">
                                            <div class="input-group-prepend">	<span class="input-group-text bg-transparent border-0 cursor-pointer"><img src="{{asset('assets')}}/images/icons/search.svg" alt="" width="16"></span>
                                            </div>
                                            <input type="button" class="form-control  border-0" value="Log in with google">
                                        </div> --}}
                                        <div class="login-separater text-center"> <span> LOGIN WITH EMAIL</span>
                                            <hr/>
                                        </div>
                                        <div class="form-group mt-4">
                                            <label>User Name</label>
                                            <input type="text" name="username" @if (Cookie::has('adminUser')) value="{{Cookie::get('adminUser')}}" @endif class="form-control" placeholder="Enter your User Name" />
                                            @error('username')
                                                <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" @if (Cookie::has('adminPassword')) value="{{Cookie::get('adminPassword')}}" @endif name="password" class="form-control" placeholder="Enter your password" />
                                            @error('password')
                                                <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" @if (Cookie::has('adminUser')) checked @endif name="rememberMe" class="custom-control-input" id="customSwitch1" checked>
                                                    <label class="custom-control-label" for="customSwitch1">Remember Me</label>
                                                </div>
                                            </div>
                                            <div class="form-group col text-right"> <a href="authentication-forgot-password.html"><i class='bx bxs-key mr-2'></i>Forget Password?</a>
                                            </div>
                                        </div>
                                        <div class="btn-group mt-3 w-100">
                                            {{-- <button type="button" class="btn btn-primary btn-block">Log In</button>
                                            <button type="button" class="btn btn-primary"><i class="lni lni-arrow-right"></i>
                                            </button> --}}
                                            <input type="submit" class="btn btn-primary" value="Log In">
                                        </div>
                                        <hr>
                                        {{-- <div class="text-center">
                                            <p class="mb-0">Don't have an account? <a href="authentication-register.html">Sign up</a>
                                            </p>
                                        </div> --}}
                                    </form>
                                    @if (Session::has('msg'))
                                        <span class="text-danger">{{Session('msg')}}</span>
                                    @endif
								</div>
							</div>
							<div class="col-lg-6">
								<img src="{{asset('assets')}}/images/login-images/login-frent-img.jpg" class="card-img login-img h-100" alt="...">
							</div>
						</div>
						<!--end row-->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end wrapper -->
</body>

</html>
