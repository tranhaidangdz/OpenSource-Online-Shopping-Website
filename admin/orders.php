<?php
session_start();
include("../db.php");

error_reporting(0);

// Xóa đơn hàng
if (isset($_GET['action']) && $_GET['action'] == 'delete') {
  $order_id = $_GET['order_id'];
  mysqli_query($con, "DELETE FROM order_products WHERE order_id='$order_id'") or die("Delete query order_products incorrect...");
  mysqli_query($con, "DELETE FROM orders_info WHERE order_id='$order_id'") or die("Delete query orders_info incorrect...");
}

// Chấp nhận đơn hàng (update trạng thái trong orders_info)
if (isset($_GET['action']) && $_GET['action'] == 'accept') {
  $order_id = $_GET['order_id'];
  mysqli_query($con, "UPDATE orders_info SET status='Completed' WHERE order_id='$order_id'")
    or die("Update query incorrect...");
}

///pagination
$page = $_GET['page'];
if ($page == "" || $page == "1") {
  $page1 = 0;
} else {
  $page1 = ($page * 10) - 10;
}

include "sidenav.php";
include "topheader.php";
?>
<!-- End Navbar -->
<div class="content">
  <div class="container-fluid">
    <div class="col-md-14">
      <div class="card ">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Orders / Page <?php echo $page; ?> </h4>
        </div>
        <div class="card-body">
          <div class="table-responsive ps">
            <table class="table table-hover tablesorter">
              <thead class=" text-primary">
                <tr>
                  <th>Customer Name</th>
                  <th>Products</th>
                  <th>Email | Phone Number</th>
                  <th>Address|City|State|Zip</th>
                  <th>Quantity</th>
                  <th>Total Amount</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $result = mysqli_query(
                  $con,
                  "SELECT oi.order_id,
                          GROUP_CONCAT(p.product_title SEPARATOR ', ') as products,
                          CONCAT(ui.first_name, ' ', ui.last_name) as full_name,
                          ui.mobile,
                          oi.email,
                          oi.address,
                          oi.city,
                          oi.state,
                          oi.zip,
                          SUM(op.qty) as total_qty,
                          oi.total_amt,
                          IFNULL(oi.status, 'Pending') as status
                   FROM orders_info oi
                   JOIN order_products op ON oi.order_id = op.order_id
                   JOIN products p ON op.product_id = p.product_id
                   JOIN user_info ui ON ui.user_id = oi.user_id
                   GROUP BY oi.order_id
                   LIMIT $page1,10"
                ) or die('query incorrect: ' . mysqli_error($con));

                while ($row = mysqli_fetch_array($result)) {
                  echo "<tr>
                          <td>{$row['full_name']}</td>
                          <td>{$row['products']}</td>
                          <td>{$row['email']}<br>{$row['mobile']}</td>
                          <td>{$row['address']}, {$row['city']}, {$row['state']}<br>ZIP: {$row['zip']}</td>
                          <td>{$row['total_qty']}</td>
                          <td>{$row['total_amt']}</td>
                          <td>{$row['status']}</td>
                          <td>
                              <a class='btn btn-success btn-sm' href='orders.php?order_id={$row['order_id']}&action=accept'>Accept</a>
                              <a class='btn btn-danger btn-sm' href='orders.php?order_id={$row['order_id']}&action=delete'>Delete</a>
                          </td>
                        </tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<?php
include "footer.php";
?>