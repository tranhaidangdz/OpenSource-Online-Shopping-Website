<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>Online Shopping</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="css/slick.css" />
    <link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="css/style.css" />
    <link type="text/css" rel="stylesheet" href="css/accountbtn.css" />





    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
    <style>
        #navigation {
            background: #212830;
            /* GitHub light background */
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #212830);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #212830);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        #header {

            background: #2a313c;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #2a313c);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #2a313c);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        .header-logo .logo span p {
            display: inline-block !important;
            background: linear-gradient(90deg, #58a6ff, #3fb950, #f85149) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
            color: transparent !important;
            /* bắt buộc để thấy gradient */
            font-weight: 700 !important;
            font-size: 33px !important;
            font-family: sans-serif !important;
        }

        #top-header {


            background: #151b23;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, #151b23);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, #151b23);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        #footer {
            background: #212830;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, 212830);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, 212830);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


            color: #d8d8d8ff;
        }

        #bottom-footer {
            background: #212830;
            /* fallback for old browsers */
            background: -webkit-linear-gradient(to right, 212830);
            /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(to right, 212830);
            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */


        }

        .footer-links li a {
            color: #d8d8d8ff;
        }

        .mainn-raised {

            margin: -7px 0px 0px;
            border-radius: 6px;
            box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0.14), 0 6px 30px 5px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2);

        }

        .glyphicon {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .glyphicon-chevron-left:before {
            content: "\f053"
        }

        .glyphicon-chevron-right:before {
            content: "\f054"
        }

        /* Navigation Styling */
        .navbar {
            background: rgba(13, 17, 23, 0.95);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid #30363d;
            padding: 12px 0;
            box-shadow: 0 1px 3px rgba(1, 4, 9, 0.12);
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .navbar-brand {
            color: #f0f6fc !important;
            font-weight: 600;
            font-size: 20px;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.15s ease-in-out;
        }

        .navbar-brand:hover {
            color: #58a6ff !important;
            transform: translateY(-1px);
        }

        .navbar-brand i {
            color: #58a6ff;
            font-size: 24px;
        }

        .navbar-nav .nav-link {
            color: #e6edf3 !important;
            font-weight: 500;
            padding: 8px 16px !important;
            border-radius: 6px;
            transition: all 0.15s ease-in-out;
            margin: 0 4px;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(88, 166, 255, 0.12);
            color: #58a6ff !important;
            transform: translateY(-1px);
        }

        .navbar-nav .nav-link.active {
            background-color: rgba(88, 166, 255, 0.2);
            color: #58a6ff !important;
        }

        /* Enhanced Modal Styling */
        .modal {
            backdrop-filter: blur(8px);
        }

        .modal-backdrop {
            background-color: rgba(1, 4, 9, 0.75);
        }

        .modal-backdrop.show {
            opacity: 1;
        }

        .modal-dialog {
            margin: 30px auto;
            max-width: 480px;
            animation: modalSlideIn 0.3s ease-out;
        }

        .btn-auth {
            padding: 8px 16px;
            font-size: 14px;
            font-weight: 500;
            border-radius: 6px;
            transition: all 0.15s ease-in-out;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin: 0 4px;
            cursor: pointer;
            border: none;
            background: none;
        }

        .btn-login {
            color: #e6edf3;
            border: 1px solid #30363d;
            background: transparent;
        }

        .btn-login:hover {
            background-color: #30363d;
            color: #f0f6fc;
            transform: translateY(-1px);
            text-decoration: none;
        }

        .btn-register {
            color: #ffffff;
            background: linear-gradient(135deg, #238636 0%, #2ea043 100%);
            border: 1px solid transparent;
        }

        .btn-register:hover {
            background: linear-gradient(135deg, #2ea043 0%, #238636 100%);
            transform: translateY(-1px);
            box-shadow: 0 8px 24px rgba(46, 160, 67, 0.35);
            text-decoration: none;
            color: #ffffff;
        }

        .modal-content {
            background: linear-gradient(135deg, #21262d 0%, #161b22 100%);
            border: 1px solid #30363d;
            border-radius: 12px;
            box-shadow: 0 25px 50px rgba(1, 4, 9, 0.9);
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(16px);
        }

        .modal-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #58a6ff, #3fb950, #f85149);
            border-radius: 12px 12px 0 0;
        }

        .modal-header {
            border-bottom: 1px solid #30363d;
            background: rgba(13, 17, 23, 0.5);
            padding: 20px 24px;
            position: relative;
        }

        .modal-header .close {
            color: #8b949e;
            opacity: 1;
            font-size: 24px;
            font-weight: 300;
            text-shadow: none;
            position: absolute;
            right: 16px;
            top: 16px;
            background: none;
            border: none;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.15s ease-in-out;
        }

        .modal-header .close:hover {
            background-color: #30363d;
            color: #f0f6fc;
            transform: rotate(90deg);
        }

        .modal-body {
            padding: 0;
        }

        /*  */
        /* Navbar toggle styling */
        .navbar-toggler {
            border: 1px solid #30363d;
            padding: 4px 8px;
            border-radius: 6px;
            transition: all 0.15s ease-in-out;
        }

        .navbar-toggler:focus {
            box-shadow: 0 0 0 3px rgba(88, 166, 255, 0.12);
        }

        .navbar-toggler:hover {
            border-color: #58a6ff;
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%28230, 237, 243, 1%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='m4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }

        /* Animations */
        @keyframes modalSlideIn {
            from {
                opacity: 0;
                transform: translateY(-50px) scale(0.95);
            }

            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* User dropdown styling */
        .dropdown-toggle::after {
            display: none;
        }

        .dropdown-menu {
            background-color: #21262d;
            border: 1px solid #30363d;
            border-radius: 8px;
            box-shadow: 0 8px 24px rgba(1, 4, 9, 0.35);
            margin-top: 8px;
        }

        .dropdown-item {
            color: #e6edf3;
            padding: 8px 16px;
            font-size: 14px;
            transition: all 0.15s ease-in-out;
        }

        .dropdown-item:hover {
            background-color: #30363d;
            color: #f0f6fc;
        }

        .dropdown-divider {
            border-color: #30363d;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .navbar-nav {
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px solid #30363d;
            }

            .auth-buttons {
                margin-top: 12px;
                padding-top: 12px;
                border-top: 1px solid #30363d;
                display: flex;
                gap: 8px;
            }

            .btn-auth {
                flex: 1;
                justify-content: center;
            }
        }
    </style>

</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-right">
                    <li><a href="#"><i class="fa fa-inr"></i> VNĐ</a></li>
                    <li>
                        <?php
                        include "db.php";
                        if (isset($_SESSION["uid"])) {
                            $sql = "SELECT first_name FROM user_info WHERE user_id='$_SESSION[uid]'";
                            $query = mysqli_query($con, $sql);
                            $row = mysqli_fetch_array($query);

                            echo '
                               <div class="dropdownn">
                                  <a href="#" class="dropdownn"><i class="fa fa-user-o"></i> HI ' . $row["first_name"] . '</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#profile"><i class="fa fa-user-circle" aria-hidden="true"></i>My Profile</a>
                                    <a href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Log out</a>
                                  </div>
                                </div>';
                        } else {
                            echo '
                                <div class="dropdownn">
                                  <a href="#" class="dropdownn"><i class="fa fa-user-o"></i> My Account</a>
                                  <div class="dropdownn-content">
                                    <a href="" data-toggle="modal" data-target="#Modal_login"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
                                    <a href="" data-toggle="modal" data-target="#Modal_register"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a>
                                  </div>
                                </div>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <div class="container">
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="index.php" class="logo">
                                <span>
                                    <p>
                                        Online Shop
                                    </p>
                                </span>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">
                        <div class="header-search">
                            <form onsubmit="return false;">
                                <select class="input-select" id="search_category">
                                    <option value="0">All Categories</option>
                                    <option value="1">Men</option>
                                    <option value="2">Women</option>
                                </select>
                                <input class="input" id="search_input" type="text" placeholder="Search for products...">
                                <button type="button" id="search_btn" class="search-btn">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>

                        </div>
                    </div>

                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Cart -->
                            <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span>Your Cart</span>
                                    <div class="badge qty">0</div>
                                </a>
                                <div class="cart-dropdown">
                                    <div class="cart-list" id="cart_product">
                                        <!-- Cart items will be loaded here -->
                                    </div>
                                    <div class="cart-btns">
                                        <a href="cart.php">
                                            <i class="fa fa-edit"></i> View Cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toggle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toggle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
            </div>
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id='navigation'>
        <div class="container" id="get_category_home">
            <!-- Categories will be loaded here -->
        </div>
    </nav>
    <!-- /NAVIGATION -->

    <!-- LOGIN MODAL -->
    <div class="modal fade" id="Modal_login" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php include "login_form.php"; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- REGISTER MODAL -->
    <div class="modal fade" id="Modal_register" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <?php include "register_form.php"; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS will be included at the bottom of the page for better performance -->
</body>