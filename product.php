<?php
include "header.php";
?>
<!-- /BREADCRUMB -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event) {
			event.preventDefault();
			$('html,body').animate({
				scrollTop: $(this.hash).offset().top
			}, 900);
		});
	});
</script>
<script>
	(function(global) {
		if (typeof(global) === "undefined") {
			throw new Error("window is undefined");
		}
		var _hash = "!";
		var noBackPlease = function() {
			global.location.href += "#";
			global.setTimeout(function() {
				global.location.href += "!";
			}, 50);
		};
		global.onhashchange = function() {
			if (global.location.hash !== _hash) {
				global.location.hash = _hash;
			}
		};
		global.onload = function() {
			noBackPlease();
			document.body.onkeydown = function(e) {
				var elm = e.target.nodeName.toLowerCase();
				if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
					e.preventDefault();
				}
				e.stopPropagation();
			};
		};
	})(window);
</script>

<!-- SECTION -->
<div class="section main main-raised">
	<div class="container">
		<div class="row">
			<?php
			include 'db.php';
			$product_id = isset($_GET['p']) ? intval($_GET['p']) : 0;

			if ($product_id > 0) {
				$sql = "SELECT * FROM products WHERE product_id = $product_id";
				if (!$con) {
					die("Connection failed: " . mysqli_connect_error());
				}
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
					while ($row = mysqli_fetch_assoc($result)) {
						echo '
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
						</div>
					</div>
					
					<div class="col-md-2 col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
							<div class="product-preview">
								<img src="product_images/' . $row['product_image'] . '" alt="">
							</div>
						</div>
					</div>
					
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">' . $row['product_title'] . '</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#review-form">Xem đánh giá | Thêm đánh giá</a>
							</div>
							<div>
								<h3 class="product-price">$' . $row['product_price'] . ' <del class="product-old-price">$990.00</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							<p>' . $row['product_desc'] . '</p>

							<div class="product-options">
								<label>
									Size
									<select class="input-select">
										<option value="0">X</option>
									</select>
								</label>
								<label>
									Color
									<select class="input-select">
										<option value="0">Red</option>
									</select>
								</label>
							</div>

							<div class="add-to-cart">
								<div class="qty-label">
									Qty
									<div class="input-number">
										<span class="qty-up">+</span>
										<span class="qty-down">-</span>
									</div>
								</div>
								<div class="btn-group" style="margin-left: 25px; margin-top: 15px">
									<button class="add-to-cart-btn" pid="' . $row['product_id'] . '" id="product"><i class="fa fa-shopping-cart"></i> add to cart</button>
								</div>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="col-md-12">
						<div id="product-tab">
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
								<li><a data-toggle="tab" href="#tab2">Details</a></li>
								<li><a data-toggle="tab" href="#tab3">Reviews</a></li>
							</ul>
							
							<div class="tab-content">
								<!-- tab1 -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row"><div class="col-md-12"><p>' . $row['product_desc'] . '</p></div></div>
								</div>
								<!-- /tab1 -->

								<!-- tab2 -->
								<div id="tab2" class="tab-pane fade in">
									<div class="row"><div class="col-md-12"><p>' . $row['product_keywords'] . '</p></div></div>
								</div>
								<!-- /tab2 -->

								<!-- tab3 -->
								<div id="tab3" class="tab-pane fade in">
									<div class="row">
										<!-- Rating -->
										<div class="col-md-3">
											<div id="rating">';
						// Tính trung bình rating
						$sql_avg = "SELECT AVG(rating) as avg_rating, COUNT(*) as total_reviews FROM reviews WHERE product_id = $product_id";
						$res_avg = mysqli_query($con, $sql_avg);
						$avg_row = mysqli_fetch_assoc($res_avg);
						$avg_rating = round($avg_row['avg_rating'], 1);
						$total_reviews = $avg_row['total_reviews'];
						echo '<div class="rating-avg">
													<span>' . ($avg_rating ?: 0) . '</span>
													<div class="rating-stars">';
						for ($i = 1; $i <= 5; $i++) {
							echo $i <= $avg_rating ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
						}
						echo '</div>
												</div>
												<ul class="rating">';
						for ($star = 5; $star >= 1; $star--) {
							$sql_star = "SELECT COUNT(*) as c FROM reviews WHERE product_id=$product_id AND rating=$star";
							$res_star = mysqli_query($con, $sql_star);
							$c = mysqli_fetch_assoc($res_star)['c'];
							$percent = $total_reviews > 0 ? ($c / $total_reviews * 100) : 0;
							echo '<li>
														<div class="rating-stars">';
							for ($i = 1; $i <= 5; $i++) {
								echo $i <= $star ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o"></i>';
							}
							echo '</div>
														<div class="rating-progress"><div style="width:' . $percent . '%;"></div></div>
														<span class="sum">' . $c . '</span>
													</li>';
						}
						echo '</ul>
											</div>
										</div>
										<!-- /Rating -->

										<!-- Reviews -->
										<div class="col-md-6">
											<div id="reviews">
												<ul class="reviews">';
						$sql_reviews = "SELECT name, comment, rating, created_at FROM reviews WHERE product_id = $product_id ORDER BY created_at DESC LIMIT 10";
						$res_reviews = mysqli_query($con, $sql_reviews);
						if (mysqli_num_rows($res_reviews) > 0) {
							while ($rv = mysqli_fetch_assoc($res_reviews)) {
								echo '<li>
																<div class="review-heading">
																	<h5 class="name">' . htmlspecialchars($rv['name']) . '</h5>
																	<p class="date">' . $rv['created_at'] . '</p>
																	<div class="review-rating">';
								for ($i = 1; $i <= 5; $i++) {
									echo $i <= $rv['rating'] ? '<i class="fa fa-star"></i>' : '<i class="fa fa-star-o empty"></i>';
								}
								echo '</div>
																</div>
																<div class="review-body">
																	<p>' . htmlspecialchars($rv['comment']) . '</p>
																</div>
															</li>';
							}
						} else {
							echo "<p>Chưa có đánh giá nào cho sản phẩm này.</p>";
						}
						echo '</ul>
											</div>
										</div>
										<!-- /Reviews -->

										<!-- Review Form -->
										<div class="col-md-3 mainn">
											<div id="review-form">
												<form class="review-form" action="save_review.php" method="POST">
													<input type="hidden" name="product_id" value="' . $product_id . '">
													<input class="input" type="text" name="name" placeholder="Your Name" required>
													<input class="input" type="email" name="email" placeholder="Your Email" required>
													<textarea class="input" name="comment" placeholder="Your Review" required></textarea>
													<div class="input-rating">
														<span>Your Rating: </span>
														<div class="stars">
															<input id="star5" name="rating" value="5" type="radio"><label for="star5"></label>
															<input id="star4" name="rating" value="4" type="radio"><label for="star4"></label>
															<input id="star3" name="rating" value="3" type="radio"><label for="star3"></label>
															<input id="star2" name="rating" value="2" type="radio"><label for="star2"></label>
															<input id="star1" name="rating" value="1" type="radio"><label for="star1"></label>
														</div>
													</div>
													<button class="primary-btn" type="submit">Submit</button>
												</form>
											</div>
										</div>
										<!-- /Review Form -->
									</div>
								</div>
								<!-- /tab3 -->
							</div>
						</div>
					</div>';
						$_SESSION['product_id'] = $row['product_id'];
					}
				} else {
					echo "<p>Sản phẩm không tồn tại.</p>";
				}
			} else {
				echo "<p>Không có sản phẩm được chọn.</p>";
			}
			?>

			<?php
			include 'db.php';
			$product_id = isset($_GET['p']) ? intval($_GET['p']) : 0;

			$product_query = "SELECT * FROM products,categories WHERE product_cat=cat_id AND product_id BETWEEN $product_id AND $product_id+3";
			$run_query = mysqli_query($con, $product_query);
			if (mysqli_num_rows($run_query) > 0) {
				while ($row = mysqli_fetch_array($run_query)) {
					$pro_id    = $row['product_id'];
					$pro_title = $row['product_title'];
					$pro_price = $row['product_price'];
					$pro_image = $row['product_image'];
					$cat_name  = $row["cat_title"];

					echo "
					<div class='col-md-3 col-xs-6'>
						<a href='product.php?p=$pro_id'>
							<div class='product'>
								<div class='product-img'>
									<img src='product_images/$pro_image' style='max-height:170px;' alt=''>
									<div class='product-label'>
										<span class='sale'>-30%</span>
										<span class='new'>NEW</span>
									</div>
								</div>
							</a>
							<div class='product-body'>
								<p class='product-category'>$cat_name</p>
								<h3 class='product-name header-cart-item-name'><a href='product.php?p=$pro_id'>$pro_title</a></h3>
								<h4 class='product-price header-cart-item-info'>$pro_price<del class='product-old-price'>$990.00</del></h4>
								<div class='product-rating'>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
									<i class='fa fa-star'></i>
								</div>
								<div class='product-btns'>
									<button class='add-to-wishlist'><i class='fa fa-heart-o'></i><span class='tooltipp'>add to wishlist</span></button>
									<button class='add-to-compare'><i class='fa fa-exchange'></i><span class='tooltipp'>add to compare</span></button>
									<button class='quick-view'><i class='fa fa-eye'></i><span class='tooltipp'>quick view</span></button>
								</div>
							</div>
							<div class='add-to-cart'>
								<button pid='$pro_id' id='product' class='add-to-cart-btn block2-btn-towishlist'><i class='fa fa-shopping-cart'></i> add to cart</button>
							</div>
						</div>
					</div>";
				}
			}
			?>
		</div>
	</div>
</div>

<?php
include "newslettter.php";
include "footer.php";
?>