<?php
#this is Login form page , if user is already logged in then we will not allow user to access this page by executing isset($_SESSION["uid"])
#if below statment return true then we will send user to their profile.php page
//in action.php page if user click on "ready to checkout" button that time we will pass data in a form from action.php page
if (isset($_POST["login_user_with_product"])) {
	//this is product list array
	$product_list = $_POST["product_id"];
	//here we are converting array into json format because array cannot be store in cookie
	$json_e = json_encode($product_list);
	//here we are creating cookie and name of cookie is product_list
	setcookie("product_list", $json_e, strtotime("+1 day"), "/", "", "", TRUE);
}
?>

<style>
	.modal-login-form {
		padding: 0;
		margin: 0;
	}

	.login-form-container {
		background: transparent;
		padding: 32px 24px;
		border-radius: 0;
		margin: 0;
	}

	.login-form-title {
		text-align: center;
		margin-bottom: 32px;
	}

	.login-form-title h2 {
		color: #f0f6fc;
		font-size: 28px;
		font-weight: 600;
		margin-bottom: 8px;
	}

	.login-form-subtitle {
		color: #8b949e;
		font-size: 14px;
		margin-top: 8px;
	}

	.login-form-group {
		margin-bottom: 20px;
		position: relative;
		animation: fadeInUp 0.6s ease-out;
		animation-fill-mode: both;
	}

	.login-form-group:nth-child(2) {
		animation-delay: 0.1s;
	}

	.login-form-group:nth-child(3) {
		animation-delay: 0.2s;
	}

	.login-form-group:nth-child(4) {
		animation-delay: 0.3s;
	}

	.login-form-group label {
		display: block;
		color: #f0f6fc;
		font-size: 14px;
		font-weight: 600;
		margin-bottom: 6px;
	}

	.login-form-control {
		width: 100%;
		padding: 12px 16px;
		font-size: 14px;
		line-height: 1.45;
		color: #e6edf3;
		background-color: #0d1117;
		border: 1px solid #30363d;
		border-radius: 6px;
		transition: all 0.15s ease-in-out;
		box-sizing: border-box;
		font-family: inherit;
	}

	.login-form-control:focus {
		border-color: #58a6ff;
		outline: none;
		box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.12);
		background-color: #0d1117;
	}

	.login-form-control:hover {
		border-color: #8b949e;
	}

	.login-form-control::placeholder {
		color: #7d8590;
	}

	.login-btn-primary {
		width: 100%;
		padding: 12px 16px;
		font-size: 14px;
		font-weight: 500;
		line-height: 1.5;
		color: #ffffff;
		background: linear-gradient(135deg, #238636 0%, #2ea043 100%);
		border: 1px solid transparent;
		border-radius: 6px;
		cursor: pointer;
		transition: all 0.15s ease-in-out;
		font-family: inherit;
		position: relative;
		overflow: hidden;
		margin-top: 16px;
	}

	.login-btn-primary:hover {
		background: linear-gradient(135deg, #2ea043 0%, #238636 100%);
		transform: translateY(-1px);
		box-shadow: 0 8px 24px rgba(46, 160, 67, 0.35);
	}

	.login-btn-primary:active {
		transform: translateY(0);
		box-shadow: 0 4px 12px rgba(46, 160, 67, 0.35);
	}

	.login-forgot-password {
		text-align: center;
		margin: 16px 0;
	}

	.login-forgot-password a {
		color: #58a6ff;
		text-decoration: none;
		font-size: 14px;
		transition: color 0.15s ease-in-out;
	}

	.login-forgot-password a:hover {
		color: #79c0ff;
		text-decoration: underline;
	}

	.login-form-toggle {
		text-align: center;
		margin-top: 24px;
		padding-top: 24px;
		border-top: 1px solid #30363d;
	}

	.login-form-toggle a {
		color: #58a6ff;
		text-decoration: none;
		font-size: 14px;
		transition: color 0.15s ease-in-out;
		cursor: pointer;
	}

	.login-form-toggle a:hover {
		color: #79c0ff;
		text-decoration: underline;
	}

	.login-error-msg {
		margin-top: 16px;
	}

	.login-alert-danger {
		background-color: #490202;
		border: 1px solid #da3633;
		color: #f85149;
		padding: 12px 16px;
		border-radius: 6px;
		margin: 16px 0 0 0;
		display: none;
	}

	.login-alert-danger h4 {
		margin: 0;
		font-size: 14px;
		font-weight: 500;
	}

	.login-overlay {
		position: fixed;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: rgba(13, 17, 23, 0.9);
		display: none;
		z-index: 10000;
		align-items: center;
		justify-content: center;
	}

	.login-loader {
		width: 40px;
		height: 40px;
		border: 3px solid #30363d;
		border-top: 3px solid #58a6ff;
		border-radius: 50%;
		animation: spin 1s linear infinite;
	}

	@keyframes fadeInUp {
		from {
			opacity: 0;
			transform: translateY(20px);
		}

		to {
			opacity: 1;
			transform: translateY(0);
		}
	}

	@keyframes spin {
		0% {
			transform: rotate(0deg);
		}

		100% {
			transform: rotate(360deg);
		}
	}
</style>

<div class="login-overlay">
	<div class="login-loader"></div>
</div>

<div class="modal-login-form">
	<form onsubmit="return false" id="login" class="login-form-container">
		<div class="login-form-title">
			<h2>Welcome Back</h2>
			<div class="login-form-subtitle">Sign in to your account</div>
		</div>

		<div class="login-form-group">
			<label for="login_email">Email</label>
			<input class="login-form-control" type="email" name="email" placeholder="Enter your email" id="login_email"
				required>
		</div>

		<div class="login-form-group">
			<label for="login_password">Password</label>
			<input class="login-form-control" type="password" name="password" placeholder="Enter your password"
				id="login_password" required>
		</div>

		<div class="login-forgot-password">
			<a href="#" id="forgot_password_link">Forgot password?</a>
		</div>

		<input class="login-btn-primary" type="submit" value="Sign In">

		<div class="login-error-msg">
			<div class="login-alert-danger">
				<h4 id="e_msg"></h4>
			</div>
		</div>

		<div class="login-form-toggle">
			<a href="#" data-toggle="modal" data-target="#Modal_register" data-dismiss="modal">
				Don't have an account? <strong>Sign up</strong>
			</a>
		</div>
	</form>
</div>