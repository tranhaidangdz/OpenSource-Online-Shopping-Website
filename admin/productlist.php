<?php
session_start();
include("../db.php");
error_reporting(0);

// Handle delete action
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['product_id'])) {
  $product_id = intval($_GET['product_id']);

  // Get product image for deletion
  $stmt = mysqli_prepare($con, "SELECT product_image FROM products WHERE product_id = ?");
  mysqli_stmt_bind_param($stmt, "i", $product_id);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_array($result)) {
    $picture = $row['product_image'];
    $path = "../product_images/$picture";

    // Delete image file if exists
    if (file_exists($path)) {
      unlink($path);
    }

    // Delete product from database
    $delete_stmt = mysqli_prepare($con, "DELETE FROM products WHERE product_id = ?");
    mysqli_stmt_bind_param($delete_stmt, "i", $product_id);

    if (mysqli_stmt_execute($delete_stmt)) {
      header("location: productlist.php?success=Product deleted successfully");
    } else {
      header("location: productlist.php?error=Failed to delete product");
    }
    mysqli_stmt_close($delete_stmt);
  }
  mysqli_stmt_close($stmt);
  exit();
}

// Pagination
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$items_per_page = 10;
$offset = ($page - 1) * $items_per_page;

// Category filter
$category_filter = isset($_GET['category']) ? intval($_GET['category']) : 0;
$search = isset($_GET['search']) ? sanitize_input($_GET['search']) : '';

// Build query conditions
$where_conditions = array();
$params = array();
$types = "";

if ($category_filter > 0) {
  $where_conditions[] = "product_cat = ?";
  $params[] = $category_filter;
  $types .= "i";
}

if (!empty($search)) {
  $where_conditions[] = "(product_title LIKE ? OR product_keywords LIKE ?)";
  $search_term = "%$search%";
  $params[] = $search_term;
  $params[] = $search_term;
  $types .= "ss";
}

$where_clause = empty($where_conditions) ? "" : "WHERE " . implode(" AND ", $where_conditions);

// Get total count for pagination
$count_query = "SELECT COUNT(*) as total FROM products p 
                LEFT JOIN categories c ON p.product_cat = c.cat_id 
                LEFT JOIN brands b ON p.product_brand = b.brand_id 
                $where_clause";

if (!empty($params)) {
  $count_stmt = mysqli_prepare($con, $count_query);
  if (!empty($types)) {
    mysqli_stmt_bind_param($count_stmt, $types, ...$params);
  }
  mysqli_stmt_execute($count_stmt);
  $count_result = mysqli_stmt_get_result($count_stmt);
} else {
  $count_result = mysqli_query($con, $count_query);
}

$total_items = mysqli_fetch_array($count_result)['total'];
$total_pages = ceil($total_items / $items_per_page);

// Get products
$query = "SELECT p.product_id, p.product_image, p.product_title, p.product_price, c.cat_title, b.brand_title 
          FROM products p 
          LEFT JOIN categories c ON p.product_cat = c.cat_id 
          LEFT JOIN brands b ON p.product_brand = b.brand_id 
          $where_clause 
          ORDER BY p.product_id DESC 
          LIMIT ? OFFSET ?";

$limit_params = $params;
$limit_params[] = $items_per_page;
$limit_params[] = $offset;
$limit_types = $types . "ii";

$stmt = mysqli_prepare($con, $query);
if (!empty($limit_types)) {
  mysqli_stmt_bind_param($stmt, $limit_types, ...$limit_params);
}
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

function sanitize_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

include "sidenav.php";
include "topheader.php";
?>

<div class="content">
    <div class="container-fluid">

        <!-- Success/Error Messages -->
        <?php if (isset($_GET['success'])): ?>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo htmlspecialchars($_GET['success']); ?>
        </div>
        <?php endif; ?>

        <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo htmlspecialchars($_GET['error']); ?>
        </div>
        <?php endif; ?>

        <!-- Filters -->
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form method="GET" class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Search Products</label>
                                    <input type="text" name="search" class="form-control"
                                        placeholder="Search by name or keywords"
                                        value="<?php echo htmlspecialchars($search); ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Filter by Category</label>
                                    <select name="category" class="form-control">
                                        <option value="0">All Categories</option>
                                        <?php
                    $cat_result = mysqli_query($con, "SELECT cat_id, cat_title FROM categories");
                    while ($cat = mysqli_fetch_array($cat_result)) {
                      $selected = ($cat['cat_id'] == $category_filter) ? 'selected' : '';
                      echo "<option value='{$cat['cat_id']}' {$selected}>{$cat['cat_title']}</option>";
                    }
                    ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>&nbsp;</label><br>
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="productlist.php" class="btn btn-secondary">Reset</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products List -->
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header-primary">
                    <h4 class="card-title">Products List (<?php echo $total_items; ?> items)</h4>
                    <div class="float-right">
                        <a class="btn btn-success" href="addproduct.php">
                            <i class="material-icons">add</i> Add New Product
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-primary">
                                <tr>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (mysqli_num_rows($result) > 0): ?>
                                <?php while ($row = mysqli_fetch_array($result)): ?>
                                <tr>
                                    <td>
                                        <img src="../product_images/<?php echo $row['product_image']; ?>"
                                            style="width:50px; height:50px; object-fit:cover; border-radius:5px;">
                                    </td>
                                    <td><?php echo htmlspecialchars($row['product_title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['cat_title']); ?></td>
                                    <td><?php echo htmlspecialchars($row['brand_title']); ?></td>
                                    <td>$<?php echo number_format($row['product_price'], 2); ?></td>
                                    <td>
                                        <a href="editproduct.php?product_id=<?php echo $row['product_id']; ?>"
                                            class="btn btn-info btn-sm" title="Edit">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <a href="productlist.php?product_id=<?php echo $row['product_id']; ?>&action=delete"
                                            class="btn btn-danger btn-sm" title="Delete"
                                            onclick="return confirm('Are you sure you want to delete this product?')">
                                            <i class="material-icons">delete</i>
                                        </a>
                                    </td>
                                </tr>
                                <?php endwhile; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="6" class="text-center">No products found</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <?php if ($total_pages > 1): ?>
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?page=<?php echo max(1, $page - 1); ?>&category=<?php echo $category_filter; ?>&search=<?php echo urlencode($search); ?>">
                            <span aria-hidden="true">&laquo;</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>

                    <?php for ($i = max(1, $page - 2); $i <= min($total_pages, $page + 2); $i++): ?>
                    <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
                        <a class="page-link"
                            href="?page=<?php echo $i; ?>&category=<?php echo $category_filter; ?>&search=<?php echo urlencode($search); ?>">
                            <?php echo $i; ?>
                        </a>
                    </li>
                    <?php endfor; ?>

                    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
                        <a class="page-link"
                            href="?page=<?php echo min($total_pages, $page + 1); ?>&category=<?php echo $category_filter; ?>&search=<?php echo urlencode($search); ?>">
                            <span aria-hidden="true">&raquo;</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>