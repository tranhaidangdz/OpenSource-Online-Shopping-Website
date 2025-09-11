# Online Shopping Website (PHP)

## Giới thiệu
. Đây là website bán hàng trực tuyến được xây dựng bằng ngôn ngữ **PHP**.  
. Giao diện được thiết kế với **HTML, CSS, Bootstrap** để thân thiện với người dùng.  
. Website có các chức năng cơ bản của một hệ thống thương mại điện tử: quản lý sản phẩm, giỏ hàng, đặt hàng, quản lý người dùng.  

## Chức năng chính
. Đăng ký, đăng nhập, đăng xuất tài khoản người dùng  
. Hiển thị danh sách sản phẩm theo danh mục  
. Tìm kiếm sản phẩm  
. Thêm sản phẩm vào giỏ hàng  
. Thanh toán đơn hàng  
. Quản trị viên có thể thêm, sửa, xóa sản phẩm  
. Quản lý đơn hàng từ phía Admin  

## Công nghệ sử dụng
. Ngôn ngữ: **PHP** (thuần)  
. Giao diện: **HTML5, CSS3, Bootstrap**  
. Cơ sở dữ liệu: **MySQL**  
. Máy chủ: **XAMPP / LAMP / WAMP**  

## Yêu cầu hệ thống
. PHP 7.4 trở lên  
. MySQL 5.7 hoặc MariaDB  
. Trình duyệt hiện đại hỗ trợ HTML5, CSS3  
. Công cụ chạy server local (XAMPP, WAMP, Laragon, hoặc tương đương)  

## Cài đặt và chạy thử
1. Tải source code về máy:  
. mở 1 thư mục trống, vào git bash hoặc terminal: 
   git clone https://github.com/<your-username>/ONLINE_SHOPPING_PHP.git
2. Giải nén (nếu tải file ZIP).
3. Copy toàn bộ thư mục vào thư mục htdocs (nếu dùng XAMPP).
4. Import file SQL (có trong thư mục /database ) vào MySQL:
. Mở phpMyAdmin
. Tạo database onlineshopping (hoặc tên khác, tùy config trong code)
. Import file onlineshopping.sql
5. Cấu hình kết nối database trong file config.php hoặc db.php (tùy vị trí trong source):
   $servername = "localhost";
   $username   = "root";
   $password   = "";
   $dbname     = "onlineshopping";
6. Chạy dự án bằng đường dẫn: lên 1 trình duyệt như chrome hay firefox mở đường dẫn:
   http://localhost/ONLINE_SHOPPING_PHP/
7.Tài khoản demo
. Tài khoản người dùng:
Username: user
Password: 123456
. Tài khoản admin:
Username: admin
Password: admin123
## Cấu trúc thư mục
. /assets - Chứa CSS, JS, hình ảnh
. /database hoặc /sql - File cơ sở dữ liệu
. /includes - Các file tái sử dụng (header, footer, config DB)
. /admin - Chức năng quản trị viên
. /user hoặc /pages - Chức năng dành cho người dùng
. index.php - Trang chủ website

## Hướng phát triển
. Tích hợp thanh toán online (PayPal, VNPay, MoMo, ZaloPay)
. Tối ưu bảo mật (SQL Injection, XSS, CSRF)
. Cải thiện UI/UX bằng framework frontend hiện đại (VueJS, React)
. Phát triển REST API để hỗ trợ ứng dụng mobile
## Demo giao diện

(Thêm ảnh demo ở đây: trang chủ, giỏ hàng, admin, v.v.)
. © 2025 - Online Shopping PHP Project
. author: tranhaidangdz
. email: trandang211@gmail.com
