<?php
session_start();
include("../db.php");

// Function to sanitize input
function sanitize_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

if (isset($_POST['btn_save'])) {
  $product_name = sanitize_input($_POST['product_name']);
  $details = sanitize_input($_POST['details']);
  $price = floatval($_POST['price']);
  $c_price = floatval($_POST['c_price']);
  $product_type = intval($_POST['product_type']);
  $brand = intval($_POST['brand']);
  $tags = sanitize_input($_POST['tags']);

  // Picture upload handling
  $picture_name = $_FILES['picture']['name'];
  $picture_type = $_FILES['picture']['type'];
  $picture_tmp_name = $_FILES['picture']['tmp_name'];
  $picture_size = $_FILES['picture']['size'];

  $allowed_types = array("image/jpeg", "image/jpg", "image/png", "image/gif");
  $max_size = 5000000; // 5MB

  if (in_array($picture_type, $allowed_types)) {
    if ($picture_size <= $max_size) {
      $pic_name = time() . "_" . basename($picture_name);
      $upload_path = "../product_images/" . $pic_name;

      if (move_uploaded_file($picture_tmp_name, $upload_path)) {
        // Use prepared statement to prevent SQL injection
        $stmt = mysqli_prepare($con, "INSERT INTO products (product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords) VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "iisdsss", $product_type, $brand, $product_name, $price, $details, $pic_name, $tags);

        if (mysqli_stmt_execute($stmt)) {
          header("location: productlist.php?success=1");
          exit();
        } else {
          $error = "Database error: " . mysqli_error($con);
        }
        mysqli_stmt_close($stmt);
      } else {
        $error = "Failed to upload image";
      }
    } else {
      $error = "File size too large. Maximum 5MB allowed.";
    }
  } else {
    $error = "Invalid file type. Only JPG, JPEG, PNG, GIF allowed.";
  }
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
  <div class="container-fluid">
    <?php if (isset($error)): ?>
      <div class="alert alert-danger">
        <?php echo $error; ?>
      </div>
    <?php endif; ?>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md-7">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="title">Add Product</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Title</label>
                    <input type="text" name="product_name" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Add Image</label>
                    <input type="file" name="picture" required class="form-control"
                      accept="image/*">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Description</label>
                    <textarea rows="4" name="details" class="form-control" required></textarea>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Regular Price</label>
                    <input type="number" step="0.01" name="price" class="form-control" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Compare Price</label>
                    <input type="number" step="0.01" name="c_price" class="form-control">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-md-5">
          <div class="card">
            <div class="card-header card-header-primary">
              <h5 class="title">Categories</h5>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Category</label>
                    <select name="product_type" class="form-control" required>
                      <option value="">Select Category</option>
                      <?php
                      $cat_result = mysqli_query($con, "SELECT cat_id, cat_title FROM categories");
                      while ($cat = mysqli_fetch_array($cat_result)) {
                        echo "<option value='{$cat['cat_id']}'>{$cat['cat_title']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Brand</label>
                    <select name="brand" class="form-control" required>
                      <option value="">Select Brand</option>
                      <?php
                      $brand_result = mysqli_query($con, "SELECT brand_id, brand_title FROM brands");
                      while ($brand = mysqli_fetch_array($brand_result)) {
                        echo "<option value='{$brand['brand_id']}'>{$brand['brand_title']}</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Product Keywords</label>
                    <input type="text" name="tags" class="form-control" required>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button type="submit" name="btn_save" class="btn btn-fill btn-primary">Add Product</button>
              <a href="productlist.php" class="btn btn-secondary">Cancel</a>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>

<?php include "footer.php"; ?>