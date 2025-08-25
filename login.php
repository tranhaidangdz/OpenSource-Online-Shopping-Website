<?php
include "db.php";
session_start();

if (isset($_POST["email"]) && isset($_POST["password"])) {
	$email = mysqli_real_escape_string($con, $_POST["email"]);
	$password = $_POST["password"];
	$ip_add = getenv("REMOTE_ADDR");

	// --- check user normal ---
	$sql = "SELECT * FROM user_info WHERE email = '$email' AND password = '$password'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);

	if ($count == 1) {
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"]  = $row["user_id"];
		$_SESSION["name"] = $row["first_name"];

		// Nếu có cookie product_list (khi login từ trang checkout)
		if (isset($_COOKIE["product_list"])) {
			$p_list = stripcslashes($_COOKIE["product_list"]);
			$product_list = json_decode($p_list, true);

			for ($i = 0; $i < count($product_list); $i++) {
				$p_id = $product_list[$i];
				$verify_cart = "SELECT id FROM cart WHERE user_id = {$_SESSION['uid']} AND p_id = $p_id";
				$result = mysqli_query($con, $verify_cart);

				if (mysqli_num_rows($result) < 1) {
					$update_cart = "UPDATE cart SET user_id = '{$_SESSION['uid']}' WHERE ip_add = '$ip_add' AND user_id = -1 AND p_id = $p_id";
					mysqli_query($con, $update_cart);
				} else {
					$delete_existing_product = "DELETE FROM cart WHERE user_id = -1 AND ip_add = '$ip_add' AND p_id = $p_id";
					mysqli_query($con, $delete_existing_product);
				}
			}

			setcookie("product_list", "", time() - 3600, "/");
			echo "cart_login";
			exit();
		}

		echo "login_success";
		exit();
	}

	// --- check admin ---
	$password_md5 = md5($_POST["password"]);
	$sql = "SELECT * FROM admin_info WHERE admin_email = '$email' AND admin_password = '$password_md5'";
	$run_query = mysqli_query($con, $sql);
	$count = mysqli_num_rows($run_query);

	if ($count == 1) {
		$row = mysqli_fetch_array($run_query);
		$_SESSION["uid"]  = $row["admin_id"];
		$_SESSION["name"] = $row["admin_name"];

		echo "admin_login";
		exit();
	}

	// --- nếu sai ---
	echo "<span style='color:red;'>Invalid Email or Password!</span>";
	exit();
}
