<footer id="footer">
	<!-- top footer -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">About Us</h3>

						<ul class="footer-links">
							<li>
								<a href="https://www.google.com/maps/place/Tr%C6%B0%E1%BB%9Dng+%C4%90%E1%BA%A1i+H%E1%BB%8Dc+Giao+Th%C3%B4ng+V%E1%BA%ADn+T%E1%BA%A3i/@21.0281595,105.8008456,17z/data=!3m1!4b1!4m6!3m5!1s0x3135ab424a50fff9:0xbe3a7f3670c0a45f!8m2!3d21.0281545!4d105.8034205!16s%2Fm%2F0vb3l_2?hl=vi&entry=ttu&g_ep=EgoyMDI1MDgzMC4wIKXMDSoASAFQAw%3D%3D"
									target="_blank">
									<i class="fa fa-map-marker"></i>
									No. 3 Cau Giay Street, Lang Ward, Hanoi, VietNam
								</a>
							</li>
							<li>
								<a href="tel:+84398124132">
									<i class="fa fa-phone"></i>
									+84 398124132
								</a>
							</li>
							<li>
								<a href="mailto:trandang211@gmail.com">
									<i class="fa fa-envelope-o"></i>
									trandang211@gmail.com
								</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="col-md-6 text-center" style="margin-top:80px;">
					<ul class="footer-payments">
						<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
						<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
						<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
					</ul>
					<span class="copyright">
						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
						Copyright &copy;<script>
							document.write(new Date().getFullYear());
						</script> All rights reserved

					</span>
				</div>

				<div class="col-md-3 col-xs-6">
					<div class="footer">
						<h3 class="footer-title">Categories</h3>
						<ul class="footer-links">
							<li><a href="#">Mobiles</a></li>
							<li><a href="#">Men</a></li>
							<li><a href="#">Women</a></li>
							<li><a href="#">Kids</a></li>
							<li><a href="#">Accessories</a></li>
						</ul>
					</div>
				</div>

				<div class="clearfix visible-xs"></div>


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /top footer -->


	<!-- bottom footer -->

	<!-- /bottom footer -->
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/slick.min.js"></script>
<script src="js/nouislider.min.js"></script>
<script src="js/jquery.zoom.min.js"></script>
<script src="js/main.js"></script>
<script src="js/actions.js"></script>
<script src="js/sweetalert.min"></script>
<script src="js/jquery.payform.min.js" charset="utf-8"></script>
<script src="js/script.js"></script>
<script>
	var c = 0;

	function menu() {
		if (c % 2 == 0) {
			document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu active";
			document.querySelector('.cont_icon_trg').className = "cont_icon_trg active";
			c++;
		} else {
			document.querySelector('.cont_drobpdown_menu').className = "cont_drobpdown_menu disable";
			document.querySelector('.cont_icon_trg').className = "cont_icon_trg disable";
			c++;
		}
	}
</script>
<script type="text/javascript">
	$('.block2-btn-addcart').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to cart !", "success");
		});
	});

	$('.block2-btn-addwishlist').each(function() {
		var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
		$(this).on('click', function() {
			swal(nameProduct, "is added to wishlist !", "success");
		});
	});
</script>