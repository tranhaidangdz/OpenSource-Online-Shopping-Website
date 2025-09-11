<?php
include "db.php"; // file kết nối CSDL của bạn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $name       = $_POST['name'];
    $email      = $_POST['email'];
    $rating     = $_POST['rating'];
    $comment    = $_POST['comment'];

    $sql = "INSERT INTO reviews (product_id, name, email, rating, comment) VALUES (?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("issis", $product_id, $name, $email, $rating, $comment);

    if ($stmt->execute()) {
        header("Location: product.php?p=" . $product_id . "#!");
        //#! là một hash fragment trên URL (client-side), PHP không tự động giữ lại khi redirect.
        // Vì vậy bạn cần nối thủ công #! vào cuối Location.
        exit();
    } else {
        echo "Lỗi: " . $stmt->error;
    }
}
