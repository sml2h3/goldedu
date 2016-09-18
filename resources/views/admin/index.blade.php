<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<meta name="description" content="金考卷 一站式试卷成型系统" />
	<meta name="author" content="ztone" />

	<title>金考卷</title>

	<link rel="stylesheet" href="{{asset('assets/css/fonts/linecons/css/linecons.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/fonts/fontawesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/xenon-core.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/xenon-forms.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/xenon-components.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/xenon-skins.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('assets/css/login.css')}}">
	<script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<style>
		:-webkit-autofill{
			box-shadow: 0 0 0 100px #fff inset;
		}
	</style>
	<!--[if lt IE 9]>
	<script src="//cdn.bootcss.com/html5shiv/r29/html5.min.js"></script>
	<script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->


</head>
<body class="page-body login-page login-light">

	
	<div class="login-container">
	
		<div class="row" style="display: flex;flex-wrap: wrap">
			<div class="col-sm-6 col-xs-12">

				<script type="text/javascript">
					jQuery(document).ready(function($)
					{
						// Reveal Login form
						setTimeout(function(){ $(".fade-in-effect").addClass('in'); }, 1);


						// Validation and Ajax action
						$("form#login").validate({
							rules: {
								username: {
									required: true
								},

								passwd: {
									required: true
								}
							},

							messages: {
								username: {
									required: '请输入用户名.'
								},

								passwd: {
									required: '请输入密码.'
								}
							},


							// Form Processing via AJAX

						});

						// Set Form focus
						$("form#login .form-group:has(.form-control):first .form-control").focus();
					});
				</script>

				<!-- Errors container -->
				<div class="errors-container">


				</div>

				<!-- Add class "fade-in-effect" for login form effect -->
				<form method="post" role="form" action="login" method="post" id="login" class="login-form fade-in-effect">

					<div class="login-header">
						<a href="dashboard-1.html" class="logo">
							<img src="{{asset('assets/images/logo.png')}}" alt="" width="130" />
						</a>

						<p>输入用户名及密码来使用金考卷系统</p>
					</div>

					{{csrf_field()}}
					<div class="form-group">
						<label class="control-label" for="username">用户名</label>
						<input type="text" class="form-control" name="username" id="username" autocomplete="off" />
					</div>

					<div class="form-group">
						<label class="control-label" for="passwd">密码</label>
						<input type="password" class="form-control" name="password" id="passwd" autocomplete="off" />
					</div>

					<div class="form-group">
						<button type="submit" class="btn btn-primary  btn-block text-left">
							<i class="fa-lock"></i>
							登录
						</button>
					</div>

					<div class="login-footer">
						<a href="#">忘记密码?</a>

						<div class="info-links">
							<a href="#">隐私协议</a>
						</div>

					</div>

				</form>

				<!-- External login -->


			</div>

			<div class="col-sm-6 login-logo hidden-xs">
				<img src="{{asset('assets/images/login-logo.png')}}" alt="">
			</div>
		</div>
	</div>



	<!-- Bottom Scripts -->
	<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('assets/js/TweenMax.min.js')}}"></script>
	<script src="{{asset('assets/js/resizeable.js')}}"></script>
	<script src="{{asset('assets/js/joinable.js')}}"></script>
	<script src="{{asset('assets/js/xenon-api.js')}}"></script>
	<script src="{{asset('assets/js/xenon-toggles.js')}}"></script>
	<script src="{{asset('assets/js/jquery-validate/jquery.validate.min.js')}}"></script>
	<script src="{{asset('assets/js/toastr/toastr.min.js')}}"></script>


	<!-- JavaScripts initializations and stuff -->
	<script src="{{asset('assets/js/xenon-custom.js')}}"></script>

</body>
</html>